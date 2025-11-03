<?php
$host = "localhost";
$user = "root";      // sesuaikan dengan username MySQL kamu
$pass = "";           // kosongkan jika tidak pakai password
$db   = "kampusdb";  // nama database kamu

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
// echo "Koneksi database berhasil!"; // aktifkan ini kalau mau tes
?>
