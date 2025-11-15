<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bandung Parfum</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black min-h-screen flex flex-col">
  {{-- Navbar --}}
  @include('components.navbar')

  {{-- Hero Section --}}
  <section class="relative min-h-screen overflow-hidden flex-1">
    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
      <source src="{{ asset('image/latar.mp4') }}" type="video/mp4">
      Browser kamu tidak mendukung video.
    </video>

    <div class="absolute inset-0 bg-gray-000 bg-opacity-40"></div>

    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen text-center text-white px-4">
      <h1 class="text-4xl md:text-6xl font-bold">Bandung Parfum</h1>
      <p class="text-lg md:text-2xl mt-3">Wangi seharian</p>
      <a href="https://tokomu.com" target="_blank"
         class="mt-6 px-6 py-2 border border-white rounded-md text-white font-semibold hover:bg-white hover:text-black transition">
         Beli sekarang
      </a>
    </div>
  </section>

  {{-- Tentang Toko --}}
  <section class="bg-white text-black py-16">
    <div class="container mx-auto px-6">
      <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="space-y-6 order-2 md:order-1">
          <h2 class="text-3xl font-bold text-center md:text-left">Tentang Bandung Parfum</h2>
          <p class="text-lg text-gray-700 leading-relaxed">
            Visi kami adalah membawa keharuman Nusantara ke seluruh dunia. Dari aroma bunga sakura hingga rempah-rempah tropis, koleksi kami dirancang untuk segala kesempatan.
          </p>
          <p class="text-lg text-gray-700 leading-relaxed">
            Bergabunglah dengan ribuan pelanggan puas yang telah memilih Bandung Parfum sebagai andalan wangi mereka.
          </p>
          <div class="flex justify-center md:justify-start">
            <a href="/about" class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800 active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50 transition-all duration-200">
              Pelajari Lebih Lanjut
            </a>
          </div>
        </div>
        <div class="flex justify-center md:justify-end order-1 md:order-2">
          <img src="{{ asset('image/toko.jpg') }}" alt="Toko Bandung Parfum" class="rounded-xl shadow-lg max-w-md w-full h-auto object-cover">
        </div>
      </div>
    </div>
  </section>

  {{-- Top Sale --}}
  <section class="bg-white text-black py-16">
    <div class="container mx-auto px-6">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold">Top Sale</h2>
        <p class="mt-2 text-gray-600">Produk terlaris minggu ini</p>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        {{-- Card 1 --}}
        <div class="bg-gray-100 p-6 rounded-xl shadow hover:shadow-lg transition-shadow duration-200">
          <img src="{{ asset('image/parfum-sea-salt.jpg') }}" alt="Perfume Sea Salt" class="w-full h-48 object-cover rounded-md mb-4">
          <h3 class="font-semibold text-lg mb-2">Perfume Sea Salt</h3>
          <p class="text-gray-500 mb-4">Aroma laut segar</p>
          <p class="font-bold text-xl mb-4">Rp 123.000</p>
          <button class="w-full bg-black text-white py-2 rounded hover:bg-gray-800 transition-all duration-200">Buy Now</button>
        </div>

        {{-- Card 2 --}}
        <div class="bg-gray-100 p-6 rounded-xl shadow hover:shadow-lg transition-shadow duration-200">
          <img src="{{ asset('image/parfum-sakura.jpg') }}" alt="Perfume Sakura" class="w-full h-48 object-cover rounded-md mb-4">
          <h3 class="font-semibold text-lg mb-2">Perfume Sakura</h3>
          <p class="text-gray-500 mb-4">Aroma bunga lembut</p>
          <p class="font-bold text-xl mb-4">Rp 150.000</p>
          <button class="w-full bg-black text-white py-2 rounded hover:bg-gray-800 transition-all duration-200">Buy Now</button>
        </div>

        {{-- Card 3 --}}
        <div class="bg-gray-100 p-6 rounded-xl shadow hover:shadow-lg transition-shadow duration-200">
          <img src="{{ asset('image/parfum-elegant.jpg') }}" alt="Perfume Elegant" class="w-full h-48 object-cover rounded-md mb-4">
          <h3 class="font-semibold text-lg mb-2">Perfume Elegant</h3>
          <p class="text-gray-500 mb-4">Aroma mewah premium</p>
          <p class="font-bold text-xl mb-4">Rp 175.000</p>
          <button class="w-full bg-black text-white py-2 rounded hover:bg-gray-800 transition-all duration-200">Buy Now</button>
        </div>
      </div>
    </div>
  </section>

  {{-- More Products --}}
  <section class="bg-gray-50 text-black py-16 overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold">More Products</h2>
            <p class="mt-2 text-gray-600">Temukan parfum favoritmu lainnya</p>
            <a href="/produk" class="mt-4 inline-block bg-black text-white px-6 py-2 rounded hover:bg-gray-800 active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50 transition-all duration-200">
                View All Products
            </a>
        </div>

        <!-- Slider Container -->
        <div class="relative w-full overflow-hidden">
            <div id="product-slider" class="flex gap-8 transition-transform duration-500 ease-linear">
                <!-- Produk 1 -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-all duration-300 min-w-[300px] flex-shrink-0">
                    <img src="{{ asset('image/parfum-citrus.jpg') }}" alt="Perfume Citrus" class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="font-semibold text-lg mb-2">Perfume Citrus</h3>
                    <p class="text-gray-500 mb-4">Aroma segar jeruk</p>
                    <p class="font-bold text-xl mb-4">Rp 130.000</p>
                    <button class="w-full bg-black text-white py-2 rounded hover:bg-gray-800 active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50 transition-all duration-200">
                        Buy Now
                    </button>
                </div>

                <!-- Produk 2 -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-all duration-300 min-w-[300px] flex-shrink-0">
                    <img src="{{ asset('image/parfum-vanilla.jpg') }}" alt="Perfume Vanilla" class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="font-semibold text-lg mb-2">Perfume Vanilla</h3>
                    <p class="text-gray-500 mb-4">Aroma manis vanila</p>
                    <p class="font-bold text-xl mb-4">Rp 140.000</p>
                    <button class="w-full bg-black text-white py-2 rounded hover:bg-gray-800 active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50 transition-all duration-200">
                        Buy Now
                    </button>
                </div>

                <!-- Produk 3 -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-all duration-300 min-w-[300px] flex-shrink-0">
                    <img src="{{ asset('image/parfum-woody.jpg') }}" alt="Perfume Woody" class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="font-semibold text-lg mb-2">Perfume Woody</h3>
                    <p class="text-gray-500 mb-4">Aroma kayu hangat</p>
                    <p class="font-bold text-xl mb-4">Rp 160.000</p>
                    <button class="w-full bg-black text-white py-2 rounded hover:bg-gray-800 active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50 transition-all duration-200">
                        Buy Now
                    </button>
                </div>

                 <!-- Produk 4 (tambahan biar kelihatan muter) -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-all duration-300 min-w-[300px] flex-shrink-0">
                    <img src="{{ asset('image/parfum-woody.jpg') }}" alt="Perfume Woody" class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="font-semibold text-lg mb-2">Perfume Woody</h3>
                    <p class="text-gray-500 mb-4">Aroma kayu hangat</p>
                    <p class="font-bold text-xl mb-4">Rp 160.000</p>
                    <button class="w-full bg-black text-white py-2 rounded hover:bg-gray-800 active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50 transition-all duration-200">
                        Buy Now
                    </button>
                </div>

                <!-- Produk 5 (tambahan biar kelihatan muter) -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-all duration-300 min-w-[300px] flex-shrink-0">
                    <img src="{{ asset('image/parfum-floral.jpg') }}" alt="Perfume Floral" class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="font-semibold text-lg mb-2">Perfume Floral</h3>
                    <p class="text-gray-500 mb-4">Aroma bunga lembut</p>
                    <p class="font-bold text-xl mb-4">Rp 150.000</p>
                    <button class="w-full bg-black text-white py-2 rounded hover:bg-gray-800 active:scale-95 active:ring-2 active:ring-black active:ring-opacity-50 transition-all duration-200">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
 @include('components.footer')
<!-- Script animasi slider -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.getElementById('product-slider');
        let scrollAmount = 0;

        function slide() {
            scrollAmount += 1,5;
            if (scrollAmount >= slider.scrollWidth / 2) {
                scrollAmount = 0;
            }
            slider.style.transform = `translateX(-${scrollAmount}px)`;
            requestAnimationFrame(slide);
        }

        slide();
    });
</script>

