<?php
$host = "localhost";
$user = "root";
$pass = ""; // isi jika ada password
$db   = "ksi2025";

$koneksi = new mysqli($host, $user, $pass, $db);
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>