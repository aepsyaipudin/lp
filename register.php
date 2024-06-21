<?php
// Tampilkan semua jenis error
error_reporting(E_ALL);

// Atur error reporting ke display errors
ini_set('display_errors', 1);
require_once 'Database.php';

class Register extends Database {
    // Method untuk melakukan pendaftaran pengguna
    public function doRegister($username, $email, $password, $role = 2) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (username, email, password, role) VALUES ('$username', '$email', '$passwordHash', $role)";        
        if ($this->conn->query($query) === TRUE) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: profile.php");
            exit();
        }
    }
}

// Mengecek apakah data dari form pendaftaran telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $register = new Register();
    $result = $register->doRegister($_POST['username'], $_POST['email'], $_POST['password'], 2); // Include the role value as 2
    
    // Simpan pesan ke sesi untuk ditampilkan di halaman profile.php
    $_SESSION['message'] = $result;

    // Redirect to profile.php after registration
    header("Location: profile.php");
    exit();
}
?>