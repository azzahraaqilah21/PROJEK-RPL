@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-900">
        <i class="fas fa-tags text-black mr-2"></i>
        Daftar Kategori
    </h1>
    <a href="{{ route('kategori.create') }}" class="bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-lg shadow-lg transition active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50">
        <i class="fas fa-plus mr-2"></i>Tambah Kategori
    </a>
</div>

@if($kategoris->count() > 0)
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
        <table class="w-full">
            <thead class="bg-black text-white">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold">No</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Nama Kategori</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Jumlah Parfum</th>
                    <th class="px-6 py-4 text-center text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($kategoris as $index => $kategori)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                            <i class="fas fa-tag text-black mr-2"></i>
                            {{ $kategori->nama_kategori }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            <span class="bg-gray-200 text-gray-900 px-3 py-1 rounded-full text-xs font-semibold">
                                {{ $kategori->parfums_count }} Parfum
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('kategori.edit', $kategori->id) }}"
                                    class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded-lg text-sm transition active:scale-95">
                                    <i class="fas fa-edit mr-1"></i>Edit
                                </a>
                                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm transition active:scale-95">
                                        <i class="fas fa-trash mr-1"></i>Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="bg-white rounded-xl shadow-lg p-12 text-center border border-gray-200">
        <i class="fas fa-inbox text-gray-300 text-6xl mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Kategori</h3>
        <p class="text-gray-500 mb-6">Mulai tambahkan kategori pertama Anda</p>
        <a href="{{ route('kategori.create') }}" class="inline-block bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-lg transition active:scale-95">
            <i class="fas fa-plus mr-2"></i>Tambah Kategori
        </a>
    </div>
@endif
@endsection
