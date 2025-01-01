<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class siswa extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'rfid_id'];

     /**
     * Relasi ke Absensi (Seorang siswa dapat memiliki banyak absensi)
     */
    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
