<?php
$host = "localhost"; // Ganti dengan host basis data Anda
$username = "root"; // Ganti dengan nama pengguna basis data Anda
$password = ""; // Ganti dengan kata sandi basis data Anda
$database = "bengkel_mobil"; // Ganti dengan nama basis data Anda (bengkel_mobil)

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
