@extends('layouts.app')

@section('title', 'Home - IMS Finance System')

@section('content')
<div class="container py-5">

    <!-- Hero Section -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold mb-3">
            <i class="fas fa-calculator text-primary"></i>
            Sistem Kredit IMS Finance
        </h1>
        <p class="lead text-muted">
            Solusi Perhitungan Angsuran & Manajemen Kredit
        </p>
        <p class="text-muted">
            <i class="fas fa-user me-2"></i>
            Dibuat oleh: <strong>Ahmad Saifullah</strong>
        </p>
    </div>

    <!-- Feature Cards -->
    <div class="row g-4 mb-5">

        <!-- Card 1: Jawaban Pertanyaan -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 card-hover border-0 shadow">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-clipboard-list fa-3x text-primary"></i>
                    </div>
                    <h5 class="card-title fw-bold">Jawaban Pertanyaan</h5>
                    <p class="card-text text-muted small">
                        Pertanyaan 1-8 lengkap dengan detail pengalaman, skill, dan ekspektasi gaji
                    </p>
                    <a href="{{ route('jawaban.pertanyaan') }}" class="btn btn-primary btn-sm mt-2">
                        <i class="fas fa-arrow-right me-1"></i> Lihat Jawaban
                    </a>
                </div>
            </div>
        </div>

        <!-- Card 2: Soal 1 -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 card-hover border-0 shadow">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-calculator fa-3x text-success"></i>
                    </div>
                    <h5 class="card-title fw-bold">Soal 1: Kalkulator</h5>
                    <p class="card-text text-muted small">
                        Aplikasi hitung angsuran kredit dengan metode bunga flat dan jadwal lengkap
                    </p>
                    <a href="{{ route('kalkulator.index') }}" class="btn btn-success btn-sm mt-2">
                        <i class="fas fa-calculator me-1"></i> Hitung Kredit
                    </a>
                </div>
            </div>
        </div>

        <!-- Card 3: Soal 2 -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 card-hover border-0 shadow">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-calendar-check fa-3x text-warning"></i>
                    </div>
                    <h5 class="card-title fw-bold">Soal 2: Jatuh Tempo</h5>
                    <p class="card-text text-muted small">
                        Query database untuk total angsuran yang sudah jatuh tempo per tanggal tertentu
                    </p>
                    <a href="{{ route('angsuran.jatuh-tempo') }}" class="btn btn-warning btn-sm mt-2">
                        <i class="fas fa-search me-1"></i> Cek Angsuran
                    </a>
                </div>
            </div>
        </div>

        <!-- Card 4: Soal 3 -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 card-hover border-0 shadow">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-exclamation-triangle fa-3x text-danger"></i>
                    </div>
                    <h5 class="card-title fw-bold">Soal 3: Denda</h5>
                    <p class="card-text text-muted small">
                        Perhitungan denda keterlambatan pembayaran 0.1% per hari dari angsuran
                    </p>
                    <a href="{{ route('denda.keterlambatan') }}" class="btn btn-danger btn-sm mt-2">
                        <i class="fas fa-money-bill-wave me-1"></i> Lihat Denda
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Setup Instructions -->
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-header gradient-bg text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Cara Setup Aplikasi
                    </h5>
                </div>
                <div class="card-body">
                    <ol class="mb-0">
                        <li class="mb-2">Clone repository Laravel ini</li>
                        <li class="mb-2">
                            Copy <code>.env.example</code> ke <code>.env</code>
                        </li>
                        <li class="mb-2">
                            Jalankan migration dan seeder:
                            <pre class="bg-light p-2 rounded mt-2"><code>php artisan migrate:fresh --seed</code></pre>
                        </li>
                        <li class="mb-2">
                            Start server:
                            <pre class="bg-light p-2 rounded mt-2"><code>php artisan serve</code></pre>
                        </li>
                        <li>Akses aplikasi di browser <code>http://127.0.0.1:8000</code></li>
                    </ol>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-database me-2"></i>
                        Sample Data
                    </h5>
                </div>
                <div class="card-body">
                    <p class="mb-2">Aplikasi sudah include data contoh (Pak Sugus):</p>
                    <ul class="mb-0">
                        <li>Kontrak No: <strong>AGR00001</strong></li>
                        <li>Client: <strong>SUGUS</strong></li>
                        <li>Harga OTR: <strong>Rp 240.000.000</strong></li>
                        <li>DP 20%: <strong>Rp 48.000.000</strong></li>
                        <li>Tenor: <strong>12 bulan</strong></li>
                        <li>Angsuran/bulan: <strong>Rp 12.907.000</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
