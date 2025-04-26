<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    // Jika kamu pakai Laravel 7, namespace-nya seperti ini
    protected $table = 'antrians';

    protected $fillable = [
        'user_id',
        'nomor_antrian',
        'status',
    ];

    // Relasi ke user (optional tapi bagus kalau dipakai)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
