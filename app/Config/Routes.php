<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'User::index');
$routes->get('/logout', 'User::logout');

$routes->get('/dashboard', 'Dashboard::index');

#===================Pengelolaan Pengguna==============================
$routes->get('/pengguna', 'User::daftarPengguna');
$routes->get('/tambah-pengguna', 'User::tambahPengguna');
$routes->post('/tambah-pengguna', 'User::tambahPengguna');
$routes->get('/edit-pengguna/(:any)', 'User::tambahPengguna/$1');
$routes->post('/edit-pengguna/(:any)', 'User::tambahPengguna/$1');
$routes->get('/hapus-pengguna/(:any)', 'User::hapusPengguna/$1');

#===================Pengelolaan Pengguna==============================
$routes->get('/pelanggan', 'Pelanggan::index');
$routes->get('/tambah-pelanggan', 'Pelanggan::tambahPelanggan');
$routes->post('/tambah-pelanggan', 'Pelanggan::tambahPelanggan');
$routes->get('/edit-pelanggan/(:any)', 'Pelanggan::tambahPelanggan/$1');
$routes->post('/edit-pelanggan/(:any)', 'Pelanggan::tambahPelanggan/$1');
$routes->get('/hapus-pelanggan/(:any)', 'Pelanggan::hapusPelanggan/$1');

#===================Pengelolaan Produk==============================
$routes->get('/produk', 'Produk::index');
$routes->get('/tambah-produk', 'Produk::tambahProduk');
$routes->post('/tambah-produk', 'Produk::tambahProduk');
$routes->get('/edit-produk/(:any)', 'Produk::tambahProduk/$1');
$routes->post('/edit-produk/(:any)', 'Produk::tambahProduk/$1');
$routes->get('/hapus-produk/(:any)', 'Produk::hapusProduk/$1');


$routes->get('/penjualan', 'Penjualan::index');
$routes->post('/penjualan', 'Penjualan::index');
$routes->get('/penjualan/(:num)', 'Penjualan::cekHarga/$1');
$routes->get('/bayar', 'Penjualan::formBayar');
$routes->get('/selesai-bayar', 'Penjualan::bayar');


$routes->get('/laporan-stok', 'Laporan::index');
$routes->get('/laporan-pendapatan', 'Laporan::laporanPendapatan');
$routes->post('/laporan-pendapatan', 'Laporan::laporanPendapatan');
$routes->get('/download-pdf', 'Laporan::downloadPDF');
