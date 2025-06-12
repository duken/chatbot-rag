<x-guest-layout>
    <div class="w-full">
        <div class="flex flex-col items-center justify-center mb-6">
            <img src="{{ asset('images/logo-sibolang.png') }}" alt="siBolang" class="w-16 mb-2 mx-auto md:hidden">
            <h2 class="text-2xl font-bold text-orange-700 mb-1">Login <span class="font-normal">siBolang</span></h2>
            <span class="block text-xs text-gray-400 mb-2">Sistem Bot Layanan Guru</span>
            <span class="h-1 w-20 bg-orange-200 rounded mb-1"></span>
            <p class="text-xs text-gray-500 italic text-center">Masuk untuk mendapatkan layanan khusus, info tunjangan, pelatihan, dan solusi cepat!</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="bg-orange-50 rounded-xl p-6 shadow-inner w-full">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-orange-700 font-semibold mb-1">Email</label>
                <input id="email" type="email" name="email" required autofocus autocomplete="username"
                    class="border-2 border-orange-300 rounded w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <div class="mb-4">
                <label for="password" class="block text-orange-700 font-semibold mb-1">Password</label>
                <div class="relative">
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="border-2 border-orange-300 rounded w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 pr-12">
                    <button type="button" onclick="togglePassword()" tabindex="-1"
                        class="absolute top-1/2 right-3 -translate-y-1/2 text-orange-500 focus:outline-none"
                        aria-label="Lihat/Sembunyikan Password">
                        <i id="eyeIcon" class="fas fa-eye"></i>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="border-orange-300 text-orange-600 focus:ring-orange-500 rounded">
                    <label for="remember_me" class="ml-2 text-gray-700 text-sm">Ingat saya</label>
                </div>
                @if (Route::has('password.request'))
                    <a class="text-sm text-orange-600 hover:underline" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
            </div>

            <button type="submit" class="w-full orange-btn text-white font-bold py-2.5 rounded-xl text-lg shadow mt-2 transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-orange-200">
                Masuk
            </button>
        </form>

        <div class="mt-6 text-center text-gray-700 text-sm">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-orange-700 font-bold hover:underline">Daftar di sini</a>
        </div>
        <div class="mt-4 text-xs text-gray-300 text-center">
            &copy; {{ date('Y') }} Dinas Pendidikan Gorontalo Utara
        </div>
    </div>
    <script>
    function togglePassword() {
        const pwd = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');
        if (pwd.type === 'password') {
            pwd.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            pwd.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
    </script>

</x-guest-layout>
