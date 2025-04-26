@extends('layouts.app') {{-- Ganti dengan layout yang kamu gunakan --}}

@section('title', 'Edit Jadwal Dokter | Admin')
@section('content')
<div class="container mt-4">
    <h2>Edit Jadwal Dokter</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.jadwal.update', $jadwal_dokter->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_dokter">Nama Dokter</label>
            <input type="text" name="nama_dokter" class="form-control" value="{{ old('nama_dokter', $jadwal_dokter->nama_dokter) }}" required>
        </div>

        <div class="form-group">
            <label for="spesialis">Spesialis</label>
            <input type="text" name="spesialis" class="form-control" value="{{ old('spesialis', $jadwal_dokter->spesialis) }}" required>
        </div>

        <div class="form-group">
            <label for="hari">Hari</label>
            <select name="hari" class="form-control" required>
                @php
                    $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                @endphp
                @foreach ($hariList as $hari)
                    <option value="{{ $hari }}" {{ $jadwal_dokter->hari === $hari ? 'selected' : '' }}>{{ $hari }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="jam_mulai">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" value="{{ old('jam_mulai', $jadwal_dokter->jam_mulai) }}" required>
        </div>

        <div class="form-group">
            <label for="jam_selesai">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" value="{{ old('jam_selesai', $jadwal_dokter->jam_selesai) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
