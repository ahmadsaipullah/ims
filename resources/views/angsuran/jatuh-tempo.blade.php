@extends('layouts.app')

@section('title', 'Angsuran Jatuh Tempo')

@section('content')
<div class="container py-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">
            <i class="fas fa-calendar-check text-warning"></i>
            Angsuran Jatuh Tempo
        </h2>
        <p class="text-muted">Soal 2: Total angsuran yang sudah jatuh tempo</p>
    </div>

    <!-- Contract Info -->
    <div class="card gradient-bg text-white shadow-lg mb-4">
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
                    <p class="mb-1 opacity-75 small">Tanggal Cek</p>
                    <h5 class="fw-bold">{{ $data['tanggal_evaluasi'] }}</h5>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-money-bill-wave fa-3x mb-2"></i>
                    <p class="mb-1 opacity-75 small">Angsuran/Bulan</p>
                    <h5 class="fw-bold">Rp {{ number_format($data['angsuran_per_bulan'], 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Installments Table -->
    @if(count($data['jadwal_angsuran']) > 0)
    <div class="card border-0 shadow mb-4">
        <div class="card-header bg-warning">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>
                Detail Angsuran
            </h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" width="10%">Angsuran Ke</th>
                            <th width="20%">Bulan</th>
                            <th width="20%">Jatuh Tempo</th>
                            <th class="text-end" width="25%">Angsuran</th>
                            <th class="text-center" width="25%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['jadwal_angsuran'] as $angsuran)
                        <tr class="{{ $angsuran['is_jatuh_tempo'] ? 'table-success' : '' }}">
                            <td class="text-center">
                                <span class="badge {{ $angsuran['is_jatuh_tempo'] ? 'bg-success' : 'bg-secondary' }} rounded-circle" style="width: 35px; height: 35px; line-height: 35px; font-size: 14px;">
                                    {{ $angsuran['angsuran_ke'] }}
                                </span>
                            </td>
                            <td class="fw-bold">
                                <i class="fas fa-calendar-alt me-2 text-primary"></i>
                                {{ $angsuran['bulan'] }}
                            </td>
                            <td>{{ $angsuran['tanggal_jatuh_tempo'] }}</td>
                            <td class="text-end fw-bold">
                                Rp {{ number_format($angsuran['angsuran'], 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                @if($angsuran['is_jatuh_tempo'])
                                    <span class="badge bg-success">
                                        <i class="fas fa-check-circle me-1"></i>
                                        Sudah Jatuh Tempo
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        <i class="fas fa-clock me-1"></i>
                                        Belum Jatuh Tempo
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-success">
                        <tr class="fw-bold fs-5">
                            <td colspan="3" class="text-end">
                                <i class="fas fa-calculator me-2"></i>
                                Total Angsuran Jatuh Tempo ({{ $data['jumlah_jatuh_tempo'] }} angsuran)
                            </td>
                            <td class="text-end text-success">
                                Rp {{ number_format($data['total_jatuh_tempo'], 0, ',', '.') }}
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        Tidak ada data angsuran yang jatuh tempo.
    </div>
    @endif

    <!-- Info Box -->
    <div class="row">
        <div class="col-md-6">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-info-circle me-2"></i>
                    Penjelasan
                </div>
                <div class="card-body">
                    <p class="mb-2"><strong>Query SQL yang digunakan:</strong></p>
                    <pre class="bg-light p-3 rounded small"><code>SELECT * FROM jadwal_angsuran
WHERE kontrak_id = 1
AND tanggal_jatuh_tempo <= '{{ $data['tanggal_evaluasi'] }}'
ORDER BY angsuran_ke ASC</code></pre>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-success">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-chart-pie me-2"></i>
                    Ringkasan
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            <strong>{{ $data['jumlah_jatuh_tempo'] }}</strong> angsuran sudah jatuh tempo
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-money-bill-wave text-warning me-2"></i>
                            Total: <strong>Rp {{ number_format($data['total_jatuh_tempo'], 0, ',', '.') }}</strong>
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

    <!-- Action Buttons -->
    <div class="text-center mt-4 no-print">
        <a href="{{ route('home') }}" class="btn btn-primary me-2">
            <i class="fas fa-home me-1"></i>
            Kembali ke Home
        </a>
        <button onclick="window.print()" class="btn btn-warning">
            <i class="fas fa-print me-1"></i>
            Cetak Report
        </button>
    </div>

</div>
@endsection
