<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class gerbangabsensi extends Model
{
    use HasFactory;
    protected $table = 'gerbangabsensi';
    protected $fillable = ['kelas_id', 'mata_pelajaran_id', 'waktu_mulai', 'waktu_selesai'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    
    public function matapelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
