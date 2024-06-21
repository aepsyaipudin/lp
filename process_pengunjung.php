<?php
// Periksa apakah data telah dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mulai sesi untuk mengakses variabel sesi
    session_start();

    // Periksa apakah pengguna sudah login atau belum
    if(isset($_SESSION['username'])) {
        // Ambil ID pengguna dari sesi
        $username = $_SESSION['username'];
        
        // Handle file foto wajah
        $foto_wajah_name = $_FILES['foto_wajah']['name'];
        $foto_wajah_tmp = $_FILES['foto_wajah']['tmp_name'];
        $foto_wajah_path = "uploads/" . $foto_wajah_name;
        move_uploaded_file($foto_wajah_tmp, $foto_wajah_path);

        // Handle file foto KTP
        $foto_ktp_name = $_FILES['foto_ktp']['name'];
        $foto_ktp_tmp = $_FILES['foto_ktp']['tmp_name'];
        $foto_ktp_path = "uploads/" . $foto_ktp_name;
        move_uploaded_file($foto_ktp_tmp, $foto_ktp_path);

        // Misalnya, Anda bisa menggunakan objek koneksi database dari file Database.php
        require_once 'Database.php'; // Sesuaikan dengan lokasi file Database.php Anda
        
        // Inisialisasi objek database
        $database = new Database();

        // Escape data untuk mencegah SQL Injection
        $foto_wajah_path = $database->conn->real_escape_string($foto_wajah_path);
        $foto_ktp_path = $database->conn->real_escape_string($foto_ktp_path);

        // Query untuk mendapatkan ID pengguna berdasarkan username
        $query_id = "SELECT id FROM user WHERE username = '$username'";
        $result_id = $database->getSingleResult($query_id);

        if ($result_id) {
            // Mendapatkan ID pengguna yang login
            $id_user = $result_id['id'];

            // Ambil data dari formulir pengunjung.php
            $nama_pengunjung = $_POST['nama_pengunjung'];
            $nama_wbp = $_POST['nama_wbp'];
            $kamar_hunian = $_POST['kamar_hunian'];
            $jumlah_pengunjung = $_POST['jumlah_pengunjung'];

            $kamar_hunian = $_POST['kamar_hunian']; // Convert the value to an integer
            // Use $kamar in your database query
            // Query untuk menyimpan data ke dalam tabel pengunjung
            $query = "INSERT INTO pengunjung (id, nama_pengunjung, nama_wbp,kamar_hunian, jumlah_pengunjung, foto_wajah, foto_ktp) 
                      VALUES ('$id_user', '$nama_pengunjung', '$nama_wbp','$kamar_hunian', '$jumlah_pengunjung', '$foto_wajah_path', '$foto_ktp_path')";

            // Eksekusi query
            $result = $database->executeQuery($query);

            // Periksa apakah penyimpanan data berhasil atau tidak
            if ($result) {
                header("Location: berhasil.php");
                exit();  
            } else {
                echo "Gagal menyimpan data.";
            }
        } else {
            echo "Gagal mendapatkan ID pengguna.";
        }

        // Tutup koneksi database
        $database->closeConnection();
    } else {
        // Jika pengguna belum login, maka redirect ke halaman login.php
        header("Location: login.php");
        exit;
    }
} else {
    // Jika data tidak dikirim melalui metode POST, redirect ke halaman pengunjung.php
    header("Location: pengunjung.php");
    exit;
}
?>
