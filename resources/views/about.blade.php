@extends('layouts.app')

@section('title', 'About Developer')

@section('content')
<div class="container py-5">

    <!-- Profile Header -->
    <div class="card gradient-bg text-white shadow-lg mb-4">
        <div class="card-body text-center py-5">
            <div class="mb-4">
                <i class="fas fa-user-circle fa-5x"></i>
            </div>
            <h2 class="fw-bold mb-2">Ahmad Saifullah</h2>
            <p class="fs-5 mb-1">Junior IT Developer</p>
            <p class="mb-2">S1 Teknik Informatika (IPK 3.72)</p>
            <p class="opacity-75">Universitas Muhammadiyah Tangerang</p>
        </div>
    </div>

    <!-- Experience -->
    <div class="card border-0 shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="fas fa-briefcase me-2"></i>
                Pengalaman Kerja
            </h5>
        </div>
        <div class="card-body">

            <div class="mb-4 pb-4 border-bottom">
                <div class="d-flex align-items-start">
                    <div class="bg-primary text-white rounded-circle p-3 me-3">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-1">Staff IT Head Office (Multi-Company)</h6>
                        <p class="text-primary fw-bold mb-1">PT Tritunggal Maju Sejahtera (Holding Company)</p>
                        <p class="text-muted small mb-2">
                            <i class="fas fa-calendar me-1"></i>
                            Februari 2024 - Sekarang
                        </p>
                        <ul class="small mb-0">
                            <li>Mengelola infrastruktur IT multi-company</li>
                            <li>Maintain sistem enterprise (SQL Server, Accurate Online, Smile ERP, Moka POS)</li>
                            <li>Network management & troubleshooting</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div>
                <div class="d-flex align-items-start">
                    <div class="bg-success text-white rounded-circle p-3 me-3">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-1">Web Developer Full Stack Laravel (Freelance)</h6>
                        <p class="text-success fw-bold mb-1">Freelance Projects</p>
                        <p class="text-muted small mb-2">
                            <i class="fas fa-calendar me-1"></i>
                            2022 - Sekarang
                        </p>
                        <ul class="small mb-0">
                            <li>LMS OBE - Universitas Muhammadiyah Tangerang</li>
                            <li>Sistem Informasi LPK</li>
                            <li>Landing Page SIMOBE (SEO Optimized)</li>
                            <li>Sistem Informasi Bimbingan Skripsi</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Skills -->
    <div class="card border-0 shadow mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">
                <i class="fas fa-code me-2"></i>
                Technical Skills
            </h5>
        </div>
        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <h6 class="fw-bold mb-3">
                        <i class="fas fa-globe text-primary me-2"></i>
                        Web Development
                    </h6>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-primary">Laravel</span>
                        <span class="badge bg-primary">PHP</span>
                        <span class="badge bg-primary">HTML/CSS</span>
                        <span class="badge bg-primary">JavaScript</span>
                        <span class="badge bg-primary">Bootstrap</span>
                        <span class="badge bg-primary">React</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <h6 class="fw-bold mb-3">
                        <i class="fas fa-database text-success me-2"></i>
                        Database
                    </h6>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-success">MySQL</span>
                        <span class="badge bg-success">SQL Server</span>
                        <span class="badge bg-success">Database Design</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <h6 class="fw-bold mb-3">
                        <i class="fas fa-server text-info me-2"></i>
                        Infrastructure
                    </h6>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-info">Windows Server</span>
                        <span class="badge bg-info">Network (Mikrotik)</span>
                        <span class="badge bg-info">Troubleshooting</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <h6 class="fw-bold mb-3">
                        <i class="fas fa-briefcase text-warning me-2"></i>
                        Enterprise Systems
                    </h6>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-warning text-dark">Accurate Online</span>
                        <span class="badge bg-warning text-dark">Smile ERP</span>
                        <span class="badge bg-warning text-dark">Moka POS</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- About This App -->
    <div class="card border-0 shadow mb-4">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">
                <i class="fas fa-laptop-code me-2"></i>
                Tentang Aplikasi Ini
            </h5>
        </div>
        <div class="card-body">
            <p class="mb-3">
                Aplikasi <strong>Sistem Kredit IMS Finance</strong> ini dibuat sebagai jawaban untuk tes teknis developer
                PT. Inovasi Mitra Sejati. Aplikasi ini mengimplementasikan 3 soal teknis dengan fitur-fitur berikut:
            </p>
            <ul class="mb-4">
                <li class="mb-2">
                    <strong>Soal 1:</strong> Kalkulator angsuran kredit dengan perhitungan bunga flat
                </li>
                <li class="mb-2">
                    <strong>Soal 2:</strong> Report total angsuran yang sudah jatuh tempo dengan query database
                </li>
                <li class="mb-2">
                    <strong>Soal 3:</strong> Perhitungan denda keterlambatan pembayaran
                </li>
            </ul>

            <div class="alert alert-light border">
                <h6 class="fw-bold mb-3">
                    <i class="fas fa-tools me-2"></i>
                    Tech Stack:
                </h6>
                <div class="row text-center g-3">
                    <div class="col-6 col-md-3">
                        <i class="fab fa-laravel text-danger fa-3x mb-2"></i>
                        <p class="mb-0 small fw-bold">Laravel 12</p>
                    </div>
                    <div class="col-6 col-md-3">
                        <i class="fab fa-bootstrap text-primary fa-3x mb-2"></i>
                        <p class="mb-0 small fw-bold">Bootstrap 5</p>
                    </div>
                    <div class="col-6 col-md-3">
                        <i class="fas fa-database text-success fa-3x mb-2"></i>
                        <p class="mb-0 small fw-bold">MySQL</p>
                    </div>
                    <div class="col-6 col-md-3">
                        <i class="fab fa-github fa-3x mb-2"></i>
                        <p class="mb-0 small fw-bold">Git</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="text-center">
        <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-5">
            <i class="fas fa-home me-2"></i>
            Kembali ke Home
        </a>
    </div>

</div>
@endsection
