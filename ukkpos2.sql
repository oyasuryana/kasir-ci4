-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Feb 2024 pada 02.19
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukkpos2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `DetailID` int(11) NOT NULL,
  `PenjualanID` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`DetailID`, `PenjualanID`, `ProdukID`, `JumlahProduk`, `Subtotal`) VALUES
(1, 1, 1, 2, 5000.00),
(2, 1, 4, 5, 7500.00),
(3, 2, 6, 5, 12500.00),
(4, 2, 2, 2, 6000.00),
(5, 2, 2, 2, 6000.00),
(6, 2, 4, 2, 3000.00),
(7, 2, 2, 1, 3000.00),
(8, 3, 2, 1, 3000.00),
(9, 3, 2, 2, 6000.00),
(10, 3, 1, 2, 5000.00),
(11, 4, 6, 2, 5000.00),
(19, 7, 4, 10, 15000.00),
(20, 7, 5, 10, 5000.00),
(21, 8, 4, 5, 7500.00),
(22, 8, 6, 5, 12500.00),
(23, 9, 4, 10, 15000.00),
(24, 9, 5, 10, 5000.00),
(25, 10, 4, 10, 15000.00),
(28, 7, 4, 4, 6000.00),
(29, 8, 6, 1, 2500.00),
(30, 9, 4, 1, 1500.00),
(31, 10, 1, 1, 2500.00),
(32, 11, 4, 1, 1500.00),
(33, 11, 4, 2, 3000.00),
(34, 12, 4, 2, 3000.00),
(35, 13, 1, 1, 2500.00),
(36, 14, 4, 4, 6000.00),
(37, 14, 6, 2, 5000.00),
(38, 14, 4, 5, 7500.00),
(39, 15, 2, 8, 24000.00),
(40, 16, 2, 1, 3000.00),
(41, 16, 4, 2, 3000.00),
(42, 17, 7, 1, 12000.00),
(43, 17, 4, 2, 3000.00),
(44, 18, 8, 2, 7000.00),
(45, 18, 1, 2, 5000.00),
(46, 18, 2, 1, 3000.00),
(47, 19, 9, 2, 5000.00),
(48, 19, 8, 5, 17500.00),
(49, 19, 6, 2, 5000.00),
(50, 20, 8, 3, 10500.00),
(51, 20, 1, 9, 22500.00),
(52, 21, 2, 4, 12000.00),
(53, 21, 4, 21, 31500.00),
(54, 22, 2, 4, 12000.00),
(55, 22, 8, 14, 49000.00),
(56, 22, 5, 20, 10000.00),
(57, 23, 2, 3, 9000.00),
(58, 23, 2, 2, 6000.00),
(59, 24, 5, 7, 350000.00);

