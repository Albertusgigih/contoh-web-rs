<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Galeri Rumah Sakit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Galeri Rumah Sakit</h2>
    <div class="row">
        @foreach($galeris as $foto)
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="{{ asset('storage/' . $foto->gambar) }}" class="card-img-top" alt="{{ $foto->judul }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $foto->judul }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
