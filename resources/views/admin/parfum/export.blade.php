{{-- filepath: resources/views/admin/parfum/export.blade.php --}}
@extends('layouts.app')

@section('title', 'Export Data Parfum')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Export Data Parfum</h1>

    @if(isset($parfums) && count($parfums) > 0)
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">No</th>
                    <th class="px-4 py-2 border-b">Nama Parfum</th>
                    <th class="px-4 py-2 border-b">Kategori</th>
                    <th class="px-4 py-2 border-b">Harga</th>
                    <th class="px-4 py-2 border-b">Aroma</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parfums as $i => $parfum)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $i+1 }}</td>
                    <td class="px-4 py-2 border-b">{{ $parfum->nama }}</td>
                    <td class="px-4 py-2 border-b">{{ $parfum->kategori->nama ?? '-' }}</td>
                    <td class="px-4 py-2 border-b">Rp{{ number_format($parfum->harga,0,',','.') }}</td>
                    <td class="px-4 py-2 border-b">{{ $parfum->aroma ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="text-center text-gray-500 py-10">
            Tidak ada data parfum untuk diexport.
        </div>
    @endif

    <div class="mt-8">
        <a href="{{ route('admin.parfum.export') }}" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded font-semibold">Export CSV</a>
    </div>
</div>
@endsection
