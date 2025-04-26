<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $fillable = [
        'nama_kamar',
        'kelas',
        'fasilitas',
        'status',
        'jumlah_bed_kosong'
    ];
}
