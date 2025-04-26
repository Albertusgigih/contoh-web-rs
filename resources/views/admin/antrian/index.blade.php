@extends('layouts.app')

@section('title', 'Kelola Antrian')

@section('content')
<div class="container">
    <h4 class="mb-4">Daftar Antrian</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Nomor Antrian</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($antrians as $index => $antrian)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $antrian->user->name }}</td>
                    <td>{{ $antrian->nomor_antrian }}</td>
                    <td>{{ $antrian->created_at->format('d M Y') }}</td>
                    <td>
                        @if($antrian->status === 'menunggu')
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @elseif($antrian->status === 'dipanggil')
                            <span class="badge bg-info text-dark">Dipanggil</span>
                        @elseif($antrian->status === 'selesai')
                            <span class="badge bg-success">Selesai</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.antrian.edit', $antrian->id) }}" class="btn btn-sm btn-primary">
                            Ubah Status
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data antrian.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
