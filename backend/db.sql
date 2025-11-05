-- ========================================
-- DATABASE: larissa_jaya
-- Author: Sigit Adityar (25.01.53.7004)
-- Project: Larissa Jaya - Toko Sandal
-- ========================================

CREATE DATABASE IF NOT EXISTS larissa_jaya;
USE larissa_jaya;

-- 1. tabel pelanggan
CREATE TABLE customers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100),
  no_hp VARCHAR(20),
  alamat TEXT,
  email VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. tabel kategori produk
CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_kategori VARCHAR(100),
  deskripsi TEXT
);

-- 3. tabel produk
CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_produk VARCHAR(100),
  harga DECIMAL(10,2),
  stok INT,
  kategori_id INT,
  deskripsi TEXT,
  gambar VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (kategori_id) REFERENCES categories(id)
);

-- 4. tabel pemasok (supplier)
CREATE TABLE suppliers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_supplier VARCHAR(100),
  kontak VARCHAR(50),
  alamat TEXT
);

-- 5. tabel pembelian dari supplier
CREATE TABLE purchases (
  id INT AUTO_INCREMENT PRIMARY KEY,
  supplier_id INT,
  tanggal DATE,
  total DECIMAL(10,2),
  FOREIGN KEY (supplier_id) REFERENCES suppliers(id)
);

-- 6. tabel detail pembelian
CREATE TABLE purchase_details (
  id INT AUTO_INCREMENT PRIMARY KEY,
  purchase_id INT,
  product_id INT,
  jumlah INT,
  harga_beli DECIMAL(10,2),
  FOREIGN KEY (purchase_id) REFERENCES purchases(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);

-- 7. tabel pesanan pelanggan
CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  customer_id INT,
  tanggal DATE,
  total DECIMAL(10,2),
  status VARCHAR(50) DEFAULT 'pending',
  FOREIGN KEY (customer_id) REFERENCES customers(id)
);

-- 8. tabel detail pesanan
CREATE TABLE order_details (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  product_id INT,
  jumlah INT,
  harga_jual DECIMAL(10,2),
  FOREIGN KEY (order_id) REFERENCES orders(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);

-- 9. tabel pembayaran
CREATE TABLE payments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  metode VARCHAR(50),
  jumlah DECIMAL(10,2),
  tanggal_bayar DATE,
  FOREIGN KEY (order_id) REFERENCES orders(id)
);

-- 10. tabel karyawan
CREATE TABLE employees (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100),
  jabatan VARCHAR(50),
  username VARCHAR(50),
  password VARCHAR(100)
);

-- 11. tabel stok gudang
CREATE TABLE inventory (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT,
  lokasi_gudang VARCHAR(100),
  stok INT,
  FOREIGN KEY (product_id) REFERENCES products(id)
);

-- 12. tabel log aktivitas (opsional)
CREATE TABLE activity_logs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user VARCHAR(100),
  aksi VARCHAR(100),
  waktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  keterangan TEXT
);

-- 13. tabel pengiriman
CREATE TABLE shipments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  jasa_pengiriman VARCHAR(100),
  no_resi VARCHAR(100),
  tanggal_kirim DATE,
  status VARCHAR(50),
  FOREIGN KEY (order_id) REFERENCES orders(id)
);

-- ========================================
-- DATA AWAL
-- ========================================
INSERT INTO categories (nama_kategori, deskripsi) VALUES
('Sandal Jepit', 'Sandal karet ringan untuk harian'),
('Sandal Gunung', 'Sandal outdoor kuat dan tahan air'),
('Sandal Fashion', 'Sandal gaya untuk wanita dan pria');

INSERT INTO products (nama_produk, harga, stok, kategori_id, deskripsi, gambar) VALUES
('Sandal Jepit Pria', 25000, 50, 1, 'Sandal jepit karet nyaman dipakai', 'sandal1.jpg'),
('Sandal Jepit Wanita', 27000, 40, 1, 'Sandal jepit warna-warni', 'sandal2.jpg'),
('Sandal Gunung Trail', 95000, 20, 2, 'Sandal kuat untuk aktivitas outdoor', 'sandal3.jpg'),
('Sandal Fashion Casual', 75000, 30, 3, 'Sandal stylish untuk jalan-jalan', 'sandal4.jpg');

INSERT INTO customers (nama, no_hp, alamat, email) VALUES
('Rina Putri', '08123456789', 'Jl. Mawar No.10', 'rina@mail.com'),
('Budi Santoso', '082233445566', 'Jl. Melati No.12', 'budi@mail.com');

INSERT INTO employees (nama, jabatan, username, password) VALUES
('Sigit Adityar', 'Admin', 'sigit', 'admin123'),
('Tono', 'Kasir', 'tono', 'kasir123');

INSERT INTO suppliers (nama_supplier, kontak, alamat) VALUES
('PT Sandal Abadi', '08134567890', 'Bandung'),
('CV Gunung Karet', '08198765432', 'Cirebon');

