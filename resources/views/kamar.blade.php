@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Informasi Ketersediaan Kamar</h2>

    <div class="row">
        @foreach($kamars as $kamar)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $kamar->nama_kamar }}</h5>
                    <p class="mb-1"><strong>Kelas:</strong> {{ $kamar->kelas }}</p>
                    <p class="mb-1"><strong>Fasilitas:</strong> {{ $kamar->fasilitas }}</p>
                    <p class="mb-1">
                        <strong>Status:</strong>
                        <span class="badge {{ $kamar->status == 'Tersedia' ? 'bg-success' : 'bg-danger' }}">
                            {{ $kamar->status }}
                        </span>
                    </p>
                    <p class="mb-0"><strong>Jumlah Bed Kosong:</strong> {{ $kamar->jumlah_bed_kosong }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
