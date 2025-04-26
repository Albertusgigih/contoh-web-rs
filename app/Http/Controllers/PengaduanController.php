<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pengaduan;


class PengaduanController extends Controller
{
    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email',
            'isi_pengaduan' => 'required|string',
        ]);

        Pengaduan::create($request->all());

        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim.');
    }
}
