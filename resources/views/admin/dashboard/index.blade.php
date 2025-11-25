@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">
        <i class="fas fa-chart-line text-black mr-2"></i>
        Dashboard Statistik Penjualan
    </h1>
    <p class="text-gray-600 mt-2">Ringkasan data dan statistik toko parfum</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-gradient-to-br from-gray-800 to-black rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-300 text-sm">Total Parfum</p>
                <h3 class="text-3xl font-bold mt-2">{{ $totalParfum }}</h3>
            </div>
            <div class="bg-gray-700 bg-opacity-50 rounded-full p-4">
                <i class="fas fa-spray-can text-3xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-gray-600 to-gray-700 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-200 text-sm">Total Kategori</p>
                <h3 class="text-3xl font-bold mt-2">{{ $totalKategori }}</h3>
            </div>
            <div class="bg-gray-500 bg-opacity-50 rounded-full p-4">
                <i class="fas fa-tags text-3xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-gray-700 to-gray-800 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-200 text-sm">Total Transaksi</p>
                <h3 class="text-3xl font-bold mt-2">{{ $totalTransaksi }}</h3>
            </div>
            <div class="bg-gray-600 bg-opacity-50 rounded-full p-4">
                <i class="fas fa-shopping-cart text-3xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-gray-900 to-black rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-300 text-sm">Total Pendapatan</p>
                <h3 class="text-2xl font-bold mt-2">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
            </div>
            <div class="bg-gray-800 bg-opacity-50 rounded-full p-4">
                <i class="fas fa-money-bill-wave text-3xl"></i>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Best Seller Products -->
    <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
        <h3 class="text-xl font-bold text-gray-900 mb-4">
            <i class="fas fa-crown text-gray-700 mr-2"></i>
            Top 5 Parfum Terlaris
        </h3>
        <div class="space-y-3">
            @forelse($bestSellers as $index => $item)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                    <div class="flex items-center space-x-3">
                        <div class="bg-black text-white rounded-full w-8 h-8 flex items-center justify-center font-bold text-sm">
                            {{ $index + 1 }}
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">{{ $item->parfum->nama ?? 'N/A' }}</p>
                            <p class="text-sm text-gray-500">Terjual: {{ $item->total_terjual }} unit</p>
                        </div>
                    </div>
                    <i class="fas fa-fire text-gray-600 text-xl"></i>
                </div>
            @empty
                <p class="text-gray-500 text-center py-4">Belum ada data penjualan</p>
            @endforelse
        </div>
    </div>

    <!-- Sales by Category -->
    <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
        <h3 class="text-xl font-bold text-gray-900 mb-4">
            <i class="fas fa-chart-pie text-gray-700 mr-2"></i>
            Penjualan per Kategori
        </h3>
        <div class="space-y-3">
            @forelse($penjualanPerKategori as $item)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-tag text-gray-700"></i>
                        <span class="font-semibold text-gray-900">{{ $item->nama_kategori }}</span>
                    </div>
                    <span class="bg-gray-200 text-gray-900 px-3 py-1 rounded-full text-sm font-semibold">
                        {{ $item->total }} transaksi
                    </span>
                </div>
            @empty
                <p class="text-gray-500 text-center py-4">Belum ada data kategori</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Recent Transactions -->
<div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-xl font-bold text-gray-900">
            <i class="fas fa-history text-gray-700 mr-2"></i>
            Transaksi Terbaru
        </h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-black text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Nama Parfum</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Jumlah</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Harga Satuan</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Total</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($transaksiTerbaru as $transaksi)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $transaksi->tranksasi_id }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $transaksi->parfum->nama ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $transaksi->jumlah }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">Rp {{ number_format($transaksi->harga_satuan, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            <i class="fas fa-inbox text-4xl mb-2"></i>
                            <p>Belum ada transaksi</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
