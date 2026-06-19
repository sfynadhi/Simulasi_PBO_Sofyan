<?php
// koneksi/database.php

$host = "localhost";
$username = "root"; // sesuaikan jika mysql kamu menggunakan password
$password = "";     // sesuaikan jika mysql kamu menggunakan password
$dbname = "db_simulasi_pbo_1a_sofyanapriadhin"; 

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>