<?php
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', function () {
    $produk = [
        ['id' => 1, 'nama' => 'Parfum Mawar', 'deskripsi' => 'Wangi segar bunga mawar', 'harga' => 120000],
        ['id' => 2, 'nama' => 'Parfum Vanilla', 'deskripsi' => 'Aroma manis vanilla', 'harga' => 95000],
        ['id' => 3, 'nama' => 'Parfum Ocean Breeze', 'deskripsi' => 'Kesegaran laut alami', 'harga' => 150000],
        ['id' => 4, 'nama' => 'Parfum Kopi', 'deskripsi' => 'Wangi khas kopi hangat', 'harga' => 110000],
    ];
    return view('user.produk', compact('produk'));
});
Route::get('/contact', function () {
    return view('user.contact');
});

use App\Http\Controllers\AdminController;

Route::get('/admin/login', [AdminController::class, 'showLoginPage'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

use App\Http\Controllers\ParfumController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;

// Redirect root ke login admin
Route::get('/', function () {
    return redirect()->route('admin.login');
});

// Auth Routes untuk Admin
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes (belum login)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminController::class, 'showLoginPage'])->name('login');
        Route::post('/login', [AdminController::class, 'login'])->name('login.post');
    });

    // Protected routes (sudah login)
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        // Parfum Routes
        Route::resource('parfum', ParfumController::class);
        Route::get('/parfum-export', [ParfumController::class, 'export'])->name('parfum.export');

        // Kategori Routes
        Route::resource('kategori', KategoriController::class);

        // Transaksi Routes
        Route::resource('transaksi', TransaksiController::class)->except(['show', 'edit', 'update']);
        Route::get('/transaksi-export', [TransaksiController::class, 'export'])->name('transaksi.export');
    });
});



