<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'kode_transaksi',
        'nama_pelanggan',
        'email',
        'telepon',
        'total_harga',
    ];

    /**
     * Relasi ke detail transaksi
     */
    public function detail()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id');
    }
}
