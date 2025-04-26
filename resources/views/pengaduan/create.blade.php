@extends('layouts.app')

@section('title', 'Form Pengaduan Pasien')

@section('content')
<div class="container">
    <h3>Kirim Pengaduan</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('pengaduan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email (opsional)</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Isi Pengaduan</label>
            <textarea name="isi_pengaduan" rows="5" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
    <div class="text-center mt-5">
        <a href="{{ url('/') }}" class="btn btn-secondary">← Kembali ke Beranda</a>
    </div>
</div>
@endsection
