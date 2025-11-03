<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];

    $sql = "INSERT INTO mahasiswa (nim, nama, jurusan, angkatan) VALUES ('$nim', '$nama', '$jurusan', '$angkatan')";
    if ($koneksi->query($sql)) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Gagal menambah data: " . $koneksi->error;
    }
}
?>

<form method="POST" action="">
    <label>NIM:</label><br>
    <input type="text" name="nim" required><br>
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br>
    <label>Jurusan:</label><br>
    <input type="text" name="jurusan" required><br>
    <label>Angkatan:</label><br>
    <input type="text" name="angkatan" required><br>
    <button type="submit">Tambah Data</button>
</form>
