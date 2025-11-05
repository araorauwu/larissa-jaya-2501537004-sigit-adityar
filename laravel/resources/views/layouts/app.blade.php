<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- ✅ Path CSS yang benar -->
    <link rel="stylesheet" href="{{ asset('css/output.css?v=2') }}">


</head>

<body class="bg-gray-100 text-gray-900">

    <header class="bg-green-700 text-white p-4 shadow">
        <h1 class="text-2xl font-bold">Larissa Jaya</h1>
        <p class="text-sm">Sistem Toko Sandal</p>
    </header>

    <nav class="bg-white shadow p-3 border-b flex gap-4 text-sm font-medium">
        <a href="/dashboard" class="hover:text-green-600">Dashboard</a>
        <a href="/produk" class="hover:text-green-600">Produk</a>
        <a href="/kategori" class="hover:text-green-600">Kategori</a>
        <a href="/pembelian" class="hover:text-green-600">Pembelian</a>
        <a href="/penjualan" class="hover:text-green-600">Penjualan</a>
        <a href="/pelanggan" class="hover:text-green-600">Pelanggan</a>
        <a href="/supplier" class="hover:text-green-600">Supplier</a>
    </nav>

    <main class="p-6">
        <h2 class="text-xl font-semibold mb-4">@yield('page-title')</h2>
        @yield('content')
    </main>

</body>
</html>
