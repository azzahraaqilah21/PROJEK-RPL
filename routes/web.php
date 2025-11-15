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


