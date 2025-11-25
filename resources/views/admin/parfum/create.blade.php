@extends('layouts.app')

@section('title', 'Tambah Parfum')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('parfum.index') }}" class="text-black hover:text-gray-700 transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Parfum
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">
            <i class="fas fa-plus-circle text-black mr-2"></i>
            Tambah Parfum Baru
        </h2>

        <form action="{{ route('parfum.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Parfum <span class="text-red-500">*</span>
                </label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent @error('nama') border-red-500 @enderror">
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="kategori_id" class="block text-sm font-semibold text-gray-700 mb-2">
                    Kategori
                </label>
                <select name="kategori_id" id="kategori_id"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent @error('kategori_id') border-red-500 @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="gender" class="block text-sm font-semibold text-gray-700 mb-2">
                    Gender <span class="text-red-500">*</span>
                </label>
                <select name="gender" id="gender" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent @error('gender') border-red-500 @enderror">
                    <option value="">-- Pilih Gender --</option>
                    <option value="Pria" {{ old('gender') == 'Pria' ? 'selected' : '' }}>Pria</option>
                    <option value="Wanita" {{ old('gender') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                    <option value="Unisex" {{ old('gender') == 'Unisex' ? 'selected' : '' }}>Unisex</option>
                </select>
                @error('gender')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="varian_aroma" class="block text-sm font-semibold text-gray-700 mb-2">
                    Varian Aroma
                </label>
                <input type="text" name="varian_aroma" id="varian_aroma" value="{{ old('varian_aroma') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent @error('varian_aroma') border-red-500 @enderror"
                    placeholder="Contoh: Floral, Woody, Citrus">
                @error('varian_aroma')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="harga" class="block text-sm font-semibold text-gray-700 mb-2">
                    Harga (Rp) <span class="text-red-500">*</span>
                </label>
                <input type="number" name="harga" id="harga" value="{{ old('harga') }}" required min="0"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent @error('harga') border-red-500 @enderror">
                @error('harga')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="stok" class="block text-sm font-semibold text-gray-700 mb-2">
                    Stok
                </label>
                <input type="text" name="stok" id="stok" value="{{ old('stok') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent @error('stok') border-red-500 @enderror"
                    placeholder="Contoh: 50 pcs">
                @error('stok')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi
                </label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent @error('deskripsi') border-red-500 @enderror"
                    placeholder="Deskripsikan parfum ini...">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="flex-1 bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-lg font-semibold transition active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50">
                    <i class="fas fa-save mr-2"></i>Simpan Parfum
                </button>
                <a href="{{ route('parfum.index') }}" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-3 rounded-lg font-semibold text-center transition active:scale-95">
                    <i class="fas fa-times mr-2"></i>Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
