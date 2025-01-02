<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        Siswa::create([
            'nama' => 'John Doe',
            'rfid_id' => 'RFID001',
            'kelas_id' => 1, // Kelas 1A
        ]);

        Siswa::create([
            'nama' => 'Jane Smith',
            'rfid_id' => 'RFID002',
            'kelas_id' => 1, // Kelas 1B
        ]);

        Siswa::create([
            'nama' => 'Michael Johnson',
            'rfid_id' => 'RFID003',
            'kelas_id' => 1, // Kelas 2A
        ]);

        Siswa::create([
            'nama' => 'Emily Davis',
            'rfid_id' => 'RFID004',
            'kelas_id' => 1, // Kelas 2B
        ]);

        Siswa::create([
            'nama' => 'David Brown',
            'rfid_id' => 'RFID005',
            'kelas_id' => 1, // Kelas 3A
        ]);

        Siswa::create([
            'nama' => 'Sophia Martinez',
            'rfid_id' => 'RFID006',
            'kelas_id' => 1, // Kelas 3B
        ]);

        Siswa::create([
            'nama' => 'James Wilson',
            'rfid_id' => 'RFID007',
            'kelas_id' => 1, // Kelas 4A
        ]);

        Siswa::create([
            'nama' => 'Isabella Moore',
            'rfid_id' => 'RFID008',
            'kelas_id' => 1, // Kelas 4B
        ]);

        Siswa::create([
            'nama' => 'Liam Taylor',
            'rfid_id' => 'RFID009',
            'kelas_id' => 1, // Kelas 5A
        ]);

        Siswa::create([
            'nama' => 'Ava Anderson',
            'rfid_id' => 'RFID010',
            'kelas_id' => 1, // Kelas 5B
        ]);

        Siswa::create([
            'nama' => 'Benjamin Thomas',
            'rfid_id' => 'RFID011',
            'kelas_id' => 2, // Kelas 6A
        ]);

        Siswa::create([
            'nama' => 'Charlotte Jackson',
            'rfid_id' => 'RFID012',
            'kelas_id' => 2, // Kelas 6B
        ]);

        Siswa::create([
            'nama' => 'Ethan Harris',
            'rfid_id' => 'RFID013',
            'kelas_id' => 2, // Kelas 7A
        ]);

        Siswa::create([
            'nama' => 'Mia Clark',
            'rfid_id' => 'RFID014',
            'kelas_id' => 2, // Kelas 7B
        ]);

        Siswa::create([
            'nama' => 'Oliver Lewis',
            'rfid_id' => 'RFID015',
            'kelas_id' => 2, // Kelas 8A
        ]);

        Siswa::create([
            'nama' => 'Amelia Walker',
            'rfid_id' => 'RFID016',
            'kelas_id' => 2, // Kelas 8B
        ]);
        
        Siswa::create([
            'nama' => 'Mason Young',
            'rfid_id' => 'RFID017',
            'kelas_id' => 2, // Kelas 9A
        ]);
        
        Siswa::create([
            'nama' => 'Harper King',
            'rfid_id' => 'RFID018',
            'kelas_id' => 2, // Kelas 9B
        ]);

        Siswa::create([
            'nama' => 'Alexander Scott',
            'rfid_id' => 'RFID019',
            'kelas_id' => 2, // Kelas 10A
        ]);

        Siswa::create([
            'nama' => 'Chloe Green',
            'rfid_id' => 'RFID020',
            'kelas_id' => 2, // Kelas 10B
        ]);
        
    }
}
