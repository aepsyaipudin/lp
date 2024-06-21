<?php
require_once 'database.php';

class Login extends Database {
    // Method untuk melakukan login pengguna
    public function doLogin($login_username, $login_password) {
        $query = "SELECT * FROM user WHERE username='$login_username'";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($login_password, $row['password'])) {
                // Login berhasil, arahkan pengguna ke halaman profile.php
                session_start();
                $_SESSION['username'] = $login_username; // Simpan username ke dalam session
                header("Location: profile.php");
                exit();
            } else {
                return "Password salah!";
            }
        } else {
            return "Username tidak ditemukan!";
        }
    }
}

// Mengecek apakah data dari form login telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = new Login();
    $result = $login->doLogin($_POST['login_username'], $_POST['login_password']);
    echo $result; // Anda dapat menangani pesan kesalahan sesuai kebutuhan aplikasi Anda
}
?>
