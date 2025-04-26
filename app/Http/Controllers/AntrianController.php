<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Antrian;
use Illuminate\Support\Facades\Auth;

class AntrianController extends Controller
{
    public function index()
    {
        $antrians = \App\Antrian::with('user')->orderBy('created_at')->get();
    return view('antrian.index', compact('antrians'));
    }

    public function create()
    {
        return view('antrian.create');
    }

    public function store(Request $request)
    {
        $nomor = 'A-' . str_pad(Antrian::max('id') + 1, 3, '0', STR_PAD_LEFT);

        Antrian::create([
            'user_id' => Auth::id(),
            'nomor_antrian' => $nomor,
            'status' => 'menunggu', // sesuai kolom yang sudah ada di database
        ]);

        return redirect()->route('antrian.index')->with('success', 'Berhasil mendaftar antrian!');
    }

// Admin melihat semua antrian
public function adminIndex()
{
    $antrians = \App\Antrian::with('user')->latest()->get();
    return view('admin.antrian.index', compact('antrians'));
}

// Admin ubah status antrian
public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:menunggu,dipanggil,selesai',
    ]);

    $antrian = \App\Antrian::findOrFail($id);
    $antrian->status = $request->status;
    $antrian->save();

    return redirect()->back()->with('success', 'Status antrian berhasil diperbarui.');
}

}
