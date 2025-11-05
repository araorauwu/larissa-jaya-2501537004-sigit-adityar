<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi Penjualan</title>
    <link rel="stylesheet" href="/larissa-jaya-2501537004-sigit-adityar/frontend/dist/output.css">
</head>
<body class="bg-gray-100 p-8">

<h1 class="text-3xl font-bold mb-4">Tambah Transaksi Penjualan</h1>

<form class="bg-white p-6 rounded shadow w-1/2">

    <label>Customer ID</label>
    <input id="customer" class="w-full border p-2 mb-3">

    <label>Tanggal</label>
    <input type="date" id="tanggal" class="w-full border p-2 mb-3">

    <label>Status</label>
    <select id="status" class="w-full border p-2 mb-3">
        <option>pending</option>
        <option>selesai</option>
    </select>

    <h3 class="text-xl mt-4 mb-2 font-bold">Detail Barang</h3>

    <div id="detail-list"></div>

    <button type="button" onclick="addDetail()" 
            class="px-3 py-1 bg-blue-600 text-white rounded mb-4">
        + Tambah Barang
    </button>

    <button type="button" onclick="simpan()" 
            class="px-4 py-2 bg-green-600 text-white rounded">
        Simpan Transaksi
    </button>

    <a href="/penjualan" class="ml-4 underline">Kembali</a>
</form>

<script>
let details = [];

function addDetail() {
    let index = details.length;
    details.push({});

    document.getElementById("detail-list").innerHTML += `
        <div class="p-3 border mb-2 rounded">
            <label>Product ID</label>
            <input id="p${index}" class="w-full border p-2 mb-2">

            <label>Qty</label>
            <input id="q${index}" class="w-full border p-2 mb-2">

            <label>Harga</label>
            <input id="h${index}" class="w-full border p-2 mb-2">
        </div>
    `;
}

let API = "http://localhost/larissa-jaya-2501537004-sigit-adityar/backend/api.php/";

function simpan() {

    let tanggal = document.getElementById("tanggal").value;
    let customer = document.getElementById("customer").value;
    let status = document.getElementById("status").value;

    fetch(API + "records/orders", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({
            customer_id: customer,
            tanggal: tanggal,
            total: 0,
            status: status
        })
    })
    .then(r => r.json())
    .then(order => {
        let order_id = order.id;

        let total = 0;

        details.forEach((_, i) => {
            let product = document.getElementById("p"+i).value;
            let qty = parseInt(document.getElementById("q"+i).value);
            let harga = parseFloat(document.getElementById("h"+i).value);
            let subtotal = qty * harga;

            total += subtotal;

            fetch(API + "records/order_details", {
                method: "POST",
                headers: {"Content-Type": "application/json"},
                body: JSON.stringify({
                    order_id: order_id,
                    product_id: product,
                    qty: qty,
                    harga: harga,
                    subtotal: subtotal
                })
            });
        });

        fetch(API + "records/orders/" + order_id, {
            method: "PUT",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({ total: total })
        }).then(() => {
            alert("Transaksi berhasil dibuat!");
            window.location.href = "/penjualan";
        });
    });
}
</script>

</body>
</html>
