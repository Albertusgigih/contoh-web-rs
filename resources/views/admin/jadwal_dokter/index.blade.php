@extends('layouts.app')

@section('title', 'Jadwal Dokter | Admin')
@section('content')
<div class="container">
    <h1>Jadwal Dokter 7 Hari ke Depan</h1>

    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-success mb-3">+ Tambah Jadwal</a>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">
            ← Kembali ke Dashboard
    </a>

    @foreach ($jadwals as $jadwal)
        <h4>{{ $jadwal['tanggal'] }}</h4>
        @if ($jadwal['data']->isEmpty())
            <p><em>Tidak ada jadwal</em></p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal['data'] as $item)
                        <tr>
                            <td>{{ $item->nama_dokter }}</td>
                            <td>{{ $item->spesialis }}</td>
                            <td>{{ $item->jam_mulai }}</td>
                            <td>{{ $item->jam_selesai }}</td>
                            <td>
                                <a href="{{ route('admin.jadwal.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.jadwal.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endforeach
</div>
@endsection
