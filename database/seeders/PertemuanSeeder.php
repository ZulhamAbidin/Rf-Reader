<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PertemuanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pertemuan')->insert([
            [
                'tanggal' => '2025-01-01',
                'deskripsi' => 'Pertemuan pertama',
                'pertemuanke' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
