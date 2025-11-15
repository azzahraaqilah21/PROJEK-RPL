@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-black min-h-screen flex flex-col">
    @include('components.navbar')

    {{-- Bagian produk --}}
    <section class="bg-gray-50 text-black py-16 flex-grow">
        <div class="container mx-auto px-6">
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

