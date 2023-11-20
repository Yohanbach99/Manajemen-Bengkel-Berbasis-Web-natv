<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Gaya untuk footer */
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Nama Aplikasi Anda</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Join Live</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Create Live</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8">
                <h1>Selamat datang di Aplikasi Anda</h1>
                <p>Selamat datang di Aplikasi Anda. Silakan pilih layanan yang Anda butuhkan:</p>
                
                <a href="mobil_masuk.php" class="btn btn-primary">Mobil Masuk</a>
                <!-- Tombol Sparepart -->
                <a href="penanganan_mobil.php" class="btn btn-primary">Peanganan Mobil</a>
                <a href="sparepart.php" class="btn btn-primary">Sparepart</a>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-light text-center py-2">
        <div id="jam-tanggal"></div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function tampilkanJamTanggal() {
            var waktu = new Date();
            var jam = waktu.toLocaleTimeString();
            var tanggal = waktu.toLocaleDateString();
            var jamTanggal = jam + ' ' + tanggal;
            document.getElementById('jam-tanggal').textContent = jamTanggal;
        }

        // Perbarui setiap detik
        setInterval(tampilkanJamTanggal, 1000);
    </script>
</body>
</html>
