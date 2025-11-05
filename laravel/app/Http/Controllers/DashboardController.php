<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = DB::table('products')->count();
        $totalSupplier = DB::table('suppliers')->count();
        $totalPelanggan = DB::table('customers')->count();

        return view('dashboard', compact('totalProduk', 'totalSupplier', 'totalPelanggan'));
    }
}
