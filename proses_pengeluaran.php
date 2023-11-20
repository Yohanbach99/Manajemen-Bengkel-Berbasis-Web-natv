<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_sparepart = $_POST["id_sparepart"];
    $jumlah = $_POST["jumlah"];
    $total_harga = $_POST["total_harga"];
    $tanggal_pengeluaran = $_POST["tanggal_pengeluaran"]; // Pastikan nama field di form HTML-nya adalah "tanggal_pengeluaran"

    // Validasi data (misalnya, cek apakah stok mencukupi)
    $sql_validasi_stok = "SELECT stok FROM sparepart WHERE id_sparepart = $id_sparepart";
    $result_validasi_stok = mysqli_query($koneksi, $sql_validasi_stok);

    if (mysqli_num_rows($result_validasi_stok) > 0) {
        $row_stok = mysqli_fetch_assoc($result_validasi_stok);
        $stok = $row_stok["stok"];

        if ($stok >= $jumlah) {
            // Stok mencukupi, lanjutkan proses

            // Kurangi stok sparepart
            $sql_kurangi_stok = "UPDATE sparepart SET stok = stok - $jumlah WHERE id_sparepart = $id_sparepart";
            if (mysqli_query($koneksi, $sql_kurangi_stok)) {
                // Simpan informasi pengeluaran ke database
                $sql_simpan_pengeluaran = "INSERT INTO pengeluaran_sparepart (id_sparepart, jumlah, total_harga, tanggal_pengeluaran) 
                VALUES (?, ?, ?, ?)";
                
                $stmt = mysqli_prepare($koneksi, $sql_simpan_pengeluaran);
                mysqli_stmt_bind_param($stmt, "iiis", $id_sparepart, $jumlah, $total_harga, $tanggal_pengeluaran);
                
                if (mysqli_stmt_execute($stmt)) {
                    echo "Pengeluaran berhasil disimpan.";
                } else {
                    echo "Error: " . mysqli_error($koneksi);
                }
            } else {
                echo "Error: " . $sql_kurangi_stok . "<br>" . mysqli_error($koneksi);
            }
        } else {
            echo "Stok tidak mencukupi. Stok tersedia: $stok";
        }
    } else {
        echo "Sparepart tidak ditemukan.";
    }
}

mysqli_close($koneksi);
?>
