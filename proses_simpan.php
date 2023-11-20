<?php
include 'koneksi.php';

// Mengambil data dari formulir
$no_polisi = $_POST['no_polisi'];
$pemilik = $_POST['pemilik'];
$mobil = $_POST['mobil'];
$type_mobil = $_POST['type_mobil'];



// Menyimpan data ke database
$sql = "INSERT INTO data_mobil (no_polisi, pemilik, mobil, type_mobil) VALUES ('$no_polisi', '$pemilik', '$mobil', '$type_mobil')";

if (mysqli_query($koneksi, $sql)) {
    echo "Data berhasil disimpan.";
    header("location: home.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

// Menutup koneksi database
mysqli_close($koneksi);
?>
