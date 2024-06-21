<?php
require_once "role.php";

session_start();
$database=new Database();

$userRole=getRole($username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPOTER</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div id="headtittle" > 
             <h1 id="headLapas">LAPAS KELAS IIB TELUK KUANTAN</h1>
        </div>

        <div id="profileId">
        <div id="idWrap">
        <?php
            echo $username; 
            if ($result_role) {
                if ($result_role['role'] == 1) {
                    echo "  Admin";
                } else {
                    echo "  User";
                }
            }
        ?>
        </div>
       <div id="dashboardBtn">
            <a href="home.php">Dashboard</a>
       </div>
    </header>