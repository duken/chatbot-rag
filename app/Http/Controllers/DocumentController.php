<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('uploader')->orderBy('created_at', 'desc')->paginate(10);
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|file|mimes:pdf,docx,txt|max:2048',
        ]);

        // UPLOAD ke disk 'public' agar bisa diakses oleh browser
        $filePath = $request->file('file')->store('documents', 'public');

        // Kirim ke backend RAG
        try {
            $response = Http::attach(
                'file',
                file_get_contents($request->file('file')->getRealPath()),
                $request->file('file')->getClientOriginalName()
            )->post('http://127.0.0.1:8001/api/rag/upload');

            if (!$response->successful()) {
                Storage::disk('public')->delete($filePath);
                return redirect()->back()->with('error', 'Upload ke RAG gagal: ' . $response->body());
            }
        } catch (\Exception $e) {
            Storage::disk('public')->delete($filePath);
            return redirect()->back()->with('error', 'Gagal terhubung ke backend RAG!');
        }

        Document::create([
            'title' => $request->title,
            'file_path' => $filePath,
            'uploader_id' => Auth::id(),
        ]);

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diupload');
    }

    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->file_path);
        $document->delete();
        return redirect()->route('documents.index')->with('success', 'Dokumen dihapus');
    }
}
