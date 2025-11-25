<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang Kami - Bandung Parfum</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black min-h-screen flex flex-col">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Hero Section --}}
    <section class="relative h-[60vh] w-full flex items-center justify-center overflow-hidden">
        <img src="{{ asset('image/toko.jpg') }}"
             class="absolute inset-0 w-full h-full object-cover opacity-60" alt="Tentang Kami">

        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-4xl md:text-6xl font-bold">Tentang Kami</h1>
            <p class="mt-4 text-lg md:text-2xl">Keharuman yang diracik dengan cinta dan kualitas terbaik</p>
        </div>
    </section>

    {{-- Konten Utama --}}
<section class="bg-white text-black py-16 flex-1">
    <div class="container mx-auto px-0 max-w-7xl">

        <!-- Judul -->
        <h2 class="text-3xl font-bold text-center mb-12">About Us</h2>

        <!-- Grid 2 Kolom -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

            <!-- Gambar -->
            <div>
                <img src="{{ asset('image/parfum.jpg') }}"
                     alt="Tentang Kami"
                     class="w-full h-[350px] object-cover rounded-lg shadow-md">
            </div>

            <!-- Teks -->
        <div style="background-color: #e1dbc5;" class="p-8 rounded-lg shadow-md">
             <h3 class="text-2xl font-semibold mb-4 text-center md:text-left text-black">
                    Our Story
             </h3>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Bandung Parfum adalah brand lokal yang menghadirkan berbagai varian parfum
                    berkualitas tinggi dengan harga yang terjangkau. Kami percaya setiap orang
                    berhak merasakan kepercayaan diri melalui aroma terbaik.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Kami meracik parfum dengan bahan berkualitas premium mulai dari aroma floral,
                    fruity, citrus, oriental hingga woody. Crafted dengan cinta oleh perfumer
                    berpengalaman, sehingga menghasilkan aroma tahan lama dan nyaman dipakai
                    sepanjang hari.
                </p>
            </div>

        </div>

    </div>
</section>

    {{-- Footer --}}
    @include('components.footer')

</body>
</html>
