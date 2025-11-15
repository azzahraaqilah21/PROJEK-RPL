<footer class="bg-black text-white py-12 w-full">
    <div class="border-t border-gray-800 pt-8">
        <div class="container mx-auto max-w-7xl grid grid-cols-1 md:grid-cols-4 gap-8 px-4 md:px-6">

            <!-- Logo & Deskripsi -->
            <div class="flex flex-col items-start">
                <img src="{{ asset('image/logo.png') }}" alt="Logo Bandung Parfume" class="w-24 md:w-28 h-auto mb-4 object-contain">
                <h2 class="text-lg font-bold">Bandung <span class="font-light italic">Parfume</span></h2>
                <p class="text-sm text-gray-400 mt-2 max-w-xs">
                    Parfum premium berkualitas tinggi. Wangi tahan lama untuk segala kesempatan.
                </p>
            </div>

            <!-- Menu -->
            <div class="flex flex-col items-start">
                <h3 class="text-lg font-semibold mb-4">Menu</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="/" class="text-gray-300 hover:text-white hover:underline">Beranda</a></li>
                    <li><a href="/produk" class="text-gray-300 hover:text-white hover:underline">Products</a></li>
                    <li><a href="/about" class="text-gray-300 hover:text-white hover:underline">About</a></li>
                    <li><a href="/contact" class="text-gray-300 hover:text-white hover:underline">Contact</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="flex flex-col items-start">
                <h3 class="text-lg font-semibold mb-4">Social Media</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-300 hover:text-white hover:underline">Instagram</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white hover:underline">WhatsApp</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white hover:underline">Shopee</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white hover:underline">TikTok</a></li>
                </ul>
            </div>

            <!-- Alamat -->
            <div class="flex flex-col items-start">
                <h3 class="text-lg font-semibold mb-4">Alamat</h3>
                <div class="space-y-2 text-sm text-gray-300">
                    <p>Jl. Terandam III no.35, Koto Padang, Sumatera Barat</p>
                    <p>Jl. Asia Afrika No. 12, Bandung, Jawa Barat</p>
                    <p>Jl. Malioboro No. 7, Yogyakarta</p>
                    <p>Jl. Sudirman No. 45, Jakarta Pusat</p>
                </div>
            </div>
        </div>

        <!-- Social Icons -->
        <div class="container mx-auto max-w-7xl mt-8 flex justify-center space-x-6 text-2xl border-t border-gray-800 pt-6">
            <a href="#" class="text-gray-400 hover:text-green-400"><i class="fab fa-whatsapp"></i></a>
            <a href="#" class="text-gray-400 hover:text-pink-400"><i class="fab fa-tiktok"></i></a>
            <a href="#" class="text-gray-400 hover:text-purple-400"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-gray-400 hover:text-orange-400"><i class="fas fa-shopping-bag"></i></a>
        </div>

        <!-- Copyright -->
        <div class="text-center text-sm text-gray-500 mt-6">
            &copy; {{ date('Y') }} Bandung Parfume. All rights reserved.
        </div>
    </div>
</footer>
