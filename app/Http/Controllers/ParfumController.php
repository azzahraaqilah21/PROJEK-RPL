<?php

namespace App\Http\Controllers;

use App\Models\Parfum;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ParfumController extends Controller
{
    public function index()
    {
        $parfums = Parfum::with('kategori')->latest()->get();
        return view('admin.parfum.index', compact('parfums'));
    }

    public function create()
    {
        $kategoris = Kategori::whereIn('nama_kategori', [
            'Pria',
            'Wanita',
            'Unisex'
        ])->get();

        return view('admin.parfum.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|unique:parfum,nama',
            'varian_aroma' => 'nullable|string|max:100',

            // 🔥 GENDER → KATEGORI
            'kategori_id' => [
                'required',
                Rule::exists('kategori', 'id')
                    ->whereIn('nama_kategori', ['Pria', 'Wanita', 'Unisex'])
            ],

            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'link' => 'nullable|url',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('parfum', 'public');
        }

        Parfum::create($data);

        return redirect()->route('admin.parfum.index')
            ->with('success', 'Parfum berhasil ditambahkan');
    }

    public function edit(Parfum $parfum)
    {
        $kategoris = Kategori::whereIn('nama_kategori', [
            'Pria',
            'Wanita',
            'Unisex'
        ])->get();

        return view('admin.parfum.edit', compact('parfum', 'kategoris'));
    }

    public function update(Request $request, Parfum $parfum)
    {
        $data = $request->validate([
            'varian_aroma' => 'nullable|string|max:100',

            'kategori_id' => [
                'required',
                Rule::exists('kategori', 'id')
                    ->whereIn('nama_kategori', ['Pria', 'Wanita', 'Unisex'])
            ],

            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'link' => 'nullable|url',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($parfum->foto) {
                Storage::disk('public')->delete($parfum->foto);
            }
            $data['foto'] = $request->file('foto')->store('parfum', 'public');
        }

        $parfum->update($data);

        return redirect()->route('admin.parfum.index')
            ->with('success', 'Parfum berhasil diperbarui');
    }

    public function destroy(Parfum $parfum)
    {
        if ($parfum->foto) {
            Storage::disk('public')->delete($parfum->foto);
        }

        $parfum->delete();

        return back()->with('success', 'Parfum berhasil dihapus');
    }
}

