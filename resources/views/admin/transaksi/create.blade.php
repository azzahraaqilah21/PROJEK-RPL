@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('transaksi.index') }}" class="text-black hover:text-gray-700 transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Transaksi
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">
            <i class="fas fa-plus-circle text-black mr-2"></i>
            Tambah Transaksi Baru
        </h2>

        <form action="{{ route('transaksi.store') }}" method="POST" id="transaksiForm">
            @csrf

            <div class="mb-6">
                <label for="tranksasi_id" class="block text-sm font-semibold text-gray-700 mb-2">
                    ID Transaksi <span class="text-red-500">*</span>
                </label>
                <input type="number" name="tranksasi_id" id="tranksasi_id" value="{{ $nextTransaksiId }}" readonly
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed">
            </div>

            <div class="mb-6">
                <div class="flex justify-between items-center mb-4">
                    <label class="block text-sm font-semibold text-gray-700">
                        Item Transaksi <span class="text-red-500">*</span>
                    </label>
                    <button type="button" onclick="addItem()" class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded-lg text-sm transition active:scale-95">
                        <i class="fas fa-plus mr-1"></i>Tambah Item
                    </button>
                </div>

                <div id="itemsContainer" class="space-y-4">
                    <!-- Item pertama -->
                    <div class="item-row border border-gray-300 rounded-lg p-4 bg-gray-50">
                        <div class="flex justify-between items-center mb-3">
                            <h4 class="font-semibold text-gray-700">Item #1</h4>
                            <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800 text-sm">
                                <i class="fas fa-trash mr-1"></i>Hapus
                            </button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Parfum</label>
                                <select name="items[0][parfum_id]" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black">
                                    <option value="">-- Pilih Parfum --</option>
                                    @foreach($parfums as $parfum)
                                        <option value="{{ $parfum->nama }}" data-harga="{{ $parfum->harga }}">
                                            {{ $parfum->nama }} - Rp {{ number_format($parfum->harga, 0, ',', '.') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah</label>
                                <input type="number" name="items[0][jumlah]" required min="1" value="1"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="flex-1 bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-lg font-semibold transition active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50">
                    <i class="fas fa-save mr-2"></i>Simpan Transaksi
                </button>
                <a href="{{ route('transaksi.index') }}" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-3 rounded-lg font-semibold text-center transition active:scale-95">
                    <i class="fas fa-times mr-2"></i>Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
let itemCount = 1;

function addItem() {
    const container = document.getElementById('itemsContainer');
    const newItem = document.createElement('div');
    newItem.className = 'item-row border border-gray-300 rounded-lg p-4 bg-gray-50';
    newItem.innerHTML = `
        <div class="flex justify-between items-center mb-3">
            <h4 class="font-semibold text-gray-700">Item #${itemCount + 1}</h4>
            <button type="button" onclick="removeItem(this)" class="text-red-600 hover:text-red-800 text-sm">
                <i class="fas fa-trash mr-1"></i>Hapus
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Parfum</label>
                <select name="items[${itemCount}][parfum_id]" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black">
                    <option value="">-- Pilih Parfum --</option>
                    @foreach($parfums as $parfum)
                        <option value="{{ $parfum->nama }}" data-harga="{{ $parfum->harga }}">
                            {{ $parfum->nama }} - Rp {{ number_format($parfum->harga, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah</label>
                <input type="number" name="items[${itemCount}][jumlah]" required min="1" value="1"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black">
            </div>
        </div>
    `;
    container.appendChild(newItem);
    itemCount++;
}

function removeItem(button) {
    const itemRow = button.closest('.item-row');
    const container = document.getElementById('itemsContainer');

    if (container.children.length > 1) {
        itemRow.remove();
    } else {
        alert('Minimal harus ada 1 item transaksi!');
    }
}
</script>
@endsection
