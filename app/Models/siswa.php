<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['nama', 'rfid_id', 'kelas_id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function gerbangAbsensi()
{
    return $this->hasMany(GerbangAbsensi::class);
}


    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
