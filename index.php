<?php
require 'koneksi.php';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KSI2025 - Data Mahasiswa</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Style -->
  <style>
    body {
      background: linear-gradient(135deg, #f0f5ff, #ffffff);
      font-family: 'Poppins', sans-serif;
      color: #333;
    }

    .navbar {
      background: linear-gradient(90deg, #5b7cfa, #7f9cf5);
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .navbar-brand {
      font-weight: 700;
      font-size: 1.3rem;
      letter-spacing: 1px;
    }

    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }

    .card-header {
      background: linear-gradient(90deg, #5b7cfa, #7f9cf5);
      color: white;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      text-align: center;
      font-weight: 600;
    }

    .table {
      border-radius: 10px;
      overflow: hidden;
    }

    .table th {
      background-color: #e9eefc;
      text-align: center;
    }

    .table td {
      vertical-align: middle;
      text-align: center;
    }

    footer {
      background-color: #5b7cfa;
      color: white;
      font-weight: 500;
      box-shadow: 0 -2px 6px rgba(0,0,0,0.1);
    }

    footer a {
      color: #fff;
      text-decoration: underline;
    }

    /* Animasi halus muncul */
    .fade-in {
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark mb-4">
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

  <div class="container fade-in">
    <div class="card">
      <div class="card-header">
        <h4>📚 Data Mahasiswa</h4>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped align-middle">
          <thead>
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
                echo "<tr><td colspan='5' class='text-center text-muted'>Tidak ada data</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <footer class="text-center py-3 mt-4">
    &copy; <?=date('Y')?> <strong>KSI2025</strong> | Dibuat dengan ❤️ oleh Ayu Tri Sary
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
