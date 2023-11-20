<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $id_mobil = $_POST["id_mobil"];
    $tanggal = $_POST["tanggal"];
    $keluhan = $_POST["keluhan"];

    // Menghubungkan ke database
    $host = "localhost"; // Ganti dengan host basis data Anda
    $username = "root"; // Ganti dengan nama pengguna basis data Anda
    $password = ""; // Ganti dengan kata sandi basis data Anda
    $database = "bengkel_mobil"; // Ganti dengan nama basis data Anda

    $koneksi = mysqli_connect($host, $username, $password, $database);

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Query untuk menyimpan keluhan ke dalam tabel keluhan
    $sql = "INSERT INTO keluhan (id_mobil, tanggal, keluhan) VALUES ($id_mobil, '$tanggal', '$keluhan')";

    if (mysqli_query($koneksi, $sql)) {
        echo "Keluhan berhasil disimpan.";
        header("Location: penanganan_mobil.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    // Menutup koneksi database
    mysqli_close($koneksi);
}
?>
