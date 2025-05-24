<?php 
include ('../part/akses.php');
include ('../part/header.php');
// error_reporting(0);
// ini_set('display_errors', 0);

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

// Ambil data KK
$query = "SELECT DISTINCT no_kk, desa, kecamatan, kota FROM penduduk_temp WHERE FLAG_APPROVE ='N'ORDER BY no_kk ASC";
$result = $conn->query($query);
?>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php  
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          }else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
            echo '<img src="../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
          }
        ?>
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['lvl']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active">
        <a href="../dashboard/">
          <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
        </a>
      </li>
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>&nbsp;&nbsp;Penduduk</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="../penduduk/"><i class="fa fa-circle-notch"></i>Data Penduduk</a></li>
          <!-- <li><a href="../penduduk/index2.php"><i class="fa fa-circle-notch"></i>Data Penduduk RT/RW</a></li> -->
          <!-- <li><a href="../penduduk/index3.php"><i class="fa fa-circle-notch"></i>Data Penduduk Mati</a></li> -->
          <li><a href="../penduduk/lampid.php"><i class="fa fa-circle-notch"></i>Lampid</a></li>
        </ul>
      </li>
      
      <?php
        if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
      ?>
      <li class="treeview">
        <a href="#">
          <i class="fas fa-envelope-open-text"></i> <span>&nbsp;&nbsp;Surat</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="../surat/permintaan_surat/"><i class="fa fa-circle-notch"></i> Permintaan Surat</a>
          </li>
          <li>
            <a href="../surat/surat_selesai/"><i class="fa fa-circle-notch"></i> Surat Selesai</a>
          </li>
        </ul>
      </li>
      <?php 
        }else{
          
        }
      ?>
      <li>
        <a href="../laporan/"><i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;Laporan</span></a>
      </li>
      <li class="active">
        <a href="../user/">
          <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;User</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Keluarga Berdasarkan KK</h1>
    <ol class="breadcrumb">
      <a href="../../penduduk" class="btn btn-success btn-lg shadow">
          <i class="fas fa-envelope-open-text"></i> Tambah Warga
      </a>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div>
          <?php 
          if (isset($_GET['pesan'])) {
              if ($_GET['pesan'] == "gagal-menambah") {
                  echo "<div class='alert alert-danger'><center>Anda tidak bisa menambah data. NIK tersebut sudah digunakan.</center></div>";
              }
          }
          ?>
        </div>
        <br><br>
        <div style="overflow-x: auto;">
          <table class="table table-striped table-bordered" id="data-table" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>No KK</th>
                <th>Desa</th>
                <th>Kecamatan</th>
                <th>Kota</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if ($result->num_rows > 0) {
                  $no = 1;
                  while ($row = $result->fetch_assoc()) {
                      echo "<tr>
                          <td>" . $no++ . "</td>
                          <td>" . htmlspecialchars($row['no_kk']) . "</td>
                          <td>" . htmlspecialchars($row['desa']) . "</td>
                          <td>" . htmlspecialchars($row['kecamatan']) . "</td>
                          <td>" . htmlspecialchars($row['kota']) . "</td>
                          <td>
                              <a href='detail_kk.php?no_kk=" . urlencode($row['no_kk']) . "' class='btn btn-primary btn-sm'>
                                  <i class='fa fa-eye'></i> Lihat Detail
                              </a>
                          </td>
                      </tr>";
                  }
              } else {
                  echo "<tr><td colspan='6' class='text-center'>Tidak ada data KK yang ditemukan.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<footer class="text-center mt-5">
  <p>&copy; <?= date("Y"); ?> Sistem Informasi Desa</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
