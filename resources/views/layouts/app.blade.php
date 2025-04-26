<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Rumah Sakit Umum Genah Mari')</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logo-rs.png') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    #sidebar {
        width: 250px;
        background-color: #f8f9fa;
        border-left: 1px solid #dee2e6;
        height: 100vh;
        position: fixed;
        top: 0;
        right: -250px; /* Sembunyi di kanan */
        padding-top: 70px;
        z-index: 1050;
        transition: right 0.3s ease-in-out;
    }

    #sidebar.active {
        right: 0; /* Muncul dari kanan */
    }

    #sidebar ul {
        padding-left: 0;
    }

    #sidebar ul li {
        list-style: none;
        padding: 10px;
    }

    #sidebar ul li a {
        text-decoration: none;
        color: #333;
    }

    #main-content {
        padding: 20px;
    }

    .navbar .btn-toggle {
        position: absolute;
        right: 15px;
    }
</style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm position-relative">
            <div class="container d-flex align-items-center justify-content-between">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo-rs.png') }}" alt="Logo" width="30" height="30" style="margin-right: 15px;">
                    <span class="fs-5 fw-bold">RS Sehat Selalu</span>
                </a>

                <!-- Tombol toggle di pojok kanan atas -->
                <button id="sidebarToggle" class="btn btn-outline-secondary btn-sm btn-toggle">
                    ☰
                </button>
            </div>
        </nav>

        <!-- Sidebar -->
        <div id="sidebar">
        <ul class="list-unstyled px-3">
    <li class="text-end">
        <button id="sidebarClose" class="btn btn-sm btn-danger">Tutup ✖</button>
    </li>
    <hr>

    @guest
        <li><a href="{{ route('login') }}">Login</a></li>
        @if (Route::has('register'))
            <li><a href="{{ route('register') }}">Register</a></li>
        @endif
    @else
        <li class="fw-bold">{{ Auth::user()->name }}</li>
        <hr>

        {{-- Menu untuk semua user --}}
        <li><a href="{{ url('/') }}">Beranda</a></li>

        {{-- Menu untuk user pasien --}}
        @if (Auth::user()->role === 'user')
            <li><a href="{{ route('antrian.create') }}">Daftar Antrian</a></li>
            <li><a href="{{ route('antrian.index') }}">Riwayat Antrian</a></li>
        @endif

        {{-- Menu untuk admin --}}
        @if (Auth::user()->role === 'admin')
            <li><a href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
            <li><a href="{{ route('admin.kamar.index') }}">Kelola Kamar</a></li>
            <li><a href="{{ route('admin.antrian.index') }}">Kelola Antrian</a></li>
        @endif

        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    @endguest
</ul>

        </div>

        <!-- Main Content -->
        <div id="main-content" class="container py-4">
            @yield('content')
        </div>
    </div>

    <!-- Sidebar Script -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebarToggle');
        const closeBtn = document.getElementById('sidebarClose');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.add('active');
        });

        closeBtn.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });
    });
</script>

</body>
</html>
