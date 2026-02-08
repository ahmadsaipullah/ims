<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ahmad Saifullah">
    <title>@yield('title', 'IMS Finance System')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }
        main {
            flex: 1;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15) !important;
        }
        @media print {
            nav, footer, .no-print {
                display: none !important;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark gradient-bg shadow no-print">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="fas fa-calculator me-2"></i>
                IMS Finance
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jawaban.pertanyaan') }}">
                            <i class="fas fa-file-alt me-1"></i> Jawaban
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kalkulator.index') }}">
                            <i class="fas fa-calculator me-1"></i> Soal 1
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('angsuran.jatuh-tempo') }}">
                            <i class="fas fa-table me-1"></i> Soal 2
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('denda.keterlambatan') }}">
                            <i class="fas fa-exclamation-triangle me-1"></i> Soal 3
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">
                            <i class="fas fa-user me-1"></i> About
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-auto no-print">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center text-md-center mb-2 mb-md-0">
                    <p class="mb-0">
                        <i class="fas fa-code me-2"></i>
                        &copy; 2026 <strong>IMS Finance System</strong> - Ahmad Saifullah
                    </p>
                    <p class="mb-0 text-muted small">Tes Teknis Developer - PT. Inovasi Mitra Sejati</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
