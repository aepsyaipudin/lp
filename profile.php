<?php
require_once 'Database.php';
require_once "header.php";

$database = new Database();
session_start();

// Fungsi logout
if(isset($_POST['logout'])) {
    session_destroy();
    header('Location: login_page.php');
    exit;
}

// Periksa apakah pengguna sudah login, jika tidak, arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil nama pengguna dari sesi
$username = $_SESSION['username'];

// //Query to get the role of the user based on username
// $query_role = "SELECT role FROM user WHERE username = '$username'";
// $result_role = $database->getSingleResult($query_role);


?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="logo-kambing.png" alt="Logo Kambing">
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="pelayanan.php">Pelayanan</a></li>
                <li><a href="pengunjung.php">Kunjungan</a></li>
                <li><a href="daftar_pengunjung.php">terdaftar</a></li>
                <li><a href="keluhan.php">Keluhan</a></li>
                <li>
                    <form method="post">
                        <button type="submit" name="logout">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header> -->
<!-- <div id="profileId">
        <div id="idWrap">
        <!-- <?php
            echo $username; 
            if ($result_role) {
                if ($result_role['role'] == 1) {
                    echo "  Admin";
                } else {
                    echo "  User";
                }
            }
        ?> -->
        </div>
       <div id="dashboardBtn">
            <a href="home.php">Dashboard</a>
       </div> -->
     
</div>
    <div class="profileWrapContent">
    <div class="menuButton">
    <a href="pelayanan.php"><img class= imgbutton src="img/data-integration.png">
           <button class="button">Integrasi</button></a>
        </div>
        <div class="menuButton">
        <a href="pengunjung.php"><img class= imgbutton src="img/conversation.png">
            <button class="button">Kunjungan</button></a>
        </div>
        <div class="menuButton">
        <a href="keluhan.php"><img class= imgbutton src="img/review.png">
            <button class="button">Keluhan</button></a>
        </div>
        <div class="menuButton">
        <a href="index_kepuasan.php"><img class= imgbutton src="img/happiness.png">
           <button class="button">Indek Kepuasan</button></a>
        </div>
        <div class="menuButton">
        <a href="titip_obat.php"><img class= imgbutton src="img/medicine.png">
            <button class="button">Titip Obat</button></a>
        </div>
        <div class="menuButton">
        <img class= imgbutton src="img/logout.png">
        <form method="post">
                        <button class="button" type="submit" name="logout">Logout</button>
                    </form>
        </div>
        
       
        <!-- Place your profile content here -->
    </div>

    
</body>
</html>
