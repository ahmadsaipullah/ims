@extends('layouts.app')

@section('title', 'Jawaban Pertanyaan')

@section('content')
<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold">
            <i class="fas fa-clipboard-list text-primary"></i>
            Jawaban Pertanyaan
        </h2>
        <p class="text-muted">Pertanyaan 1-8: Informasi Kandidat & Ekspektasi</p>
    </div>

    <!-- Question 1 -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h6 class="mb-0">
                <i class="fas fa-question-circle me-2"></i>
                Pertanyaan 1: Jelaskan pengalaman kerja terakhir Anda!
            </h6>
        </div>
        <div class="card-body">
            <p class="mb-2"><strong>Jawaban:</strong></p>
            <p class="mb-3">
                Saya saat ini bekerja sebagai <strong>Staff IT Head Office</strong> di PT Tritunggal Maju Sejahtera
                (holding company) sejak Februari 2024. Perusahaan ini menaungi beberapa anak perusahaan dalam berbagai bidang.
            </p>
            <p class="mb-3"><strong>Tanggung jawab utama:</strong></p>
            <ul>
                <li>Mengelola infrastruktur IT untuk multi-company (3+ perusahaan)</li>
                <li>Maintenance sistem enterprise seperti SQL Server, Accurate Online, Smile ERP, dan Moka POS</li>
                <li>Network management menggunakan Mikrotik untuk manajemen bandwidth dan keamanan jaringan</li>
                <li>Technical support untuk seluruh karyawan di berbagai lokasi</li>
                <li>Troubleshooting hardware dan software</li>
            </ul>
            <p class="mb-0">
                Selain itu, saya juga aktif sebagai <strong>Freelance Web Developer Laravel</strong> sejak 2022,
                mengerjakan berbagai proyek sistem informasi dan website untuk institusi pendidikan dan perusahaan.
            </p>
        </div>
    </div>

    <!-- Question 2 -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            <h6 class="mb-0">
                <i class="fas fa-question-circle me-2"></i>
                Pertanyaan 2: Skill IT apa yang Anda kuasai?
            </h6>
        </div>
        <div class="card-body">
            <p class="mb-3"><strong>Jawaban:</strong></p>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded">
                        <h6 class="fw-bold text-primary mb-2">
                            <i class="fas fa-code me-2"></i>
                            Programming & Framework
                        </h6>
                        <ul class="mb-0 small">
                            <li><strong>Laravel</strong> Framework utama untuk web development</li>
                            <li><strong>PHP</strong> - OOP, MVC pattern</li>
                            <li><strong>JavaScript</strong> - Vanilla JS, React (basic)</li>
                            <li><strong>HTML/CSS</strong> - Responsive design</li>
                            <li><strong>Bootstrap & Tailwind</strong> - CSS framework</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded">
                        <h6 class="fw-bold text-success mb-2">
                            <i class="fas fa-database me-2"></i>
                            Database
                        </h6>
                        <ul class="mb-0 small">
                            <li><strong>MySQL</strong> </li>
                            <li><strong>SQL Server</strong></li>
                            <li><strong>Database Design</strong></li>
                            <li>Eloquent ORM Laravel</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded">
                        <h6 class="fw-bold text-info mb-2">
                            <i class="fas fa-network-wired me-2"></i>
                            Infrastructure & Network
                        </h6>
                        <ul class="mb-0 small">
                            <li><strong>Windows Server</strong> - Active Directory, File Server</li>
                            <li><strong>Mikrotik</strong> - Bandwidth management, hotspot</li>
                            <li>Network troubleshooting</li>
                            <li>Basic Linux (command line)</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded">
                        <h6 class="fw-bold text-warning mb-2">
                            <i class="fas fa-cogs me-2"></i>
                            Enterprise Systems
                        </h6>
                        <ul class="mb-0 small">
                            <li><strong>Accurate Online</strong> - Accounting system</li>
                            <li><strong>Smile ERP</strong> - Manufacturing system</li>
                            <li><strong>Moka POS</strong> - Point of sale system</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Question 3 -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-warning">
            <h6 class="mb-0">
                <i class="fas fa-question-circle me-2"></i>
                Pertanyaan 3: Apa ekspektasi gaji Anda?
            </h6>
        </div>
        <div class="card-body">
            <p class="mb-2"><strong>Jawaban:</strong></p>
            <div class="alert alert-warning mb-0">
                <p class="mb-2">
                    <i class="fas fa-money-bill-wave me-2"></i>
                    Ekspektasi gaji saya adalah <strong>Rp 5.500.000 - Rp 7.000.000 per bulan</strong>
                </p>
                <p class="mb-0 small">
                    <strong>Pertimbangan:</strong> Pengalaman 2+ tahun, skill full-stack Laravel,
                    kemampuan infrastruktur IT, dan kesediaan untuk belajar teknologi baru.
                    Namun, saya terbuka untuk negosiasi berdasarkan job description dan benefit yang ditawarkan.
                </p>
            </div>
        </div>
    </div>

    <!-- Question 4 -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-info text-white">
            <h6 class="mb-0">
                <i class="fas fa-question-circle me-2"></i>
                Pertanyaan 4: Kapan Anda bisa join?
            </h6>
        </div>
        <div class="card-body">
            <p class="mb-2"><strong>Jawaban:</strong></p>
            <div class="alert alert-info mb-0">
                <p class="mb-2">
                    <i class="fas fa-calendar-check me-2"></i>
                    Saya bisa join mulai <strong>1 Maret 2026</strong> atau disesuaikan dengan kebutuhan perusahaan.
                </p>
                <p class="mb-0 small">
                    Saya perlu waktu sekitar 3-4 minggu untuk proses handover di perusahaan sekarang.
                </p>
            </div>
        </div>
    </div>

    <!-- Question 5 -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-danger text-white">
            <h6 class="mb-0">
                <i class="fas fa-question-circle me-2"></i>
                Pertanyaan 5: Apakah Anda bersedia WFO (Work From Office)?
            </h6>
        </div>
        <div class="card-body">
            <p class="mb-2"><strong>Jawaban:</strong></p>
            <div class="alert alert-success mb-0">
                <p class="mb-0">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong>Ya, saya bersedia WFO full time.</strong>
                </p>
            </div>
        </div>
    </div>

    <!-- Question 6 -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-secondary text-white">
            <h6 class="mb-0">
                <i class="fas fa-question-circle me-2"></i>
                Pertanyaan 6: Domisili Anda saat ini di mana?
            </h6>
        </div>
        <div class="card-body">
            <p class="mb-2"><strong>Jawaban:</strong></p>
            <div class="d-flex align-items-start">
                <i class="fas fa-map-marker-alt text-danger fa-2x me-3 mt-1"></i>
                <div>
                    <p class="mb-2 fw-bold">Cipondoh Kota Tangerang</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Question 7 -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-dark text-white">
            <h6 class="mb-0">
                <i class="fas fa-question-circle me-2"></i>
                Pertanyaan 7: Isi form berikut di Google Form (Screenshot)
            </h6>
        </div>
        <div class="card-body">
            <p class="mb-2"><strong>Jawaban:</strong></p>
            <div class="alert alert-light border">
                <p class="mb-2">
                    <i class="fas fa-link me-2"></i>
                    Google Form telah diisi dengan data berikut:
                </p>
                <ul class="small mb-0">
                    <li><strong>Nama:</strong> Ahmad Saifullah</li>
                    <li><strong>Posisi:</strong> Junior IT Developer</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Question 8 -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header gradient-bg text-white">
            <h6 class="mb-0">
                <i class="fas fa-question-circle me-2"></i>
                Pertanyaan 8: Kirim CV terbaru via WhatsApp
            </h6>
        </div>
        <div class="card-body">
            <p class="mb-2"><strong>Jawaban:</strong></p>
            <div class="alert alert-success border-success">
                <p class="mb-2">
                    <i class="fab fa-whatsapp me-2"></i>
                    CV terbaru sudah dikirim ke WhatsApp HRD bersama dengan:
                </p>
                <ul class="small mb-0">
                    <li>File CV (PDF format)</li>
                    <li>Portfolio project</li>
                    <li>Link aplikasi Laravel ini sebagai jawaban tes teknis</li>
                    <li>Screenshot form (Pertanyaan 7)</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Action Button -->
    <div class="text-center mt-4">
        <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-5">
            <i class="fas fa-home me-2"></i>
            Kembali ke Home
        </a>
    </div>

</div>
@endsection
ion
