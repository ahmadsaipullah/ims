<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kontrak extends Model
{
    protected $table = 'kontrak';

    protected $fillable = [
        'kontrak_no',
        'client_name',
        'otr',
        'dp_percent',
        'down_payment',
        'pokok_kredit',
        'tenor',
        'bunga_percent',
        'bunga_total',
        'total_pembayaran',
        'angsuran_per_bulan',
        'tanggal_mulai',
    ];

    protected $casts = [
        'otr' => 'decimal:2',
        'dp_percent' => 'decimal:2',
        'down_payment' => 'decimal:2',
        'pokok_kredit' => 'decimal:2',
        'bunga_percent' => 'decimal:2',
        'bunga_total' => 'decimal:2',
        'total_pembayaran' => 'decimal:2',
        'angsuran_per_bulan' => 'decimal:2',
        'tanggal_mulai' => 'date',
    ];

    public function jadwalAngsuran(): HasMany
    {
        return $this->hasMany(JadwalAngsuran::class, 'kontrak_id');
    }
}
