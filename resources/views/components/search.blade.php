<!-- filepath: resources/views/components/search.blade.php -->
<form action="{{ route('admin.parfum.index') }}" method="GET" class="flex items-center gap-2 w-full max-w-md mx-auto mb-6">
    <input
        type="text"
        name="q"
        value="{{ request('q') }}"
        placeholder="Cari nama parfum..."
        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-amber-500 focus:outline-none"
        autocomplete="off"
    >
    <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg font-semibold transition">
        Cari
    </button>
</form>
