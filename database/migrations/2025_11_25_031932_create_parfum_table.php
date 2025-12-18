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
    $table->id(); // auto increment primary key
    $table->string('nama', 100);
    $table->string('varian_aroma', 100)->nullable();
    $table->integer('harga');
    $table->integer('stok')->default(0);
    $table->text('deskripsi')->nullable();
    $table->unsignedBigInteger('kategori_id')->nullable();
    $table->timestamps();

    $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('set null');
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
