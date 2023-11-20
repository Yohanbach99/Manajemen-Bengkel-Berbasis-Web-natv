<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan semua data yang dibutuhkan telah disediakan
    if (
        isset($_POST['id_pengeluaran']) &&
        isset($_POST['jumlah']) &&
        isset($_POST['total_harga'])
    ) {
        $id_pengeluaran = $_POST['id_pengeluaran'];
        $jumlah = $_POST['jumlah'];
        $total_harga = $_POST['total_harga'];

        // Lakukan validasi lain yang sesuai kebutuhan

        // Update data pengeluaran sparepart di database
        $sql = "UPDATE pengeluaran_sparepart SET jumlah = $jumlah, total_harga = $total_harga WHERE id_pengeluaran = $id_pengeluaran";
        $result = mysqli_query($koneksi, $sql);

        if ($result) {
            // Data berhasil diperbarui
            header("Location: lanjut_penanganan.php"); // Ganti dengan URL halaman yang sesuai
        } else {
            // Terjadi kesalahan dalam pembaruan data
            echo "Terjadi kesalahan dalam pembaruan data pengeluaran sparepart.";
        }
    } else {
        echo "Data yang diperlukan tidak lengkap.";
    }
} else {
    // Permintaan tidak valid
    echo "Permintaan tidak valid.";
}

mysqli_close($koneksi);
?>
