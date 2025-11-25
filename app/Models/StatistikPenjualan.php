<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatistikPenjualan extends Model
{
    protected $table = 'statistik_penjualan';
    protected $primaryKey = 'nama_parfum';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'nama_parfum',
        'penjualan_per_day',
        'best_seller',
    ];

    public function parfum(): BelongsTo
    {
        return $this->belongsTo(Parfum::class, 'nama_parfum', 'nama');
    }
}
