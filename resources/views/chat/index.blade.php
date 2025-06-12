@extends('layouts.app')

@section('title', 'siBolang - Chatbot Layanan Guru Gorontalo Utara')

@section('content')
<div class="flex justify-center">
    <div class="bg-white rounded-3xl shadow-xl p-10 w-full max-w-2xl mx-auto border">
        <!-- <h2 class="text-4xl font-extrabold text-orange-600 mb-6">Chatbot</h2> -->
         <div class="flex items-center gap-3 mb-6">
    <!-- Icon Chatbot ala Streamlit -->
    <span class="inline-block">
        <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
            <circle cx="24" cy="24" r="22" fill="#fff3e6" stroke="#e76f00" stroke-width="2"/>
            <ellipse cx="24" cy="26" rx="12" ry="9" fill="#fff" stroke="#e76f00" stroke-width="2"/>
            <circle cx="19" cy="26" r="2" fill="#e76f00"/>
            <circle cx="29" cy="26" r="2" fill="#e76f00"/>
            <path d="M21 31c1.5 1.5 4.5 1.5 6 0" stroke="#e76f00" stroke-width="2" stroke-linecap="round"/>
            <rect x="18" y="14" width="12" height="6" rx="3" fill="#e76f00" stroke="#fff" stroke-width="2"/>
            <rect x="22" y="9" width="4" height="7" rx="2" fill="#fff" stroke="#e76f00" stroke-width="2"/>
        </svg>
    </span>
    <h2 class="text-4xl font-extrabold text-orange-600">Chatbot</h2>
</div>

        <form id="chat-form" class="space-y-6">
            @csrf
            <div>
                <label class="block text-2xl font-bold text-orange-700 mb-2">Pertanyaan Anda:</label>
                <textarea
                    id="question"
                    name="question"
                    class="border-4 border-orange-500 rounded-xl w-full min-h-[120px] text-xl p-3 focus:outline-none focus:ring-2 focus:ring-orange-400"
                    placeholder="Tulis pertanyaan di sini..."
                    required
                ></textarea>
            </div>
            <div>
                <button type="submit" id="send-btn"
                    class="bg-orange-600 hover:bg-orange-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition w-full">
                    Kirim
                </button>
            </div>
        </form>
        <div id="chatbot-answer" class="mt-8 p-6 bg-orange-50 border border-orange-200 rounded-xl text-lg min-h-[60px]"></div>
    </div>
</div>

{{-- Marked.js untuk parsing markdown --}}
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script>
    document.getElementById('chat-form').addEventListener('submit', async function(e) {
        e.preventDefault();
        const btn = document.getElementById('send-btn');
        btn.disabled = true;
        btn.textContent = 'Memproses...';

        const question = document.getElementById('question').value;
        const answerBox = document.getElementById('chatbot-answer');
        answerBox.innerHTML = '<span class="text-orange-600">Sedang mencari jawaban...</span>';

        try {
            const resp = await fetch("{{ route('chat.ask') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ question })
            });

            const data = await resp.json();
            // Tampilkan hanya field 'answer' (atau 'reply' jika itu fieldnya)
            answerBox.innerHTML = marked.parse(data.answer ?? data.reply ?? "Tidak ada jawaban dari chatbot.");
        } catch (err) {
            answerBox.innerHTML = '<span class="text-red-600">Terjadi kesalahan pada server.</span>';
        } finally {
            btn.disabled = false;
            btn.textContent = 'Kirim';
        }
    });
</script>
@endsection
