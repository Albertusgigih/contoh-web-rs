<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JadwalDokter;
use Carbon\Carbon;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $jadwals = [];

        for ($i = 0; $i < 7; $i++) {
            $tanggal = Carbon::now()->addDays($i);
            $hari = $tanggal->locale('id')->translatedFormat('l');

            $jadwalHariIni = JadwalDokter::where('hari', $hari)->get();

            $jadwals[] = [
                'tanggal' => $tanggal->translatedFormat('l, d F Y'),
                'data' => $jadwalHariIni
            ];
        }

        return view('admin.jadwal_dokter.index', compact('jadwals'));
    }

    public function create()
    {
        return view('admin.jadwal_dokter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter'   => 'required|string|max:255',
            'spesialis'     => 'required|string|max:255',
            'hari'          => 'required|string',
            'jam_mulai'     => 'required',
            'jam_selesai'   => 'required',
        ]);

        JadwalDokter::create($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(JadwalDokter $jadwal_dokter)
    {
        return view('admin.jadwal_dokter.edit', compact('jadwal_dokter'));
    }

    public function update(Request $request, JadwalDokter $jadwal_dokter)
    {
        $request->validate([
            'nama_dokter'   => 'required|string|max:255',
            'spesialis'     => 'required|string|max:255',
            'hari'          => 'required|string',
            'jam_mulai'     => 'required',
            'jam_selesai'   => 'required',
        ]);

        $jadwal_dokter->update($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(JadwalDokter $jadwal_dokter)
    {
        $jadwal_dokter->delete();
        return back()->with('success', 'Jadwal berhasil dihapus.');
    }
}
