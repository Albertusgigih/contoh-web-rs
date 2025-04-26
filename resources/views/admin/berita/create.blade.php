@extends('layouts.app')

@section('title', 'Tambah Berita')

@section('content')
<div class="container">
    <h3>Tambah Berita</h3>
    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-2">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Konten</label>
            <textarea name="konten" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group mb-2">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>


</div>
@endsection
