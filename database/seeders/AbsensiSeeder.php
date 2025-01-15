<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absensi;

class AbsensiSeeder extends Seeder
{
    public function run()
    {
        // HASIL ABSENSI KELAS X PENGEMBANGAN PERANGKAT LUNAK (A)
        Absensi::create([
            'siswa_id' => 1,
            'gerbang_absensi_id' => 1,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 2,
            'gerbang_absensi_id' => 1,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 3,
            'gerbang_absensi_id' => 1,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 4,
            'gerbang_absensi_id' => 1,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 5,
            'gerbang_absensi_id' => 1,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 6,
            'gerbang_absensi_id' => 1,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 7,
            'gerbang_absensi_id' => 1,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 8,
            'gerbang_absensi_id' => 1,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 9,
            'gerbang_absensi_id' => 1,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 10,
            'gerbang_absensi_id' => 1,
            'status_kehadiran' => 'alfa',
            'waktu_kehadiran' => now(),
        ]);

        // HASIL ABSENSI KELAS X PENGEMBANGAN PERANGKAT LUNAK (B)
        Absensi::create([
            'siswa_id' => 11,
            'gerbang_absensi_id' => 2,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 12,
            'gerbang_absensi_id' => 2,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 13,
            'gerbang_absensi_id' => 2,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 14,
            'gerbang_absensi_id' => 2,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 15,
            'gerbang_absensi_id' => 2,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 16,
            'gerbang_absensi_id' => 2,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 17,
            'gerbang_absensi_id' => 2,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 18,
            'gerbang_absensi_id' => 2,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 19,
            'gerbang_absensi_id' => 2,
            'status_kehadiran' => 'hadir',
            'waktu_kehadiran' => now(),
        ]);
        Absensi::create([
            'siswa_id' => 20,
            'gerbang_absensi_id' => 2,
            'status_kehadiran' => 'alfa',
            'waktu_kehadiran' => now(),
        ]);
        
    }
}