<!DOCTYPE html>
<html>
<head>
    <title>Halaman Sparepart</title>
</head>
<body>
    <h1>Selamat datang di Halaman Sparepart</h1>

    <!-- Tombol untuk menambahkan sparepart -->
    <a href="tambah_sparepart.php">Tambah Sparepart</a>

    <!-- Tabel untuk menampilkan daftar sparepart (jika ada) -->
    <table border="1">
        <tr>
            <th>ID Sparepart</th>
            <th>Nama Sparepart</th>
            <th>Mobil</th>
            <th>Stok</th>
            <th>Harga Modal</th>
            <th>Harga Satuan</th>
            <th>Aksi</th>
        </tr>
        <!-- Tampilkan daftar sparepart di sini -->
        <?php
            // Menghubungkan ke database
            $host = "localhost"; // Ganti dengan host basis data Anda
            $username = "root"; // Ganti dengan nama pengguna basis data Anda
            $password = ""; // Ganti dengan kata sandi basis data Anda
            $database = "bengkel_mobil"; // Ganti dengan nama basis data Anda

            $koneksi = mysqli_connect($host, $username, $password, $database);

            if (!$koneksi) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }

            // Query untuk mengambil data sparepart
            $sql = "SELECT * FROM sparepart";
            $result = mysqli_query($koneksi, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id_sparepart"] . "</td>";
                    echo "<td>" . $row["nama_sparepart"] . "</td>";
                    echo "<td>" . $row["mobil"] . "</td>";
                    echo "<td>" . $row["stok"] . "</td>";
                    echo "<td>" . $row["harga_modal"] . "</td>";
                    echo "<td>" . $row["harga_satuan"] . "</td>";
                    echo "<td>";
                    echo "<a href='edit_sparepart.php?id=" . $row["id_sparepart"] . "'>Edit</a> | ";
                    echo "<a href='hapus_sparepart.php?id=" . $row["id_sparepart"] . "'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            }

            // Menutup koneksi database
            mysqli_close($koneksi);
        ?>
    </table>
</body>
</html>
