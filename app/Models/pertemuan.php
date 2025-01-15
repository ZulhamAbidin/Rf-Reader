<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;
    protected $table = 'pertemuan';
    protected $fillable = [
        'tanggal',
        'pertemuanke',
    ];

    public function gerbangAbsensi()
    {
        return $this->belongsTo(GerbangAbsensi::class);
    }
}