<?php
class Database {
    private $host;
    private $username;
    private $password;
    private $dbname;
    public $conn;

    // Constructor untuk membuat koneksi
    public function __construct($host = "localhost", $username = "root", $password = "root", $dbname = "lapas") {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        // Membuat koneksi
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        
        // Memeriksa koneksi
        if ($this->conn->connect_error) {
            die("Koneksi ke database gagal: " . $this->conn->connect_error);
        }
    }

    // Metode untuk mengeksekusi query
    public function executeQuery($query) {
        $result = $this->conn->query($query);

        // Memeriksa kesalahan eksekusi query
        if (!$result) {
            die("Query gagal: " . $this->conn->error);
        }

        return $result;
    }

    // Metode untuk mendapatkan hasil query sebagai array
    public function getResults($query) {
        $result = $this->executeQuery($query);
        $data = [];

        // Mengambil data sebagai array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    // Metode untuk mengambil satu baris hasil query
    public function getSingleResult($query) {
        $result = $this->executeQuery($query);

        // Mengambil satu baris data
        $row = $result->fetch_assoc();

        return $row;
    }

    // Metode untuk mencegah SQL injection
    public function escapeString($value) {
        return $this->conn->real_escape_string($value);
    }

    // Metode untuk menutup koneksi
    public function closeConnection() {
        $this->conn->close();
    }
}

?>
