<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefGuruTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ref_guru', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();           // ID Unik (Wajib)
            $table->string('nama', 100);                  // Nama Guru
            $table->string('nuptk', 16)->nullable();       // Opsional
            $table->string('nip', 18)->nullable();         // Opsional
            $table->string('jenis_kelamin', 10)->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('sekolah', 100);               // Nama Sekolah/Tempat Tugas
            $table->string('email', 100)->nullable();      // Opsional
            $table->string('no_hp', 20)->nullable();       // Opsional
            $table->string('status', 30)->nullable();      // Status (Aktif/Nonaktif/Dll)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_guru');
    }
}