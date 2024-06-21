<?php

require_once"Database.php";

$database=new Database;
session_start();
// Ambil nama pengguna dari sesi

class role{
   
//Query to get the role of the user based on username
public function getRole($username, $database){
    // Pastikan untuk melakukan sanitasi terhadap variabel $username untuk mencegah serangan SQL Injection
    $username = $_SESSION['username'];
    $sanitized_username = $database->sanitize($username);

    // Gunakan parameterized query untuk mencegah serangan SQL Injection
    $query_role = "SELECT role FROM user WHERE username = ?";
    $result_role = $database->getSingleResult($query_role, [$sanitized_username]);

    // Mengembalikan hasil rolenya
    return $result_role;
}
};
?>