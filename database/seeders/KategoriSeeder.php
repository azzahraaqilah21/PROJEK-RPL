<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama dulu (opsional)
        DB::table('kategori')->truncate();

        // Insert tipe parfum
        DB::table('kategori')->insert([
            ['nama_kategori' => 'Pria'],
            ['nama_kategori' => 'Wanita'],
            ['nama_kategori' => 'Unisex'],
        ]);
    }
}
