<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    // Method untuk menampilkan form chat
    public function index()
    {
        // Jika ingin menampilkan form kosong
        return view('chat.index');
        
        // Jika ingin bisa menampilkan jawaban terakhir (opsional, silakan modifikasi)
        // return view('chat.index', ['answer' => null, 'question' => null]);
    }

    // Method untuk memproses pertanyaan
    public function ask(Request $request)
    {
        $pertanyaan = $request->input('question');
        if (!$pertanyaan) {
            return response()->json(['error' => 'Pertanyaan kosong'], 400);
        }

        // 1. Ambil context dari Retrieval API (FastAPI)
        $ragResponse = Http::timeout(10)->post('http://localhost:8001/retrieve', [
            'query' => $pertanyaan,
            'top_k' => 10
        ]);

        if (!$ragResponse->successful()) {
            return response()->json([
                'answer' => '(Retrieval API error)',
                'reply' => '(Retrieval API error)',
                'question' => $pertanyaan,
                'context_used' => [],
            ], 500);
        }

        $contexts = $ragResponse->json('contexts') ?? [];
        if (empty($contexts)) {
            return response()->json([
                'answer' => '(Jawaban tidak tersedia — tidak ada context ditemukan dari retrieval API)',
                'reply' => '(Jawaban tidak tersedia — tidak ada context ditemukan dari retrieval API)',
                'question' => $pertanyaan,
                'context_used' => [],
            ]);
        }
        $contextText = "";
        foreach ($contexts as $ctx) {
            $contextText .= "- (" . ($ctx['filename'] ?? '-') . "): " . ($ctx['text'] ?? '') . "\n";
        }

        // 2. Gabungkan context + pertanyaan untuk prompt OpenAI
        $prompt = <<<EOT
Berikut adalah beberapa potongan context dokumen terkait tunjangan profesi guru.

Petunjuk:
- Jawablah pertanyaan di bawah HANYA berdasarkan context yang diberikan.
- Jika pertanyaan berkaitan dengan syarat/daftar, gabungkan SEMUA syarat yang ditemukan pada seluruh context, jangan hanya mengambil dari satu potongan saja.
- Jika ada syarat yang mirip, satukan/digabungkan agar tidak duplikat.
- Jika context tidak memuat jawaban, balas: "Maaf, informasi tersebut tidak ditemukan dalam dokumen yang saya miliki."
- Tampilkan sumber dokumen di bawah jawaban (daftar nama file).
- Jawablah pertanyaan dengan format **markdown** dan gunakan list bernomor atau bullet jika memungkinkan.

Context:
$contextText

Pertanyaan: $pertanyaan

Jawaban:
EOT;

        // 3. Kirim ke OpenAI (GPT-3.5 Turbo)
        $openaiResponse = Http::timeout(20)
            ->withToken(env('OPENAI_API_KEY'))
            ->post('https://api.openai.com/v1/chat/completions', [
                "model" => "gpt-3.5-turbo",
                "messages" => [
                    ["role" => "system", "content" => "Anda adalah asisten dinas pendidikan yang hanya menjawab berdasarkan context dokumen."],
                    ["role" => "user", "content" => $prompt]
                ],
                "temperature" => 0.2
            ]);

        if (!$openaiResponse->successful()) {
            // Ambil pesan error dari response OpenAI (jika ada)
            $errDetail = $openaiResponse->json();
            return response()->json([
                'answer' => '(OpenAI API error)',
                'reply' => '(OpenAI API error)',
                'error_detail' => $errDetail,
                'question' => $pertanyaan,
                'context_used' => $contexts,
            ], 500);
        }

        $openaiData = $openaiResponse->json();
        $answer = $openaiData['choices'][0]['message']['content'] ?? '(Jawaban tidak tersedia — OpenAI API tidak membalas)';

        return response()->json([
            'answer' => $answer,   // <- field utama untuk frontend sekarang
            'reply' => $answer,    // <- kompatibel untuk frontend lama
            'question' => $pertanyaan,
            'context_used' => $contexts,
        ]);
    }
}
