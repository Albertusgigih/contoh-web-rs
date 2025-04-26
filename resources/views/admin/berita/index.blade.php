@extends('layouts.app')

@section('title', 'Daftar Berita | Admin')

@section('content')
<div class="container">
    <h3>Daftar Berita</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('berita.create') }}" class="btn btn-success mb-3">+ Tambah Berita</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Konten</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($beritas as $berita)
                <tr>
                    <td>{{ $berita->judul }}</td>
                    <td>{{ Str::limit(strip_tags($berita->konten), 100) }}</td>
                    <td>
                        @if ($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" width="100">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada berita.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">
                     ← Kembali ke Dashboard
            </a>

</div>
@endsection
