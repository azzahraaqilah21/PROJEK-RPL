<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Parfum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = DetailTransaksi::with('parfum')
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $parfums = Parfum::all();
        $nextTransaksiId = DetailTransaksi::max('tranksasi_id') + 1;

        return view('transaksi.create', compact('parfums', 'nextTransaksiId'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tranksasi_id' => 'required|integer',
            'items' => 'required|array|min:1',
            'items.*.parfum_id' => 'required|exists:parfum,nama',
            'items.*.jumlah' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();
        try {
            foreach ($validated['items'] as $item) {
                $parfum = Parfum::where('nama', $item['parfum_id'])->first();

                DetailTransaksi::create([
                    'tranksasi_id' => $validated['tranksasi_id'],
                    'parfum_id' => $item['parfum_id'],
                    'jumlah' => $item['jumlah'],
                    'harga_satuan' => $parfum->harga,
                ]);
            }

            DB::commit();
            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat menyimpan transaksi.');
        }
    }

    public function destroy($id)
    {
        $transaksi = DetailTransaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }

    public function export()
    {
        $transaksis = DetailTransaksi::with('parfum')->get();

        $filename = 'transaksi_' . date('Y-m-d_His') . '.csv';

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');

        fputcsv($output, ['ID', 'ID Transaksi', 'Nama Parfum', 'Jumlah', 'Harga Satuan', 'Total']);

        foreach ($transaksis as $transaksi) {
            fputcsv($output, [
                $transaksi->id,
                $transaksi->tranksasi_id,
                $transaksi->parfum ? $transaksi->parfum->nama : '-',
                $transaksi->jumlah,
                $transaksi->harga_satuan,
                $transaksi->total_harga,
            ]);
        }

        fclose($output);
        exit();
    }
}
