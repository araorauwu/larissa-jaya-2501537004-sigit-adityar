@extends('layouts.app')

@section('title', 'Edit Pembelian')
@section('page-title', 'Edit Pembelian')

@section('content')
<h3 class="text-lg font-semibold mb-4">Edit Pembelian</h3>

<form action="{{ route('pembelian.update', $item->id) }}" method="POST" class="bg-white p-4 rounded shadow w-1/2">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label>Supplier:</label>
        <select name="supplier_id" class="border p-2 w-full">
            @foreach($suppliers as $s)
                <option value="{{ $s->id }}" {{ $item->supplier_id == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label>Tanggal:</label>
        <input type="date" name="purchase_date" value="{{ $item->purchase_date }}" class="border p-2 w-full" required>
    </div>
    <div class="mb-2">
        <label>Total:</label>
        <input type="number" name="total_amount" value="{{ $item->total_amount }}" class="border p-2 w-full" required>
    </div>
    <div class="mb-2">
        <label>Keterangan:</label>
        <textarea name="notes" class="border p-2 w-full">{{ $item->notes }}</textarea>
    </div>
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
    <a href="{{ route('pembelian.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded ml-2">Kembali</a>
</form>
@endsection
