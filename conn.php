<?php
$host="localhost";
$user="root";
$pass="";
$db  ="wpb_inventory";

$koneksi = new mysqli($host,$user,$pass,$db);

// Check connection
// if ($koneksi->connect_error) {
//     die("Connection failed: " . $koneksi->connect_error);
// }
// echo "Connected successfully";
?>
    