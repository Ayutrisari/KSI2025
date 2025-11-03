<?php
// PASTIKAN FILE KONEKSI.PHP SUDAH ADA DI FOLDER YANG SAMA
require 'Koneksi.php'; // Memuat variabel $koneksi

// Tentukan query SQL untuk mengambil semua data mahasiswa
$sql = "SELECT NIM, Nama, Jurusan, Angkatan FROM mahasiswa ORDER BY NIM ASC";

// Jalankan query menggunakan variabel koneksi yang benar: $koneksi
$result = $koneksi->query($sql); 

// Cek apakah query berhasil dijalankan
if (!$result) {
    // Jika query gagal (misalnya nama tabel salah), tampilkan error database
    die("Query gagal: " . $koneksi->error);
}
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4><i class="fas fa-database"></i> Data Mahasiswa</h4>
        <a href="tambah.php" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1; // Variabel penomoran
              
              // Ini adalah BARIS KRITIS (di sekitar baris 77 Anda)
              if ($result->num_rows > 0) {
                  // Loop untuk menampilkan setiap baris data
                  while($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $no++ . "</td>";
                      echo "<td>" . $row['NIM'] . "</td>";
                      echo "<td>" . htmlspecialchars($row['Nama']) . "</td>"; // Gunakan htmlspecialchars untuk keamanan
                      echo "<td>" . htmlspecialchars($row['Jurusan']) . "</td>";
                      echo "<td>" . $row['Angkatan'] . "</td>";
                      echo "<td>";
                      // Tombol Aksi
                      echo "<a href='edit.php?nim=" . $row['NIM'] . "' class='btn btn-warning btn-sm me-2'>Edit</a>";
                      echo "<a href='hapus.php?nim=" . $row['NIM'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus data NIM " . $row['NIM'] . "?')\">Hapus</a>";
                      echo "</td>";
                      echo "</tr>";
                  }
              } else {
                  // Jika tidak ada data
                  echo "<tr><td colspan='6' class='text-center'>Tidak ada data mahasiswa.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script> 
</body>
</html>