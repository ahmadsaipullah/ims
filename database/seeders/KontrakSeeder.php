<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KontrakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data Pak Sugus dari soal
        $kontrakId = DB::table('kontrak')->insertGetId([
            'kontrak_no' => 'AGR00001',
            'client_name' => 'SUGUS',
            'otr' => 240000000,
            'dp_percent' => 20,
            'down_payment' => 48000000,
            'pokok_kredit' => 192000000,
            'tenor' => 12, // Sesuai data di soal (12 bulan)
            'bunga_percent' => 8.5, // Disesuaikan agar angsuran = 12.907.000
            'bunga_total' => 6884000,
            'total_pembayaran' => 154884000,
            'angsuran_per_bulan' => 12907000,
            'tanggal_mulai' => '2024-01-25',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Generate jadwal angsuran 12 bulan
        $tanggal = Carbon::parse('2024-01-25');

        for ($i = 1; $i <= 12; $i++) {
            // Pak Sugus sudah bayar sampai Mei (angsuran ke-5)
            $statusBayar = $i <= 5 ? 'sudah_bayar' : 'belum_bayar';
            $tanggalBayar = $i <= 5 ? $tanggal->copy()->subDays(3)->format('Y-m-d') : null;

            DB::table('jadwal_angsuran')->insert([
                'kontrak_id' => $kontrakId,
                'kontrak_no' => 'AGR00001',
                'angsuran_ke' => $i,
                'angsuran_per_bulan' => 12907000,
                'tanggal_jatuh_tempo' => $tanggal->format('Y-m-d'),
                'status_pembayaran' => $statusBayar,
                'tanggal_bayar' => $tanggalBayar,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $tanggal->addMonth();
        }
    }
}
