@extends('layouts.app')

@section('title', 'Jadwal Dokter')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Jadwal Dokter 7 Hari ke Depan</h3>
    
    @foreach ($jadwals as $jadwal)
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                {{ $jadwal['tanggal'] }}
            </div>
            <div class="card-body">
                @forelse ($jadwal['data'] as $data)
                    <p><strong>{{ $data->nama_dokter }}</strong> - {{ $data->spesialis }} ({{ $data->jam_mulai }} - {{ $data->jam_selesai }})</p>
                @empty
                    <p class="text-muted">Tidak ada jadwal.</p>
                @endforelse
            </div>
        </div>
    @endforeach
</div>
@endsection
