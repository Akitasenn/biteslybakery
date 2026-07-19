<?php
/**
 * Koneksi Database - Bitesly Bakery
 * Sesuaikan variabel di bawah ini dengan konfigurasi XAMPP Anda.
 */

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "bitesly_bakery";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8mb4");

// Nomor WhatsApp bisnis (format internasional tanpa tanda + atau spasi)
define('WA_NUMBER', '6281234567890');

// Base URL folder gambar produk
define('IMG_PATH', 'assets/images/');
