<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $nama_sparepart = $_POST["nama_sparepart"];
    $mobil = $_POST["mobil"];
    $stok = $_POST["stok"];
    $harga_modal = $_POST["harga_modal"];
    $harga_satuan = $_POST["harga_satuan"];
    

    // Menghubungkan ke database
    $host = "localhost"; // Ganti dengan host basis data Anda
    $username = "root"; // Ganti dengan nama pengguna basis data Anda
    $password = ""; // Ganti dengan kata sandi basis data Anda
    $database = "bengkel_mobil"; // Ganti dengan nama basis data Anda

    $koneksi = mysqli_connect($host, $username, $password, $database);

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Menyimpan data ke database
    $sql = "INSERT INTO sparepart (nama_sparepart, mobil, stok, harga_satuan, harga_modal) VALUES ('$nama_sparepart', '$mobil', '$stok', '$harga_satuan', '$harga_modal')";

    if (mysqli_query($koneksi, $sql)) {
        echo "Data sparepart berhasil disimpan.";
        header("location: sparepart.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    // Menutup koneksi database
    mysqli_close($koneksi);
}
?>
