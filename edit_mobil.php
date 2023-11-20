<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mobil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Mobil</h1>

        <?php
        // Sisipkan file koneksi ke database di sini
        include 'koneksi.php';

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
            $id_mobil = $_GET["id"];

            // Query untuk mengambil data mobil berdasarkan ID
            $sql = "SELECT * FROM data_mobil WHERE id = $id_mobil";
            $result = mysqli_query($koneksi, $sql);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $no_polisi = $row['no_polisi'];
                $pemilik = $row['pemilik'];
                $mobil = $row['mobil'];
                $type_mobil = $row['type_mobil'];
            } else {
                echo "Data mobil tidak ditemukan.";
                exit;
            }
        } else {
            echo "ID mobil tidak valid.";
            exit;
        }
        ?>

        <form action="proses_edit_mobil.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id_mobil; ?>">
            <div class="form-group">
                <label for="no_polisi">No Polisi:</label>
                <input type="text" class="form-control" id="no_polisi" name="no_polisi" value="<?php echo $no_polisi; ?>" required>
            </div>
            <div class="form-group">
                <label for="pemilik">Pemilik:</label>
                <input type="text" class="form-control" id="pemilik" name="pemilik" value="<?php echo $pemilik; ?>" required>
            </div>
            <div class="form-group">
                <label for="mobil">Mobil:</label>
                <input type="text" class="form-control" id="mobil" name="mobil" value="<?php echo $mobil; ?>" required>
            </div>
            <div class="form-group">
                <label for="type_mobil">Type Mobil:</label>
                <input type="text" class="form-control" id="type_mobil" name="type_mobil" value="<?php echo $type_mobil; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
