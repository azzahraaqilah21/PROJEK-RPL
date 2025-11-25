<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Parfum extends Model
{
    protected $table = 'parfum';
    protected $primaryKey = 'nama';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'varian_aroma',
        'gender',
        'harga',
        'stok',
        'deskripsi',
        'kategori_id',
    ];

    protected $casts = [
        'harga' => 'integer',
        'kategori_id' => 'integer',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function detailTransaksi(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class, 'parfum_id', 'nama');
    }

    public function statistikPenjualan(): HasOne
    {
        return $this->hasOne(StatistikPenjualan::class, 'nama_parfum', 'nama');
    }
}
