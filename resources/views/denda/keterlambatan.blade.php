@extends('layouts.app')

@section('title', 'Denda Keterlambatan')

@section('content')
<div class="container py-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">
            <i class="fas fa-exclamation-triangle text-danger"></i>
            Denda Keterlambatan
        </h2>
        <p class="text-muted">Soal 3: Perhitungan denda keterlambatan pembayaran</p>
    </div>

    <!-- Contract Info -->
    <div class="card bg-danger text-white shadow-lg mb-4">
        <div class="card-body">
            <div class="row text-center">
                <div class="col-md-3">
                    <i class="fas fa-file-contract fa-3x mb-2"></i>
                    <p class="mb-1 opacity-75 small">Kontrak No</p>
                    <h5 class="fw-bold">{{ $data['kontrak_no'] }}</h5>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-user fa-3x mb-2"></i>
                    <p class="mb-1 opacity-75 small">Client</p>
                    <h5 class="fw-bold">{{ $data['client_name'] }}</h5>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-calendar-day fa-3x mb-2"></i>
                    <p class="mb-1 opacity-75 small">Tanggal Evaluasi</p>
                    <h5 class="fw-bold">{{ $data['tanggal_evaluasi'] }}</h5>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-percent fa-3x mb-2"></i>
                    <p class="mb-1 opacity-75 small">Denda per Hari</p>
                    <h5 class="fw-bold">{{ $data['denda_per_hari_percent'] }}</h5>
                </div>
            </div>
        </div>
    </div>

    @if(count($data['detail_denda']) > 0)
    <div class="card border-0 shadow mb-4">
        <div class="card-header bg-danger text-white">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>
                Detail Angsuran Terlambat
            </h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Angsuran Ke</th>
                            <th>Bulan</th>
                            <th>Jatuh Tempo</th>
                            <th class="text-center">Hari Telat</th>
                            <th class="text-end">Angsuran</th>
                            <th class="text-end">Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['detail_denda'] as $denda)
                        <tr class="table-danger">
                            <td class="text-center">
                                <span class="badge bg-danger rounded-circle" style="width: 35px; height: 35px; line-height: 35px;">
                                    {{ $denda['angsuran_ke'] }}
                                </span>
                            </td>
                            <td class="fw-bold">
                                <i class="fas fa-calendar-alt me-2 text-danger"></i>
                                {{ $denda['bulan'] }}
                            </td>
                            <td>{{ $denda['tanggal_jatuh_tempo'] }}</td>
                            <td class="text-center">
                                <span class="badge bg-warning text-dark">
                                    <i class="fas fa-clock me-1"></i>
                                    {{ $denda['hari_telat'] }} hari
                                </span>
                            </td>
                            <td class="text-end fw-bold">
                                Rp {{ number_format($denda['angsuran'], 0, ',', '.') }}
                            </td>
                            <td class="text-end fw-bold text-danger">
                                Rp {{ number_format($denda['denda'], 0, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-danger">
                        <tr class="fw-bold fs-5">
                            <td colspan="3" class="text-end">
                                <i class="fas fa-calculator me-2"></i>
                                Total Denda ({{ $data['total_hari_telat'] }} hari keterlambatan)
                            </td>
                            <td colspan="3" class="text-end text-danger">
                                Rp {{ number_format($data['total_denda'], 0, ',', '.') }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Info Boxes -->
    <div class="row">
        <div class="col-md-6">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-info-circle me-2"></i>
                    Penjelasan Perhitungan
                </div>
                <div class="card-body">
                    <ul class="mb-0 small">
                        <li class="mb-2">Formula: <strong>Hari Telat × Angsuran × 0,1%</strong></li>
                        <li class="mb-2">Pak Sugus sudah bayar sampai Mei 2024 (angsuran ke-5)</li>
                        <li class="mb-2">Belum bayar: Juni & Juli 2024</li>
                        <li>Angsuran Agustus belum jatuh tempo per 14 Agustus</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-danger">
                <div class="card-header bg-danger text-white">
                    <i class="fas fa-chart-pie me-2"></i>
                    Ringkasan
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fas fa-exclamation text-danger me-2"></i>
                            Angsuran telat: <strong>{{ count($data['detail_denda']) }} angsuran</strong>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-clock text-warning me-2"></i>
                            Total hari: <strong>{{ $data['total_hari_telat'] }} hari</strong>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-money-bill-wave text-danger me-2"></i>
                            Total denda: <strong>Rp {{ number_format($data['total_denda'], 0, ',', '.') }}</strong>
                        </li>
                        <li>
                            <i class="fas fa-calendar text-primary me-2"></i>
                            Per tanggal: <strong>{{ $data['tanggal_evaluasi'] }}</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @else
    <div class="alert alert-success">
        <i class="fas fa-check-circle me-2"></i>
        <strong>Tidak Ada Keterlambatan</strong> - Semua angsuran sudah dibayar tepat waktu.
    </div>
    @endif

    <!-- Action Buttons -->
    <div class="text-center mt-4 no-print">
        <a href="{{ route('home') }}" class="btn btn-primary me-2">
            <i class="fas fa-home me-1"></i>
            Kembali ke Home
        </a>
        <button onclick="window.print()" class="btn btn-danger">
            <i class="fas fa-print me-1"></i>
            Cetak Report
        </button>
    </div>

</div>
@endsection
