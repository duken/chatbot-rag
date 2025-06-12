<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'siBolang') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
      .sidebar-collapsed { width: 68px !important; min-width: 68px !important; }
      .sidebar-collapsed .sidebar-text { display: none !important; }
      .sidebar-collapsed .sidebar-logo-text { display: none !important; }
      .sidebar-collapsed .sidebar-icon { margin-right: 0 !important; }
      .sidebar-transition { transition: width 0.2s cubic-bezier(.4,0,.2,1); }
    </style>
</head>
<body class="bg-orange-50 min-h-screen">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside id="sidebar" class="w-64 bg-orange-600 px-4 py-6 flex flex-col sidebar-transition relative z-20">
            {{-- Toggle/collapse button --}}
            <button onclick="toggleSidebar()"
                    class="absolute top-3 -right-4 bg-orange-600 rounded-full shadow-lg w-9 h-9 flex items-center justify-center border-4 border-white hover:bg-orange-700 transition md:inline-block z-30"
                    aria-label="Toggle sidebar">
                <i class="fas fa-bars text-white text-xl"></i>
            </button>
            <div class="text-2xl font-bold text-white mb-10 flex items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-9 h-9 bg-white rounded-full p-1 shadow sidebar-icon" />
                <span class="sidebar-logo-text">siBolang</span>
            </div>
            <nav class="space-y-2 flex-1 mt-10">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded @if(request()->routeIs('dashboard')) bg-orange-700 text-white font-semibold @else text-orange-100 hover:bg-orange-500 @endif">
                    <i class="fas fa-home w-6"></i>
                    <span class="sidebar-text">Dashboard</span>
                </a>
                @role('admin')
                <a href="{{ route('users.index') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded @if(request()->routeIs('users.*')) bg-orange-700 text-white font-semibold @else text-orange-100 hover:bg-orange-500 @endif">
                    <i class="fas fa-users-cog w-6"></i>
                    <span class="sidebar-text">Manajemen User</span>
                </a>
                @endrole
                @hasanyrole('admin|operator')
                <a href="{{ route('documents.index') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded @if(request()->routeIs('documents.*')) bg-orange-700 text-white font-semibold @else text-orange-100 hover:bg-orange-500 @endif">
                    <i class="fas fa-folder-open w-6"></i>
                    <span class="sidebar-text">Koleksi Dokumen</span>
                </a>
                @endhasanyrole
                <a href="{{ route('chat.index') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded @if(request()->routeIs('chat.*')) bg-orange-700 text-white font-semibold @else text-orange-100 hover:bg-orange-500 @endif">
                    <i class="fas fa-robot w-6"></i>
                    <span class="sidebar-text">Chatbot</span>
                </a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="flex items-center gap-3 px-4 py-2 rounded hover:bg-orange-800 text-red-100 mt-4">
                    <i class="fas fa-sign-out-alt w-6"></i>
                    <span class="sidebar-text">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                    @csrf
                </form>
            </nav>
        </aside>
        {{-- Main Content --}}
        <main class="flex-1 p-8 bg-orange-50 min-h-screen">
            <header class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-orange-700">@yield('title', 'Dashboard')</h1>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('profile.edit') }}"
                        class="bg-orange-100 px-4 py-1 rounded text-orange-700 text-sm font-semibold shadow hover:bg-orange-200 hover:underline transition"
                        title="Lihat/Edit Profil">
                            🤖 {{ Auth::user()->name }}
                    </a>
                </div>
            </header>
            {{-- Content --}}
            @yield('content')
        </main>
    </div>
    <script>
      function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('sidebar-collapsed');
      }
    </script>
</body>
</html>
