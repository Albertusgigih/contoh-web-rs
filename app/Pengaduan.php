<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    //use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'isi_pengaduan',
    ];
}
