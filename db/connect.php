<?php
// $servername = "localhost";
// $username = "iduploadghumloocom";
// $password = "BewuSaSach4peqeVVaidup240808!";
// $dbname = "iduploadghumloocom";
// $con = mysqli_connect('localhost', 'iduploadghumloocom', 'BewuSaSach4peqeVVaidup240808!', 'iduploadghumloocom');
// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "delta_golbal";
$con = mysqli_connect('localhost', 'root', '', 'delta_golbal');
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
