<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar Responsive</title>
  @vite('resources/css/app.css')
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-black text-white">
  <!-- Navbar -->
  <header class="bg-neutral-900 text-white fixed top-0 left-0 w-full z-50 shadow-md" x-data="{ open: false }">
    <div class="container mx-auto flex justify-between items-center px-6 py-4">
      <!-- Logo -->
<div class="flex items-center space-x-2">
  <!-- Gambar logo -->
  <img src="{{ asset('image/logo.png') }}" alt="Bandung Perfume" class="h-8 w-8">

  <!-- Teks -->
  <div class="flex flex-col leading-tight">
    <span class="text-white font-bold text-lg">Bandung</span>
    <span class="text-white italic text-sm">Perfume</span>
  </div>
</div>
<div class="flex items-center space-x-2">

      <!-- Menu Desktop -->
      <nav class="hidden md:flex items-center space-x-6">
        <button class="hover:text-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none"
               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
               class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
          </svg>
        </button>
        <a href="/" class="font-semibold hover:text-gray-300">Beranda</a>
        <a href="/produk" class="hover:text-gray-300">Produk</a>
        <a href="/contact" class="hover:text-gray-300">Kontak</a>
        <a href="/about" class="hover:text-gray-300">Tentang Kami</a>
      </nav>

      <!-- Hamburger Button (Mobile) -->
      <button @click="open = !open" class="md:hidden focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
             class="w-7 h-7">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <!-- Dropdown Menu (Mobile) -->
    <div x-show="open" class="md:hidden bg-neutral-800 px-6 py-4 space-y-2">
      <a href="/" class="block hover:text-gray-300">Beranda</a>
      <a href="/produk" class="block hover:text-gray-300">Produk</a>
      <a href="/contact" class="block hover:text-gray-300">Kontak</a>
      <a href="/about" class="block hover:text-gray-300">Tentang Kami</a>
    </div>
  </header>

</body>
</html>

