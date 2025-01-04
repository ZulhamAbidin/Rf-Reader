<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run()
    {
        Kelas::create([
            'nama_kelas' => 'X Pengembangan Perangkat Lunak dan GIM (A)',
        ]);
        Kelas::create([
            'nama_kelas' => 'X Pengembangan Perangkat Lunak dan GIM (B)',
        ]);
    }
}
