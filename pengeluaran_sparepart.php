<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengeluaran Sparepart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Pengeluaran Sparepart</h1>
        
        <form action="proses_pengeluaran.php" method="post">
            <!-- Tanggal Pengeluaran (dari parameter GET) -->
            <input type="hidden" name="tanggal_pengeluaran" value="<?php echo $_GET['tanggal']; ?>">

            <!-- Sparepart (dari database "sparepart") -->
            <div class="form-group">
                <label for="id_sparepart">Sparepart:</label>
                <select class="form-control" id="id_sparepart" name="id_sparepart" required>
                    <!-- Loop melalui daftar sparepart dari database -->
                    <?php
                    include 'koneksi.php';
                        // Query untuk mendapatkan daftar sparepart dari database "sparepart"
                        // Anda perlu menggantinya dengan query sesuai dengan struktur database Anda.
                        $sql_sparepart = "SELECT id_sparepart, nama_sparepart, harga_satuan, stok FROM sparepart";
                        $result_sparepart = mysqli_query($koneksi, $sql_sparepart);

                        while ($row_sparepart = mysqli_fetch_assoc($result_sparepart)) {
                            echo "<option value='" . $row_sparepart['id_sparepart'] . "' data-harga='" . $row_sparepart['harga_satuan'] . "'>" . $row_sparepart['nama_sparepart'] . " (Stok: " . $row_sparepart['stok'] . ", Harga: " . $row_sparepart['harga_satuan'] . ")</option>";
                        }
                    ?>
                </select>
            </div>

            <!-- Jumlah Sparepart -->
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
            </div>

            <!-- Total Harga (diisi dengan JavaScript/JQuery) -->
            <div class="form-group">
                <label for="total_harga">Total Harga:</label>
                <input type="text" class="form-control" id="total_harga" name="total_harga" readonly>
            </div>

            <!-- Tombol Simpan Pengeluaran -->
            <button type="submit" class="btn btn-success">Simpan Pengeluaran</button>
        </form>
    </div>

    <!-- JavaScript/JQuery untuk menghitung total harga -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#jumlah').on('input', function () {
                // Mengambil harga satuan dari data yang ada di elemen option yang dipilih
                const hargaSatuan = parseFloat($('#id_sparepart option:selected').data('harga'));
                const jumlah = parseFloat($(this).val());
                const totalHarga = hargaSatuan * jumlah;

                // Menampilkan total harga
                $('#total_harga').val(totalHarga);
            });
        });
    </script>
</body>
</html>
