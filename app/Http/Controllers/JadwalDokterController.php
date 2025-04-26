<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalDokter;
use Carbon\Carbon;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $jadwals = [];

        for ($i = 0; $i < 7; $i++) {
            $tanggal = Carbon::now()->addDays($i); // Tambah hari ke depan
            $hari = $tanggal->locale('id')->translatedFormat('l'); // Senin, Selasa, dst.

            $jadwalHariIni = JadwalDokter::where('hari', $hari)->get();

            $jadwals[] = [
                'tanggal' => $tanggal->translatedFormat('l, d F Y'), // Tampilkan "Senin, 14 April 2025"
                'data' => $jadwalHariIni
            ];
        }

        return view('jadwal.index', compact('jadwals'));
    }
}


