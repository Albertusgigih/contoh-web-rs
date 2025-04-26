<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BeritaController;



use App\Http\Controllers\Admin\JadwalDokterController as AdminJadwalDokterController;


use App\Http\Controllers\HomeController;

use App\Http\Controllers\JadwalDokterController;

use App\Http\Controllers\PengaduanController;

use App\Http\Controllers\Admin\Controller;

use App\Http\Controllers\GaleriController;


use App\Http\Controllers\Admin\KamarController;

use App\Http\Controllers\KetersediaanKamarController;

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\Admin\AntrianController as AdminAntrianController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//BERITA
Route::get('/berita', 'BeritaController@index');
Route::get('/berita/{id}', 'BeritaController@show');

//JIKA ADMIN
//Route::middleware(['auth', 'admin'])->group(function () {
    //Route::resource('admin/berita', 'BeritaController');
//});


//JADWAL DOKTER
Route::get('/jadwal-dokter', 'JadwalDokterController@index');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin/jadwal-dokter', 'JadwalDokterController');
});


//ROLE
// Halaman Dashboard Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'admin'])->name('admin.dashboard');

// Halaman Dashboard User
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth'])->name('user.dashboard');


//ROUTE BERITA ADMIN
// ROUTE BERITA ADMIN
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('berita', 'Admin\BeritaController')->parameters([
        'berita' => 'berita'
    ]);
});


//Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    //Route::resource('berita', \App\Http\Controllers\Admin\BeritaController::class);
//});


//ROUTE JADWAL DOKTER (ADMIN)

// ROUTE JADWAL DOKTER UNTUK PUBLIK / USER
Route::get('/jadwal-dokter', [JadwalDokterController::class, 'index'])->name('jadwal.index');

// ROUTE JADWAL DOKTER UNTUK ADMIN
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Tampilkan daftar semua jadwal
    Route::get('jadwal-dokter', [AdminJadwalDokterController::class, 'index'])->name('jadwal.index');

    // Form tambah jadwal dokter
    Route::get('jadwal-dokter/create', [AdminJadwalDokterController::class, 'create'])->name('jadwal.create');

    // Simpan jadwal dokter baru
    Route::post('jadwal-dokter', [AdminJadwalDokterController::class, 'store'])->name('jadwal.store');

    // Form edit jadwal
    Route::get('jadwal-dokter/{jadwal_dokter}/edit', [AdminJadwalDokterController::class, 'edit'])->name('jadwal.edit');

    // Proses update jadwal
    Route::put('jadwal-dokter/{jadwal_dokter}', [AdminJadwalDokterController::class, 'update'])->name('jadwal.update');

    // Hapus jadwal dokter
    Route::delete('jadwal-dokter/{jadwal_dokter}', [AdminJadwalDokterController::class, 'destroy'])->name('jadwal.destroy');
});


Route::get('/jadwal-dokter', [AdminJadwalDokterController::class, 'index'])->name('public.jadwal.index');


Route::get('/jadwal-dokter', [JadwalDokterController::class, 'index'])->name('jadwal.index');


Route::get('/fasilitas', function () {
    return view('fasilitas');
})->name('fasilitas');



Route::get('/pengaduan', [PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/pengaduan', [App\Http\Controllers\Admin\PengaduanController::class, 'index'])->name('admin.pengaduan.index');
});



// Rute untuk publik (lihat galeri)
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

// Rute untuk admin (kelola galeri)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/galeri', [GaleriController::class, 'adminIndex'])->name('admin.galeri.index');
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('admin.galeri.create');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');
});


//Admin KAMAR
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
    Route::get('/kamar/create', [KamarController::class, 'create'])->name('kamar.create');
    Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');

    //  Tambahan untuk edit & update
Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
Route::put('/kamar/{id}', [KamarController::class, 'update'])->name('kamar.update');

//  Tambahan untuk hapus
Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy');
});



//Publik KAMAR
Route::get('/ketersediaan-kamar', [KetersediaanKamarController::class, 'index'])->name('ketersediaan.kamar');


//publik ANTRIAN
Route::middleware(['auth'])->group(function () {
    Route::get('/antrian', [AntrianController::class, 'index'])->name('antrian.index');
    Route::get('/antrian/create', [AntrianController::class, 'create'])->name('antrian.create');
    Route::post('/antrian', [AntrianController::class, 'store'])->name('antrian.store');
});

// Admin
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminAntrianController::class, 'dashboard'])->name('dashboard');
    Route::get('/antrian', [AdminAntrianController::class, 'index'])->name('antrian.index');
    Route::get('/antrian/{id}/edit', [AdminAntrianController::class, 'edit'])->name('antrian.edit');
    Route::put('/antrian/{id}', [AdminAntrianController::class, 'update'])->name('antrian.update');
});
