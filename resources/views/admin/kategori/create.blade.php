@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('kategori.index') }}" class="text-black hover:text-gray-700 transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Kategori
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">
            <i class="fas fa-plus-circle text-black mr-2"></i>
            Tambah Kategori Baru
        </h2>

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="nama_kategori" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Kategori <span class="text-red-500">*</span>
                </label>
                <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori') }}" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent @error('nama_kategori') border-red-500 @enderror"
                    placeholder="Contoh: Parfum Floral, Parfum Woody, dll">
                @error('nama_kategori')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="flex-1 bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-lg font-semibold transition active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50">
                    <i class="fas fa-save mr-2"></i>Simpan Kategori
                </button>
                <a href="{{ route('kategori.index') }}" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-3 rounded-lg font-semibold text-center transition active:scale-95">
                    <i class="fas fa-times mr-2"></i>Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
