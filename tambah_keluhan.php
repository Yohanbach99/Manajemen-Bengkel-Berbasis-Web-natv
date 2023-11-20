<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Keluhan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Keluhan</h1>

        <?php
        // Sisipkan file koneksi ke database di sini
        include 'koneksi.php';

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
            $id_mobil = $_GET["id"];
        } else {
            echo "ID mobil tidak valid.";
            exit;
        }
        ?>

        <!-- Formulir untuk menambahkan keluhan -->
        <form action="proses_tambah_keluhan.php" method="post">
    <input type="hidden" name="id_mobil" value="<?php echo $id_mobil; ?>">
    <div class="form-group">
        <label for="tanggal">Tanggal:</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
    </div>
    <div class="form-group">
        <label for="keluhan">Keluhan:</label>
        <textarea class="form-control" id="keluhan" name="keluhan" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan Keluhan</button>
</form>

    </div>
</body>
</html>
