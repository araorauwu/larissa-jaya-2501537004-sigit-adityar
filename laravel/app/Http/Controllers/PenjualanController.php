<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        // Ambil data penjualan dari tabel orders, join dengan customers
        $penjualan = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->select(
                'orders.id',
                'orders.tanggal',
                'orders.total',
                'orders.status',
                'customers.nama as customer_name'
            )
            ->orderBy('orders.id', 'desc')
            ->get();

        return view('penjualan', ['penjualan' => $penjualan]);
    }
}
