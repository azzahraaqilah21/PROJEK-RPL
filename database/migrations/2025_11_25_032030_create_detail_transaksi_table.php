<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('transaksi_id');
    $table->unsignedBigInteger('parfum_id'); // mengacu ke parfum.id
    $table->integer('jumlah');
    $table->integer('harga_satuan');
    $table->timestamps();

    $table->foreign('transaksi_id')->references('id')->on('transaksi')->onDelete('cascade');
    $table->foreign('parfum_id')->references('id')->on('parfum')->onDelete('cascade');
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
