<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;
    protected $table = 'pertemuan';
    protected $fillable = [
        'gerbang_absensi_id',
        'tanggal',
        'deskripsi',
        'pertemuanke',
    ];

    public function gerbangAbsensi()
    {
        return $this->belongsTo(GerbangAbsensi::class, 'gerbang_absensi_id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
