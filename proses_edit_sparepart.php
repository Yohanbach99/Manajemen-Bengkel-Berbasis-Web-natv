<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $id_sparepart = $_POST["id"];
    $nama_sparepart = $_POST["nama_sparepart"];
    $mobil = $_POST["mobil"];
    $stok = $_POST["stok"];
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

    // Query untuk mengedit data sparepart
    $sql = "UPDATE sparepart SET nama_sparepart = '$nama_sparepart', mobil = '$mobil', stok = $stok, harga_satuan = $harga_satuan WHERE id_sparepart = $id_sparepart";

    if (mysqli_query($koneksi, $sql)) {
        echo "Data sparepart berhasil diperbarui.";
        header("Location: sparepart.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    // Menutup koneksi database
    mysqli_close($koneksi);
}
?>
