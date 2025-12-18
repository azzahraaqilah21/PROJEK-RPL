@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-black min-h-screen flex flex-col">
    @include('components.navbar')

        <!-- Filter Panel -->
    <div
        x-show="open"
        @click.outside="open = false"
        x-transition
        class="absolute right-0 mt-3 w-80 bg-white border border-gray-200 rounded-xl shadow-lg p-6 z-50"
    >
        <form action="{{ route('parfum.index') }}" method="GET" class="space-y-4">

            <!-- Sort By -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-sort mr-1"></i>Urutkan Berdasarkan
                </label>
                <select
                    name="sort"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black"
                >
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
                <select
                    name="order"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black"
                >
                    <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>
                        A-Z / Rendah-Tinggi
                    </option>
                    <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>
                        Z-A / Tinggi-Rendah
                    </option>
                </select>
            </div>

            <!-- Action Button -->
            <div class="flex gap-2 pt-2">
                <button
                    type="submit"
                    class="bg-black text-white px-5 py-2 rounded-lg hover:bg-gray-800 transition w-full"
                >
                    <i class="fas fa-check mr-2"></i>Terapkan
                </button>

                <a
                    href="{{ route('parfum.index') }}"
                    class="bg-gray-300 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-400 transition w-full text-center"
                >
                    <i class="fas fa-redo mr-2"></i>Reset
                </a>
            </div>

        </form>
    </div>
</div>

@else
    <div class="bg-white rounded-xl shadow-lg p-12 text-center border border-gray-200">
        <i class="fas fa-search text-gray-300 text-6xl mb-4"></i>
        <h3 class="t\
        ext-xl font-semibold text-gray-600 mb-2">Tidak Ada Parfum Ditemukan</h3>
        <p class="text-gray-500 mb-6">Coba ubah filter pencarian Anda</p>
        <a href="{{ route('admin.parfum.index') }}" class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-3 rounded-lg transition active:scale-95">
            <i class="fas fa-redo mr-2"></i>Reset Filter
        </a>
    </div>
@endif
    {{-- Bagian produk --}}
    <section class="bg-gray-50 text-black py-16 flex-grow">
        <div class="container mx-auto px-6 mt-24">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">More Products</h2>
                <p class="mt-2 text-gray-600">Temukan parfum favoritmu lainnya</p>
                <a href="/produk" class="mt-4 inline-block bg-black text-white px-6 py-2 rounded hover:bg-gray-800 active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50 transition-all duration-200">
                    View All Products
                </a>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-shadow duration-200">
                    <img src="{{ asset('image/parfum-citrus.jpg') }}" alt="Perfume Citrus" class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="font-semibold text-lg mb-2">Perfume Citrus</h3>
                    <p class="text-gray-500 mb-4">Aroma segar jeruk</p>
                    <p class="font-bold text-xl mb-4">Rp 130.000</p>
                    <button class="w-full bg-black text-white py-2 rounded hover:bg-gray-800 active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50 transition-all duration-200">
                        Buy Now
                    </button>
                </div>

                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-shadow duration-200">
                    <img src="{{ asset('image/parfum-vanilla.jpg') }}" alt="Perfume Vanilla" class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="font-semibold text-lg mb-2">Perfume Vanilla</h3>
                    <p class="text-gray-500 mb-4">Aroma manis vanila</p>
                    <p class="font-bold text-xl mb-4">Rp 140.000</p>
                    <button class="w-full bg-black text-white py-2 rounded hover:bg-gray-800 active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50 transition-all duration-200">
                        Buy Now
                    </button>
                </div>

                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-shadow duration-200">
                    <img src="{{ asset('image/parfum-woody.jpg') }}" alt="Perfume Woody" class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="font-semibold text-lg mb-2">Perfume Woody</h3>
                    <p class="text-gray-500 mb-4">Aroma kayu hangat</p>
                    <p class="font-bold text-xl mb-4">Rp 160.000</p>
                    <button class="w-full bg-black text-white py-2 rounded hover:bg-gray-800 active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50 transition-all duration-200">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')
</body>
</html>

