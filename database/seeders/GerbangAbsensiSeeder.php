<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GerbangAbsensi;

class GerbangAbsensiSeeder extends Seeder
{
    public function run()
    {
        GerbangAbsensi::create([
            'pertemuan_id' => 1,
            'kelas_id' => 1,
            'mata_pelajaran_id' => 1,
            'waktu_mulai' => now(),
            'waktu_selesai' => now()->addHour(),
        ]);
        GerbangAbsensi::create([
            'pertemuan_id' => 1,
            'kelas_id' => 2,
            'mata_pelajaran_id' => 2,
            'waktu_mulai' => now(),
            'waktu_selesai' => now()->addHour(),
        ]);
    }
}