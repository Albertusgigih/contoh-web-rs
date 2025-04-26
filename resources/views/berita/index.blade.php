@extends('layouts.app') {{-- atau layout yang kamu pakai --}}

@section('title', 'Daftar Berita')

@section('content')
<div class="container">
<div class="text-left mt-5">
        <a href="{{ url('/') }}" class="btn btn-secondary">← Kembali ke Beranda</a>
    </div>
    <h1>Daftar Berita</h1>
    <div class="row">
        @foreach ($beritas as $berita)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="Gambar Berita">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $berita->judul }}</h5>
                        <p class="card-text">{{ Str::limit(strip_tags($berita->konten), 100) }}</p>
                        <a href="{{ url('/berita/' . $berita->id) }}" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
