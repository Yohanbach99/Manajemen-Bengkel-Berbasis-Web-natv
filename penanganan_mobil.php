<?php
include 'koneksi.php';

// Ambil data dari tabel data_mobil
$sql = "SELECT * FROM data_mobil";

$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>No Polisi</th>";
    echo "<th>Pemilik</th>";
    echo "<th>Mobil</th>";
    echo "<th>Type Mobil</th>";
    echo "<th>Aksi</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['no_polisi'] . "</td>";
        echo "<td>" . $row['pemilik'] . "</td>";
        echo "<td>" . $row['mobil'] . "</td>";
        echo "<td>" . $row['type_mobil'] . "</td>";
        echo "<td>
            <a href='edit_mobil.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a>
            <a href='hapus_mobil.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a>
            <a href='lanjut_penanganan.php?id=" . $row['id'] . "' class='btn btn-info'>Lanjut Penanganan</a>
        </td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "Tidak ada data mobil.";
}

mysqli_close($koneksi);
?>
