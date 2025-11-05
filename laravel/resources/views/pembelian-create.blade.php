@extends('layouts.app')

@section('title', 'Tambah Pembelian')
@section('page-title', 'Tambah Pembelian')

@section('content')
<h3 class="text-lg font-semibold mb-4">Tambah Pembelian</h3>

<form action="{{ route('pembelian.store') }}" method="POST" class="bg-white p-4 rounded shadow w-1/2">
    @csrf
    <div class="mb-2">
        <label>Supplier:</label>
        <select name="supplier_id" class="border p-2 w-full">
            @foreach($suppliers as $s)
                <option value="{{ $s->id }}">{{ $s->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label>Tanggal:</label>
        <input type="date" name="purchase_date" class="border p-2 w-full" required>
    </div>
    <div class="mb-2">
        <label>Total:</label>
        <input type="number" name="total_amount" class="border p-2 w-full" required>
    </div>
    <div class="mb-2">
        <label>Keterangan:</label>
        <textarea name="notes" class="border p-2 w-full"></textarea>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    <a href="{{ route('pembelian.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded ml-2">Kembali</a>
</form>
@endsection
