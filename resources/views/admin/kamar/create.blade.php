@extends('layouts.app')

@section('title', 'Input Ketersediaan Kamar | Admin')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Tambah Data Kamar</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.kamar.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_kamar" class="form-label">Nama Kamar</label>
            <input type="text" name="nama_kamar" id="nama_kamar" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <select name="kelas" id="kelas" class="form-control" onchange="updateFasilitas()" required>
                <option value="">-- Pilih Kelas --</option>
                <option value="VVIP">VVIP</option>
                <option value="VIP">VIP</option>
                <option value="Kelas 1">Kelas 1</option>
                <option value="Kelas 2">Kelas 2</option>
                <option value="Kelas 3">Kelas 3</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="fasilitas" class="form-label">Fasilitas</label>
            <select name="fasilitas" id="fasilitas" class="form-control" required>
                <option value="">-- Pilih Fasilitas --</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Tersedia">Tersedia</option>
                <option value="Tidak Tersedia">Tidak Tersedia</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah_bed_kosong" class="form-label">Jumlah Bed Kosong</label>
            <input type="number" name="jumlah_bed_kosong" id="jumlah_bed_kosong" class="form-control" min="0" required>
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
        const fasilitasSelect = document.getElementById('fasilitas');
        fasilitasSelect.innerHTML = '';

        if (kelas && fasilitasMap[kelas]) {
            const option = document.createElement('option');
            option.value = fasilitasMap[kelas];
            option.text = fasilitasMap[kelas];
            fasilitasSelect.appendChild(option);
        }
    }
</script>
@endsection
