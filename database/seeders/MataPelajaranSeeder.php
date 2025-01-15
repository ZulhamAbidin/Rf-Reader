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
            'nama_mata_pelajaran' => 'Dasar Dasar Website',
        ]);
        
        MataPelajaran::create([
            'nama_mata_pelajaran' => 'Dasar Dasar Algoritma',
        ]);
        
        MataPelajaran::create([
            'nama_mata_pelajaran' => 'Internet Of Things',
        ]);
        
        MataPelajaran::create([
            'nama_mata_pelajaran' => 'Ilmu Pengetahuan Alam dan Sosial',
        ]);
        
        MataPelajaran::create([
            'nama_mata_pelajaran' => 'Pendidikan Agama Islam',
        ]);
        
        MataPelajaran::create([
            'nama_mata_pelajaran' => 'Jaringan Komputer',
        ]);
        
        MataPelajaran::create([
            'nama_mata_pelajaran' => 'Perangkat Keras Komputer',
        ]);
        
        MataPelajaran::create([
            'nama_mata_pelajaran' => 'Matematika',
        ]);
        
        MataPelajaran::create([
            'nama_mata_pelajaran' => 'Seni dan Budaya',
        ]);
        
        MataPelajaran::create([
            'nama_mata_pelajaran' => 'Back End Web Developer',
        ]);
        
        MataPelajaran::create([
            'nama_mata_pelajaran' => 'Frond End Web Developer',
        ]);
        
    }
}