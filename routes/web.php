<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KreditController;

// Homepage
Route::get('/', [KreditController::class, 'home'])->name('home');

// Jawaban Pertanyaan Rekrutmen (1-8)
Route::get('/jawaban-pertanyaan', [KreditController::class, 'jawabanPertanyaan'])->name('jawaban.pertanyaan');

// Soal 1: Kalkulator Angsuran Kredit
Route::get('/kalkulator-kredit', [KreditController::class, 'kalkulatorIndex'])->name('kalkulator.index');
Route::post('/kalkulator-kredit/hitung', [KreditController::class, 'kalkulatorCalculate'])->name('kalkulator.calculate');

// Soal 2: Total Angsuran Jatuh Tempo
Route::get('/angsuran-jatuh-tempo', [KreditController::class, 'angsuranJatuhTempo'])->name('angsuran.jatuh-tempo');

// Soal 3: Denda Keterlambatan
Route::get('/denda-keterlambatan', [KreditController::class, 'dendaKeterlambatan'])->name('denda.keterlambatan');

// About
Route::get('/about', [KreditController::class, 'about'])->name('about');
