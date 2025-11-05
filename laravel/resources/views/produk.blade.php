@extends('layouts.app')

@section('title', 'Produk')
@section('page-title', 'Manajemen Produk')

@section('content')
    <h3 class="text-lg font-semibold mb-4">Produk</h3>

    <p class="mb-4">Kelola produk sandal Larissa Jaya</p>

    <div class="my-4 flex gap-2">
        <a href="/produk-create" class="bg-green-600 text-white px-3 py-2 rounded">+ Tambah Produk</a>
        <a href="/produk" class="bg-gray-300 text-black px-3 py-2 rounded">Refresh</a>
    </div>

    <table class="w-full bg-white shadow rounded overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2">#</th>
                <th class="p-2">Nama</th>
                <th class="p-2">Harga</th>
                <th class="p-2">Stok</th>
                <th class="p-2">Kategori</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <tr class="border-b">
                <td class="p-2">1</td>
                <td class="p-2">Sandal Jepit Pria</td>
                <td class="p-2">Rp 25.000</td>
                <td class="p-2">50</td>
                <td class="p-2">1</td>
                <td class="p-2">
                    <a href="/produk-edit/1" class="bg-blue-500 text-white px-2 py-1 rounded">Edit</a>
                    <a href="#" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
