@extends('layouts.app')

@section('title', 'Edit Berita | Admin')
@section('content')
<div class="container">
    <h3>Edit Berita</h3>
    <form action="{{ route('berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <div class="form-group mb-2">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}">
        </div>
        <div class="form-group mb-2">
            <label>Konten</label>
            <textarea name="konten" class="form-control" rows="5">{{ $berita->konten }}</textarea>
        </div>
        <div class="form-group mb-2">
            <label>Gambar</label><br>
            @if ($berita->gambar)
                <img src="{{ asset('storage/'.$berita->gambar) }}" width="150"><br>
            @endif
            <input type="file" name="gambar" class="form-control mt-2">
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
