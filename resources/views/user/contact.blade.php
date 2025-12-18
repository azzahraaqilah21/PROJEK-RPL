@extends('layouts.app')

@section('content')

    <main class="bg-black min-h-fit flex flex-col">
<section class="bg-white text-black py-8 overflow-hidden">
    <div class="container mx-auto px-6 text-center animate-fadeIn">
        <!-- Judul -->
        <h1 class="text-4xl font-bold mb-4 animate-slideDown">Kontak</h1>
        <h2 class="text-2xl font-semibold mb-2 animate-slideDown delay-100">Butuh Bantuan?</h2>
        <p class="text-gray-600 mb-12 animate-slideDown delay-200">
            Dengan senang hati tim kami akan membantu menyelesaikan kendala Anda.
            Hubungi kami melalui informasi kontak di bawah ini.
        </p>

        <!-- Info Kontak -->
        <div class="grid md:grid-cols-3 gap-8 mb-12">
            <div class="flex flex-col items-center transform hover:scale-105 transition duration-300 animate-fadeIn delay-100">
                <div class="text-5xl mb-4">🏠</div>
                <h3 class="font-semibold text-xl mb-2">Visit Us</h3>
                <p class="text-gray-600 max-w-xs">
                    Jl. Terandam III no.35, Koto Padang, Sumatera Barat, Indonesia 25121
                </p>
            </div>

            <div class="flex flex-col items-center border-l border-r border-gray-300 px-4 transform hover:scale-105 transition duration-300 animate-fadeIn delay-200">
                <div class="text-5xl mb-4">✉️</div>
                <h3 class="font-semibold text-xl mb-2">Email Us</h3>
                <p class="text-gray-600 max-w-xs">
                    Hubungi kami melalui email<br>
                    <span class="font-medium">iniemail@123.gmail</span>
                </p>
            </div>

            <div class="flex flex-col items-center transform hover:scale-105 transition duration-300 animate-fadeIn delay-300">
                <div class="text-5xl mb-4">📞</div>
                <h3 class="font-semibold text-xl mb-2">Call Us</h3>
                <p class="text-gray-600 max-w-xs">
                    Hubungi kami melalui kontak<br>
                    <span class="font-medium">+62 812 3456 7890</span>
                </p>
            </div>
        </div>

        <!-- Google Maps -->
        <div class="w-full flex justify-center animate-fadeIn delay-400">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.274070265073!2d100.36517697357386!3d-0.9493768353232449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b94a8cb5d1a9%3A0xf904d2f50aee51b4!2sPadang%2C%20Kota%20Padang%2C%20Sumatera%20Barat!5e0!3m2!1sen!2sid!4v1697363424680!5m2!1sen!2sid"
                width="100%"
                height="400"
                style="border:2px solid #2563eb; border-radius: 10px;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>
</main>

{{-- Animasi custom --}}
<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-15px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fadeIn { animation: fadeIn 0.8s ease-out forwards; }
.animate-slideDown { animation: slideDown 0.8s ease-out forwards; }

.delay-100 { animation-delay: 0.1s; }
.delay-200 { animation-delay: 0.2s; }
.delay-300 { animation-delay: 0.3s; }
.delay-400 { animation-delay: 0.4s; }
</style>

@endsection


