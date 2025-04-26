<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Antrian;

class AntrianController extends Controller
{
    // Tampilkan semua data antrian untuk admin
    public function index()
    {
        $antrians = Antrian::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.antrian.index', compact('antrians'));
    }

    // Tampilkan form edit status antrian
    public function edit($id)
    {
        $antrian = Antrian::findOrFail($id);
        return view('admin.antrian.edit', compact('antrian'));
    }

    // Simpan perubahan status antrian
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,dipanggil,selesai',
        ]);

        $antrian = Antrian::findOrFail($id);
        $antrian->status = $request->status;
        $antrian->save();

        return redirect()->route('admin.antrian.index')->with('success', 'Status antrian berhasil diperbarui.');
    }

    // Method baru untuk menampilkan dashboard
    public function dashboard()
    {
        return view('admin.dashboard'); // Atau sesuaikan dengan tampilan dashboard yang diinginkan
    }
}

