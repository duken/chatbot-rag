@extends('layouts.app')
@section('title')
    <span class="inline-flex items-center gap-2">
        <i class="fas fa-user-edit text-orange-600"></i>
        Edit User
    </span>
@endsection

@section('content')
    <div class="max-w-lg mx-auto bg-white rounded-2xl shadow-xl p-4 sm:p-8 mt-8">
        <h2 class="text-lg sm:text-2xl font-bold mb-6 text-orange-700 flex items-center gap-2">
            <i class="fas fa-user-edit text-orange-500"></i>
            Edit User
        </h2>
        <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block mb-1 font-semibold text-orange-700">Nama</label>
                <input type="text" name="name"
                       class="border-2 border-orange-300 rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-orange-500 outline-none transition"
                       value="{{ $user->name }}" required>
            </div>
            <div>
                <label class="block mb-1 font-semibold text-orange-700">Email</label>
                <input type="email" name="email"
                       class="border-2 border-orange-300 rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-orange-500 outline-none transition"
                       value="{{ $user->email }}" required>
            </div>
            <div>
                <label class="block mb-1 font-semibold text-orange-700">
                    Password <span class="text-gray-400 text-sm">(kosongkan jika tidak diganti)</span>
                </label>
                <input type="password" name="password"
                       class="border-2 border-orange-300 rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-orange-500 outline-none transition">
            </div>
            <div>
                <label class="block mb-1 font-semibold text-orange-700">Role</label>
                <select name="role"
                        class="border-2 border-orange-300 rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-orange-500 outline-none transition"
                        required>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="bg-orange-600 hover:bg-orange-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition w-full flex items-center gap-2 justify-center">
                <i class="fas fa-save"></i>
                Simpan
            </button>
        </form>
        <a href="{{ route('users.index') }}" class="block text-center mt-4 text-orange-700 hover:underline font-medium">
            <i class="fas fa-arrow-left mr-1"></i>
            Kembali ke Daftar User
        </a>
    </div>
@endsection
