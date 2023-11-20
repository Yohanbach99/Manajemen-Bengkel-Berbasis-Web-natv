<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_pengeluaran = $_GET['id'];

  
    $sql = "SELECT pengeluaran_sparepart.*, sparepart.nama_sparepart
            FROM pengeluaran_sparepart
            LEFT JOIN sparepart ON pengeluaran_sparepart.id_sparepart = sparepart.id_sparepart
            WHERE pengeluaran_sparepart.id_pengeluaran = $id_pengeluaran";

    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

       
        echo "<h1>Edit Pengeluaran Sparepart</h1>";
        echo "<form action='proses_edit_pengeluaran.php' method='post'>";
        echo "<input type='hidden' name='id_pengeluaran' value='" . $id_pengeluaran . "'>";
        echo "<div class='form-group'>";
        echo "<label for='tanggal_pengeluaran'>Tanggal Pengeluaran:</label>";
        echo "<input type='text' class='form-control' id='tanggal_pengeluaran' name='tanggal_pengeluaran' value='" . $row['tanggal_pengeluaran'] . "' readonly>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='id_sparepart'>Sparepart:</label>";
        echo "<input type='text' class='form-control' id='id_sparepart' name='id_sparepart' value='" . $row['nama_sparepart'] . "' readonly>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='jumlah'>Jumlah:</label>";
        echo "<input type='number' class='form-control' id='jumlah' name='jumlah' value='" . $row['jumlah'] . "' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='total_harga'>Total Harga:</label>";
        echo "<input type='text' class='form-control' id='total_harga' name='total_harga' value='" . $row['total_harga'] . "' required>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Simpan Perubahan</button>";
        echo "</form>";
    } else {
        echo "Data pengeluaran tidak ditemukan.";
    }
}

mysqli_close($koneksi);
?>
