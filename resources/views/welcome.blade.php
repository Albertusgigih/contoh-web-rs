<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda | Rumah Sakit Umum Genah Mari</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-rs.png') }}">
    <meta name="description" content="Portal resmi informasi RS Genah Mari: Jadwal dokter, fasilitas, galeri, dan pengaduan pasien.">

    <!-- Google Font & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    body {
        font-family: 'Nunito', sans-serif;
        background: url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        position: relative;
        color: #fff;
        margin: 0;
        padding: 0;
    }

    .overlay {
        position: absolute;
        inset: 0;
        backdrop-filter: blur(3px);
        background-color: rgba(0, 0, 0, 0.4);
        z-index: 0;
    }

    .top-right {
        position: absolute;
        top: 20px;
        right: 30px;
        z-index: 2;
    }

    .top-right a {
        margin-left: 15px;
        font-weight: 600;
        color: #fff;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
        text-decoration: none;
        transition: color 0.3s;
    }

    .top-right a:hover {
        color: #ffc107;
    }

    .welcome-card {
        background: rgba(255, 255, 255, 0.93);
        color: #333;
        padding: 45px 30px;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        text-align: center;
        max-width: 750px;
        width: 90%;
        z-index: 1;
        animation: fadeInUp 0.8s ease;
        margin-top: 50px;
    }

    .welcome-card h1 {
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .welcome-card p {
        font-size: 18px;
        margin-bottom: 30px;
        color: #555;
    }

    .btn-custom {
        padding: 12px 25px;
        font-size: 16px;
        border-radius: 10px;
        margin: 10px;
        transition: all 0.3s ease-in-out;
        min-width: 180px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .btn:hover {
        transform: scale(1.05);
        opacity: 0.92;
    }

    .info-bar {
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 12px;
        padding: 15px 20px;
        margin-top: 30px;
        z-index: 1;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .info-bar .info-item {
        flex: 1;
        text-align: center;
        font-size: 15px;
        color: #f8f9fa;
    }

    .info-bar a {
        color: #f8f9fa;
        text-decoration: none;
        transition: 0.2s;
    }

    .info-bar a:hover {
        text-decoration: underline;
        color: #ffc107;
    }

    .profil-section {
        scroll-margin-top: 80px;
        animation: fadeInUp 1s ease;
        z-index: 1;
    }

    .profil-section .content-wrapper {
        position: relative;
        z-index: 2;
    }

    footer {
        text-align: center;
        color: #ccc;
        font-size: 14px;
        margin-top: 20px;
        z-index: 1;
    }

    footer p {
        margin-bottom: 0;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .welcome-card {
            padding: 30px 20px;
        }

        .btn-custom {
            width: 100%;
            margin: 5px 0;
        }

        .top-right {
            top: 10px;
            right: 15px;
            position: absolute;
        }

        .info-bar {
            flex-direction: column;
        }
    }
</style>

</head>
<body>

    <div class="overlay"></div>

    <div class="top-right text-end p-3">
        @auth
            <a href="{{ url('/home') }}" class="btn btn-outline-primary btn-sm me-2">
                <i class="bi bi-house-door-fill"></i> Home
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm me-2">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-pencil-square"></i> Register
                </a>
            @endif
        @endauth
    </div>

    <div class="welcome-card text-center">
    <img src="{{ asset('images/logo-rs.png') }}" alt="Logo Rumah Sakit" width="80" height="80" class="mb-3">
    <h1>Rumah Sakit Umum Genah Mari</h1>
    <p>Kesehatan Anda Adalah Prioritas Kami</p>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 justify-content-center mt-4">
        <div class="col">
            <a href="{{ url('/berita') }}" class="btn btn-primary w-100">
                <i class="fas fa-newspaper me-2"></i> Informasi Terkini
            </a>
        </div>
        <div class="col">
            <a href="{{ url('/jadwal-dokter') }}" class="btn btn-success w-100">
                <i class="fas fa-user-md me-2"></i> Jadwal Dokter
            </a>
        </div>
        <div class="col">
            <a href="{{ url('/fasilitas') }}" class="btn btn-info text-white w-100">
                <i class="fas fa-hospital me-2"></i> Fasilitas RS
            </a>
        </div>
        <div class="col">
            <a href="{{ url('/pengaduan') }}" class="btn btn-danger w-100">
                <i class="fas fa-comments me-2"></i> Kirim Pengaduan
            </a>
        </div>
        <div class="col">
            <a href="{{ route('galeri') }}" class="btn btn-secondary w-100">
                <i class="fas fa-images me-2"></i> Galeri Foto
            </a>
        </div>
        <div class="col">
            <a href="{{ route('ketersediaan.kamar') }}" class="btn btn-warning text-white w-100">
                <i class="fas fa-bed me-2"></i> Ketersediaan Kamar
            </a>
        </div>
        <div class="col">
            <a href="{{ route('antrian.index') }}" class="btn btn-dark w-100">
                <i class="fas fa-list me-2"></i>Antrian Online (Diperlukan Login)
            </a>
        </div>
    </div>
</div>


    <div class="container info-bar mt-4 d-flex justify-content-between align-items-center flex-wrap">
        <div class="info-item"><i class="fas fa-phone-alt me-1"></i> 0812-3456-7890</div>
        <div class="info-item"><i class="fab fa-instagram me-1"></i> <a href="#">@rsgenahmari</a></div>
        <div class="info-item"><i class="fab fa-facebook me-1"></i> <a href="#">RS Genah Mari</a></div>
        <div class="info-item"><i class="fab fa-youtube me-1"></i> <a href="#">Genah Mari Channel</a></div>
    </div>

    <section id="profil" class="profil-section container mt-5 mb-5 text-white text-center">
        <div class="bg-dark bg-opacity-75 p-4 rounded shadow content-wrapper">
            <h2 class="mb-3">Profil Rumah Sakit</h2>
            <p style="font-size: 16px;">
                Rumah Sakit Umum Genah Mari merupakan pusat layanan kesehatan terpercaya yang berdedikasi untuk memberikan pelayanan terbaik kepada masyarakat.
                Dengan dukungan tenaga medis profesional, fasilitas modern, dan komitmen terhadap keselamatan pasien, kami hadir untuk memastikan kesehatan Anda tetap terjaga.
            </p>
            <p style="font-size: 16px;">
                Didirikan pada tahun 2005, RS Genah Mari telah melayani ribuan pasien dari berbagai daerah dengan layanan unggulan seperti IGD 24 jam, rawat inap nyaman, poliklinik spesialis, dan berbagai layanan penunjang lainnya.
            </p>
        </div>
    </section>

    <footer class="mt-3">
        <p><i class="fas fa-map-marker-alt me-1"></i> Jl. Sehat Selalu No. 123, Kota Medika, Indonesia</p>
    </footer>

</body>
</html>
