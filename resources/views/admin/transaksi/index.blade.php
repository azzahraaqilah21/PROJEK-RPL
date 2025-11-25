@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-900">
        <i class="fas fa-shopping-cart text-black mr-2"></i>
        Daftar Transaksi
    </h1>
    <div class="flex gap-2">
        <a href="{{ route('transaksi.export') }}" class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded-lg shadow-lg transition active:scale-95">
            <i class="fas fa-file-excel mr-2"></i>Export CSV
        </a>
        <a href="{{ route('transaksi.create') }}" class="bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-lg shadow-lg transition active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50">
            <i class="fas fa-plus mr-2"></i>Tambah Transaksi
        </a>
    </div>
</div>

@if($transaksis->count() > 0)
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
        <table class="w-full">
            <thead class="bg-black text-white">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold">ID</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">ID Transaksi</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Nama Parfum</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Jumlah</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Harga Satuan</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Total</th>
                    <th class="px-6 py-4 text-center text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($transaksis as $transaksi)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $transaksi->id }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                            <span class="bg-gray-200 text-gray-900 px-3 py-1 rounded-full text-xs font-semibold">
                                #{{ $transaksi->tranksasi_id }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <i class="fas fa-spray-can text-black mr-2"></i>
                            {{ $transaksi->parfum->nama ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $transaksi->jumlah }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">Rp {{ number_format($transaksi->harga_satuan, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-center">
                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm transition active:scale-95">
                                    <i class="fas fa-trash mr-1"></i>Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $transaksis->links() }}
    </div>
@else
    <div class="bg-white rounded-xl shadow-lg p-12 text-center border border-gray-200">
        <i class="fas fa-inbox text-gray-300 text-6xl mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Transaksi</h3>
        <p class="text-gray-500 mb-6">Mulai tambahkan transaksi pertama Anda</p>
        <a href="{{ route('transaksi.create') }}" class="inline-block bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-lg transition active:scale-95">
            <i class="fas fa-plus mr-2"></i>Tambah Transaksi
        </a>
    </div>
@endif
@endsection
