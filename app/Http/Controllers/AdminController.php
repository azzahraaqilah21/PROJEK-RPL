<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Parfum;
use App\Models\Kategori;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Menampilkan halaman login
    public function showLoginPage()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.dashboard.index');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    // Dashboard Admin
    public function dashboard()
    {
        $totalParfum = Parfum::count();
        $totalKategori = Kategori::count();
        $totalTransaksi = DetailTransaksi::distinct('tranksasi_id')->count('tranksasi_id');

        // Total Pendapatan
        $totalPendapatan = DetailTransaksi::sum(DB::raw('jumlah * harga_satuan'));

        // Best Seller Parfum
        $bestSellers = DetailTransaksi::select('parfum_id', DB::raw('SUM(jumlah) as total_terjual'))
            ->groupBy('parfum_id')
            ->orderBy('total_terjual', 'desc')
            ->with('parfum')
            ->limit(5)
            ->get();

        // Penjualan per Kategori
        $penjualanPerKategori = Kategori::select('kategori.nama_kategori', DB::raw('COUNT(detail_transaksi.id) as total'))
            ->leftJoin('parfum', 'kategori.id', '=', 'parfum.kategori_id')
            ->leftJoin('detail_transaksi', 'parfum.id', '=', 'detail_transaksi.parfum_id')
            ->groupBy('kategori.id', 'kategori.nama_kategori')
            ->get();

        // Transaksi Terbaru
        $transaksiTerbaru = DetailTransaksi::with('parfum')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

    // ============================
    // CHART.JS – PREPARE DATA
    // ============================

    // Chart: Top 5 Terlaris
    $chartBestSellerLabels = $bestSellers->pluck('parfum.nama');
    $chartBestSellerData = $bestSellers->pluck('total_terjual');

    // Chart: Penjualan per Kategori
    $chartKategoriLabels = $penjualanPerKategori->pluck('nama_kategori');
    $chartKategoriData = $penjualanPerKategori->pluck('total');

        return view('admin.dashboard.index', compact(
    'totalParfum',
    'totalKategori',
    'totalTransaksi',
    'totalPendapatan',
    'bestSellers',
    'penjualanPerKategori',
    'transaksiTerbaru',
    'chartBestSellerLabels',
    'chartBestSellerData',
    'chartKategoriLabels',
    'chartKategoriData'
     ));

    }

    // Logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
