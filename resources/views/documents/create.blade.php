@extends('layouts.app')
@section('title')
    <span class="inline-flex items-center gap-2">
        <i class="fas fa-upload text-orange-600"></i>
        Upload Dokumen
    </span>
@endsection

@section('content')
    <div class="max-w-lg mx-auto bg-white rounded-2xl shadow-xl p-4 sm:p-8 mt-8">
        <h2 class="text-lg sm:text-2xl font-bold mb-6 text-orange-700 flex items-center gap-2">
            <i class="fas fa-upload text-orange-500"></i>
            Upload Dokumen
        </h2>
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div>
                <label class="block mb-1 font-semibold text-orange-700">Judul Dokumen</label>
                <input type="text" name="title"
                       class="border-2 border-orange-300 rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-orange-500 outline-none transition"
                       required>
                @error('title')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block mb-1 font-semibold text-orange-700">File (PDF, DOCX, TXT, max 2MB)</label>
                <input type="file" name="file"
                       class="border-2 border-orange-300 rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-orange-500 outline-none transition"
                       required>
                @error('file')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <button type="submit"
                class="bg-orange-600 hover:bg-orange-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition w-full flex items-center gap-2 justify-center">
                <i class="fas fa-cloud-upload-alt"></i>
                Upload
            </button>
        </form>
        <a href="{{ route('documents.index') }}" class="block text-center mt-4 text-orange-700 hover:underline font-medium">
            <i class="fas fa-arrow-left mr-1"></i>
            Kembali ke Koleksi Dokumen
        </a>
    </div>
@endsection
