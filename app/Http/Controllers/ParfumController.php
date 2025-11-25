<?php

namespace App\Http\Controllers;

use App\Models\Parfum;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ParfumController extends Controller
{
    public function index(Request $request)
    {
        $query = Parfum::with('kategori');

        // Search berdasarkan nama atau deskripsi
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        // Filter by Gender
        if ($request->has('gender') && $request->gender != '') {
            $query->where('gender', $request->gender);
        }

        // Filter by Aroma (varian_aroma)
        if ($request->has('aroma') && $request->aroma != '') {
            $query->where('varian_aroma', 'like', '%' . $request->aroma . '%');
        }

        // Filter by Kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori_id', $request->kategori);
        }

        // Filter by Harga
        if ($request->has('harga_min') && $request->harga_min != '') {
            $query->where('harga', '>=', $request->harga_min);
        }
        if ($request->has('harga_max') && $request->harga_max != '') {
            $query->where('harga', '<=', $request->harga_max);
        }

        // Sort
        $sortBy = $request->get('sort', 'nama');
        $sortOrder = $request->get('order', 'asc');
        $query->orderBy($sortBy, $sortOrder);

        $parfums = $query->get();
        $kategoris = Kategori::all();

        return view('parfum.index', compact('parfums', 'kategoris'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('parfum.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100|unique:parfum,nama',
            'varian_aroma' => 'nullable|string|max:100',
            'gender' => 'required|in:Pria,Wanita,Unisex',
            'harga' => 'required|integer|min:0',
            'stok' => 'nullable|string|max:50',
            'deskripsi' => 'nullable|string',
            'kategori_id' => 'nullable|exists:kategori,id',
        ]);

        Parfum::create($validated);

        return redirect()->route('parfum.index')->with('success', 'Parfum berhasil ditambahkan!');
    }

    public function edit($nama)
    {
        $parfum = Parfum::findOrFail($nama);
        $kategoris = Kategori::all();
        return view('parfum.edit', compact('parfum', 'kategoris'));
    }

    public function update(Request $request, $nama)
    {
        $parfum = Parfum::findOrFail($nama);

        $validated = $request->validate([
            'varian_aroma' => 'nullable|string|max:100',
            'gender' => 'required|in:Pria,Wanita,Unisex',
            'harga' => 'required|integer|min:0',
            'stok' => 'nullable|string|max:50',
            'deskripsi' => 'nullable|string',
            'kategori_id' => 'nullable|exists:kategori,id',
        ]);

        $parfum->update($validated);

        return redirect()->route('parfum.index')->with('success', 'Parfum berhasil diupdate!');
    }

    public function destroy($nama)
    {
        $parfum = Parfum::findOrFail($nama);
        $parfum->delete();

        return redirect()->route('parfum.index')->with('success', 'Parfum berhasil dihapus!');
    }

    public function export()
    {
        $parfums = Parfum::with('kategori')->get();

        $filename = 'parfum_' . date('Y-m-d_His') . '.csv';

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');

        fputcsv($output, ['Nama', 'Kategori', 'Varian Aroma', 'Gender', 'Harga', 'Stok', 'Deskripsi']);

        foreach ($parfums as $parfum) {
            fputcsv($output, [
                $parfum->nama,
                $parfum->kategori ? $parfum->kategori->nama_kategori : '-',
                $parfum->varian_aroma,
                $parfum->gender,
                $parfum->harga,
                $parfum->stok,
                $parfum->deskripsi,
            ]);
        }

        fclose($output);
        exit();
    }
}
