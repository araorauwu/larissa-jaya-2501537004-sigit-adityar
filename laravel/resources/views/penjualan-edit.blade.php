<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaksi Penjualan</title>
    <link rel="stylesheet" href="/larissa-jaya-2501537004-sigit-adityar/frontend/dist/output.css">
</head>
<body class="bg-gray-100 p-8">

<h1 class="text-3xl font-bold mb-4">Edit Transaksi Penjualan</h1>

<a href="/penjualan" class="underline mb-4 block">← Kembali</a>

<div id="loading" class="text-lg">Loading data...</div>

<form id="form-edit" class="bg-white p-6 rounded shadow w-1/2 hidden">

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

    <button type="button" onclick="simpanEdit()" 
            class="px-4 py-2 bg-green-600 text-white rounded">
        Simpan Perubahan
    </button>
</form>

<script>
let API = "http://localhost/larissa-jaya-2501537004-sigit-adityar/backend/api.php/";
let orderId = "{{ $id }}";
let details = [];

function loadData() {

    // ✅ Load header transaksi
    fetch(API + "records/orders/" + orderId)
        .then(r => r.json())
        .then(order => {

            document.getElementById("customer").value = order.customer_id;
            document.getElementById("tanggal").value = order.tanggal;
            document.getElementById("status").value = order.status;

            // ✅ Load detail barang
            fetch(API + "records/order_details?filter=order_id,eq," + orderId)
                .then(r => r.json())
                .then(detailData => {

                    document.getElementById("loading").style.display = "none";
                    document.getElementById("form-edit").style.display = "block";

                    let list = "";
                    details = detailData.records;

                    details.forEach((d, i) => {
                        list += renderDetail(i, d.product_id, d.qty, d.harga);
                    });

                    document.getElementById("detail-list").innerHTML = list;
                });
        });
}

function renderDetail(i, product="", qty="", harga="") {
    return `
        <div class="p-3 border mb-2 rounded">
            <label>Product ID</label>
            <input id="p${i}" class="w-full border p-2 mb-2" value="${product}">

            <label>Qty</label>
            <input id="q${i}" class="w-full border p-2 mb-2" value="${qty}">

            <label>Harga</label>
            <input id="h${i}" class="w-full border p-2 mb-2" value="${harga}">

            <button type="button" onclick="hapusDetail(${i}, ${details[i].id})" 
                    class="px-2 py-1 bg-red-600 text-white rounded">
                Hapus
            </button>
        </div>
    `;
}

function addDetail() {
    let i = details.length;
    details.push({});

    document.getElementById("detail-list").innerHTML += renderDetail(i);
}

function hapusDetail(index, detailId) {
    if (!confirm("Hapus detail ini?")) return;

    fetch(API + "records/order_details/" + detailId, { method:"DELETE" })
        .then(() => location.reload());
}

function simpanEdit() {

    let customer = document.getElementById("customer").value;
    let tanggal = document.getElementById("tanggal").value;
    let status = document.getElementById("status").value;
    let total = 0;

    // ✅ UPDATE HEADER ORDER
    fetch(API + "records/orders/" + orderId, {
        method:"PUT",
        headers:{"Content-Type":"application/json"},
        body: JSON.stringify({
            customer_id: customer,
            tanggal: tanggal,
            status: status
        })
    });

    // ✅ UPDATE SEMUA DETAIL
    details.forEach((d, i) => {
        let product = document.getElementById("p"+i).value;
        let qty = parseInt(document.getElementById("q"+i).value);
        let harga = parseFloat(document.getElementById("h"+i).value);
        let subtotal = qty * harga;

        total += subtotal;

        let method = d.id ? "PUT" : "POST";
        let url = d.id 
            ? API + "records/order_details/" + d.id 
            : API + "records/order_details";

        fetch(url, {
            method: method,
            headers: {"Content-Type":"application/json"},
            body: JSON.stringify({
                order_id: orderId,
                product_id: product,
                qty: qty,
                harga: harga,
                subtotal: subtotal
            })
        });
    });

    // ✅ UPDATE TOTAL ORDER
    fetch(API + "records/orders/" + orderId, {
        method:"PUT",
        headers:{"Content-Type":"application/json"},
        body: JSON.stringify({ total: total })
    }).then(() => {
        alert("Transaksi berhasil diupdate!");
        window.location.href = "/penjualan";
    });
}

loadData();
</script>

</body>
</html>
