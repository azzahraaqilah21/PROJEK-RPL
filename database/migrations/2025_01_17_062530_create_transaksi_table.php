<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi', 50)->unique(); // kode unik transaksi
            $table->string('nama_pelanggan');               // nama customer
            $table->string('email')->nullable();            // email customer opsional
            $table->string('telepon')->nullable();          // nomor telepon
            $table->integer('total_harga');                 // total harga transaksi
            $table->timestamps();                           // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
