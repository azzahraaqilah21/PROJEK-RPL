<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandung Perfume</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-black min-h-screen flex flex-col">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Konten halaman spesifik --}}
    <main class="flex-grow py-12">
        @yield('content')
    </main>

</body>
</html>
