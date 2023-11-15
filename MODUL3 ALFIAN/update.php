<!-- Pada file ini kalian membuat coding untuk logika update / meng-edit data mobil pada showroom sesuai id-->
<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
include 'connect.php'; 

// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$idMobil = $_GET['id'];

// (3) Buatkan fungsi "update" yang menerima data sebagai parameter
function updateData($koneksi, $id, $namaMobil, $brandMobil, $warnaMobil, $tipeMobil, $hargaMobil) {
    // Dapatkan data yang dikirim sebagai parameter dan simpan dalam variabel yang sesuai.
    $namaMobil = mysqli_real_escape_string($koneksi, $namaMobil);
    $brandMobil = mysqli_real_escape_string($koneksi, $brandMobil);
    $warnaMobil = mysqli_real_escape_string($koneksi, $warnaMobil);
    $tipeMobil = mysqli_real_escape_string($koneksi, $tipeMobil);
    $hargaMobil = mysqli_real_escape_string($koneksi, $hargaMobil);

    // Buatkan perintah SQL UPDATE untuk mengubah data di tabel, berdasarkan id mobil
    $query = "UPDATE showroom_mobil 
              SET nama_mobil = '$namaMobil', 
                  brand_mobil = '$brandMobil', 
                  warna_mobil = '$warnaMobil', 
                  tipe_mobil = '$tipeMobil', 
                  harga_mobil = '$hargaMobil' 
              WHERE id = $id";

    // Eksekusi perintah SQL
    if (mysqli_query($koneksi, $query)) {
        // Buatkan kondisi jika eksekusi query berhasil
        echo "Data mobil dengan ID $id berhasil diupdate.";
    } else {
        // Jika terdapat kesalahan, buatkan eksekusi query gagalnya
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Panggil fungsi update dengan data yang sesuai
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    updateData($koneksi, $idMobil, $_POST['nama_mobil'], $_POST['brand_mobil'], $_POST['warna_mobil'], $_POST['tipe_mobil'], $_POST['harga_mobil']);
}

// Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($koneksi);
?>
