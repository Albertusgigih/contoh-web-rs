@extends('layouts.app')

@section('title', 'Daftar Antrian Pasien')

@section('content')
<div class="container">
    <h3 class="mb-4">Daftar Antrian Pasien</h3>
    

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Antrian</th>
                <th>Nama Pasien</th>
                <th>Status</th>
                <th>Waktu Daftar</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($antrians as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->nomor_antrian }}</td>
        <td>{{ $item->user->name }}</td>
        <td>
            @if ($item->status == 'menunggu')
                <span class="badge bg-warning text-dark">Menunggu</span>
            @elseif ($item->status == 'dipanggil')
                <span class="badge bg-info text-dark">Dipanggil</span>
            @elseif ($item->status == 'selesai')
                <span class="badge bg-success">Selesai</span>
            @endif
        </td>
        <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
    </tr>
@endforeach

        </tbody>
    </table>
    <a href="{{ route('antrian.create') }}" class="btn btn-primary">
            <i class="fas fa-list me-2"></i> Minta Nomor Antrian
        </a>
</div>
@endsection
