@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="px-5 md:px-10 max-w-7xl mx-auto">

    <!-- HEADER -->
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">
            <i class="fas fa-chart-line mr-2 text-gray-800"></i>
            Dashboard Statistik Penjualan
        </h1>
        <p class="text-gray-600 mt-2 text-sm font-['poppins'] md:text-base">
            Ringkasan data dan statistik toko parfum
        </p>
    </div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <!-- CARD 1 (Dark Gradient) -->
    <div class="bg-gradient-to-br from-gray-900 to-black rounded-2xl shadow-lg p-6 text-white border-l-4 border-amber-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-300 text-sm">Total Parfum</p>
                <h3 class="text-3xl font-bold mt-2">{{ $totalParfum }}</h3>
            </div>
            <div class="bg-gray-800 bg-opacity-60 rounded-full p-4">
                <i class="fas fa-spray-can text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- CARD 2 -->
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 hover:shadow-lg transition-all duration-300 border-l-4 border-amber-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Kategori</p>
                <h3 class="text-3xl font-bold mt-1 text-gray-900">{{ $totalKategori }}</h3>
            </div>
            <div class="bg-gray-100 rounded-full p-4">
                <i class="fas fa-tags text-2xl text-gray-700"></i>
            </div>
        </div>
    </div>

    <!-- CARD 3 -->
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 hover:shadow-lg transition-all duration-300 border-l-4 border-amber-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Transaksi</p>
                <h3 class="text-3xl font-bold mt-1 text-gray-900">{{ $totalTransaksi }}</h3>
            </div>
            <div class="bg-gray-100 rounded-full p-4">
                <i class="fas fa-shopping-cart text-2xl text-gray-700"></i>
            </div>
        </div>
    </div>

    <!-- CARD 4 -->
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 hover:shadow-lg transition-all duration-300 border-l-4 border-amber-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Pendapatan</p>
                <h3 class="text-2xl font-bold mt-1 text-gray-900">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </h3>
            </div>
            <div class="bg-gray-100 rounded-full p-4">
                <i class="fas fa-money-bill-wave text-2xl text-gray-700"></i>
            </div>
        </div>
    </div>

</div>

    <!-- GRID: BEST SELLER + KATEGORI -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">

        <!-- BEST SELLER -->
        <div class="bg-white border border-gray-200 shadow-md rounded-2xl p-6">
            <h3 class="text-xl font-semibold mb-4 flex items-center">
                <i class="fas fa-crown text-gray-700 mr-2"></i>
                Top 5 Parfum Terlaris
            </h3>

            <div class="space-y-3">
                @forelse($bestSellers as $index => $item)
                <div class="flex items-center justify-between bg-gray-50 p-3 rounded-xl hover:bg-gray-100 transition">
                    <div class="flex items-center space-x-3">
                        <div class="bg-black text-white rounded-full w-8 h-8 flex items-center justify-center font-bold">
                            {{ $index + 1 }}
                        </div>
                        <div>
                            <p class="font-semibold">{{ $item->parfum->nama ?? 'N/A' }}</p>
                            <p class="text-sm text-gray-500">Terjual: {{ $item->total_terjual }} unit</p>
                        </div>
                    </div>
                    <i class="fas fa-fire text-gray-600 text-xl"></i>
                </div>
                @empty
                <p class="text-center text-gray-500 py-4">Belum ada data penjualan</p>
                @endforelse
            </div>
        </div>

        <!-- KATEGORI -->
        <div class="bg-white border border-gray-200 shadow-md rounded-2xl p-6">
            <h3 class="text-xl font-semibold mb-4 flex items-center">
                <i class="fas fa-chart-pie text-gray-700 mr-2"></i>
                Penjualan per Kategori
            </h3>

            <div class="space-y-3">
                @forelse($penjualanPerKategori as $item)
                <div class="flex items-center justify-between bg-gray-50 p-3 rounded-xl hover:bg-gray-100 transition">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-tag text-gray-700"></i>
                        <span class="font-semibold">{{ $item->nama_kategori }}</span>
                    </div>
                    <span class="bg-gray-200 text-gray-900 px-3 py-1 rounded-full text-sm font-semibold">
                        {{ $item->total }} transaksi
                    </span>
                </div>
                @empty
                <p class="text-center text-gray-500 py-4">Belum ada data kategori</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- RECENT TRANSACTIONS -->
    <div class="bg-white border border-gray-200 rounded-2xl shadow-md overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-xl font-semibold flex items-center">
                <i class="fas fa-history text-gray-700 mr-2"></i>
                Transaksi Terbaru
            </h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-900 text-white text-left">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Nama Parfum</th>
                        <th class="px-6 py-3">Jumlah</th>
                        <th class="px-6 py-3">Harga Satuan</th>
                        <th class="px-6 py-3">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($transaksiTerbaru as $transaksi)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $transaksi->tranksasi_id }}</td>
                        <td class="px-6 py-4 font-medium">{{ $transaksi->parfum->nama ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $transaksi->jumlah }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($transaksi->harga_satuan, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 font-semibold">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            <i class="fas fa-inbox text-4xl mb-2"></i><br>
                            Belum ada transaksi
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

