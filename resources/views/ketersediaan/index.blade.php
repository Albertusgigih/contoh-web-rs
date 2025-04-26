@extends('layouts.app')

@section('title', 'Data Kamar | Rumah Sakit Umum Genah Mari')


@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Informasi Ketersediaan Kamar</h2>

    <div class="row">
        @foreach($kamars as $kamar)
            <div class="col-md-4 mb-4">
                <div class="card border-{{ $kamar->status == 'Tersedia' ? 'success' : 'danger' }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $kamar->nama_kamar }}</h5>
                        <p><strong>Kelas:</strong> {{ $kamar->kelas }}</p>
                        <p><strong>Fasilitas:</strong> {{ $kamar->fasilitas }}</p>
                        <p><strong>Status:</strong> 
                            <span class="badge badge-{{ $kamar->status == 'Tersedia' ? 'success' : 'danger' }}">
                                {{ $kamar->status }}
                            </span>
                        </p>
                        <p><strong>Bed Kosong:</strong> {{ $kamar->jumlah_bed_kosong }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-left mt-5">
        <a href="{{ url('/') }}" class="btn btn-secondary">← Kembali ke Beranda</a>
    </div>
</div>
@endsection
