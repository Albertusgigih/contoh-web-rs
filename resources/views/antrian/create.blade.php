@extends('layouts.app')

@section('title', 'Daftar Antrian')

@section('content')
<div class="container">
    <h3>Form Daftar Antrian</h3>
    <form action="{{ route('antrian.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <p>Tekan tombol di bawah untuk mendapatkan nomor antrian Anda.</p>
            <button type="submit" class="btn btn-primary">Ambil Nomor Antrian</button>
        </div>
    </form>
</div>
@endsection
