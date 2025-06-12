<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $operatorRole = Role::firstOrCreate(['name' => 'operator']);
        $guruRole = Role::firstOrCreate(['name' => 'guru']);

        // Buat user admin contoh
        $admin = User::firstOrCreate(
            ['email' => 'admin@panel.local'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('password'), // ganti password!
            ]
        );
        $admin->assignRole($adminRole);

        // Buat user operator contoh
        $operator = User::firstOrCreate(
            ['email' => 'operator@panel.local'],
            [
                'name' => 'Operator Satu',
                'password' => bcrypt('password'),
            ]
        );
        $operator->assignRole($operatorRole);

        // Buat user guru contoh
        $guru = User::firstOrCreate(
            ['email' => 'guru@panel.local'],
            [
                'name' => 'Guru Contoh',
                'password' => bcrypt('password'),
            ]
        );
        $guru->assignRole($guruRole);

        // Tambahkan ini untuk mengisi data referensi guru
        $this->call(RefGuruSeeder::class);
    }
}
