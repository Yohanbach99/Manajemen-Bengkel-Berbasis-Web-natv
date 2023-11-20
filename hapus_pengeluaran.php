<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Pastikan ID Pengeluaran ada di URL
    if (isset($_GET['id_pengeluaran']) && is_numeric($_GET['id_pengeluaran'])) {
        $id_pengeluaran = $_GET['id_pengeluaran'];
        
        // Perintah SQL untuk menghapus data pengeluaran berdasarkan ID
        $sql = "DELETE FROM pengeluaran_sparepart WHERE id_pengeluaran = $id_pengeluaran";
        
        // Eksekusi perintah SQL
        $result = mysqli_query($koneksi, $sql);

        if ($result) {
            // Data berhasil dihapus
            header("Location: lanjut_penanganan.php"); // Ganti dengan URL halaman yang sesuai
        } else {
            // Terjadi kesalahan dalam penghapusan data
            echo "Terjadi kesalahan dalam penghapusan data pengeluaran sparepart.";
        }
    } else {
        echo "ID Pengeluaran tidak valid.";
    }
} else {
    // Permintaan tidak valid
    echo "Permintaan tidak valid.";
}

mysqli_close($koneksi);
?>
