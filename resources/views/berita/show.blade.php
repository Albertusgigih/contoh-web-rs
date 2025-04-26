@extends('layouts.app')

@section('title', 'Baca Berita')
@section('content')
<div class="container">
    <h1>{{ $berita->judul }}</h1>
    <hr>

    @if($berita->gambar)
        <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid mb-3" alt="...">
    @endif

    <p>{!! nl2br(e($berita->konten)) !!}</p>

    <a href="{{ url('/berita') }}" class="btn btn-secondary mt-3">← Kembali ke Daftar Berita</a>
</div>
@endsection
