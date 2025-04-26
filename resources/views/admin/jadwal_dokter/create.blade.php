@extends('layouts.app')

@section('title', 'Form Tambah Jadwal Dokter')
@section('content')
<div class="container">
    <h1>Tambah Jadwal Dokter</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.jadwal.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Dokter</label>
            <input type="text" name="nama_dokter" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Spesialis</label>
            <input type="text" name="spesialis" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Hari</label>
            <select name="hari" class="form-control" required>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
            </select>
        </div>
        <div class="form-group">
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
