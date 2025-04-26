<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;

class GaleriController extends Controller
{
    // Untuk halaman publik
    public function index()
    {
        $galeri = Galeri::all();
        return view('galeri.index', compact('galeri'));
    }

    // Untuk admin - daftar galeri
    public function adminIndex()
    {
        $galeri = Galeri::all();
        return view('admin.galeri.index', compact('galeri'));
    }

    // Form tambah galeri
    public function create()
    {
        return view('admin.galeri.create');
    }

    // Simpan galeri
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('gambar')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'gambar' => $path,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil ditambahkan!');
    }

    // Hapus galeri
    public function destroy($id)
    {
        $foto = Galeri::findOrFail($id);
        if ($foto->gambar) {
            \Storage::delete('public/' . $foto->gambar);
        }

        $foto->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil dihapus.');
    }
}
