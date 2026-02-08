<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalAngsuran extends Model
{
    protected $table = 'jadwal_angsuran';

    protected $fillable = [
        'kontrak_id',
        'kontrak_no',
        'angsuran_ke',
        'angsuran_per_bulan',
        'tanggal_jatuh_tempo',
        'status_pembayaran',
        'tanggal_bayar',
    ];

    protected $casts = [
        'angsuran_per_bulan' => 'decimal:2',
        'tanggal_jatuh_tempo' => 'date',
        'tanggal_bayar' => 'date',
    ];

    public function kontrak(): BelongsTo
    {
        return $this->belongsTo(Kontrak::class, 'kontrak_id');
    }
}
