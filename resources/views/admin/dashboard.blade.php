@extends('layouts.app')

@section('title', 'Dashboard Admin | Rumah Sakit Umum Genah Mari')

@section('content')
<!-- Efek Hover -->
<style>
    .card-hover {
        transition: all 0.3s ease;
        border-radius: 16px;
    }

    .card-hover:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }

    .card-hover i {
        transition: transform 0.3s ease;
    }

    .card-hover:hover i {
        transform: scale(1.2);
    }
</style>

<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Selamat Datang, Admin!</h2>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <p class="text-muted">Kelola informasi rumah sakit melalui panel di bawah ini.</p>
    </div>

    <!-- Baris Pertama -->
    <div class="row g-4 justify-content-center">
        <!-- Kelola Berita -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100 card-hover">
                <div class="card-body text-center">
                    <i class="fas fa-newspaper fa-2x text-primary mb-3"></i>
                    <h5 class="card-title">Kelola Berita</h5>
                    <p class="card-text text-muted">Tambahkan atau edit berita terbaru rumah sakit.</p>
                    <a href="{{ route('berita.index') }}" class="btn btn-outline-primary w-100">Masuk</a>
                </div>
            </div>
        </div>

        <!-- Tambah Jadwal Dokter -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100 card-hover">
                <div class="card-body text-center">
                    <i class="fas fa-user-md fa-2x text-success mb-3"></i>
                    <h5 class="card-title">Tambah Jadwal Dokter</h5>
                    <p class="card-text text-muted">Input jadwal praktik dokter untuk minggu ini.</p>
                    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-outline-success w-100">Tambah</a>
                </div>
            </div>
        </div>

        <!-- Kelola Jadwal Dokter -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100 card-hover">
                <div class="card-body text-center">
                    <i class="fas fa-calendar-alt fa-2x text-warning mb-3"></i>
                    <h5 class="card-title">Kelola Jadwal Dokter</h5>
                    <p class="card-text text-muted">Edit atau hapus jadwal dokter yang tersedia.</p>
                    <a href="{{ route('admin.jadwal.index') }}" class="btn btn-outline-warning w-100">Kelola</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Baris Kedua -->
    <div class="row g-4 justify-content-center mt-4">
        <!-- Pengaduan Pasien -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100 card-hover">
                <div class="card-body text-center">
                    <i class="fas fa-comment-dots fa-2x text-danger mb-3"></i>
                    <h5 class="card-title">Pengaduan Pasien</h5>
                    <p class="card-text text-muted">Lihat daftar pengaduan yang dikirim oleh pasien.</p>
                    <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-outline-danger w-100">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Galeri Foto -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100 card-hover">
                <div class="card-body text-center">
                    <i class="fas fa-images fa-2x text-secondary mb-3"></i>
                    <h5 class="card-title">Galeri Foto</h5>
                    <p class="card-text text-muted">Kelola semua galeri yang sudah diunggah.</p>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary w-100">Lihat Galeri</a>
                </div>
            </div>
        </div>

        <!-- Ketersediaan Kamar -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100 card-hover">
                <div class="card-body text-center">
                    <i class="fas fa-bed fa-2x text-info mb-3"></i>
                    <h5 class="card-title">Ketersediaan Kamar</h5>
                    <p class="card-text text-muted">Lihat & kelola ketersediaan kamar berdasarkan kelas dan fasilitas.</p>
                    <a href="{{ route('admin.kamar.index') }}" class="btn btn-outline-info w-100">Kelola Kamar</a>
                </div>
            </div>
        </div>

        <!-- Antrian -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100 card-hover">
                <div class="card-body text-center">
                    <i class="fas fa-list fa-2x text-dark mb-3"></i>
                    <h5 class="card-title">Kelola Antrian</h5>
                    <p class="card-text text-muted">Lihat dan kelola antrian pasien yang terdaftar.</p>
                    <a href="{{ route('admin.antrian.index') }}" class="btn btn-outline-dark w-100">Lihat Antrian</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
