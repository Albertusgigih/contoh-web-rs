<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kamar;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();
        return view('admin.kamar.index', compact('kamars'));
    }

    public function create()
    {
        return view('admin.kamar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'kelas' => 'required',
            'fasilitas' => 'required',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
            'jumlah_bed_kosong' => 'required|integer|min:0'
        ]);

        Kamar::create($request->all());

        return redirect()->route('admin.kamar.index')->with('success', 'Data kamar berhasil disimpan.');
    }


    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('admin.kamar.edit', compact('kamar'));
    }


    // Update logic
public function update(Request $request, $id)
{
    $request->validate([
        'nama_kamar' => 'required|string|max:255',
        'kelas' => 'required',
        'fasilitas' => 'required',
        'status' => 'required|in:Tersedia,Tidak Tersedia',
        'jumlah_bed_kosong' => 'required|integer|min:0'
    ]);

    $kamar = Kamar::findOrFail($id);
    $kamar->update($request->all());

    return redirect()->route('admin.kamar.index')->with('success', 'Data kamar berhasil diperbarui.');
}

    // Hapus data
    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

         return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil dihapus.');
    }
}
