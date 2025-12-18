@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto py-8">

    <h1 class="text-2xl font-bold mb-6">Edit Parfum</h1>

    {{-- Validasi error --}}
    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.parfum.update', $parfum->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold mb-1">Nama Parfum</label>
            <input type="text" name="nama" value="{{ old('nama', $parfum->nama) }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Varian Aroma</label>
            <input type="text" name="varian_aroma" value="{{ old('varian_aroma', $parfum->varian_aroma) }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block font-semibold mb-1">Gender</label>
            <select name="gender" class="w-full border px-3 py-2 rounded" required>
                <option value="Pria" {{ (old('gender', $parfum->gender) == 'Pria') ? 'selected' : '' }}>Pria</option>
                <option value="Wanita" {{ (old('gender', $parfum->gender) == 'Wanita') ? 'selected' : '' }}>Wanita</option>
                <option value="Unisex" {{ (old('gender', $parfum->gender) == 'Unisex') ? 'selected' : '' }}>Unisex</option>
            </select>
        </div>

        <div>
            <label class="block font-semibold mb-1">Harga (Rp)</label>
            <input type="number" name="harga" value="{{ old('harga', $parfum->harga) }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
    <label class="block font-semibold mb-1">Tipe Parfum</label>
    <select name="tipe_parfum" class="w-full border px-3 py-2 rounded" required>
        <option value="">-- Pilih Tipe --</option>
        <option value="Eau de Parfum (EDP)" {{ old('tipe_parfum') == 'Eau de Parfum (EDP)' ? 'selected' : '' }}>Eau de Parfum (EDP)</option>
        <option value="Eau de Toilette (EDT)" {{ old('tipe_parfum') == 'Eau de Toilette (EDT)' ? 'selected' : '' }}>Eau de Toilette (EDT)</option>
        <option value="Body Mist / Spray" {{ old('tipe_parfum') == 'Body Mist / Spray' ? 'selected' : '' }}>Body Mist / Spray</option>
    </select>
</div>

        <div>
            <label class="block font-semibold mb-1">Link</label>
            <input type="url" name="link" value="{{ old('link', $parfum->link) }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block font-semibold mb-1">Foto Parfum</label>
            @if($parfum->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $parfum->foto) }}" class="w-24 h-24 object-cover rounded" alt="{{ $parfum->nama }}">
                </div>
            @endif
            <input type="file" name="foto" class="w-full border px-3 py-2 rounded">
            <small class="text-gray-500">Kosongkan jika tidak ingin mengganti foto.</small>
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800 transition">Update</button>
            <a href="{{ route('admin.parfum.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded hover:bg-gray-400">Kembali</a>
        </div>
    </form>

</div>
@endsection
