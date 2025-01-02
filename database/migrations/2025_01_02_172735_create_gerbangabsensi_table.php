<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gerbangabsensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->foreignId('mata_pelajaran_id')->constrained('matapelajaran');
            $table->timestamp('waktu_mulai');
            $table->timestamp('waktu_selesai');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gerbangabsensi');
    }
};
