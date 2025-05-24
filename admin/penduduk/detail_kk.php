<?php
include('../part/akses.php');
include('../penduduk/header.php');

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "desa";
$port = "3306";

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$no_kk = $_GET['no_kk'] ?? '';

if (!$no_kk) {
    die("No KK tidak ditemukan.");
}

// Ambil data warga berdasarkan No KK
$query = "SELECT * FROM penduduk_temp WHERE no_kk = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $no_kk);
$stmt->execute();
$result = $stmt->get_result();

// Base URL untuk folder uploads
$base_url = '../../uploads/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Keluarga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for modal */
        #imageModal {
            display: none;
            position: fixed;
            z-index: 1050;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.9);
        }
        #imageModal img {
            margin: auto;
            display: block;
            max-width: 90%;
            max-height: 90%;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.7);
            border-radius: 8px;
        }
        #imageModal .close {
            position: absolute;
            top: 10px;
            right: 20px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Detail Keluarga - No KK: <?= htmlspecialchars($no_kk); ?></h1>
    <ol class="breadcrumb">
      <a href="approval.php" class="btn btn-primary btn-lg shadow">
          <i class="fas fa-arrow-left"></i> Kembali
      </a>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div style="overflow-x: auto;">
          <table class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat/Tgl Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Foto KTP</th>
                <th>Foto KK</th>
                <th>Foto Lainnya</th>
              </tr>
            </thead>
            <form method="POST" action="move_to_penduduk.php">
    <input type="hidden" name="no_kk" value="<?= htmlspecialchars($no_kk); ?>">
    <button type="submit" class="btn btn-success">Approve</button>
</form>

            <tbody>
              <?php 
              if ($result->num_rows > 0) {
                  $no = 1;
                  while ($row = $result->fetch_assoc()) {
                      // Validasi path gambar
                      $foto_ktp = $base_url . htmlspecialchars($row['foto_ktp']);
                      $foto_kk = $base_url . htmlspecialchars($row['foto_kk']);
                      $foto_lainnya = $base_url . htmlspecialchars($row['foto_lainnya']);

                      if (!file_exists($foto_ktp)) $foto_ktp = $base_url . "placeholder.png";
                      if (!file_exists($foto_kk)) $foto_kk = $base_url . "placeholder.png";
                      if (!file_exists($foto_lainnya)) $foto_lainnya = $base_url . "placeholder.png";

                      echo "<tr>
                          <td>" . $no++ . "</td>
                          <td>" . htmlspecialchars($row['nik']) . "</td>
                          <td>" . htmlspecialchars($row['nama']) . "</td>
                          <td>" . htmlspecialchars($row['tempat_lahir']) . " / " . htmlspecialchars($row['tgl_lahir']) . "</td>
                          <td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>
                          <td>" . htmlspecialchars($row['agama']) . "</td>
                          <td>" . htmlspecialchars($row['jalan']) . "</td>
                          <td>
                              <img src='" . $foto_ktp . "' 
                                   alt='Foto KTP' width='100' 
                                   class='img-thumbnail' 
                                   onclick='viewImage(\"" . $foto_ktp . "\")'>
                          </td>
                          <td>
                              <img src='" . $foto_kk . "' 
                                   alt='Foto KK' width='100' 
                                   class='img-thumbnail' 
                                   onclick='viewImage(\"" . $foto_kk . "\")'>
                          </td>
                          <td>
                              <img src='" . $foto_lainnya . "' 
                                   alt='Foto Lainnya' width='100' 
                                   class='img-thumbnail' 
                                   onclick='viewImage(\"" . $foto_lainnya . "\")'>
                          </td>
                      </tr>";
                  }
              } else {
                  echo "<tr><td colspan='10' class='text-center'>Tidak ada data anggota keluarga.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- Modal untuk menampilkan gambar -->
<div id="imageModal">
    <span class="close" onclick="closeImageModal()">&times;</span>
    <img id="modalImageSrc" src="" alt="Gambar">
</div>

<footer class="text-center mt-5" >
  <p>&copy; <?= date("Y"); ?> Sistem Informasi Desa</p>
</footer>

<script>
function viewImage(src) {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImageSrc');

    modal.style.display = "block";
    modalImg.src = src;
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.style.display = "none";
}

</script>
</body>
</html>

<?php

$conn->close();
?>
