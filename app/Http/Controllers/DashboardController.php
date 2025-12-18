<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Parfum;
use App\Models\Kategori;
use App\Models\DetailTransaksi;

class DashboardController extends Controller
{
    public function index()
    {
        // Total data
        $totalParfum = Parfum::count();
        $totalKategori = Kategori::count();
        $totalTransaksi = Transaksi::count();

        // Total pendapatan: jumlah semua harga dari detail_transaksi
        $totalPendapatan = DetailTransaksi::sum(\DB::raw('jumlah * harga_satuan'));

        // Best seller: parfum paling laris berdasarkan jumlah dibeli
        $bestSellers = DetailTransaksi::select('parfum_id', \DB::raw('SUM(jumlah) as total_jual'))
            ->groupBy('parfum_id')
            ->orderByDesc('total_jual')
            ->with('parfum')
            ->take(5)
            ->get();

        // Penjualan per kategori
        $penjualanPerKategori = DetailTransaksi::join('parfum', 'detail_transaksi.parfum_id', '=', 'parfum.id')
            ->join('kategori', 'parfum.kategori_id', '=', 'kategori.id')
            ->select('kategori.nama_kategori', \DB::raw('SUM(detail_transaksi.jumlah * detail_transaksi.harga_satuan) as total'))
            ->groupBy('kategori.nama_kategori')
            ->get();

        // Transaksi terbaru
        $transaksiTerbaru = Transaksi::with('detail.parfum')->orderByDesc('created_at')->take(5)->get();

        return view('admin.dashboard.index', compact(
            'totalParfum',
            'totalKategori',
            'totalTransaksi',
            'totalPendapatan',
            'bestSellers',
            'penjualanPerKategori',
            'transaksiTerbaru'
        ));
    }
}
