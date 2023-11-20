<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    include 'koneksi.php';

    // Cari pengguna berdasarkan email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $koneksi->query($sql);

    if ($result->num_rows == 1) {
        // Pengguna ditemukan
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Kata sandi cocok, login berhasil
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["role"] = $row["role"]; // Mengambil peran pengguna dari basis data
            header("Location: home.php");
            exit;
        } else {
            // Kata sandi tidak cocok
            header("Location: login.php?error=1");
            exit;
        }
    } else {
        // Pengguna tidak ditemukan
        header("Location: login.php?error=2");
        exit;
    }

    // Tutup koneksi basis data
    $koneksi->close();
}
?>
