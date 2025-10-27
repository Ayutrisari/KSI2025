<?php
require 'koneksi.php';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KSI2025 - Data Mahasiswa</title>
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
      <a class="navbar-brand" href="#">KSI2025</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="card">
      <div class="card-header">
        <h4>Data Mahasiswa</h4>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Jurusan</th>
              <th>Angkatan</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM mahasiswa ORDER BY id ASC";
            $res = $koneksi->query($sql);
            if ($res && $res->num_rows > 0) {
                $no = 1;
                while ($row = $res->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$no++."</td>";
                    echo "<td>".htmlspecialchars($row['nim'])."</td>";
                    echo "<td>".htmlspecialchars($row['nama'])."</td>";
                    echo "<td>".htmlspecialchars($row['jurusan'])."</td>";
                    echo "<td>".htmlspecialchars($row['angkatan'])."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>Tidak ada data</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <footer class="bg-light text-center py-3 mt-4">
    &copy; <?=date('Y')?> KSI2025
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>