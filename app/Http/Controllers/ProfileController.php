<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    // Tampilkan form profil
    public function edit()
    {
        $user = Auth::user();

        // Join dengan ref_guru (berdasarkan nik)
        $guru = DB::table('users')
            ->leftJoin('ref_guru', 'users.nik', '=', 'ref_guru.nik')
            ->select(
                'users.*',
                'ref_guru.nama as nama_guru',
                'ref_guru.sekolah',
                'ref_guru.nuptk',
                'ref_guru.nip',
                'ref_guru.jenis_kelamin',
                'ref_guru.tempat_lahir',
                'ref_guru.tanggal_lahir',
                'ref_guru.status as status_guru'
            )
            ->where('users.id', $user->id)
            ->first();

        // Fallback jika tidak ada di ref_guru
        if (!$guru) {
            $guru = $user;
        }

        return view('profile.edit', compact('guru'));
    }

    // Proses update profil
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'name'  => 'required|string|max:100',
        ]);

        // Update tabel users
        $user->update([
            'email' => $request->email,
            'name'  => $request->name,
        ]);

        // Jika ingin update ke ref_guru juga (opsional, uncomment jika perlu)
        /*
        DB::table('ref_guru')
            ->where('nik', $user->nik)
            ->update(['nama' => $request->name]);
        */

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}
