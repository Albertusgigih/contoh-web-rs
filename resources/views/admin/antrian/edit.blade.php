@extends('layouts.app')

@section('title', 'Ubah Status Antrian')

@section('content')
<div class="container">
    <h4 class="mb-4">Ubah Status Antrian</h4>

    <form action="{{ route('admin.antrian.update', $antrian->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Pasien</label>
            <input type="text" class="form-control" value="{{ $antrian->user->name }}" disabled>
        </div>



        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="menunggu" {{ $antrian->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="dipanggil" {{ $antrian->status == 'dipanggil' ? 'selected' : '' }}>Dipanggil</option>
                <option value="selesai" {{ $antrian->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.antrian.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
