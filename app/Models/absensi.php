<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class absensi extends Model
{
    use HasFactory;
    protected $fillable = ['siswa_id'];

    /**
     * Relasi ke Siswa (Setiap absensi milik satu siswa)
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    protected static function booted()
    {
        static::creating(function ($absen) {
            $absen->waktu_kehadiran = Carbon::now();
        });
    }
}