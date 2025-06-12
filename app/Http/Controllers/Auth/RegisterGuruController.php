<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterGuruController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik'      => ['required', 'digits:16', 'unique:users,nik'],
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Cek NIK di tabel referensi guru
        $guru = DB::table('ref_guru')->where('nik', $request->nik)->first();
        if (!$guru) {
            return back()->withErrors(['nik' => 'NIK tidak terdaftar sebagai guru di Gorontalo Utara!'])->withInput();
        }

        // Buat user baru
        $user = User::create([
            'nik'     => $request->nik,
            'name'    => $request->name,
            'email'   => $request->email,
            'password'=> Hash::make($request->password),
        ]);

        // Assign role 'guru' jika pakai spatie/laravel-permission
        if (method_exists($user, 'assignRole')) {
            $user->assignRole('guru');
        }

        // Login otomatis
        auth()->login($user);

        // Redirect ke halaman dashboard
        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil! Selamat datang.');
    }
}
