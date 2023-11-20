<!DOCTYPE html>
<html>
<head>
    <title>Edit Sparepart</title>
</head>
<body>
    <h1>Edit Data Sparepart</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id_sparepart = $_GET["id"];
        include 'koneksi.php';

       
        $sql = "SELECT * FROM sparepart WHERE id_sparepart = $id_sparepart";
        $result = $koneksi->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $nama_sparepart = $row["nama_sparepart"];
            $mobil = $row["mobil"];
            $stok = $row["stok"];
            $harga_satuan = $row["harga_satuan"];
        } else {
            echo "Data sparepart tidak ditemukan.";
            $koneksi->close();
            exit;
        }
    } else {
        echo "ID sparepart tidak valid.";
        exit;
    }
    ?>


    <form action="proses_edit_sparepart.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id_sparepart; ?>">
        <label for="nama_sparepart">Nama Sparepart:</label>
        <input type="text" id="nama_sparepart" name="nama_sparepart" value="<?php echo $nama_sparepart; ?>" required><br>

        <label for="mobil">Mobil:</label>
        <input type="text" id="mobil" name="mobil" value="<?php echo $mobil; ?>" required><br>

        <label for="stok">Stok:</label>
        <input type="number" id="stok" name="stok" value="<?php echo $stok; ?>" required><br>

        <label for="harga_satuan">Harga Satuan:</label>
        <input type="number" id="harga_satuan" name="harga_satuan" value="<?php echo $harga_satuan; ?>" required><br>

        <input type="submit" value="Simpan Perubahan">
    </form>
</body>
</html>
