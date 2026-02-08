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
        Schema::create('kontrak', function (Blueprint $table) {
            $table->id();
            $table->string('kontrak_no')->unique();
            $table->string('client_name');
            $table->decimal('otr', 15, 2);
            $table->decimal('dp_percent', 5, 2);
            $table->decimal('down_payment', 15, 2);
            $table->decimal('pokok_kredit', 15, 2);
            $table->integer('tenor'); // dalam bulan
            $table->decimal('bunga_percent', 5, 2);
            $table->decimal('bunga_total', 15, 2);
            $table->decimal('total_pembayaran', 15, 2);
            $table->decimal('angsuran_per_bulan', 15, 2);
            $table->date('tanggal_mulai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontrak');
    }
};
