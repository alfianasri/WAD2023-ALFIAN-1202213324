<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->
<?php
//1 Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$host = "localhost";
$username = "root";
$password = "";
$database = "modul3_wad";
// 
$koneksi = mysqli_connect("localhost", "root", "", "modul3_wad");
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya
if (!$koneksi) {
    die("Database tidak dapat terhubung: " . mysqli_connect_error());
}
// 
?>

