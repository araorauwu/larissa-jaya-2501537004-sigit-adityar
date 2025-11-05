<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function index()
    {
        // Ambil data pembelian + nama supplier
        $pembelian = DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->select(
                'purchases.id',
                'purchases.tanggal',
                'purchases.total',
                'purchases.keterangan',
                'suppliers.nama_supplier as supplier_name'
            )
            ->orderByDesc('purchases.id')
            ->get();

        return view('pembelian', ['pembelian' => $pembelian]);
    }

    public function create()
    {
        $suppliers = DB::table('suppliers')->get();
        return view('pembelian_create', ['suppliers' => $suppliers]);
    }

    public function store(Request $request)
    {
        DB::table('purchases')->insert([
            'supplier_id' => $request->supplier_id,
            'tanggal' => $request->tanggal,
            'total' => $request->total,
            'keterangan' => $request->keterangan,
            'created_at' => now(),
        ]);

        return redirect('/pembelian')->with('success', 'Pembelian berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pembelian = DB::table('purchases')->where('id', $id)->first();
        $suppliers = DB::table('suppliers')->get();

        return view('pembelian_edit', compact('pembelian', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        DB::table('purchases')->where('id', $id)->update([
            'supplier_id' => $request->supplier_id,
            'tanggal' => $request->tanggal,
            'total' => $request->total,
            'keterangan' => $request->keterangan,
            'updated_at' => now(),
        ]);

        return redirect('/pembelian')->with('success', 'Data pembelian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('purchases')->where('id', $id)->delete();
        return redirect('/pembelian')->with('success', 'Data pembelian berhasil dihapus.');
    }
}
