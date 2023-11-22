<?php

require 'connect.php';

// (1) Mulai session
session_start();

// (2) Ambil nilai input dari form registrasi
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // a. Ambil nilai input email
    $email = mysqli_real_escape_string($db, $_POST['email']); // Menggunakan mysqli_real_escape_string untuk menghindari SQL injection

    // b. Ambil nilai input name
    $name = mysqli_real_escape_string($db, $_POST['name']);

    // c. Ambil nilai input username
    $username = mysqli_real_escape_string($db, $_POST['username']);

    // d. Ambil nilai input password
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // e. Ubah nilai input password menjadi hash menggunakan fungsi password_hash()
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
}

// (3) Buat dan lakukan query untuk mencari data dengan email yang sama dari nilai input email
$queryCheckEmail = "SELECT * FROM users WHERE email = '$email'";
$resultCheckEmail = mysqli_query($db, $queryCheckEmail);

// (4) Buatlah perkondisian ketika tidak ada data email yang sama ( gunakan mysqli_num_rows == 0 )
if (mysqli_num_rows($resultCheckEmail) == 0) {
    // a. Buatlah query untuk melakukan insert data ke dalam database
    $queryInsert = "INSERT INTO users (email, name, username, password) VALUES ('$email', '$name', '$username', '$hashedPassword')";

    // b. Buat lagi perkondisian atau percabangan ketika query insert berhasil dilakukan
    if (mysqli_query($db, $queryInsert)) {
        // Buat di dalamnya variabel session dengan key message untuk menampilkan pesan pendaftaran berhasil
        $_SESSION['message'] = "Pendaftaran berhasil. Silakan login!";
        header("Location: ../views/login.php"); 
        exit;
    } else {
        echo "Error: " . $queryInsert . "<br>" . mysqli_error($db);
    }
} else {
    // (5) Buat juga kondisi else
    // Buat di dalamnya variabel session dengan key message untuk menampilkan pesan error karena data email sudah terdaftar
    $_SESSION['message'] = "Email sudah terdaftar. Gunakan email lain.";
    header("Location: ../views/register.php");
    exit;
}
?>
