<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ref_guru')->insert([
            [
                'nik'            => '7202010101010001',
                'nama'           => 'Ahmad Syam',
                'nuptk'          => '1234567890',
                'nip'            => '196501012005011003',
                'jenis_kelamin'  => 'Laki-laki',
                'tempat_lahir'   => 'Kwandang',
                'tanggal_lahir'  => '1965-01-01',
                'sekolah'        => 'SDN 1 Kwandang',
                'email'          => 'ahmad.syam@contoh.com',
                'no_hp'          => '081234567890',
                'status'         => 'Aktif',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'nik'            => '7202010101010002',
                'nama'           => 'Rina Mulyani',
                'nuptk'          => '0987654321',
                'nip'            => null,
                'jenis_kelamin'  => 'Perempuan',
                'tempat_lahir'   => 'Anggrek',
                'tanggal_lahir'  => '1980-04-15',
                'sekolah'        => 'SMPN 2 Anggrek',
                'email'          => 'rina.mulyani@contoh.com',
                'no_hp'          => '081298765432',
                'status'         => 'Aktif',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'nik'            => '7202010101010003',
                'nama'           => 'Budi Santoso',
                'nuptk'          => null,
                'nip'            => null,
                'jenis_kelamin'  => 'Laki-laki',
                'tempat_lahir'   => 'Sumalata',
                'tanggal_lahir'  => '1990-07-20',
                'sekolah'        => 'SDN 3 Sumalata',
                'email'          => null,
                'no_hp'          => '082212345678',
                'status'         => 'Aktif',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            // Tambah data lain sesuai kebutuhan...
        ]);
    }
}
