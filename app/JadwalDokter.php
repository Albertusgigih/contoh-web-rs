<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalDokter extends Model
{
    protected $fillable = [
        'nama_dokter', 'spesialis', 'hari', 'jam_mulai', 'jam_selesai'
    ];
}
