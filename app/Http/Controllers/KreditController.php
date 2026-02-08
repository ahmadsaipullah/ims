<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;
use App\Models\JadwalAngsuran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KreditController extends Controller
{
    /**
     * Homepage - Tampilkan semua menu
     */
    public function home()
    {
        return view('welcome');
    }

    /**
     * Halaman Jawaban Pertanyaan Rekrutmen (1-8)
     */
    public function jawabanPertanyaan()
    {
        $jawaban = [
            'nama' => 'Ahmad Saifullah',
            'email' => 'ahmadsaipullah140@gmail.com',
            'phone' => '0878-8016-2823',
            'pendidikan' => 'S1 Teknik Informatika (IPK 3.72)',
            'universitas' => 'Universitas Muhammadiyah Tangerang',
            'domisili' => 'Cipondoh, Tangerang, Banten',
        ];

        return view('jawaban.pertanyaan', compact('jawaban'));
    }

    /**
     * SOAL 1: Kalkulator Angsuran Kredit
     */
    public function kalkulatorIndex()
    {
        $defaultData = [
            'kontrak_no' => 'AGR00001',
            'client_name' => 'SUGUS',
            'otr' => 240000000,
            'dp_percent' => 20,
            'tenor' => 18,
            'bunga' => 6,
        ];

        return view('kalkulator.index', compact('defaultData'));
    }

    /**
     * SOAL 1: Proses Perhitungan
     */
    public function kalkulatorCalculate(Request $request)
    {
        $request->validate([
            'otr' => 'required|numeric|min:1000000',
            'dp_percent' => 'required|numeric|min:0|max:100',
            'tenor' => 'required|integer|min:1|max:120',
            'bunga' => 'required|numeric|min:0|max:100',
        ]);

        $otr = $request->otr;
        $dpPercent = $request->dp_percent;
        $tenor = $request->tenor;
        $bunga = $request->bunga;
        $tanggalMulai = $request->tanggal_mulai ?? Carbon::now()->format('Y-m-d');

        // Perhitungan
        $downPayment = ($dpPercent / 100) * $otr;
        $pokokKredit = $otr - $downPayment;
        $bungaPerBulan = $bunga / 12 / 100;
        $bungaTotal = $pokokKredit * $bungaPerBulan * $tenor;
        $totalPembayaran = $pokokKredit + $bungaTotal;
        $angsuranPerBulan = $totalPembayaran / $tenor;

        // Generate jadwal angsuran
        $jadwalAngsuran = [];
        $date = Carbon::parse($tanggalMulai);
        $angsuranPokok = $pokokKredit / $tenor;
        $bungaPerAngsuran = $bungaTotal / $tenor;
        $sisaPokok = $pokokKredit;

        for ($i = 1; $i <= $tenor; $i++) {
            $sisaPokok = $pokokKredit - ($angsuranPokok * $i);
            $jadwalAngsuran[] = [
                'angsuran_ke' => $i,
                'bulan' => $date->format('F Y'),
                'tanggal_jatuh_tempo' => $date->format('d M Y'),
                'angsuran_pokok' => $angsuranPokok,
                'bunga' => $bungaPerAngsuran,
                'total_angsuran' => $angsuranPerBulan,
                'sisa_pokok' => $sisaPokok,
            ];
            $date->addMonth();
        }

        $data = [
            'kontrak_no' => $request->kontrak_no ?? 'AGR' . rand(10000, 99999),
            'client_name' => $request->client_name ?? 'Client',
            'harga_otr' => $otr,
            'dp_percent' => $dpPercent,
            'dp' => $downPayment,
            'pokok_pinjaman' => $pokokKredit,
            'tenor_bulan' => $tenor,
            'bunga_per_tahun' => $bunga,
            'total_bunga' => $bungaTotal,
            'total_bayar' => $totalPembayaran,
            'angsuran_per_bulan' => $angsuranPerBulan,
            'jadwal_angsuran' => $jadwalAngsuran,
        ];

        return view('kalkulator.result', compact('data'));
    }

    /**
     * SOAL 2: Total Angsuran Jatuh Tempo
     */
    public function angsuranJatuhTempo()
    {
        $kontrak = Kontrak::where('kontrak_no', 'AGR00001')->first();

        if (!$kontrak) {
            return redirect()->route('home')->with('error', 'Data kontrak tidak ditemukan. Silakan run migration dan seeder terlebih dahulu.');
        }

        $tanggalEvaluasi = Carbon::parse('2024-08-14');

        // Ambil jadwal angsuran yang sudah jatuh tempo
        $jadwalAngsuran = JadwalAngsuran::where('kontrak_no', 'AGR00001')
            ->orderBy('angsuran_ke')
            ->get()
            ->map(function ($item) use ($tanggalEvaluasi) {
                $isJatuhTempo = Carbon::parse($item->tanggal_jatuh_tempo)->lte($tanggalEvaluasi);
                return [
                    'angsuran_ke' => $item->angsuran_ke,
                    'bulan' => Carbon::parse($item->tanggal_jatuh_tempo)->format('F Y'),
                    'tanggal_jatuh_tempo' => Carbon::parse($item->tanggal_jatuh_tempo)->format('d M Y'),
                    'angsuran' => $item->angsuran_per_bulan,
                    'is_jatuh_tempo' => $isJatuhTempo,
                    'status' => $isJatuhTempo ? 'Jatuh Tempo' : 'Belum Jatuh Tempo',
                ];
            });

        $totalJatuhTempo = $jadwalAngsuran->where('is_jatuh_tempo', true)->sum('angsuran');
        $jumlahJatuhTempo = $jadwalAngsuran->where('is_jatuh_tempo', true)->count();

        $data = [
            'kontrak_no' => $kontrak->kontrak_no,
            'client_name' => $kontrak->client_name,
            'tanggal_evaluasi' => $tanggalEvaluasi->format('d F Y'),
            'angsuran_per_bulan' => $kontrak->angsuran_per_bulan,
            'jadwal_angsuran' => $jadwalAngsuran,
            'total_jatuh_tempo' => $totalJatuhTempo,
            'jumlah_jatuh_tempo' => $jumlahJatuhTempo,
        ];

        return view('angsuran.jatuh-tempo', compact('data'));
    }

    /**
     * SOAL 3: Denda Keterlambatan
     */
    public function dendaKeterlambatan()
    {
        $kontrak = Kontrak::where('kontrak_no', 'AGR00001')->first();

        if (!$kontrak) {
            return redirect()->route('home')->with('error', 'Data kontrak tidak ditemukan. Silakan run migration dan seeder terlebih dahulu.');
        }

        $tanggalEvaluasi = Carbon::parse('2024-08-14');
        $dendaPerHari = 0.001; // 0.1%

        // Ambil angsuran yang belum dibayar dan sudah jatuh tempo
        $angsuranTelat = JadwalAngsuran::where('kontrak_no', 'AGR00001')
            ->where('status_pembayaran', 'belum_bayar')
            ->whereDate('tanggal_jatuh_tempo', '<', $tanggalEvaluasi)
            ->orderBy('angsuran_ke')
            ->get();

        $detailDenda = [];
        $totalDenda = 0;
        $totalHariTelat = 0;

        foreach ($angsuranTelat as $angsuran) {
            $hariTelat = $tanggalEvaluasi->diffInDays(Carbon::parse($angsuran->tanggal_jatuh_tempo));
            $denda = $hariTelat * $angsuran->angsuran_per_bulan * $dendaPerHari;

            $bulan = Carbon::parse($angsuran->tanggal_jatuh_tempo)->format('F Y');

            $detailDenda[] = [
                'angsuran_ke' => $angsuran->angsuran_ke,
                'bulan' => $bulan,
                'tanggal_jatuh_tempo' => Carbon::parse($angsuran->tanggal_jatuh_tempo)->format('d M Y'),
                'tanggal_evaluasi' => $tanggalEvaluasi->format('d M Y'),
                'hari_telat' => $hariTelat,
                'angsuran' => $angsuran->angsuran_per_bulan,
                'denda' => $denda,
            ];

            $totalDenda += $denda;
            $totalHariTelat += $hariTelat;
        }

        $data = [
            'kontrak_no' => $kontrak->kontrak_no,
            'client_name' => $kontrak->client_name,
            'tanggal_evaluasi' => $tanggalEvaluasi->format('d F Y'),
            'denda_per_hari_percent' => '0.1%',
            'detail_denda' => $detailDenda,
            'total_denda' => $totalDenda,
            'total_hari_telat' => $totalHariTelat,
        ];

        return view('denda.keterlambatan', compact('data'));
    }

    /**
     * About Page
     */
    public function about()
    {
        return view('about');
    }
}
