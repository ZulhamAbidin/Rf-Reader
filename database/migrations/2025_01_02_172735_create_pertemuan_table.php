<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pertemuan', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('gerbang_absensi_id')->constrained('gerbangabsensi')->onDelete('cascade');
            $table->date('tanggal');
            $table->text('deskripsi')->nullable();
            $table->text('pertemuanke');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pertemuan');
    }
};
