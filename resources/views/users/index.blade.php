@extends('layouts.app')
@section('title')
    <span class="inline-flex items-center gap-2">
        <i class="fas fa-users-cog text-orange-600"></i>
        Manajemen User
    </span>
@endsection

@section('content')
    <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <h2 class="text-lg sm:text-xl font-semibold text-orange-700 flex items-center gap-2">
            <i class="fas fa-address-book text-orange-500"></i>
            Daftar User
        </h2>
        <a href="{{ route('users.create') }}"
           class="bg-orange-600 hover:bg-orange-700 text-white px-5 py-2 rounded shadow font-semibold transition w-full sm:w-auto text-center">
            + Tambah User
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
                    <th class="py-3 px-4 text-left font-semibold text-orange-700 whitespace-nowrap">Nama</th>
                    <th class="py-3 px-4 text-left font-semibold text-orange-700 whitespace-nowrap">Email</th>
                    <th class="py-3 px-4 text-left font-semibold text-orange-700 whitespace-nowrap">Role</th>
                    <th class="py-3 px-4 text-left font-semibold text-orange-700 whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr class="hover:bg-orange-50 transition">
                        <td class="py-3 px-4">{{ $user->name }}</td>
                        <td class="py-3 px-4">{{ $user->email }}</td>
                        <td class="py-3 px-4">
                            @foreach($user->roles as $role)
                                <span class="inline-block bg-orange-100 text-orange-800 text-xs font-semibold px-2 py-1 rounded mr-1 shadow">
                                    {{ ucfirst($role->name) }}
                                </span>
                            @endforeach
                        </td>
                        <td class="py-3 px-4 flex flex-col sm:flex-row gap-2">
                            <a href="{{ route('users.edit', $user) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-yellow-900 px-4 py-1 rounded shadow text-sm font-bold transition flex items-center gap-1 justify-center">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Hapus user?')" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded shadow text-sm font-bold transition flex items-center gap-1 justify-center">
                                    <i class="fas fa-trash-alt"></i>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-5 text-center text-gray-400">Belum ada user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $users->links() }}
    </div>
@endsection
