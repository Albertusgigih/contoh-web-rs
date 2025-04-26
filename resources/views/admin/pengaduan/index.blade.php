@extends('layouts.app')

@section('title', 'List Aduan Pasien | Admin')
@section('content')
<div class="container">
    <h3 class="mb-4">Daftar Pengaduan Pasien</h3>

    @if($pengaduans->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Isi Pengaduan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduans as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->isi_pengaduan }}</td>
                            <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">Belum ada pengaduan yang masuk.</div>
    @endif

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">
                     ← Kembali ke Dashboard
            </a>
</div>
@endsection
