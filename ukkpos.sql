-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2024 pada 15.15
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
-- Database: `ukkpos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenjualan`
--
-- Kesalahan membaca struktur untuk tabel ukkpos.detailpenjualan: #1932 - Table &#039;ukkpos.detailpenjualan&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel ukkpos.detailpenjualan: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `ukkpos`.`detailpenjualan`&#039; at line 1

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
-- Kesalahan membaca struktur untuk tabel ukkpos.pelanggan: #1932 - Table &#039;ukkpos.pelanggan&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel ukkpos.pelanggan: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `ukkpos`.`pelanggan`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--
-- Kesalahan membaca struktur untuk tabel ukkpos.penjualan: #1932 - Table &#039;ukkpos.penjualan&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel ukkpos.penjualan: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `ukkpos`.`penjualan`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--
-- Kesalahan membaca struktur untuk tabel ukkpos.produk: #1932 - Table &#039;ukkpos.produk&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel ukkpos.produk: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `ukkpos`.`produk`&#039; at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--
-- Kesalahan membaca struktur untuk tabel ukkpos.user: #1932 - Table &#039;ukkpos.user&#039; doesn&#039;t exist in engine
-- Kesalahan membaca data untuk tabel ukkpos.user: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `ukkpos`.`user`&#039; at line 1
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
