<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .navbar-brand {
            font-weight: 700;
            color: #212529 !important;
            font-size: 1.25rem;
        }

        .nav-link {
            color: #495057 !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #0d6efd !important;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4 py-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Blog Kami</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"
                            onclick="alert('Halaman Tentang Kami sedang dalam tahap pengembangan!'); return false;">Tentang</a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        @auth
                            <a class="btn btn-primary px-3" href="{{ route('dashboard') }}">Ke Dashboard</a>
                        @else
                            <a class="btn btn-outline-primary px-3" href="{{ route('login') }}">Login Penulis</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        @yield('content')
    </div>

    <footer class="bg-white border-top py-4 mt-auto">
        <div class="container text-center">
            <small class="text-muted">&copy; 2026 Blog Kami. Seluruh hak cipta dilindungi.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
