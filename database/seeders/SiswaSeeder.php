<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        //NAMA SISWA KELAS X PENGEMBANGAN PERANGKAT LUNAK (A)
        Siswa::create([
            'nama' => 'ZULHAM ABIDIN',
            'rfid_id' => '1929042001',
            'kelas_id' => 1,
        ]);

        Siswa::create([
            'nama' => 'MUHAMMAD SYABAN RAHMATULLAH',
            'rfid_id' => '1929042002',
            'kelas_id' => 1,
        ]);

        Siswa::create([
            'nama' => 'MUHAMMAD MUFLIH ALGHIFARI SALAM',
            'rfid_id' => '1929042003',
            'kelas_id' => 1,
        ]);

        Siswa::create([
            'nama' => 'MUHAMMAD ANDRI APRIADI',
            'rfid_id' => '1929042004',
            'kelas_id' => 1,
        ]);

        Siswa::create([
            'nama' => 'MUHAMMAD ARFAH AWALUDDIN TADDA',
            'rfid_id' => '1929042005',
            'kelas_id' => 1,
        ]);

        Siswa::create([
            'nama' => 'MUHAMMAD RIFQI FADHIL',
            'rfid_id' => '1929042006',
            'kelas_id' => 1,
        ]);

        Siswa::create([
            'nama' => 'MUHAMMAD ALISRA',
            'rfid_id' => '1929042007',
            'kelas_id' => 1,
        ]);

        Siswa::create([
            'nama' => 'WAHYULLAH',
            'rfid_id' => '1929042008',
            'kelas_id' => 1,
        ]);

        Siswa::create([
            'nama' => 'WAYHU DJUDS',
            'rfid_id' => '1929042009',
            'kelas_id' => 1,
        ]);

        Siswa::create([
            'nama' => 'YUSRI',
            'rfid_id' => '1929042010',
            'kelas_id' => 1,
        ]);

        //NAMA SISWA KELAS X PENGEMBANGAN PERANGKAT LUNAK (B)
        Siswa::create([
            'nama' => 'ANNISA SEPTIANI KAMAL',
            'rfid_id' => '1929042011',
            'kelas_id' => 2,
        ]);

        Siswa::create([
            'nama' => 'ALIFYARAMADHANI HIDAYAH',
            'rfid_id' => '1929042012',
            'kelas_id' => 2,
        ]);

        Siswa::create([
            'nama' => 'ASTRI AYUNINGSIH',
            'rfid_id' => '1929042013',
            'kelas_id' => 2,
        ]);

        Siswa::create([
            'nama' => 'SITI MARYAM',
            'rfid_id' => '1929042014',
            'kelas_id' => 2,
        ]);

        Siswa::create([
            'nama' => 'SYAMSINAR',
            'rfid_id' => '1929042015',
            'kelas_id' => 2,
        ]);

        Siswa::create([
            'nama' => 'KAK RAFIKAH',
            'rfid_id' => '1929042016',
            'kelas_id' => 2,
        ]);
        
        Siswa::create([
            'nama' => 'SUKMA',
            'rfid_id' => '1929042017',
            'kelas_id' => 2,
        ]);
        
        Siswa::create([
            'nama' => 'UNA',
            'rfid_id' => '1929042018',
            'kelas_id' => 2,
        ]);

        Siswa::create([
            'nama' => 'KAK TITI',
            'rfid_id' => '1929042019',
            'kelas_id' => 2,
        ]);

        Siswa::create([
            'nama' => 'KAK RISKA',
            'rfid_id' => '1929042020',
            'kelas_id' => 2,
        ]);   
    }
}