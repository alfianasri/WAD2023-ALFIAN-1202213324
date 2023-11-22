<!-- File ini berisi koneksi dengan database MySQL -->

<?php

// (1) Buatlah variable untuk connect ke database yang telah diimport ke phpMyAdmin
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "modul4_wad"; 

$conn = new mysqli($servername, $username, $password, $database);

$db = new mysqli("localhost", "root", "", "modul4_wad");

if ($db->connect_error) {
    die("Koneksi gagal: " . $db->connect_error);
}
// (2) Buatlah perkondisian untuk menampilkan pesan error ketika database gagal terkoneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
} else {
    echo "Koneksi Berhasil";
    
}

$conn->close();

?>
