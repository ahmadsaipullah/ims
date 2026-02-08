@extends('layouts.app')

@section('title', 'Hasil Perhitungan Kredit')

@section('content')
<div class="container py-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">
            <i class="fas fa-file-invoice-dollar text-success"></i>
            Hasil Perhitungan Angsuran
        </h2>
        <p class="text-muted">Detail lengkap perhitungan kredit Anda</p>
    </div>

    <!-- Summary Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="fas fa-money-bill-wave fa-2x text-primary mb-2"></i>
                    <h6 class="text-muted small mb-1">Harga OTR</h6>
                    <h5 class="fw-bold mb-0">Rp {{ number_format($data['harga_otr'], 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="fas fa-hand-holding-usd fa-2x text-warning mb-2"></i>
                    <h6 class="text-muted small mb-1">Down Payment</h6>
                    <h5 class="fw-bold mb-0">Rp {{ number_format($data['dp'], 0, ',', '.') }}</h5>
                    <small class="text-muted">({{ $data['dp_percent'] }}%)</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="fas fa-wallet fa-2x text-info mb-2"></i>
                    <h6 class="text-muted small mb-1">Pokok Pinjaman</h6>
                    <h5 class="fw-bold mb-0">Rp {{ number_format($data['pokok_pinjaman'], 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 bg-success text-white">
                <div class="card-body text-center">
                    <i class="fas fa-calendar-check fa-2x mb-2"></i>
                    <h6 class="small mb-1 text-white-50">Angsuran / Bulan</h6>
                    <h5 class="fw-bold mb-0">Rp {{ number_format($data['angsuran_per_bulan'], 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Calculation -->
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card border-0 shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-calculator me-2"></i>
                        Detail Perhitungan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <tr>
                                <td class="fw-bold">Harga OTR</td>
                                <td class="text-end">Rp {{ number_format($data['harga_otr'], 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Down Payment ({{ $data['dp_percent'] }}%)</td>
                                <td class="text-end">- Rp {{ number_format($data['dp'], 0, ',', '.') }}</td>
                            </tr>
                            <tr class="table-active">
                                <td class="fw-bold">Pokok Pinjaman</td>
                                <td class="text-end fw-bold">Rp {{ number_format($data['pokok_pinjaman'], 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Bunga {{ $data['bunga_per_tahun'] }}% × {{ $data['tenor_bulan'] }} bulan</td>
                                <td class="text-end">Rp {{ number_format($data['total_bunga'], 0, ',', '.') }}</td>
                            </tr>
                            <tr class="table-success">
                                <td class="fw-bold">Total yang Harus Dibayar</td>
                                <td class="text-end fw-bold">Rp {{ number_format($data['total_bayar'], 0, ',', '.') }}</td>
                            </tr>
                            <tr class="table-info">
                                <td class="fw-bold">Angsuran per Bulan ({{ $data['tenor_bulan'] }}x)</td>
                                <td class="text-end fw-bold fs-5">Rp {{ number_format($data['angsuran_per_bulan'], 0, ',', '.') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Installment Schedule -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0 shadow">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-list me-2"></i>
                        Jadwal Angsuran ({{ $data['tenor_bulan'] }} Bulan)
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center">Ke</th>
                                    <th>Bulan</th>
                                    <th>Jatuh Tempo</th>
                                    <th class="text-end">Angsuran Pokok</th>
                                    <th class="text-end">Bunga</th>
                                    <th class="text-end">Total</th>
                                    <th class="text-end">Sisa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['jadwal_angsuran'] as $jadwal)
                                <tr>
                                    <td class="text-center">
                                        <span class="badge bg-primary">{{ $jadwal['angsuran_ke'] }}</span>
                                    </td>
                                    <td>{{ $jadwal['bulan'] }}</td>
                                    <td>{{ $jadwal['tanggal_jatuh_tempo'] }}</td>
                                    <td class="text-end">Rp {{ number_format($jadwal['angsuran_pokok'], 0, ',', '.') }}</td>
                                    <td class="text-end">Rp {{ number_format($jadwal['bunga'], 0, ',', '.') }}</td>
                                    <td class="text-end fw-bold">Rp {{ number_format($jadwal['total_angsuran'], 0, ',', '.') }}</td>
                                    <td class="text-end text-muted">Rp {{ number_format($jadwal['sisa_pokok'], 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-secondary">
                                <tr class="fw-bold">
                                    <td colspan="3" class="text-end">TOTAL</td>
                                    <td class="text-end">Rp {{ number_format($data['pokok_pinjaman'], 0, ',', '.') }}</td>
                                    <td class="text-end">Rp {{ number_format($data['total_bunga'], 0, ',', '.') }}</td>
                                    <td class="text-end">Rp {{ number_format($data['total_bayar'], 0, ',', '.') }}</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="text-center mt-4 no-print">
        <a href="{{ route('kalkulator.index') }}" class="btn btn-primary me-2">
            <i class="fas fa-redo me-1"></i>
            Hitung Lagi
        </a>
        <a href="{{ route('home') }}" class="btn btn-outline-secondary me-2">
            <i class="fas fa-home me-1"></i>
            Kembali ke Home
        </a>
        <button onclick="window.print()" class="btn btn-success">
            <i class="fas fa-print me-1"></i>
            Cetak
        </button>
    </div>

</div>
@endsection
