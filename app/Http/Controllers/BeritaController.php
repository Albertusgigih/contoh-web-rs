<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(5); // tampilkan 5 per halaman
        return view('berita.index', compact('beritas'));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }
}
