<?php
// Memasukkan file Database.php
require_once 'Database.php';

// Menginisialisasi objek Database
$database = new Database();

// Memeriksa apakah ada data ID yang dikirimkan melalui metode POST
if(isset($_POST['id'])) {
    // Mengamankan data ID
    $id = $database->escapeString($_POST['id']);
    
    // Membuat kueri penghapusan berdasarkan ID
    $query = "DELETE FROM pengunjung WHERE id = $id";

    // Menjalankan kueri penghapusan
    $result = $database->executeQuery($query);

    if($result) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    // Jika tidak ada ID yang dikirimkan, tampilkan pesan kesalahan
    echo "ID tidak ditemukan.";
}

// Menutup koneksi
$database->closeConnection();
?>
