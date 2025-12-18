@extends('layouts.admin')
@section('content')
<div class="container mx-auto py-8">

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Data Parfum</h1>
        <a href="{{ route('admin.parfum.create') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition">
            Tambah Parfum
        </a>
    </div>

<!-- Search & Filter Section -->
<div class="bg-white rounded-xl shadow-lg p-6 mb-6 border border-gray-200">
    <form action="{{ route('parfum.index') }}" method="GET" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Search -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-search mr-1"></i>Cari Parfum
                </label>
                <input type="text" name="search" value="{{ request('search') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent"
                    placeholder="Nama atau deskripsi...">
            </div>

            <!-- Filter Gender -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-venus-mars mr-1"></i>Gender
                </label>
                <select name="gender" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent">
                    <option value="">Semua Gender</option>
                    <option value="Pria" {{ request('gender') == 'Pria' ? 'selected' : '' }}>Pria</option>
                    <option value="Wanita" {{ request('gender') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                    <option value="Unisex" {{ request('gender') == 'Unisex' ? 'selected' : '' }}>Unisex</option>
                </select>
            </div>

            <!-- Filter Aroma -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-leaf mr-1"></i>Aroma
                </label>
                <input type="text" name="aroma" value="{{ request('aroma') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent"
                    placeholder="Contoh: Floral, Woody...">
            </div>

            <!-- Filter Kategori -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-tag mr-1"></i>Kategori
                </label>
                <select name="kategori" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Harga Min -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-dollar-sign mr-1"></i>Harga Minimum
                </label>
                <input type="number" name="harga_min" value="{{ request('harga_min') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent"
                    placeholder="0">
            </div>

            <!-- Filter Harga Max -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-dollar-sign mr-1"></i>Harga Maximum
                </label>
                <input type="number" name="harga_max" value="{{ request('harga_max') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent"
                    placeholder="999999999">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Sort By -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-sort mr-1"></i>Urutkan Berdasarkan
                </label>
                <select name="sort" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent">
                    <option value="nama" {{ request('sort') == 'nama' ? 'selected' : '' }}>Nama</option>
                    <option value="harga" {{ request('sort') == 'harga' ? 'selected' : '' }}>Harga</option>
                    <option value="stok" {{ request('sort') == 'stok' ? 'selected' : '' }}>Stok</option>
                    <option value="gender" {{ request('sort') == 'gender' ? 'selected' : '' }}>Gender</option>
                </select>
            </div>

            <!-- Order -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-arrows-alt-v mr-1"></i>Urutan
                </label>
                <select name="order" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent">
                    <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>A-Z / Rendah-Tinggi</option>
                    <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Z-A / Tinggi-Rendah</option>
                </select>
            </div>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-black hover:bg-gray-800 text-white px-6 py-2 rounded-lg transition active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50">
                <i class="fas fa-filter mr-2"></i>Terapkan Filter
            </button>
            <a href="{{ route('parfum.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg transition active:scale-95">
                <i class="fas fa-redo mr-2"></i>Reset
            </a>
        </div>
    </form>
</div>

@if($parfums->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($parfums as $parfum)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition border border-gray-200">
                <div class="bg-gradient-to-r from-gray-800 to-black h-32 flex items-center justify-center">
                    <i class="fas fa-spray-can text-white text-5xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $parfum->nama }}</h3>

                    <div class="flex gap-2 mb-3 flex-wrap">
                        @if($parfum->kategori)
                            <span class="inline-block bg-gray-200 text-gray-900 text-xs px-3 py-1 rounded-full">
                                <i class="fas fa-tag mr-1"></i>{{ $parfum->kategori->nama_kategori }}
                            </span>
                        @endif

                        <span class="inline-block bg-black text-white text-xs px-3 py-1 rounded-full">
                            <i class="fas fa-{{ $parfum->gender == 'Pria' ? 'mars' : ($parfum->gender == 'Wanita' ? 'venus' : 'venus-mars') }} mr-1"></i>{{ $parfum->gender }}
                        </span>
                    </div>

                    <div class="space-y-2 mb-4">
                        @if($parfum->varian_aroma)
                            <p class="text-sm text-gray-600">
                                <i class="fas fa-leaf text-gray-600 mr-2"></i>
                                <strong>Aroma:</strong> {{ $parfum->varian_aroma }}
                            </p>
                        @endif

                        <p class="text-sm text-gray-600">
                            <i class="fas fa-dollar-sign text-gray-600 mr-2"></i>
                            <strong>Harga:</strong> Rp {{ number_format($parfum->harga, 0, ',', '.') }}
                        </p>

                        @if($parfum->stok)
                            <p class="text-sm text-gray-600">
                                <i class="fas fa-boxes text-gray-600 mr-2"></i>
                                <strong>Stok:</strong> {{ $parfum->stok }}
                            </p>
                        @endif
                    </div>

                    @if($parfum->deskripsi)
                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $parfum->deskripsi }}</p>
                    @endif
                </td>
                <td class="py-2 px-4 border space-x-2">
                    <a href="{{ route('admin.parfum.edit', $parfum->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
                    <form action="{{ route('admin.parfum.destroy', $parfum->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="py-4 text-center text-gray-500">Data parfum tidak tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
