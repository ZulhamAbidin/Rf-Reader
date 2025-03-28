<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        //NAMA SISWA KELAS X PENGEMBANGAN PERANGKAT LUNAK (A)
        Siswa::Create([
            'Nama' => 'Zulham Abidin',
            'Rfid_Id' => '1929042001',
            'Kelas_Id' => 1,
        ]);

        Siswa::Create([
            'Nama' => 'Muhammad Syaban Rahmatullah',
            'Rfid_Id' => '1929042002',
            'Kelas_Id' => 1,
        ]);

        Siswa::Create([
            'Nama' => 'Muhammad Muflih Alghifari Salam',
            'Rfid_Id' => '1929042003',
            'Kelas_Id' => 1,
        ]);

        Siswa::Create([
            'Nama' => 'Muhammad Andri Apriadi',
            'Rfid_Id' => '1929042004',
            'Kelas_Id' => 1,
        ]);

        Siswa::Create([
            'Nama' => 'Muhammad Arfah Awaluddin Tadda',
            'Rfid_Id' => '1929042005',
            'Kelas_Id' => 1,
        ]);

        Siswa::Create([
            'Nama' => 'Muhammad Rifqi Fadhil',
            'Rfid_Id' => '1929042006',
            'Kelas_Id' => 1,
        ]);

        Siswa::Create([
            'Nama' => 'Muhammad Alisra',
            'Rfid_Id' => '1929042007',
            'Kelas_Id' => 1,
        ]);

        Siswa::Create([
            'Nama' => 'Wahyullah',
            'Rfid_Id' => '1929042008',
            'Kelas_Id' => 1,
        ]);

        Siswa::Create([
            'Nama' => 'Wayhu Djuds',
            'Rfid_Id' => '1929042009',
            'Kelas_Id' => 1,
        ]);

        Siswa::Create([
            'Nama' => 'Yusri',
            'Rfid_Id' => '1929042010',
            'Kelas_Id' => 1,
        ]);

        //Nama Siswa Kelas X Pengembangan Perangkat Lunak (B)
        Siswa::Create([
            'Nama' => 'Annisa Septiani Kamal',
            'Rfid_Id' => '1929042011',
            'Kelas_Id' => 2,
        ]);

        Siswa::Create([
            'Nama' => 'Alifyaramadhani Hidayah',
            'Rfid_Id' => '1929042012',
            'Kelas_Id' => 2,
        ]);

        Siswa::Create([
            'Nama' => 'Astri Ayuningsih',
            'Rfid_Id' => '1929042013',
            'Kelas_Id' => 2,
        ]);

        Siswa::Create([
            'Nama' => 'Siti Maryam',
            'Rfid_Id' => '1929042014',
            'Kelas_Id' => 2,
        ]);

        Siswa::Create([
            'Nama' => 'Syamsinar',
            'Rfid_Id' => '1929042015',
            'Kelas_Id' => 2,
        ]);

        Siswa::Create([
            'Nama' => 'Kak Rafikah',
            'Rfid_Id' => '1929042016',
            'Kelas_Id' => 2,
        ]);
        
        Siswa::Create([
            'Nama' => 'Sukma',
            'Rfid_Id' => '1929042017',
            'Kelas_Id' => 2,
        ]);
        
        Siswa::Create([
            'Nama' => 'Una',
            'Rfid_Id' => '1929042018',
            'Kelas_Id' => 2,
        ]);

        Siswa::Create([
            'Nama' => 'Kak Titi',
            'Rfid_Id' => '1929042019',
            'Kelas_Id' => 2,
        ]);

        Siswa::Create([
            'Nama' => 'Kak Riska',
            'Rfid_Id' => '1929042020',
            'Kelas_Id' => 2,
        ]);   
    }
}