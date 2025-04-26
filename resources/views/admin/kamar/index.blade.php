@extends('layouts.app')

@section('title', 'Daftar Ketersediaan Kamar | Admin')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Daftar Kamar Rumah Sakit</h2>

    <a href="{{ route('admin.kamar.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus-circle"></i> Tambah Kamar
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse($kamars as $kamar)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $kamar->nama_kamar }}</h5>
                        <p class="card-text"><strong>Kelas:</strong> {{ $kamar->kelas }}</p>
                        <p class="card-text"><strong>Fasilitas:</strong> {{ $kamar->fasilitas }}</p>
                        <p class="card-text">
                            <strong>Status:</strong>
                            <span class="badge {{ $kamar->status == 'Tersedia' ? 'bg-success' : 'bg-danger' }}">
                                {{ $kamar->status }}
                            </span>
                        </p>
                        <p class="card-text"><strong>Bed Kosong:</strong> {{ $kamar->jumlah_bed_kosong }}</p>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('admin.kamar.edit', $kamar->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <form action="{{ route('admin.kamar.destroy', $kamar->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kamar ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Tidak ada data kamar.</p>
        @endforelse
    </div>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-4">
        ← Kembali ke Dashboard
    </a>
</div>
@endsection
