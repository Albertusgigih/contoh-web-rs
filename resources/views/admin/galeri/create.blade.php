@extends('layouts.app')

@section('title', 'Input Galeri | Admin')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center fw-bold">Tambah Foto Galeri</h2>

    <div class="row justify-content-center">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Judul Foto -->
                <div class="mb-3">
                    <label for="judul" class="form-label fw-semibold">Judul Foto</label>
                    <input type="text" name="judul" id="judul" class="form-control" placeholder="Contoh: Kegiatan Donor Darah" value="{{ old('judul') }}" required>
                </div>

                <!-- Upload Foto -->
                <div class="mb-3">
                    <label for="gambar" class="form-label">Upload Foto</label>
                    <input type="file" name="gambar" id="gambar" class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Simpan Foto</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
