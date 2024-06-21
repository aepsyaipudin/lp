<?php
ini_set ( 'display_errors' , 1 ) ;
ini_set ( 'display_startup_errors' , 1 ) ;
error_reporting ( E_ALL ) ;;
// Mulai sesi
session_start();

// Memasukkan file Database.php
require_once 'Database.php';

// Menginisialisasi objek Database
$database = new Database();

// Memeriksa apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    // Mendapatkan username pengguna yang login
    $username = $_SESSION['username'];

    // Query untuk mengambil data pengunjung berdasarkan username pengguna yang login
    $query = "SELECT nama_pengunjung, nama_wbp,kamar_hunian, jumlah_pengunjung, foto_wajah, foto_ktp FROM pengunjung WHERE nama_pengunjung = '$username'";

    // Mengambil hasil query sebagai array
    $hasil = $database->getResults($query);

    // Menampilkan hasil
    if (count($hasil) > 0) {
        foreach ($hasil as $data) {
            echo "<h2>Data Pengunjung</h2>";
            echo "Nama Pengunjung: " . $data['nama_pengunjung'] . "<br>";
            echo "Nama WBP: " . $data['nama_wbp'] . "<br>";
            echo "Kamar Hunian: " . $data['kamar_hunian'] . "<br>";
            echo "Jumlah Pengunjung: " . $data['jumlah_pengunjung'] . "<br>";

            // Menampilkan foto wajah
            echo "<h3>Foto Wajah:</h3>";
            echo "<img src='" . $data['foto_wajah'] . "' alt='Foto Wajah'>";

            // Menampilkan foto KTP
            echo "<h3>Foto KTP:</h3>";
            echo "<img src='" . $data['foto_ktp'] . "' alt='Foto KTP'>";
        }
    } else {
        echo "Tidak ada data pengunjung untuk pengguna ini.";
    }
} else {
    // Redirect pengguna jika belum login
    header("Location: login.php");
    exit;
}

// Menutup koneksi
$database->closeConnection();
?>
