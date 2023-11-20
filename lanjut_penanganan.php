<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_mobil = $_GET['id'];

    // Ambil data mobil dan keluhan
    $sql = "SELECT data_mobil.*, keluhan.tanggal, keluhan.keluhan 
            FROM data_mobil
            LEFT JOIN keluhan ON data_mobil.id = keluhan.id_mobil
            WHERE data_mobil.id = $id_mobil";

    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        echo "<h1>Detail Mobil</h1>";
        echo "<p>No Polisi: " . $row['no_polisi'] . "</p>";
        echo "<p>Pemilik: " . $row['pemilik'] . "</p>";
        echo "<p>Mobil: " . $row['mobil'] . "</p>";
        echo "<p>Type Mobil: " . $row['type_mobil'] . "</p>";

        // Tombol "Tambah Keluhan"
        echo "<h2>Riwayat Keluhan</h2>";
        echo "<a href='tambah_keluhan.php?id=" . $id_mobil . "' class='btn btn-success'>Tambah Keluhan</a>";

        // Tabel Riwayat Keluhan
        echo "<table border='1'>
        <tr>
            <th>Tanggal Keluhan</th>
            <th>Keluhan</th>
            <th>Aksi</th>
        </tr>";

        // Ambil riwayat keluhan
        $sql_keluhan = "SELECT id, tanggal, keluhan FROM keluhan WHERE id_mobil = $id_mobil";

        $result_keluhan = mysqli_query($koneksi, $sql_keluhan);

        while ($row_keluhan = mysqli_fetch_assoc($result_keluhan)) {
            echo "<tr>
                <td>" . $row_keluhan['tanggal'] . "</td>
                <td>" . $row_keluhan['keluhan'] . "</td>
                <td><a href='pengeluaran_sparepart.php?id=$id_mobil&tanggal=" . $row_keluhan['tanggal'] . "' class='btn btn-success'>Pengeluaran Sparepart</a></td>
            </tr>";

            // Tabel Pengeluaran Sparepart
            echo "<table border='1'>
            <tr>
                <th>Tanggal Pengeluaran</th>
                <th>Nama Sparepart</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th> <!-- Tambah kolom Aksi -->
            </tr>";

            // Ambil data pengeluaran sparepart berdasarkan tanggal
            $sql_pengeluaran = "SELECT id_pengeluaran, tanggal_pengeluaran, sparepart.nama_sparepart, jumlah, total_harga
                  FROM pengeluaran_sparepart
                  LEFT JOIN sparepart ON pengeluaran_sparepart.id_sparepart = sparepart.id_sparepart
                  WHERE tanggal_pengeluaran = '" . $row_keluhan['tanggal'] . "'";

            $result_pengeluaran = mysqli_query($koneksi, $sql_pengeluaran);

            $totalHarga = 0; // Inisialisasi total harga

            while ($row_pengeluaran = mysqli_fetch_assoc($result_pengeluaran)) {
                echo "<tr>
                    <td>" . $row_pengeluaran['tanggal_pengeluaran'] . "</td>
                    <td>" . $row_pengeluaran['nama_sparepart'] . "</td>
                    <td>" . $row_pengeluaran['jumlah'] . "</td>
                    <td>" . $row_pengeluaran['total_harga'] . "</td>
                    <td>
                        <a href='edit_pengeluaran.php?id=" . $row_pengeluaran['id_pengeluaran'] . "' class='btn btn-warning'>Edit</a>
                        <a href='hapus_pengeluaran.php?id=" . $row_pengeluaran['id_pengeluaran'] . "' class='btn btn-danger'>Hapus</a>
                        <a href='tambah_pengeluaran.php?id_sparepart=" . $row_pengeluaran['id_pengeluaran'] . "&tanggal=" . $row_pengeluaran['tanggal_pengeluaran'] . "' class='btn btn-success'>Tambah Data</a>
                    </td>
                </tr>";

                // Tambahkan total harga
                $totalHarga += $row_pengeluaran['total_harga'];
            }

            // Tampilkan total harga di akhir tabel
            echo "<tr>
                <td colspan='3'><strong>Total Harga</strong></td>
                <td><strong>$totalHarga</strong></td>
                <td></td> <!-- Kolom Aksi kosong untuk total harga -->
            </tr>";

            echo "</table>";
        }

        echo "</table>";
    } else {
        echo "Tidak ada data mobil atau keluhan untuk mobil ini.";
    }
}

mysqli_close($koneksi);
?>
