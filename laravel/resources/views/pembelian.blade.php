@extends('app')

@section('title', 'Pembelian')
@section('page-title', 'Manajemen Pembelian')

@section('content')

<h3 class="text-lg font-semibold mb-4">Data Pembelian</h3>

<div class="my-4">
    <a href="{{ route('pembelian.create') }}" class="bg-green-600 text-white px-3 py-1 rounded">+ Tambah Pembelian</a>
    <a href="{{ route('pembelian.index') }}" class="bg-gray-300 px-3 py-1 rounded">Refresh</a>
</div>

<table class="w-full bg-white shadow rounded overflow-hidden">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2">#</th>
            <th class="p-2">Tanggal</th>
            <th class="p-2">Supplier</th>
            <th class="p-2">Total</th>
            <th class="p-2">Keterangan</th>
            <th class="p-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pembelian as $item)
        <tr>
            <td class="p-2">{{ $item->id }}</td>
            <td class="p-2">{{ $item->tanggal }}</td>
            <td class="p-2">{{ $item->supplier_name }}</td>
            <td class="p-2">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
            <td class="p-2">{{ $item->keterangan }}</td>
            <td class="p-2">
                <a href="{{ route('pembelian.edit', $item->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Edit</a>
                <form action="{{ route('pembelian.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
