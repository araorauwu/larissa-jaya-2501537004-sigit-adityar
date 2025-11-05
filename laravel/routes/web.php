<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Models\Category;

// ========================
// PEMBELIAN
// ========================
Route::resource('pembelian', PembelianController::class);

//pelanggan
Route::get('/pelanggan', fn() => view('pelanggan'))->name('pelanggan.index');

//supplier
Route::get('/supplier', fn() => view('supplier'))->name('supplier.index');


// ========================
// DASHBOARD
// ========================
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.page');

// ========================
// PRODUK (sementara pakai view statis)
// ========================
Route::get('/produk', fn() => view('produk'))->name('produk.index');
Route::get('/produk-create', fn() => view('produk-create'))->name('produk.create');
Route::get('/produk-edit/{id}', fn($id) => view('produk-edit', ['id' => $id]))->name('produk.edit');

// ========================
// PENJUALAN
// ========================
Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');

// ========================
// PELANGGAN, SUPPLIER
// ========================
Route::get('/pelanggan', fn() => view('pelanggan'))->name('pelanggan.index');
Route::get('/supplier', fn() => view('supplier'))->name('supplier.index');

// ========================
// KATEGORI (ambil dari database)
// ========================
Route::get('/kategori', function () {
    $kategori = Category::all(); // ambil semua data dari tabel categories
    return view('kategori', compact('kategori')); // kirim ke view
})->name('kategori.index');
