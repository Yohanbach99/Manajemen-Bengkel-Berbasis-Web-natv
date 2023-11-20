<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

include 'koneksi.php';

    // Periksa apakah alamat email sudah ada dalam basis data
    $sql_check_email = "SELECT * FROM users WHERE email = '$email'";
    $result_check_email = $koneksi->query($sql_check_email);

    if ($result_check_email->num_rows > 0) {
        // Alamat email sudah terdaftar. Berikan pesan kesalahan
        echo "Alamat email sudah terdaftar. Silakan gunakan alamat email lain.";
        $koneksi->close(); // Tutup koneksi basis data
        exit;
    }

    // Hash kata sandi
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Simpan pengguna ke basis data
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword')";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    // Tutup koneksi basis data
    $koneksi->close();
}
?>
