<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
// Memasukkan file Database.php
require_once 'Database.php';

// Menginisialisasi objek Database
$database = new Database();
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php'");
    exit();
}

//Ambil nama penggua sesi
$username = $_SESSION["username"];

//Query to get the role of the user based on username
$query_role = "SELECT role FROM user WHERE username = '$username'";
$result_role = $database->getSingleResult($query_role);

// Query untuk mengambil semua data dari tabel pengunjung
$query = "SELECT id, nama_pengunjung, nama_wbp, jumlah_pengunjung FROM pengunjung";

// Mengambil hasil query sebagai array
$hasil = $database->getResults($query);

// Menampilkan hasil
if (count($hasil) > 0) {
    foreach ($hasil as $data) {
        echo "Nama Pengunjung: " . $data['nama_pengunjung'] . "<br>";
        echo "Nama WBP: " . $data['nama_wbp'] . "<br>";
        echo "Jumlah Pengunjung: " . $data['jumlah_pengunjung'] . "<br>";

        // Menambahkan tombol hapus dengan menggunakan tag form
        echo "<form method='post' action='hapus_data.php'>";
        echo "<input type='hidden' name='id' value='" . $data['id'] . "'>";
        if($result_role){
            if($result_role['role'] == 1){
                echo"<input type='submit' value='Hapus'>";
            }
        }
        echo "<br><br>";
    }
} else {
    echo "Tidak ada data pengunjung.";
}

// Menutup koneksi
$database->closeConnection();
?>
