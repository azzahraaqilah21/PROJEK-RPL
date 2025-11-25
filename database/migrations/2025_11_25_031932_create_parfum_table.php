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
        Schema::create('parfum', function (Blueprint $table) {
            $table->string('nama', 100)->primary();
            $table->string('varian_aroma', 100)->nullable();
            $table->integer('harga');
            $table->string('stok', 50)->nullable();
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();

            $table->foreign('kategori_id')->references('id')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parfum');
    }
};
