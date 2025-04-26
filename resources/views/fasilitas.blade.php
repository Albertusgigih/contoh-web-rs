@extends('layouts.app')

@section('title', 'Fasilitas Rumah Sakit')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Fasilitas Rumah Sakit Genah Mari</h2>

    <div class="row mb-4">
        <div class="col-md-6">
            <img src="{{ asset('images/fasilitas/rawatjalan.jpg') }}" class="img-fluid rounded shadow" alt="Rawat Jalan">
        </div>
        <div class="col-md-6">
            <h4>Rawat Jalan</h4>
            <p>Layanan pemeriksaan dan pengobatan pasien tanpa menginap, dengan dokter umum maupun spesialis yang siap membantu.</p>
        </div>
    </div>

    <div class="row mb-4 flex-row-reverse">
        <div class="col-md-6">
            <img src="{{ asset('images/fasilitas/rawatinap.jpg') }}" class="img-fluid rounded shadow" alt="Rawat Inap">
        </div>
        <div class="col-md-6">
            <h4>Rawat Inap</h4>
            <p>Fasilitas kamar yang nyaman untuk pasien yang membutuhkan perawatan lebih lanjut dengan pengawasan medis 24 jam.</p>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <img src="{{ asset('images/fasilitas/medicalcheckup.jpg') }}" class="img-fluid rounded shadow" alt="Medical Check Up">
        </div>
        <div class="col-md-6">
            <h4>Medical Check Up</h4>
            <p>Pemeriksaan kesehatan menyeluruh untuk deteksi dini penyakit dengan peralatan modern dan hasil yang cepat.</p>
        </div>
    </div>

    <div class="row mb-4 flex-row-reverse">
        <div class="col-md-6">
            <img src="{{ asset('images/fasilitas/hemodialisa.jpg') }}" class="img-fluid rounded shadow" alt="Hemodialisa">
        </div>
        <div class="col-md-6">
            <h4>Hemodialisa</h4>
            <p>Pelayanan cuci darah bagi pasien dengan penyakit ginjal kronis, ditangani oleh tim medis profesional dan alat yang steril.</p>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <img src="{{ asset('images/fasilitas/homecare.jpg') }}" class="img-fluid rounded shadow" alt="Home Care">
        </div>
        <div class="col-md-6">
            <h4>Home Care</h4>
            <p>Layanan kesehatan di rumah pasien yang tidak memungkinkan datang ke rumah sakit, dengan kunjungan dokter dan perawat.</p>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="{{ url('/') }}" class="btn btn-secondary">← Kembali ke Beranda</a>
    </div>
</div>
@endsection
