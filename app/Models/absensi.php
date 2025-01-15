<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $fillable = ['siswa_id', 'gerbang_absensi_id', 'status_kehadiran', 'waktu_kehadiran'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
    
    public function gerbangAbsensi()
    {
        return $this->belongsTo(GerbangAbsensi::class, 'gerbang_absensi_id');
    }

    protected static function booted()
    {
        static::creating(function ($absen) {
            $absen->waktu_kehadiran = Carbon::now();
        });
    }
}