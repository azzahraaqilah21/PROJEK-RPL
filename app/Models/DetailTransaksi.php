<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    public $timestamps = false;

    protected $fillable = [
        'tranksasi_id',
        'parfum_id',
        'jumlah',
        'harga_satuan',
    ];

    protected $casts = [
        'tranksasi_id' => 'integer',
        'jumlah' => 'integer',
        'harga_satuan' => 'integer',
    ];

   public function parfum(): BelongsTo
{
    return $this->belongsTo(Parfum::class, 'parfum_id', 'id');
}

    public function getTotalHargaAttribute(): int
    {
        return $this->jumlah * $this->harga_satuan;
    }
}