--
-- Trigger `detailpenjualan`
--
DELIMITER $$
CREATE TRIGGER `kurangiStok` AFTER INSERT ON `detailpenjualan` FOR EACH ROW UPDATE produk SET produk.Stok = produk.Stok - NEW.JumlahProduk
WHERE produk.ProdukID = NEW.ProdukID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `nambahTotalHarga` AFTER INSERT ON `detailpenjualan` FOR EACH ROW UPDATE penjualan SET penjualan.TotalHarga = penjualan.TotalHarga + NEW.Subtotal
WHERE penjualan.PenjualanID= NEW.PenjualanID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `PelangganID` int(11) NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NomorTelepon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`PelangganID`, `NamaPelanggan`, `Alamat`, `NomorTelepon`) VALUES
(1, 'Oya Suryana', 'RT 012 RW 003 Bayuning - Kadugede - Kuningan', '0865565659988'),
(3, 'Zaki Nur Fatah', 'Bayuning RT 012  RW 03 - Kadugede', '089787878878'),
(4, 'Rika Widianingih', 'Bayuning', '085295592558'),
(5, 'Tika Ramadani', 'Kadugede', '0895477867843'),
(6, 'Ira', 'Bojong  Awirarangan ', '087654873493'),
(7, 'Arya', 'Kuningan', '08775656565'),
(9, 'Nabil', 'Kuningan', '08777777'),
(10, 'Abdilah', 'Kuningan', '08777777'),
(11, 'Nabil', 'Kuningan', '08777777');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `PenjualanID` int(11) NOT NULL,
  `TanggalPenjualan` date NOT NULL,
  `TotalHarga` decimal(10,2) NOT NULL,
  `PelangganID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`PenjualanID`, `TanggalPenjualan`, `TotalHarga`, `PelangganID`) VALUES
(1, '2024-05-29', 12500.00, 1),
(2, '2024-05-29', 30500.00, 3),
(3, '2024-05-30', 14000.00, 3),
(4, '2024-05-30', 5000.00, 3),
(7, '2024-05-30', 6000.00, 4),
(8, '2024-04-30', 2500.00, 1),
(9, '2024-04-30', 1500.00, 3),
(10, '2024-04-30', 2500.00, 3),
(11, '2024-04-30', 4500.00, 4),
(12, '2024-04-30', 3000.00, 3),
(13, '2024-04-30', 2500.00, 3),
(14, '2024-03-30', 18500.00, 4),
(15, '2024-03-30', 24000.00, 3),
(16, '2024-03-30', 6000.00, 1),
(17, '2024-03-30', 15000.00, 4),
(18, '2024-03-30', 15000.00, 5),
(19, '2024-01-30', 27500.00, 6),
(20, '2024-01-31', 33000.00, 7),
(21, '2024-01-31', 43500.00, 1),
(22, '2024-02-02', 71000.00, 10),
(23, '2024-02-02', 15000.00, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `ProdukID` int(11) NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `Stok` int(11) NOT NULL,
  `HargaBeli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`ProdukID`, `NamaProduk`, `Harga`, `Stok`, `HargaBeli`) VALUES
(1, 'Indomie Rasa Ayam Bawang', 2500.00, 0, 2000),
(2, 'Aqua Botol 600 ml', 3000.00, 15, 2500),
(4, 'Kopi God Day Mocaino Sachet', 1500.00, 0, 1000),
(5, 'Aqua Gelas', 500.00, 10, 400),
(6, 'Mie Goreng Sedap Rasa Kari Ayam', 2500.00, 15, 2000),
(7, 'Sampho Clear 250ml', 12000.00, 14, 10000),
(8, 'Buku Tulis SInar Dunia 38 Lembar', 3500.00, 40, 3000),
(9, 'Ballpoint Standar (hitam)', 2500.00, 22, 2000),
(12, 'Teh Gelas', 2000.00, 1000, 1500),
(13, 'Aqua Botol 600 ml', 3500.00, 40, 3000),
(15, 'Le Mineral', 22000.00, 1000, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `email` varchar(150) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `level` enum('admin','petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`email`, `nama`, `password`, `level`) VALUES
('Abiq@gmail.com', 'Abiq Sabiqul Khoir', '202cb962ac59075b964b07152d234b70', 'petugas'),
('admin@ukkpos.id', 'Oya Suryana', '202cb962ac59075b964b07152d234b70', 'admin'),
('arfan@gmail.com', 'Muhammad Arfan', '202cb962ac59075b964b07152d234b70', 'petugas'),
('arfan@yahoo.com', 'budi', '202cb962ac59075b964b07152d234b70', 'petugas'),
('mr.farhan@gmail.com', 'Muhammad Ridwan Farhan', '202cb962ac59075b964b07152d234b70', 'petugas'),
('zaki@gmail.com', 'Zaki Nur Fatah', '900150983cd24fb0d6963f7d28e17f72', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`DetailID`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`PelangganID`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`PenjualanID`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ProdukID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `DetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `PelangganID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `PenjualanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `ProdukID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
