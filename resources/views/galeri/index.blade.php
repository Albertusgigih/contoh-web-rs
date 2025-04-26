@extends('layouts.app')

@section('title', 'Galeri RS')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4 fw-bold">Galeri Rumah Sakit</h2>

    @if($galeri->isEmpty())
        <p class="text-center text-muted">Belum ada foto yang ditambahkan.</p>
    @else
        <div class="row">
            @foreach($galeri as $item)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $item->judul }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-left mt-5">
            <a href="{{ url('/') }}" class="btn btn-secondary">← Kembali ke Beranda</a>
        </div>
    @endif
</div>
@endsection
