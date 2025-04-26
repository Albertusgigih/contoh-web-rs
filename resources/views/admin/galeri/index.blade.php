@extends('layouts.app')

@section('title', 'Kelola Galeri | Admin')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center fw-bold">Galeri Foto Rumah Sakit</h2>

    <div class="text-end mb-3">
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">+ Tambah Foto</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse($galeri as $foto)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    {{-- Tampilkan Gambar --}}
                    
                    <img 
                        src="{{ asset('storage/' . $foto->gambar) }}" 
                        class="card-img-top img-fluid" 
                        alt="{{ $foto->gambar }}" 
                        style="max-height: 250px; object-fit: cover;">


                    <div class="card-body text-center">
                        {{-- Judul/Keterangan --}}
                        <h5 class="card-title">{{ $foto->judul }}</h5>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('admin.galeri.destroy', $foto->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mt-2 w-100">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada foto di galeri.
                </div>
            </div>
        @endforelse
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
            ← Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
