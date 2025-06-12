<x-guest-layout>
    <div class="flex flex-col items-center justify-center">
        <img src="{{ asset('logo-sibolang.png') }}" alt="siBolang" class="w-16 mb-2 mx-auto md:hidden">
        <h2 class="text-2xl font-bold text-orange-700 mb-2">Lupa Password</h2>
        <div class="mb-4 text-sm text-gray-700 text-center max-w-xs">
            Masukkan email Anda dan kami akan mengirimkan link untuk reset password ke email Anda.
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="w-full">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-orange-700 font-semibold mb-1">Email</label>
                <input id="email" class="border-2 border-orange-300 rounded w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500"
                    type="email" name="email" value="{{ old('email') }}" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a href="{{ route('login') }}"
                   class="text-orange-600 font-semibold hover:underline bg-orange-50 px-4 py-2 rounded border border-orange-200 shadow-sm">
                   Kembali ke Login
                </a>
                <button type="submit"
                        class="orange-btn text-white font-bold py-2 px-6 rounded shadow">
                    Kirim Link Reset
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
