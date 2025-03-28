<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matapelajaran extends Model
{
    use HasFactory;
    protected $table = 'matapelajaran';
    protected $fillable = ['nama_mata_pelajaran'];

    // public function gerbangAbsensi()
    // {
    //     return $this->hasMany(GerbangAbsensi::class);
    // }

    // public function gerbangAbsensi()
    // {
    //     return $this->hasMany(GerbangAbsensi::class, 'mata_pelajaran_id');
    // }

    public function gerbangAbsensi()
    {
        return $this->belongsTo(GerbangAbsensi::class);
    }
}