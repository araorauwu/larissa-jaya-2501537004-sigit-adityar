<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="/larissa-jaya-2501537004-sigit-adityar/frontend/dist/output.css">
</head>

<body class="bg-gray-100 p-8">

<h1 class="text-3xl font-bold mb-4">Tambah Produk</h1>

<form id="form" class="bg-white p-6 rounded shadow w-1/2">

    <label>Nama Produk</label>
    <input id="nama" class="w-full border p-2 mb-3">

    <label>Harga</label>
    <input id="harga" class="w-full border p-2 mb-3">

    <label>Stok</label>
    <input id="stok" class="w-full border p-2 mb-3">

    <button type="button"
        class="px-4 py-2 bg-green-600 text-white rounded"
        onclick="simpan()">Simpan</button>

    <a href="/produk" class="ml-4 underline">Kembali</a>
</form>

<script>
function simpan() {
    fetch("http://localhost/larissa-jaya-2501537004-sigit-adityar/backend/api.php/records/products", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            nama_produk: document.getElementById("nama").value,
            harga: document.getElementById("harga").value,
            stok: document.getElementById("stok").value
        })
    }).then(() => {
        alert("Produk berhasil ditambahkan!");
        window.location.href = "/produk";
    });
}
</script>

</body>
</html>
