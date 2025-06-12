@extends('layouts.app')
@section('title')
    <span class="inline-flex items-center gap-2">
        <i class="fas fa-folder-open text-orange-600"></i>
        Koleksi Dokumen
    </span>
@endsection

@section('content')
    <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <h2 class="text-lg sm:text-xl font-semibold text-orange-700 flex items-center gap-2">
            <i class="fas fa-file-alt text-orange-500"></i>
            Koleksi Dokumen
        </h2>
        <a href="{{ route('documents.create') }}"
           class="bg-orange-600 hover:bg-orange-700 text-white px-5 py-2 rounded shadow font-semibold transition w-full sm:w-auto text-center flex items-center gap-2 justify-center">
            <i class="fas fa-upload"></i>
            Upload Dokumen
        </a>
    </div>
    @if(session('success'))
        <div class="mb-4 bg-green-50 border border-green-300 text-green-800 p-3 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="min-w-full divide-y divide-orange-200 text-sm sm:text-base">
            <thead class="bg-orange-100">
                <tr>
                    <th class="py-3 px-4 text-left font-semibold text-orange-700 whitespace-nowrap">Judul</th>
                    <th class="py-3 px-4 text-left font-semibold text-orange-700 whitespace-nowrap">Uploader</th>
                    <th class="py-3 px-4 text-left font-semibold text-orange-700 whitespace-nowrap">Tanggal</th>
                    <th class="py-3 px-4 text-left font-semibold text-orange-700 whitespace-nowrap">File</th>
                    <th class="py-3 px-4 text-left font-semibold text-orange-700 whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($documents as $doc)
                    <tr class="hover:bg-orange-50 transition">
                        <td class="py-3 px-4">{{ $doc->title }}</td>
                        <td class="py-3 px-4">{{ $doc->uploader->name }}</td>
                        <td class="py-3 px-4">{{ $doc->created_at->format('d/m/Y') }}</td>
                        <td class="py-3 px-4">
                            <a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank"
                               class="inline-flex items-center gap-1 text-orange-600 hover:text-orange-800 font-semibold underline">
                                <i class="fas fa-eye"></i>
                                Lihat
                            </a>
                        </td>
                        <td class="py-3 px-4 flex flex-col sm:flex-row gap-2">
                            <form action="{{ route('documents.destroy', $doc) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded shadow text-sm font-bold transition flex items-center gap-1 justify-center"
                                        onclick="return confirm('Hapus dokumen?')">
                                    <i class="fas fa-trash-alt"></i>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-5 text-center text-gray-400">Belum ada dokumen.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $documents->links() }}
    </div>
@endsection
