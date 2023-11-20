<?php

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_mobil = $_GET["id"];

    // Query untuk menghapus data mobil berdasarkan ID
    $sql = "DELETE FROM data_mobil WHERE id = $id_mobil";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: penanganan_mobil.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
} else {
    echo "ID mobil tidak valid.";
    exit;
}
?>
