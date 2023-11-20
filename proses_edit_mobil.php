<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $id_mobil = $_POST["id"];
    $no_polisi = $_POST["no_polisi"];
    $pemilik = $_POST["pemilik"];
    $mobil = $_POST["mobil"];
    $type_mobil = $_POST["type_mobil"];
    $tanggal_masuk = $_POST["tanggal_masuk"];
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

    // Query untuk mengedit data mobil
    $sql = "UPDATE data_mobil SET no_polisi = '$no_polisi', pemilik = '$pemilik', mobil = '$mobil', type_mobil = '$type_mobil' WHERE id = $id_mobil";

    if (mysqli_query($koneksi, $sql)) {
        echo "Data mobil berhasil diperbarui.";
        header("Location: penanganan_mobil.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    // Menutup koneksi database
    mysqli_close($koneksi);
}
?>
