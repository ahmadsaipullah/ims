@extends('layouts.app')

@section('title', 'Kalkulator Kredit')

@section('content')
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="text-center mb-4">
                <h2 class="fw-bold">
                    <i class="fas fa-calculator text-success"></i>
                    Kalkulator Angsuran Kredit
                </h2>
                <p class="text-muted">Soal 1: Hitung angsuran dengan metode bunga flat</p>
            </div>

            <div class="card border-0 shadow">
                <div class="card-header gradient-bg text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-edit me-2"></i>
                        Form Perhitungan Kredit
                    </h5>
                </div>
                <div class="card-body p-4">

                    <form method="POST" action="{{ route('kalkulator.calculate') }}" id="calculatorForm">
                        @csrf

                        <div class="mb-3">
                            <label for="otr" class="form-label fw-bold">
                                <i class="fas fa-tag me-1"></i>
                                Harga OTR
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" id="otr" name="otr"
                                       required placeholder="240000000" value="240000000">
                            </div>
                            <small class="text-muted">Harga On The Road kendaraan</small>
                        </div>

                        <div class="mb-3">
                            <label for="dp_percent" class="form-label fw-bold">
                                <i class="fas fa-percent me-1"></i>
                                Down Payment (%)
                            </label>
                            <input type="number" class="form-control" id="dp_percent" name="dp_percent"
                                   min="0" max="100" step="0.1" required value="20">
                            <small class="text-muted">Uang muka dalam persen (contoh: 20 untuk 20%)</small>
                        </div>

                        <div class="mb-3">
                            <label for="tenor" class="form-label fw-bold">
                                <i class="fas fa-calendar-alt me-1"></i>
                                Tenor (Bulan)
                            </label>
                            <select class="form-select" id="tenor" name="tenor" required>
                                <option value="12" selected>12 Bulan</option>
                                <option value="24">24 Bulan</option>
                                <option value="36">36 Bulan</option>
                                <option value="48">48 Bulan</option>
                                <option value="60">60 Bulan</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="bunga" class="form-label fw-bold">
                                <i class="fas fa-percentage me-1"></i>
                                Bunga per Tahun (%)
                            </label>
                            <input type="number" class="form-control" id="bunga" name="bunga"
                                   step="0.01" required value="8.5">
                            <small class="text-muted">Suku bunga tahunan (contoh: 8.5 untuk 8.5%)</small>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-calculator me-2"></i>
                                Hitung Angsuran
                            </button>
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>
                                Kembali ke Home
                            </a>
                        </div>

                    </form>

                </div>
            </div>

            <!-- Info Box -->
            <div class="alert alert-info mt-4" role="alert">
                <h6 class="alert-heading">
                    <i class="fas fa-info-circle me-2"></i>
                    Catatan Perhitungan
                </h6>
                <ul class="mb-0 small">
                    <li>Menggunakan metode <strong>bunga flat</strong></li>
                    <li>Formula bunga: <code>Pokok Pinjaman × (Bunga Tahunan / 12) × Tenor</code></li>
                    <li>Angsuran per bulan: <code>(Pokok + Total Bunga) / Tenor</code></li>
                    <li>Pokok pinjaman = Harga OTR - Down Payment</li>
                </ul>
            </div>

        </div>
    </div>

</div>

@push('scripts')
<script>
// Format input currency on blur
document.getElementById('otr').addEventListener('blur', function() {
    let value = this.value.replace(/\D/g, '');
    if (value) {
        this.value = value;
    }
});

// Remove non-numeric on input
document.getElementById('otr').addEventListener('input', function() {
    this.value = this.value.replace(/\D/g, '');
});
</script>
@endpush
@endsection
