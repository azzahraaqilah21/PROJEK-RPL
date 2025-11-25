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
        Schema::create('statistik_penjualan', function (Blueprint $table) {
            $table->string('nama_parfum', 100)->primary();
            $table->string('penjualan_per_day', 50)->nullable();
            $table->string('best_seller', 50)->nullable();

            $table->foreign('nama_parfum')->references('nama')->on('parfum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik_penjualan');
    }
};
