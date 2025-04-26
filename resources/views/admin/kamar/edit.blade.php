@extends('layouts.app')

@section('title', 'Edit Data Kamar | Admin')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Data Kamar</h2>

    <form action="{{ route('admin.kamar.update', $kamar->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_kamar" class="form-label">Nama Kamar</label>
            <input type="text" name="nama_kamar" id="nama_kamar" class="form-control" value="{{ $kamar->nama_kamar }}" required>
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <select name="kelas" id="kelas" class="form-control" onchange="updateFasilitas()" required>
                <option value="">-- Pilih Kelas --</option>
                <option value="VVIP" {{ $kamar->kelas == 'VVIP' ? 'selected' : '' }}>VVIP</option>
                <option value="VIP" {{ $kamar->kelas == 'VIP' ? 'selected' : '' }}>VIP</option>
                <option value="Kelas 1" {{ $kamar->kelas == 'Kelas 1' ? 'selected' : '' }}>Kelas 1</option>
                <option value="Kelas 2" {{ $kamar->kelas == 'Kelas 2' ? 'selected' : '' }}>Kelas 2</option>
                <option value="Kelas 3" {{ $kamar->kelas == 'Kelas 3' ? 'selected' : '' }}>Kelas 3</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="fasilitas" class="form-label">Fasilitas</label>
            <input type="text" name="fasilitas" id="fasilitas" class="form-control" value="{{ $kamar->fasilitas }}" readonly required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Tersedia" {{ $kamar->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Tidak Tersedia" {{ $kamar->status == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah_bed_kosong" class="form-label">Jumlah Bed Kosong</label>
            <input type="number" name="jumlah_bed_kosong" id="jumlah_bed_kosong" class="form-control" min="0" value="{{ $kamar->jumlah_bed_kosong }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.kamar.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
    const fasilitasMap = {
        'VVIP': 'Tempat tidur premium, AC, TV, Kamar mandi dalam, Sofa keluarga, Mini bar',
        'VIP': 'Tempat tidur nyaman, AC, TV, Kamar mandi dalam, Sofa keluarga',
        'Kelas 1': 'Tempat tidur nyaman, AC, TV, Kamar mandi dalam',
        'Kelas 2': 'Tempat tidur standar, Kipas angin, Kamar mandi bersama',
        'Kelas 3': 'Tempat tidur biasa, Kipas angin, Kamar mandi umum',
    };

    function updateFasilitas() {
        const kelas = document.getElementById('kelas').value;
        const fasilitasInput = document.getElementById('fasilitas');
        fasilitasInput.value = kelas && fasilitasMap[kelas] ? fasilitasMap[kelas] : '';
    }

    // Inisialisasi saat halaman dibuka (penting agar fasilitas langsung sesuai kelas yang tersimpan)
    window.addEventListener('DOMContentLoaded', () => {
        updateFasilitas();
    });
</script>
@endsection
