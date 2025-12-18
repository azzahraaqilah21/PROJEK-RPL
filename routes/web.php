<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParfumController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;

// Halaman umum
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth('admin')->check()) {
        return redirect()->route('admin.dashboard');
    }
    return view('welcome');
})->name('dashboard.umum');

Route::get('/contact', function () {
    return view('user.contact');
});

Route::get('/about', function () {
    return view('user.about');
});

Route::get('/login', [AdminController::class, 'showLoginPage'])->name('login');
Route::post('/login', [AdminController::class, 'login'])->name('login.post');

// Halaman produk (USER)
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');

// ==============================
// ROUTE ADMIN
// ==============================
Route::prefix('admin')->name('admin.')->group(function () {

    // Guest routes (belum login)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminController::class, 'showLoginPage'])->name('login');
        Route::post('/login', [AdminController::class, 'login'])->name('login.post');
    });

    // Protected routes (sudah login)
    Route::middleware('auth:admin')->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Logout
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        // Parfum CRUD
        Route::get('/parfum/index', [ParfumController::class, 'index'])->name('parfum.index');
        Route::get('/parfum/create', [ParfumController::class, 'create'])->name('parfum.create');
        Route::post('/parfum', [ParfumController::class, 'store'])->name('parfum.store');
        Route::get('/parfum/{parfum}/edit', [ParfumController::class, 'edit'])->name('parfum.edit');
        Route::put('/parfum/{parfum}', [ParfumController::class, 'update'])->name('parfum.update');
        Route::delete('/parfum/{parfum}', [ParfumController::class, 'destroy'])->name('parfum.destroy');
        Route::get('/parfum-export', [ParfumController::class, 'export'])->name('parfum.export');
        Route::get('/parfum-export-preview', [ParfumController::class, 'exportPreview'])->name('parfum.export.preview');

        // Kategori CRUD
        Route::resource('kategori', KategoriController::class);

        // Transaksi
        Route::resource('transaksi', TransaksiController::class)->except(['show', 'edit', 'update']);
        Route::get('/transaksi-export', [TransaksiController::class, 'export'])->name('transaksi.export');
    });
});
