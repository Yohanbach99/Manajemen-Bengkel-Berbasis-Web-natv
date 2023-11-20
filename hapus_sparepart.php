<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_sparepart = $_GET["id"];
    include 'koneksi.php';

    // Query untuk menghapus data sparepart berdasarkan ID
    $sql = "DELETE FROM sparepart WHERE id_sparepart = $id_sparepart";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: sparepart.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
} else {
    echo "ID sparepart tidak valid.";
    exit;
}
?>
