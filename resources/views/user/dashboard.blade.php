@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Selamat Datang, User!</h1>
</div>
<a href="{{ route('antrian.index') }}" class="btn btn-dark btn-custom">
            <i class="fas fa-list me-2"></i> Daftar Antrian Pasien
        </a>

        <a href="{{ route('antrian.create') }}" class="btn btn-primary">
            <i class="fas fa-list me-2"></i> Minta Nomor Antrian
        </a>
@endsection
