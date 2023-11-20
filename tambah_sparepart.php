<!DOCTYPE html>
<html>
<head>
    <title>Tambah Sparepart</title>
</head>
<body>
    <h1>Tambah Sparepart Baru</h1>

    <!-- Formulir untuk menambahkan sparepart -->
    <form action="proses_tambah_sparepart.php" method="post">
        <label for="nama_sparepart">Nama Sparepart:</label>
        <input type="text" id="nama_sparepart" name="nama_sparepart" required><br>

        <label for="mobil">Mobil:</label>
        <input type="text" id="mobil" name="mobil" required><br>

        <label for="stok">Stok:</label>
        <input type="number" id="stok" name="stok" required><br>

        <label for="harga_satuan">Harga Modal:</label>
        <input type="number" id="harga_modal" name="harga_modal" required><br>

        <label for="harga_satuan">Harga Satuan:</label>
        <input type="number" id="harga_satuan" name="harga_satuan" required><br>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>
