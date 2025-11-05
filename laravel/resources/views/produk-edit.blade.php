<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="/larissa-jaya-2501537004-sigit-adityar/frontend/dist/output.css">
</head>

<body class="bg-gray-100 p-8">

<h1 class="text-3xl font-bold mb-4">Edit Produk</h1>

<form id="form" class="bg-white p-6 rounded shadow w-1/2">
    <label>Nama Produk</label>
    <input id="nama" class="w-full border p-2 mb-3">

    <label>Harga</label>
    <input id="harga" class="w-full border p-2 mb-3">

    <label>Stok</label>
    <input id="stok" class="w-full border p-2 mb-3">

    <button type="button"
        class="px-4 py-2 bg-blue-600 text-white rounded"
        onclick="update()">Update</button>

    <a href="/produk" class="ml-4 underline">Kembali</a>
</form>

<script>
const id = "{{ $id }}";

// ✅ Ambil data awal
fetch("http://localhost/larissa-jaya-2501537004-sigit-adityar/backend/api.php/records/products/" + id)
    .then(r => r.json())
    .then(p => {
        document.getElementById("nama").value = p.nama_produk;
        document.getElementById("harga").value = p.harga;
        document.getElementById("stok").value = p.stok;
    });

// ✅ Update data
function update() {
    fetch("http://localhost/larissa-jaya-2501537004-sigit-adityar/backend/api.php/records/products/" + id, {
        method: "PUT",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            nama_produk: document.getElementById("nama").value,
            harga: document.getElementById("harga").value,
            stok: document.getElementById("stok").value
        })
    }).then(() => {
        alert("Produk berhasil diperbarui!");
        window.location.href = "/produk";
    });
}
</script>

</body>
</html>
