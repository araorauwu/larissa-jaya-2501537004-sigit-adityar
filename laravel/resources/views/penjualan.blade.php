@extends('layouts.app')

@section('title', 'Penjualan')
@section('page-title', 'Manajemen Penjualan')

@section('content')

<h3 class="text-lg font-semibold mb-4">Penjualan</h3>

<p>Kelola transaksi penjualan sandal Larissa Jaya</p>

<div class="my-4">
    <a href="#" class="bg-green-600 text-white px-3 py-1 rounded">+ Tambah Penjualan</a>
    <a href="{{ route('penjualan.index') }}" class="bg-gray-300 px-3 py-1 rounded">Refresh</a>
</div>

<table class="w-full bg-white shadow rounded overflow-hidden">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2">#</th>
            <th class="p-2">Tanggal</th>
            <th class="p-2">Nama Pelanggan</th>
            <th class="p-2">Total</th>
            <th class="p-2">Status</th>
            <th class="p-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($penjualan as $item)
        <tr>
            <td class="p-2">{{ $loop->iteration }}</td>
            <td class="p-2">{{ $item->order_date ?? '-' }}</td>
            <td class="p-2">{{ $item->customer_name ?? '-' }}</td>
            <td class="p-2">Rp {{ number_format($item->total_amount ?? 0, 0, ',', '.') }}</td>
            <td class="p-2">{{ $item->status ?? 'Selesai' }}</td>
            <td class="p-2">
                <a href="#" class="bg-blue-500 text-white px-2 py-1 rounded">Detail</a>
                <a href="#" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center p-4 text-gray-500">Belum ada data penjualan</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
