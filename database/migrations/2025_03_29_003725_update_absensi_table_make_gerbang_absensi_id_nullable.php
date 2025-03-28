<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('absensi', function (Blueprint $table) {
            // Hapus constraint foreign key pada kolom gerbang_absensi_id
            $table->dropForeign(['gerbang_absensi_id']);
        });

        Schema::table('absensi', function (Blueprint $table) {
            // Ubah kolom gerbang_absensi_id menjadi nullable
            $table->unsignedBigInteger('gerbang_absensi_id')->nullable()->change();
        });

        Schema::table('absensi', function (Blueprint $table) {
            // Kembalikan constraint foreign key
            $table->foreign('gerbang_absensi_id')->references('id')->on('gerbangabsensi')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('absensi', function (Blueprint $table) {
            // Hapus constraint foreign key terlebih dahulu
            $table->dropForeign(['gerbang_absensi_id']);
        });

        Schema::table('absensi', function (Blueprint $table) {
            // Ubah kolom kembali menjadi NOT NULL
            $table->unsignedBigInteger('gerbang_absensi_id')->nullable(false)->change();
        });

        Schema::table('absensi', function (Blueprint $table) {
            // Kembalikan constraint foreign key
            $table->foreign('gerbang_absensi_id')->references('id')->on('gerbangabsensi')->onDelete('cascade');
        });
    }
};
