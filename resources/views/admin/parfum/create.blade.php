@extends('layouts.admin')

@section('content')

    @if ($errors->any())
    <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">
            <i class="fas fa-plus-circle mr-2"></i>
            Tambah Parfum Baru
        </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- PREVIEW FOTO --}}
        <div class="md:col-span-1 flex flex-col items-center">
            <div
                class="relative w-full aspect-square rounded-xl border-2 border-dashed
                       flex items-center justify-center bg-gray-50 overflow-hidden">

                <img id="previewImage"
                     src=""
                     class="hidden w-full h-full object-cover opacity-0 transition-opacity duration-500">

                <span id="previewText" class="text-gray-400 text-sm">
                    Preview Foto
                </span>

                <button type="button"
                        onclick="removeFoto()"
                        id="removeBtn"
                        class="hidden absolute top-2 right-2 bg-red-500 text-white
                               text-xs px-3 py-1 rounded shadow hover:bg-red-600">
                    Hapus
                </button>
            </div>

            <p class="text-xs text-gray-500 mt-2 text-center">
                JPG / JPEG / PNG • Maks 2MB
            </p>
        </div>

        {{-- FORM --}}
        <div class="md:col-span-2">
            <form action="{{ route('admin.parfum.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-5">
                @csrf

                {{-- Nama --}}
                <div>
                    <label class="block font-semibold mb-1">
                        Nama Parfum <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama" required
                           value="{{ old('nama') }}"
                           class="w-full px-4 py-3 border rounded-lg">
                </div>

                {{-- Gender (Kategori) --}}
                <div>
                    <label class="block font-semibold mb-1">
                        Gender <span class="text-red-500">*</span>
                    </label>
                    <select name="kategori_id" required
                            class="w-full px-4 py-3 border rounded-lg">
                        <option value="">-- Pilih Gender --</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Harga --}}
                <div>
                    <label class="block font-semibold mb-1">
                        Harga <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="harga" min="0" required
                           value="{{ old('harga') }}"
                           class="w-full px-4 py-3 border rounded-lg">
                </div>

                {{-- Stok --}}
                <div>
                    <label class="block font-semibold mb-1">
                        Stok <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="stok" min="0" required
                           value="{{ old('stok') }}"
                           class="w-full px-4 py-3 border rounded-lg">
                </div>

                {{-- Link --}}
                <div>
                    <label class="block font-semibold mb-1">
                        Link
                    </label>
                    <input type="url" name="link"
                           value="{{ old('link') }}"
                           class="w-full px-4 py-3 border rounded-lg">
                </div>

                {{-- Foto --}}
                <div>
                    <label class="block font-semibold mb-1">
                        Foto Parfum
                    </label>
                    <input type="file"
                           name="foto"
                           id="fotoInput"
                           accept=".jpg,.jpeg,.png"
                           onchange="previewFoto(event)"
                           class="w-full px-4 py-3 border rounded-lg">
                </div>

                {{-- Tombol --}}
                <div class="flex gap-3 pt-4">
                    <button type="submit"
                            class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800">
                        Simpan
                    </button>

                    <a href="{{ route('admin.parfum.index') }}"
                       class="bg-gray-300 px-6 py-2 rounded-lg hover:bg-gray-400">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- SCRIPT PREVIEW --}}
<script>
function previewFoto(event) {
    const img = document.getElementById('previewImage');
    const text = document.getElementById('previewText');
    const btn = document.getElementById('removeBtn');

    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = e => {
        img.src = e.target.result;
        img.classList.remove('hidden');
        setTimeout(() => img.classList.add('opacity-100'), 50);
        text.classList.add('hidden');
        btn.classList.remove('hidden');
    };
    reader.readAsDataURL(file);
}

function removeFoto() {
    document.getElementById('fotoInput').value = '';
    document.getElementById('previewImage').classList.add('hidden');
    document.getElementById('previewImage').classList.remove('opacity-100');
    document.getElementById('previewText').classList.remove('hidden');
    document.getElementById('removeBtn').classList.add('hidden');
}
</script>

@endsection
