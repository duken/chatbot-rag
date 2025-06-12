@extends('layouts.app')

@section('title')
    <span class="inline-flex items-center gap-2">
        <i class="fas fa-id-card text-orange-600"></i>
        Profil Saya
    </span>
@endsection

@section('content')
<div class="max-w-lg mx-auto bg-white rounded-2xl shadow-xl p-4 sm:p-8 mt-8">
    <h2 class="text-lg sm:text-2xl font-bold mb-6 text-orange-700 flex items-center gap-2">
        <i class="fas fa-id-card text-orange-500"></i>
        Edit Profil
    </h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-50 text-green-700 border border-green-200 rounded">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('PATCH')

        <div>
            <label class="block mb-1 font-semibold text-orange-700">NIK</label>
            <input type="text"
                   class="border-2 border-orange-200 bg-gray-100 rounded-lg px-4 py-2 w-full outline-none"
                   value="{{ $guru->nik }}" readonly>
        </div>
        <div>
            <label class="block mb-1 font-semibold text-orange-700">Nama</label>
            <input type="text" name="name"
                   class="border-2 border-orange-300 rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-orange-500 outline-none transition"
                   value="{{ $guru->name ?? $guru->nama_guru }}" required>
            @error('name')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
        </div>
        <div>
            <label class="block mb-1 font-semibold text-orange-700">Email</label>
            <input type="email" name="email"
                   class="border-2 border-orange-300 rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-orange-500 outline-none transition"
                   value="{{ $guru->email }}" required>
            @error('email')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
        </div>
        <div>
            <label class="block mb-1 font-semibold text-orange-700">Sekolah</label>
            <input type="text"
                   class="border-2 border-orange-200 bg-gray-100 rounded-lg px-4 py-2 w-full outline-none"
                   value="{{ $guru->sekolah ?? '-' }}" readonly>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-semibold text-orange-700">NUPTK</label>
                <input type="text"
                       class="border-2 border-orange-200 bg-gray-100 rounded-lg px-4 py-2 w-full outline-none"
                       value="{{ $guru->nuptk ?? '-' }}" readonly>
            </div>
            <div>
                <label class="block mb-1 font-semibold text-orange-700">NIP</label>
                <input type="text"
                       class="border-2 border-orange-200 bg-gray-100 rounded-lg px-4 py-2 w-full outline-none"
                       value="{{ $guru->nip ?? '-' }}" readonly>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-semibold text-orange-700">Jenis Kelamin</label>
                <input type="text"
                       class="border-2 border-orange-200 bg-gray-100 rounded-lg px-4 py-2 w-full outline-none"
                       value="{{ $guru->jenis_kelamin ?? '-' }}" readonly>
            </div>
            <div>
                <label class="block mb-1 font-semibold text-orange-700">Status Guru</label>
                <input type="text"
                       class="border-2 border-orange-200 bg-gray-100 rounded-lg px-4 py-2 w-full outline-none"
                       value="{{ $guru->status_guru ?? '-' }}" readonly>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-semibold text-orange-700">Tempat Lahir</label>
                <input type="text"
                       class="border-2 border-orange-200 bg-gray-100 rounded-lg px-4 py-2 w-full outline-none"
                       value="{{ $guru->tempat_lahir ?? '-' }}" readonly>
            </div>
            <div>
                <label class="block mb-1 font-semibold text-orange-700">Tanggal Lahir</label>
                <input type="text"
                       class="border-2 border-orange-200 bg-gray-100 rounded-lg px-4 py-2 w-full outline-none"
                       value="{{ $guru->tanggal_lahir ?? '-' }}" readonly>
            </div>
        </div>
        <button type="submit"
                class="bg-orange-600 hover:bg-orange-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition w-full flex items-center gap-2 justify-center mt-2">
            <i class="fas fa-save"></i>
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
