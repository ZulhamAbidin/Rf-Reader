<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absensi;

class AbsensiSeeder extends Seeder
{
    public function run()
    {
        Absensi::create([
            'siswa_id' => 1, // John Doe
            'gerbang_absensi_id' => 1, // Gerbang Absensi 1
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 2, // Jane Smith
            'gerbang_absensi_id' => 2, // Gerbang Absensi 2
            'status_kehadiran' => 'alfa',
            'waktu_kehadiran' => now(),
        ]);
    }
}
