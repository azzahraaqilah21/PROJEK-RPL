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
    $table->id();
    $table->string('nama', 100);
    $table->string('varian_aroma', 100)->nullable();
    $table->string('tipe_parfum', 50); // field baru
    $table->integer('harga');
    $table->integer('stok')->default(0);
    $table->text('deskripsi')->nullable();
    $table->timestamps();
    });
    Schema::table('kategori', function (Blueprint $table) {
    $table->enum('tipe_parfum', ['Pria', 'Wanita', 'Unisex'])->after('nama_kategori')->default('Unisex');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};
