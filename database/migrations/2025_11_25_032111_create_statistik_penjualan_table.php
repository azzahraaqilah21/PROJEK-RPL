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
    $table->id();
    $table->unsignedBigInteger('parfum_id')->unique(); // unik karena satu parfum satu statistik
    $table->integer('penjualan_per_day')->default(0);
    $table->boolean('best_seller')->default(false);
    $table->timestamps();

    $table->foreign('parfum_id')->references('id')->on('parfum')->onDelete('cascade');
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
