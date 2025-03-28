<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GerbangAbsensi extends Model
{
    use HasFactory;
    protected $table = 'gerbangabsensi';
    protected $fillable = ['kelas_id', 'mata_pelajaran_id', 'pertemuan_id', 'waktu_mulai', 'waktu_selesai'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    
    public function matapelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class, 'pertemuan_id');
    }
    
    public function absensi()
    {
    return $this->hasMany(Absensi::class, 'gerbang_absensi_id');
    }    
    
}