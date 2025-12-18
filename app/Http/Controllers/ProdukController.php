<?php

namespace App\Http\Controllers;

use App\Models\Parfum;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Parfum::with('kategori');

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('aroma')) {
            $query->where('varian_aroma', 'like', "%{$request->aroma}%");
        }

        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        if ($request->filled('harga_min')) {
            $query->where('harga', '>=', $request->harga_min);
        }

        if ($request->filled('harga_max')) {
            $query->where('harga', '<=', $request->harga_max);
        }

        $allowedSort = ['nama', 'harga', 'stok', 'gender'];
        $sort = in_array($request->sort, $allowedSort) ? $request->sort : 'nama';
        $order = $request->order === 'desc' ? 'desc' : 'asc';

        $parfums = $query->orderBy($sort, $order)->get();
        $kategoris = Kategori::all();

        return view('user.produk.index', compact('parfums', 'kategoris'));
    }
}
