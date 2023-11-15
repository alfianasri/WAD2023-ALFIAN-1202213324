<?php
// 2 (1) Jangan lupa ertakan koneksi database dari yang sudah kalian buat
include 'connect.php'; // Gantilah 'koneksi.php' dengan nama file koneksi yang sesuai

// (2) Buatlah perkondisian untuk memeriksa apakah permintaan saat ini menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // (3) Jika sudah coba deh kalian ambil data dari form (CLUE : pakai POST)
    $namaMobil = $_POST['nama_mobil'];
    $brandMobil = $_POST['brand_mobil'];
    $warnaMobil = $_POST['warna_mobil'];
    $tipeMobil = $_POST['tipe_mobil'];
    $hargaMobil = $_POST['harga_mobil'];

    // (4) Kalau sudah, kita lanjut Query / Menambahkan data pada SQL (Disini ada perintah untuk SQL), Masukkan ke tabel showroom_mobil (include setiap nama column)
    $query = "INSERT INTO showroom_mobil (nama_mobil, brand_mobil, warna_mobil, tipe_mobil, harga_mobil) 
              VALUES ('$namaMobil', '$brandMobil', '$warnaMobil', '$tipeMobil', '$hargaMobil')";

    // (5) Buatkan kondisi jika eksekusi query berhasil
    if (mysqli_query($koneksi, $query)) {
        echo "Data mobil berhasil ditambahkan.";
    } else {
        // (6) Jika terdapat kesalahan, buatkan eksekusi query gagalnya 
         echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// (7) Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($koneksi);
?>
