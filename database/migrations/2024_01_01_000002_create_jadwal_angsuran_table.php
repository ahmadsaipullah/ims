<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_angsuran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kontrak_id')->constrained('kontrak')->onDelete('cascade');
            $table->string('kontrak_no');
            $table->integer('angsuran_ke');
            $table->decimal('angsuran_per_bulan', 15, 2);
            $table->date('tanggal_jatuh_tempo');
            $table->enum('status_pembayaran', ['belum_bayar', 'sudah_bayar'])->default('belum_bayar');
            $table->date('tanggal_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_angsuran');
    }
};
