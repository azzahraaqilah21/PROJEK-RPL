<header class="bg-neutral-900 text-white fixed top-0 left-0 w-full z-50 shadow-md" x-data="{ open: false, search: false }">
  <div class="container mx-auto flex justify-between items-center px-6 py-4">

    <!-- Logo -->
    <div class="flex items-center space-x-2">
      <img src="{{ asset('image/logo.png') }}" alt="Bandung Perfume" class="h-8 w-8">
      <div class="flex flex-col leading-tight">
        <span class="text-white font-bold text-lg">Bandung</span>
        <span class="text-white italic text-sm">Perfume</span>
      </div>
    </div>

 <!-- Menu Desktop + Login -->
    <div class="hidden md:flex items-center space-x-4 ml-auto">
<!-- Tombol search --> <button @click="search = !search" class="hover:text-gray-300 transition-transform duration-200 transform hover:scale-110">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
    </svg> </button>
      <!-- Menu utama -->
      <a href="/" class="hover:text-gray-300 font-medium">Beranda</a>
      <a href="/produk" class="hover:text-gray-300 font-medium">Produk</a>
      <a href="/contact" class="hover:text-gray-300 font-medium">Kontak</a>
      <a href="/about" class="hover:text-gray-300 font-medium">Tentang Kami</a>

      <!-- Tombol Login -->
      <a href="/admin/login"
         class="bg-neutral-700 hover:bg-neutral-600 px-3 py-1 rounded-lg font-medium transition-transform duration-200">
         Login
      </a>
    </div>

    <!-- Hamburger (Mobile) -->
    <button @click="open = !open" class="md:hidden focus:outline-none ml-auto">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none"
           viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
           class="w-7 h-7">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>


  <!-- Mobile Menu -->
  <div x-show="open" x-transition class="md:hidden bg-neutral-800 px-6 py-4 space-y-2">
    <a href="/" class="block w-full text-left hover:text-gray-300">Beranda</a>
    <a href="/produk" class="block w-full text-left hover:text-gray-300">Produk</a>
    <a href="/contact" class="block w-full text-left hover:text-gray-300">Kontak</a>
    <a href="/about" class="block w-full text-left hover:text-gray-300">Tentang Kami</a>
    <a href="/admin/login"
       class="block w-full text-left bg-neutral-700 hover:bg-neutral-600 px-3 py-2 rounded-lg font-medium transition-transform duration-200"
       @click="loginAnim = true; setTimeout(() => loginAnim = false, 300)"
       :class="loginAnim ? 'scale-105' : ''">
       Login
    </a>
    <!-- Mobile search toggle -->
    <button @click="search = !search" class="block w-full text-left hover:text-gray-300 mt-2">
      Cari Parfum
    </button>
  </div>
</header>
