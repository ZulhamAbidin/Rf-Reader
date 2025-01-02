<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            MataPelajaranSeeder::class,
            KelasSeeder::class,
            SiswaSeeder::class,
            PertemuanSeeder::class,
            GerbangAbsensiSeeder::class,
            AbsensiSeeder::class,
            UserSeeder::class,
        ]);
    }
}
