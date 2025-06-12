<x-guest-layout>
    <div class="w-full">
        <div class="flex flex-col items-center justify-center mb-6">
            <img src="{{ asset('images/logo-sibolang.png') }}" alt="siBolang" class="w-16 mb-2 mx-auto md:hidden">
            <h2 class="text-2xl font-bold text-orange-700 mb-1">Registrasi <span class="font-normal">siBolang</span></h2>
            <span class="block text-xs text-gray-400 mb-2">Daftar untuk mengakses fitur layanan guru berbasis AI</span>
            <span class="h-1 w-20 bg-orange-200 rounded mb-1"></span>
            <p class="text-xs text-gray-500 italic text-center">Buat akun baru dan nikmati kemudahan layanan administrasi pendidikan digital.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="bg-orange-50 rounded-xl p-6 shadow-inner w-full">
            @csrf

            <div class="mb-4">
                <label class="block text-orange-700 font-semibold mb-1">NIK (16 digit)</label>
                <input
                    type="text"
                    name="nik"
                    required
                    pattern="\d{16}"
                    minlength="16"
                    maxlength="16"
                    class="border-2 border-orange-300 rounded w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500"
                    value="{{ old('nik') }}"
                    placeholder="Masukkan 16 digit NIK"
                >
                <x-input-error :messages="$errors->get('nik')" class="mt-1" />
            </div>

            <div class="mb-4">
                <label class="block text-orange-700 font-semibold mb-1">Nama</label>
                <input type="text" name="name" required autofocus
                    class="border-2 border-orange-300 rounded w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" value="{{ old('name') }}">
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>

            <div class="mb-4">
                <label class="block text-orange-700 font-semibold mb-1">Email</label>
                <input type="email" name="email" required
                    class="border-2 border-orange-300 rounded w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" value="{{ old('email') }}">
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <div class="mb-4">
                <label class="block text-orange-700 font-semibold mb-1">Password</label>
                <input type="password" name="password" required autocomplete="new-password"
                    class="border-2 border-orange-300 rounded w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <div class="mb-4">
                <label class="block text-orange-700 font-semibold mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required autocomplete="new-password"
                    class="border-2 border-orange-300 rounded w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>

            <button type="submit" class="w-full orange-btn text-white font-bold py-2.5 rounded-xl text-lg shadow mt-2 transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-orange-200">
                Daftar
            </button>
        </form>

        <div class="mt-6 text-center text-gray-700 text-sm">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-orange-700 font-bold hover:underline">Login di sini</a>
        </div>
        <div class="mt-4 text-xs text-gray-300 text-center">
            &copy; {{ date('Y') }} Dinas Pendidikan Gorontalo Utara
        </div>
    </div>
</x-guest-layout>
