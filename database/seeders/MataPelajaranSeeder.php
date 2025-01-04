<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataPelajaran;

class MataPelajaranSeeder extends Seeder
{
    public function run()
    {
        MataPelajaran::create([
            'nama_mata_pelajaran' => 'Informatika Umum',
        ]);
        MataPelajaran::create([
            'nama_mata_pelajaran' => 'Bahasa Indonesia',
        ]);
        MataPelajaran::create([
            'nama_mata_pelajaran' => 'IPA',
        ]);
        MataPelajaran::create([
            'nama_mata_pelajaran' => 'Sejarah',
        ]);
    }
}
