@extends('layouts.app')

@section('title', 'Dashboard - Larissa Jaya')
@section('page-title', 'Dashboard Utama')

@section('content')
    <p class="mb-6 text-gray-700">
        Selamat datang di <strong>Sistem Toko Sandal Larissa Jaya</strong>.<br>
        Berikut ringkasan data toko Anda:
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-4 shadow rounded border-l-4 border-green-600">
            <h3 class="text-lg font-semibold text-gray-800">Total Produk</h3>
            <p class="text-3xl font-bold text-green-700">{{ $totalProduk }}</p>
        </div>

        <div class="bg-white p-4 shadow rounded border-l-4 border-blue-600">
            <h3 class="text-lg font-semibold text-gray-800">Total Supplier</h3>
            <p class="text-3xl font-bold text-blue-700">{{ $totalSupplier }}</p>
        </div>

        <div class="bg-white p-4 shadow rounded border-l-4 border-yellow-600">
            <h3 class="text-lg font-semibold text-gray-800">Total Pelanggan</h3>
            <p class="text-3xl font-bold text-yellow-700">{{ $totalPelanggan }}</p>
        </div>
    </div>
@endsection
