
<?php 
  include ('../part/akses.php');
  include ('../part/header.php');
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
      <li class="header">MAIN MENU</li>
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
          <li>
            <a href="../penduduk/"><i class="fa fa-circle-notch"></i>Data Penduduk</a>
          </li>
          <li>
            <a href="../penduduk/index2.php"><i class="fa fa-circle-notch"></i>Data Penduduk RT/RW</a>
          </li>
          <li>
            <a href="../penduduk/index3.php"><i class="fa fa-circle-notch"></i>Data Penduduk Mati</a>
          </li>
           <li>
            <a href="../penduduk/lampid.php"><i class="fa fa-circle-notch"></i>Lampid</a>
          </li>
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
    </ul>
  </section>
</aside>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Penduduk</h1>
    <ol class="breadcrumb">
      <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Data Penduduk</li>
    </ol>
  </section>
  <section class="content">      
    <div class="row">
      <div class="col-md-12">
        <div>
        </div>
        <?php 
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
        
         
          } else {

          }
        ?>
        <!-- <br><br>
        <table class="table table-striped table-bordered table-responsive" id="data-table" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th><strong>No</strong></th>
              <th><strong>NIK</strong></th>
              <th><strong>Nama</strong></th>
              <th><strong>Tempat/Tgl Lahir</strong></th>
              <th><strong>Jenis Kelamin</strong></th>
              <th><strong>Agama</strong></th>
              <th><strong>Alamat</strong></th>
              <?php 
                if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
              ?>
              <th><strong>Aksi</strong></th>
              <?php  
                } else {

                }
              ?>
            </tr>
          </thead>
          <tbody>
            <?php
              include ('../../config/koneksi.php');

              $no = 1;
              $qTampil = mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh IN ('HIDUP','LAHIR','DATANG')");
              foreach($qTampil as $row){
                $tanggal = $row['tgl_lahir'];
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row['nik']; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row['nama']; ?></td>
              <?php
                $tanggal = date('d', strtotime($row['tgl_lahir']));
                $bulan = date('F', strtotime($row['tgl_lahir']));
                $tahun = date('Y', strtotime($row['tgl_lahir']));
                $bulanIndo = array(
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember'
                );
              ?>
              <td style="text-transform: capitalize;"><?php echo $row['tempat_lahir'] . ", " . $tanggal . " " . $bulanIndo[$bulan] . " " . $tahun; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row['jenis_kelamin']; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row['agama']; ?></td>
              <td style="text-transform: capitalize;"><?php echo 'Dsn. ', $row['dusun'], ', RT', $row['rt'], '/RW', $row['rw']; ?></td>
              <?php 
                if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
              ?>
              <td>
                <a class="btn btn-success btn-sm" href='edit-penduduk.php?id=<?php echo $row['id_penduduk']; ?>'><i class="fa fa-edit"></i></a>
                <a class="btn btn-danger btn-sm" href='hapus-penduduk.php?id=<?php echo $row['id_penduduk']; ?>' onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
              </td>
              <?php  
                } else {
                  
                }
              ?>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
       
        <li>Lampiran Pendudukan Meninggal</li>
        <table class="table table-striped table-bordered table-responsive" id="data-table" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th><strong>No</strong></th>
              <th><strong>NIK</strong></th>
              <th><strong>Nama</strong></th>
              <th><strong>Tempat/Tgl Lahir</strong></th>
              <th><strong>Jenis Kelamin</strong></th>
              <th><strong>Agama</strong></th>
              <th><strong>Alamat</strong></th>
              <th><strong>Status</strong></th>
              <?php 
                if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
              ?>
             
              <?php  
                } else {

                }
              ?>
            </tr>
          </thead>
          <tbody>
            <?php
              include ('../../config/koneksi.php');

              $no3 = 1;
              $qTampil3 = mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh = 'MATI'");
              foreach($qTampil3 as $row3){
                $tanggal = $row3['tgl_lahir'];
            ?>
            <tr>
              <td><?php echo $no3++; ?></td>
              <td><?php echo $row3['nik']; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row3['nama']; ?></td>
              <?php
                $tanggal = date('d', strtotime($row3['tgl_lahir']));
                $bulan = date('F', strtotime($row3['tgl_lahir']));
                $tahun = date('Y', strtotime($row3['tgl_lahir']));
                $bulanIndo = array(
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember'
                );
              ?>
              <td style="text-transform: capitalize;"><?php echo $row3['tempat_lahir'] . ", " . $tanggal . " " . $bulanIndo[$bulan] . " " . $tahun; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row3['jenis_kelamin']; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row3['agama']; ?></td>
              <td style="text-transform: capitalize;"><?php echo 'Dsn. ', $row3['dusun'], ', RT', $row['rt'], '/RW', $row['rw']; ?></td>
              <?php 
                if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
              ?>
             
              <?php  
                } else {
                  
                }
              ?>
                            <td style="text-transform: capitalize;"><?php echo $row3['pend_ditempuh']; ?></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
        <li>Lampiran Pendudukan Pindah</li>
        <table class="table table-striped table-bordered table-responsive" id="data-table" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th><strong>No</strong></th>
              <th><strong>NIK</strong></th>
              <th><strong>Nama</strong></th>
              <th><strong>Tempat/Tgl Lahir</strong></th>
              <th><strong>Jenis Kelamin</strong></th>
              <th><strong>Agama</strong></th>
              <th><strong>Alamat</strong></th>
              <th><strong>Status</strong></th>
              <?php 
                if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
              ?>
             
              <?php  
                } else {

                }
              ?>
            </tr>
          </thead>
          <tbody>
            <?php
              include ('../../config/koneksi.php');

              $no4 = 1;
              $qTampil4 = mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh = 'PINDAH'");
              foreach($qTampil4 as $row4){
                $tanggal = $row['tgl_lahir'];
            ?>
            <tr>
              <td><?php echo $no4++; ?></td>
              <td><?php echo $row4['nik']; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row4['nama']; ?></td>
              <?php
                $tanggal = date('d', strtotime($row4['tgl_lahir']));
                $bulan = date('F', strtotime($row4['tgl_lahir']));
                $tahun = date('Y', strtotime($row4['tgl_lahir']));
                $bulanIndo = array(
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember'
                );
              ?>
              <td style="text-transform: capitalize;"><?php echo $row4['tempat_lahir'] . ", " . $tanggal . " " . $bulanIndo[$bulan] . " " . $tahun; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row4['jenis_kelamin']; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row4['agama']; ?></td>
              <td style="text-transform: capitalize;"><?php echo 'Dsn. ', $row4['dusun'], ', RT', $row['rt'], '/RW', $row['rw']; ?></td>
              <?php 
                if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
              ?>
             
              <?php  
                } else {
                  
                }
              ?>
                            <td style="text-transform: capitalize;"><?php echo $row4['pend_ditempuh']; ?></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
            </tr>
          </thead>-->
          <li>Detail Data Penduduk</li>
          <table class="table table-striped table-bordered table-responsive" id="data-table" width="100%" cellspacing="0">
          <thead>
          <!-- rw 1 -->
          <?php $sql =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='001'");
      $sql2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='001'");
      $query =mysqli_num_rows($sql);
      $query2=mysqli_num_rows($sql2);
      $sql3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='001'");
      $query3 =mysqli_num_rows($sql3);
      $sql4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='001' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Laki-laki'");
      $query4 =mysqli_num_rows($sql4);
      $sql5 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='001' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Perempuan'");
      $query5 =mysqli_num_rows($sql5);
$sql6 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='001' AND pend_ditempuh='MATI' AND jenis_kelamin='Laki-laki'");
      $query6 =mysqli_num_rows($sql6);
$sql7 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='001' AND pend_ditempuh='MATI' AND jenis_kelamin='Perempuan'");
      $query7 =mysqli_num_rows($sql7);
$sql8 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='001' AND pend_ditempuh='DATANG' AND jenis_kelamin='Laki-laki'");
      $query8 =mysqli_num_rows($sql8);
$sql9 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='001' AND pend_ditempuh='DATANG' AND jenis_kelamin='Perempuan'");
      $query9 =mysqli_num_rows($sql9);
$sql10 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='001' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Laki-laki'");
      $query10 =mysqli_num_rows($sql10);
$sql11 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='001' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Perempuan'");
      $query11 =mysqli_num_rows($sql11);
      $sql12 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='001' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Laki-laki'");
      $query12 =mysqli_num_rows($sql12);
$sql13 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='001' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Perempuan'");
      $query13 =mysqli_num_rows($sql13);
      $sql14 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='001' AND pend_ditempuh !='PINDAH' AND 'MATI'");
      $query14 =mysqli_num_rows($sql14);


      //rw 2
      $sqlrw2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='002'");
      $sql2rw2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='002'");
      $queryrw2 =mysqli_num_rows($sqlrw2);
      $query2rw2=mysqli_num_rows($sql2rw2);
      $sql3rw2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='002'");
      $query3rw2 =mysqli_num_rows($sql3rw2);
      $sql4rw2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='002' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Laki-laki'");
      $query4rw2 =mysqli_num_rows($sql4rw2);
$sql5rw2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='002' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Perempuan'");
      $query5rw2 =mysqli_num_rows($sql5rw2);
$sql6rw2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='002' AND pend_ditempuh='MATI' AND jenis_kelamin='Laki-laki'");
      $query6rw2 =mysqli_num_rows($sql6rw2);
$sql7rw2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='002' AND pend_ditempuh='MATI' AND jenis_kelamin='Perempuan'");
      $query7rw2 =mysqli_num_rows($sql7rw2);
$sql8rw2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='002' AND pend_ditempuh='DATANG' AND jenis_kelamin='Laki-laki'");
      $query8rw2 =mysqli_num_rows($sql8rw2);
$sql9rw2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='002' AND pend_ditempuh='DATANG' AND jenis_kelamin='Perempuan'");
      $query9rw2 =mysqli_num_rows($sql9rw2);
$sql10rw2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='002' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Laki-laki'");
      $query10rw2 =mysqli_num_rows($sql10rw2);
$sql11rw2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='002' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Perempuan'");
      $query11rw2 =mysqli_num_rows($sql11rw2);
      $sql12rw2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='002' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Laki-laki'");
      $query12rw2 =mysqli_num_rows($sql12rw2);
$sql13rw2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='002' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Perempuan'");
      $query13rw2 =mysqli_num_rows($sql13rw2);
      $sql14rw2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='002' AND pend_ditempuh !='PINDAH' AND 'MATI'");
      $query14rw2 =mysqli_num_rows($sql14rw2);
      //rw 3
      $sqlrw3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='003'");
      $sql2rw3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='003'");
      $queryrw3 =mysqli_num_rows($sqlrw3);
      $query2rw3=mysqli_num_rows($sql2rw3);
      $sql3rw3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='003'");
      $query3rw3 =mysqli_num_rows($sql3rw3);
      $sql4rw3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='003' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Laki-laki'");
      $query4rw3 =mysqli_num_rows($sql4rw3);
$sql5rw3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='003' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Perempuan'");
      $query5rw3 =mysqli_num_rows($sql5rw3);
$sql6rw3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='003' AND pend_ditempuh='MATI' AND jenis_kelamin='Laki-laki'");
      $query6rw3 =mysqli_num_rows($sql6rw3);
$sql7rw3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='003' AND pend_ditempuh='MATI' AND jenis_kelamin='Perempuan'");
      $query7rw3 =mysqli_num_rows($sql7rw3);
$sql8rw3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='003' AND pend_ditempuh='DATANG' AND jenis_kelamin='Laki-laki'");
      $query8rw3 =mysqli_num_rows($sql8rw3);
$sql9rw3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='003' AND pend_ditempuh='DATANG' AND jenis_kelamin='Perempuan'");
      $query9rw3 =mysqli_num_rows($sql9rw3);
$sql10rw3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='003' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Laki-laki'");
      $query10rw3 =mysqli_num_rows($sql10rw3);
$sql11rw3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='003' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Perempuan'");
      $query11rw3 =mysqli_num_rows($sql11rw3);
      $sql12rw3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='003' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Laki-laki'");
      $query12rw3 =mysqli_num_rows($sql12rw3);
$sql13rw3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='003' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Perempuan'");
      $query13rw3 =mysqli_num_rows($sql13rw3);
      $sql14rw3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='003' AND pend_ditempuh !='PINDAH' AND 'MATI'");
      $query14rw3 =mysqli_num_rows($sql14rw3);
      //rw4
      $sqlrw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='004'");
      $sql2rw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='004'");
      $queryrw4 =mysqli_num_rows($sqlrw4);
      $query2rw4=mysqli_num_rows($sql2rw4);
      $sql3rw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='004'");
      $query3rw4 =mysqli_num_rows($sql3rw4);
      $sql4rw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='004' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Laki-laki'");
      $query4rw4 =mysqli_num_rows($sql4rw4);
$sql5rw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='004' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Perempuan'");
      $query5rw4 =mysqli_num_rows($sql5rw4);
$sql6rw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='004' AND pend_ditempuh='MATI' AND jenis_kelamin='Laki-laki'");
      $query6rw4 =mysqli_num_rows($sql6rw4);
$sql7rw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='004' AND pend_ditempuh='MATI' AND jenis_kelamin='Perempuan'");
      $query7rw4 =mysqli_num_rows($sql7rw4);
$sql8rw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='004' AND pend_ditempuh='DATANG' AND jenis_kelamin='Laki-laki'");
      $query8rw4 =mysqli_num_rows($sql8rw4);
$sql9rw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='004' AND pend_ditempuh='DATANG' AND jenis_kelamin='Perempuan'");
      $query9rw4 =mysqli_num_rows($sql9rw4);
$sql10rw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='004' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Laki-laki'");
      $query10rw4 =mysqli_num_rows($sql10rw4);
$sql11rw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='004' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Perempuan'");
      $query11rw4 =mysqli_num_rows($sql11rw4);
      $sql12rw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='004' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Laki-laki'");
      $query12rw4 =mysqli_num_rows($sql12rw4);
$sql13rw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='004' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Perempuan'");
      $query13rw4 =mysqli_num_rows($sql13rw4);
      $sql14rw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='004' AND pend_ditempuh !='PINDAH' AND 'MATI'");
      $query14rw4 =mysqli_num_rows($sql14rw4);
      
      // //rw4
      // $sqlrw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='004'");
      // $sql2rw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='004'");
      // $queryrw4 =mysqli_num_rows($sqlrw4);
      // $query2rw4=mysqli_num_rows($sql2rw4);
      // $sql3rw4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='004'");
      // $query3rw4 =mysqli_num_rows($sql3rw4);
//rw5
      $sqlrw5 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='004'");
      $sql2rw5 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='004'");
      $queryrw5 =mysqli_num_rows($sqlrw5);
      $query2rw5=mysqli_num_rows($sql2rw5);
      $sql3rw5 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='004'");
      $query3rw5 =mysqli_num_rows($sql3rw5);
      $sql4rw5 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='005' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Laki-laki'");
      $query4rw5 =mysqli_num_rows($sql4rw5);
$sql5rw5 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='005' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Perempuan'");
      $query5rw5 =mysqli_num_rows($sql5rw5);
$sql6rw5 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='005' AND pend_ditempuh='MATI' AND jenis_kelamin='Laki-laki'");
      $query6rw5 =mysqli_num_rows($sql6rw5);
$sql7rw5 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='005' AND pend_ditempuh='MATI' AND jenis_kelamin='Perempuan'");
      $query7rw5 =mysqli_num_rows($sql7rw5);
$sql8rw5 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='005' AND pend_ditempuh='DATANG' AND jenis_kelamin='Laki-laki'");
      $query8rw5 =mysqli_num_rows($sql8rw5);
$sql9rw5 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='005' AND pend_ditempuh='DATANG' AND jenis_kelamin='Perempuan'");
      $query9rw5 =mysqli_num_rows($sql9rw5);
$sql10rw5 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='005' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Laki-laki'");
      $query10rw5 =mysqli_num_rows($sql10rw5);
$sql11rw5 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='005' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Perempuan'");
      $query11rw5 =mysqli_num_rows($sql11rw5);
      $sql12rw5 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='005' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Laki-laki'");
      $query12rw5 =mysqli_num_rows($sql12rw5);
$sql13rw5 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='005' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Perempuan'");
      $query13rw5 =mysqli_num_rows($sql13rw5);
      $sql14rw5 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='005' AND pend_ditempuh !='PINDAH' AND 'MATI'");
      $query14rw5 =mysqli_num_rows($sql14rw5);
      //rw6
      $sqlrw6 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='006'");
      $sql2rw6 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='006'");
      $queryrw6 =mysqli_num_rows($sqlrw6);
      $query2rw6=mysqli_num_rows($sql2rw6);
      $sql3rw6 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='006'");
      $query3rw6 =mysqli_num_rows($sql3rw6);
      $sql4rw6 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='006' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Laki-laki'");
      $query4rw6 =mysqli_num_rows($sql4rw6);
$sql5rw6 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='006' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Perempuan'");
      $query5rw6 =mysqli_num_rows($sql5rw6);
$sql6rw6 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='006' AND pend_ditempuh='MATI' AND jenis_kelamin='Laki-laki'");
      $query6rw6 =mysqli_num_rows($sql6rw6);
$sql7rw6 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='006' AND pend_ditempuh='MATI' AND jenis_kelamin='Perempuan'");
      $query7rw6 =mysqli_num_rows($sql7rw6);
$sql8rw6 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='006' AND pend_ditempuh='DATANG' AND jenis_kelamin='Laki-laki'");
      $query8rw6 =mysqli_num_rows($sql8rw6);
$sql9rw6 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='006' AND pend_ditempuh='DATANG' AND jenis_kelamin='Perempuan'");
      $query9rw6 =mysqli_num_rows($sql9rw6);
$sql10rw6 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='006' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Laki-laki'");
      $query10rw6 =mysqli_num_rows($sql10rw6);
$sql11rw6 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='006' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Perempuan'");
      $query11rw6 =mysqli_num_rows($sql11rw6);
      $sql12rw6 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='006' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Laki-laki'");
      $query12rw6 =mysqli_num_rows($sql12rw6);
$sql13rw6 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='006' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Perempuan'");
      $query13rw6 =mysqli_num_rows($sql13rw6);
      $sql14rw6 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='006' AND pend_ditempuh !='PINDAH' AND 'MATI'");
      $query14rw6 =mysqli_num_rows($sql14rw6);
      //rw7
      $sqlrw7 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='007'");
      $sql2rw7 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='007'");
      $queryrw7 =mysqli_num_rows($sqlrw7);
      $query2rw7=mysqli_num_rows($sql2rw7);
      $sql3rw7 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='007'");
      $query3rw7 =mysqli_num_rows($sql3rw7);
      $sql4rw7 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='007' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Laki-laki'");
      $query4rw7 =mysqli_num_rows($sql4rw7);
$sql5rw7 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='007' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Perempuan'");
      $query5rw7 =mysqli_num_rows($sql5rw7);
$sql6rw7 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='007' AND pend_ditempuh='MATI' AND jenis_kelamin='Laki-laki'");
      $query6rw7 =mysqli_num_rows($sql6rw7);
$sql7rw7 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='007' AND pend_ditempuh='MATI' AND jenis_kelamin='Perempuan'");
      $query7rw7 =mysqli_num_rows($sql7rw7);
$sql8rw7 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='007' AND pend_ditempuh='DATANG' AND jenis_kelamin='Laki-laki'");
      $query8rw7 =mysqli_num_rows($sql8rw7);
$sql9rw7 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='007' AND pend_ditempuh='DATANG' AND jenis_kelamin='Perempuan'");
      $query9rw7 =mysqli_num_rows($sql9rw7);
$sql10rw7 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='007' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Laki-laki'");
      $query10rw7 =mysqli_num_rows($sql10rw7);
$sql11rw7 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='007' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Perempuan'");
      $query11rw7 =mysqli_num_rows($sql11rw7);
      $sql12rw7 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='007' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Laki-laki'");
      $query12rw7 =mysqli_num_rows($sql12rw7);
$sql13rw7 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='007' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Perempuan'");
      $query13rw7 =mysqli_num_rows($sql13rw7);
      $sql14rw7 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='007' AND pend_ditempuh !='PINDAH' AND 'MATI'");
      $query14rw7 =mysqli_num_rows($sql14rw7);
      //rw8
      $sqlrw8 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='008'");
      $sql2rw8 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='008'");
      $queryrw8 =mysqli_num_rows($sqlrw8);
      $query2rw8=mysqli_num_rows($sql2rw8);
      $sql3rw8 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='008'");
      $query3rw8 =mysqli_num_rows($sql3rw8);
      $sql4rw8 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='008' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Laki-laki'");
      $query4rw8 =mysqli_num_rows($sql4rw8);
$sql5rw8 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='008' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Perempuan'");
      $query5rw8 =mysqli_num_rows($sql5rw8);
$sql6rw8 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='008' AND pend_ditempuh='MATI' AND jenis_kelamin='Laki-laki'");
      $query6rw8 =mysqli_num_rows($sql6rw8);
$sql7rw8 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='008' AND pend_ditempuh='MATI' AND jenis_kelamin='Perempuan'");
      $query7rw8 =mysqli_num_rows($sql7rw8);
$sql8rw8 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='008' AND pend_ditempuh='DATANG' AND jenis_kelamin='Laki-laki'");
      $query8rw8 =mysqli_num_rows($sql8rw8);
$sql9rw8 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='008' AND pend_ditempuh='DATANG' AND jenis_kelamin='Perempuan'");
      $query9rw8 =mysqli_num_rows($sql9rw8);
$sql10rw8 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='008' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Laki-laki'");
      $query10rw8 =mysqli_num_rows($sql10rw8);
$sql11rw8 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='008' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Perempuan'");
      $query11rw8 =mysqli_num_rows($sql11rw8);
      $sql12rw8 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='008' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Laki-laki'");
      $query12rw8 =mysqli_num_rows($sql12rw8);
$sql13rw8 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='008' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Perempuan'");
      $query13rw8 =mysqli_num_rows($sql13rw8);
      $sql14rw8 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='008' AND pend_ditempuh !='PINDAH' AND 'MATI'");
      $query14rw8 =mysqli_num_rows($sql14rw8);     
      //rw9
      $sqlrw9 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='h'");
      $sql2rw9 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='009'");
      $queryrw9 =mysqli_num_rows($sqlrw9);
      $query2rw9=mysqli_num_rows($sql2rw9);
      $sql3rw9 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='009'");
      $query3rw9 =mysqli_num_rows($sql3rw9);
      $sql4rw9 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='009' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Laki-laki'");
      $query4rw9 =mysqli_num_rows($sql4rw9);
$sql5rw9 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='009' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Perempuan'");
      $query5rw9 =mysqli_num_rows($sql5rw9);
$sql6rw9 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='009' AND pend_ditempuh='MATI' AND jenis_kelamin='Laki-laki'");
      $query6rw9 =mysqli_num_rows($sql6rw9);
$sql7rw9 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='009' AND pend_ditempuh='MATI' AND jenis_kelamin='Perempuan'");
      $query7rw9 =mysqli_num_rows($sql7rw9);
$sql8rw9 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='009' AND pend_ditempuh='DATANG' AND jenis_kelamin='Laki-laki'");
      $query8rw9 =mysqli_num_rows($sql8rw9);
$sql9rw9 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='009' AND pend_ditempuh='DATANG' AND jenis_kelamin='Perempuan'");
      $query9rw9 =mysqli_num_rows($sql9rw9);
$sql10rw9 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='009' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Laki-laki'");
      $query10rw9 =mysqli_num_rows($sql10rw9);
$sql11rw9 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='009' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Perempuan'");
      $query11rw9 =mysqli_num_rows($sql11rw9);
      $sql12rw9 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='009' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Laki-laki'");
      $query12rw9 =mysqli_num_rows($sql12rw9);
$sql13rw9 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='009' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Perempuan'");
      $query13rw9 =mysqli_num_rows($sql13rw9);
      $sql14rw9 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='009' AND pend_ditempuh !='PINDAH' AND 'MATI'");
      $query14rw9 =mysqli_num_rows($sql14rw9);
      //rw10
      $sqlrw10 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='h'");
      $sql2rw10 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='010'");
      $queryrw10 =mysqli_num_rows($sqlrw10);
      $query2rw10=mysqli_num_rows($sql2rw10);
      $sql3rw10 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='010'");
      $query3rw10 =mysqli_num_rows($sql3rw10);
      $sql4rw10 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='010' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Laki-laki'");
      $query4rw10 =mysqli_num_rows($sql4rw10);
$sql5rw10 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='010' AND pend_ditempuh='LAHIR' AND jenis_kelamin='Perempuan'");
      $query5rw10 =mysqli_num_rows($sql5rw10);
$sql6rw10 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='010' AND pend_ditempuh='MATI' AND jenis_kelamin='Laki-laki'");
      $query6rw10 =mysqli_num_rows($sql6rw10);
$sql7rw10 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='010' AND pend_ditempuh='MATI' AND jenis_kelamin='Perempuan'");
      $query7rw10 =mysqli_num_rows($sql7rw10);
$sql8rw10 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='010' AND pend_ditempuh='DATANG' AND jenis_kelamin='Laki-laki'");
      $query8rw10 =mysqli_num_rows($sql8rw10);
$sql9rw10 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='010' AND pend_ditempuh='DATANG' AND jenis_kelamin='Perempuan'");
      $query9rw10 =mysqli_num_rows($sql9rw10);
$sql10rw10 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='010' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Laki-laki'");
      $query10rw10 =mysqli_num_rows($sql10rw10);
$sql11rw10 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='010' AND pend_ditempuh='PINDAH' AND jenis_kelamin='Perempuan'");
      $query11rw10 =mysqli_num_rows($sql11rw10);
      $sql12rw10 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='010' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Laki-laki'");
      $query12rw10 =mysqli_num_rows($sql12rw10);
$sql13rw10 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='010' AND pend_ditempuh !='PINDAH'AND 'MATI' AND jenis_kelamin='Perempuan'");
      $query13rw10 =mysqli_num_rows($sql13rw10);
      $sql14rw10 =mysqli_query($connect, "SELECT * FROM penduduk WHERE rw='010' AND pend_ditempuh !='PINDAH' AND 'MATI'");
      $query14rw10 =mysqli_num_rows($sql14rw10);
       
//jumlah
      $queryjumlah = mysqli_query($connect, "SELECT * FROM penduduk");

       ?>

      <tr>
        <th rowspan="2" width="5" align="">no</th>
        <th rowspan="2" width="2">dusun</th>
        <th rowspan="2" width="1">rw</th>
        <th colspan="3" width="10">Awal</th>
        <td colspan="2" width="10">Lahir</td>
        <td colspan="2" width="10">Mati</td>
        <td colspan="2" width="10">Datang</td>
        <td colspan="2" width="10">Pindah</td>
        <td colspan="3" width="10">Akhir</td>
      </tr>
      <tr>
        <td width="100">Laki-laki</td>
      <td width="10"><b> Perempuan</b></td>
      <td width="10"><b>Jumlah</b></td>
      <td width="10">L</td>
      <td width="10">P</td>
      <td width="10">L</td>
      <td width="10">P</td>
      <td width="10">L</td>
      <td width="10">P</td>
      <td width="10">L</td>
      <td width="10">P</td>
      <td width="100">Laki-laki</td>
      <td width="10">Perempuan</td>
      <td width="10">Jumlah</td>
      <!-- <td width="10">ss</td> -->
    </tr>
      <tr>
      <td width="10">1</td>
      <td width="10">01</td>
      <td width="10">001</td>
        <td width="100">Laki-laki<b> <?php echo $query; ?></b></td>
      <td width="10">Perempuan<b> <?php echo $query2; ?></b></td>
      <td width="10">Jumlah<b> <?php echo $query3; ?></b></td>
      <td width="10"><?php echo $query4; ?></td>
      <td width="10"><?php echo $query5; ?></td>
      <td width="10"><?php echo $query6; ?></td>
      <td width="10"><?php echo $query7; ?></td>
      <td width="10"><?php echo $query8; ?></td>
      <td width="10"><?php echo $query9; ?></td>
      <td width="10"><?php echo $query10; ?></td>
      <td width="10"><?php echo $query11; ?></td>
      <td width="10"><?php echo $query12; ?></td>
      <td width="10"><?php echo $query13; ?></td>
      <td width="10"><?php echo $query14; ?></td>
      <!-- <td width="10">ss</td> -->
    </tr>
    <tr>
      <td width="10">2</td>
      <td width="10">02</td>
      <td width="10">002</td>
        <td width="100">Laki-laki<b> <?php echo $queryrw2; ?></b></td>
      <td width="10">Perempuan<b> <?php echo $query2rw2; ?></b></td>
      <td width="10">Jumlah<b> <?php echo $query3rw2; ?></b></td>
      <td width="10"><?php echo $query4rw2; ?></td>
      <td width="10"><?php echo $query5rw2; ?></td>
      <td width="10"><?php echo $query6rw2; ?></td>
      <td width="10"><?php echo $query7rw2; ?></td>
      <td width="10"><?php echo $query8rw2; ?></td>
      <td width="10"><?php echo $query9rw2; ?></td>
      <td width="10"><?php echo $query10rw2; ?></td>
      <td width="10"><?php echo $query11rw2; ?></td>
      <td width="10"><?php echo $query12rw2; ?></td>
      <td width="10"><?php echo $query13rw2; ?></td>
      <td width="10"><?php echo $query14rw2; ?></td>

      <!-- <td width="10">ss</td> -->
    </tr>
    <tr>
      <td width="10">3</td>
      <td width="10">03</td>
      <td width="10">003</td>
        <td width="100">Laki-laki<b> <?php echo $queryrw3; ?></b></td>
      <td width="10">Perempuan<b> <?php echo $query2rw3; ?></b></td>
      <td width="10">Jumlah<b> <?php echo $query3rw3; ?></b></td>
      <td width="10"><?php echo $query4rw3; ?></td>
      <td width="10"><?php echo $query5rw3; ?></td>
      <td width="10"><?php echo $query6rw3; ?></td>
      <td width="10"><?php echo $query7rw3; ?></td>
      <td width="10"><?php echo $query8rw3; ?></td>
      <td width="10"><?php echo $query9rw3; ?></td>
      <td width="10"><?php echo $query10rw3; ?></td>
      <td width="10"><?php echo $query11rw3; ?></td>
      <td width="10"><?php echo $query12rw3; ?></td>
      <td width="10"><?php echo $query13rw3; ?></td>
      <td width="10"><?php echo $query14rw3; ?></td>
      <!-- <td width="10">ss</td> -->
    </tr>
    <tr>
      <td width="10">4</td>
      <td width="10">04</td>
      <td width="10">004</td>
         <td width="100">Laki-laki<b> <?php echo $queryrw4; ?></b></td>
      <td width="10">Perempuan<b> <?php echo $query2rw4; ?></b></td>
      <td width="10">Jumlah<b> <?php echo $query3rw4; ?></b></td>
      <td width="10"><?php echo $query4rw4; ?></td>
      <td width="10"><?php echo $query5rw4; ?></td>
      <td width="10"><?php echo $query6rw4; ?></td>
      <td width="10"><?php echo $query7rw4; ?></td>
      <td width="10"><?php echo $query8rw4; ?></td>
      <td width="10"><?php echo $query9rw4; ?></td>
      <td width="10"><?php echo $query10rw4; ?></td>
      <td width="10"><?php echo $query11rw4; ?></td>
      <td width="10"><?php echo $query12rw4; ?></td>
      <td width="10"><?php echo $query13rw4; ?></td>
      <td width="10"><?php echo $query14rw4; ?></td>
    </tr>
    <tr>
      <td width="10">5</td>
      <td width="10">05</td>
      <td width="10">005</td>
         <td width="100">Laki-laki<b> <?php echo $queryrw5; ?></b></td>
      <td width="10">Perempuan<b> <?php echo $query2rw5; ?></b></td>
      <td width="10">Jumlah<b> <?php echo $query3rw5; ?></b></td>
      <td width="10"><?php echo $query4rw5; ?></td>
      <td width="10"><?php echo $query5rw5; ?></td>
      <td width="10"><?php echo $query6rw5; ?></td>
      <td width="10"><?php echo $query7rw5; ?></td>
      <td width="10"><?php echo $query8rw5; ?></td>
      <td width="10"><?php echo $query9rw5; ?></td>
      <td width="10"><?php echo $query10rw5; ?></td>
      <td width="10"><?php echo $query11rw5; ?></td>
      <td width="10"><?php echo $query12rw5; ?></td>
      <td width="10"><?php echo $query13rw5; ?></td>
      <td width="10"><?php echo $query14rw5; ?></td>      
    </tr>
    <tr>
      <td width="10">6</td>
      <td width="10">06</td>
      <td width="10">006</td>
        <td width="100">Laki-laki<b> <?php echo $queryrw6; ?></b></td>
      <td width="10">Perempuan<b> <?php echo $query2rw6; ?></b></td>
      <td width="10">Jumlah<b> <?php echo $query3rw6; ?></b></td>
      <td width="10"><?php echo $query4rw6; ?></td>
      <td width="10"><?php echo $query5rw6; ?></td>
      <td width="10"><?php echo $query6rw6; ?></td>
      <td width="10"><?php echo $query7rw6; ?></td>
      <td width="10"><?php echo $query8rw6; ?></td>
      <td width="10"><?php echo $query9rw6; ?></td>
      <td width="10"><?php echo $query10rw6; ?></td>
      <td width="10"><?php echo $query11rw6; ?></td>
      <td width="10"><?php echo $query12rw6; ?></td>
      <td width="10"><?php echo $query13rw6; ?></td>
      <td width="10"><?php echo $query14rw6; ?></td>      
    </tr>
    <tr>
      <td width="10">7</td>
      <td width="10">07</td>
      <td width="10">007</td>
         <td width="100">Laki-laki<b> <?php echo $queryrw7; ?></b></td>
      <td width="10">Perempuan<b> <?php echo $query2rw7; ?></b></td>
      <td width="10">Jumlah<b> <?php echo $query3rw7; ?></b></td>
      <td width="10"><?php echo $query4rw7; ?></td>
      <td width="10"><?php echo $query5rw7; ?></td>
      <td width="10"><?php echo $query6rw7; ?></td>
      <td width="10"><?php echo $query7rw7; ?></td>
      <td width="10"><?php echo $query8rw7; ?></td>
      <td width="10"><?php echo $query9rw7; ?></td>
      <td width="10"><?php echo $query10rw7; ?></td>
      <td width="10"><?php echo $query11rw7; ?></td>
      <td width="10"><?php echo $query12rw7; ?></td>
      <td width="10"><?php echo $query13rw7; ?></td>
      <td width="10"><?php echo $query14rw7; ?></td>      
    </tr>
    <tr>
      <td width="10">8</td>
      <td width="10">08</td>
      <td width="10">008</td>
        <td width="100">Laki-laki<b> <?php echo $queryrw8; ?></b></td>
      <td width="10">Perempuan<b> <?php echo $query2rw8; ?></b></td>
      <td width="10">Jumlah<b> <?php echo $query3rw8; ?></b></td>
      <td width="10"><?php echo $query4rw8; ?></td>
      <td width="10"><?php echo $query5rw8; ?></td>
      <td width="10"><?php echo $query6rw8; ?></td>
      <td width="10"><?php echo $query7rw8; ?></td>
      <td width="10"><?php echo $query8rw8; ?></td>
      <td width="10"><?php echo $query9rw8; ?></td>
      <td width="10"><?php echo $query10rw8; ?></td>
      <td width="10"><?php echo $query11rw8; ?></td>
      <td width="10"><?php echo $query12rw8; ?></td>
      <td width="10"><?php echo $query13rw8; ?></td>
      <td width="10"><?php echo $query14rw8; ?></td>      
    </tr>
    <tr>
      <td width="10">9</td>
      <td width="10">09</td>
      <td width="10">009</td>
         <td width="100">Laki-laki<b> <?php echo $queryrw9; ?></b></td>
      <td width="10">Perempuan<b> <?php echo $query2rw9; ?></b></td>
      <td width="10">Jumlah<b> <?php echo $query3rw9; ?></b></td>
      <td width="10"><?php echo $query4rw9; ?></td>
      <td width="10"><?php echo $query5rw9; ?></td>
      <td width="10"><?php echo $query6rw9; ?></td>
      <td width="10"><?php echo $query7rw9; ?></td>
      <td width="10"><?php echo $query8rw9; ?></td>
      <td width="10"><?php echo $query9rw9; ?></td>
      <td width="10"><?php echo $query10rw9; ?></td>
      <td width="10"><?php echo $query11rw9; ?></td>
      <td width="10"><?php echo $query12rw9; ?></td>
      <td width="10"><?php echo $query13rw9; ?></td>
      <td width="10"><?php echo $query14rw9; ?></td>      
    </tr>
    <tr>
      <td width="10">10</td>
      <td width="10">10</td>
      <td width="10">010</td>
         <td width="100">Laki-laki<b> <?php echo $queryrw10; ?></b></td>
      <td width="10">Perempuan<b> <?php echo $query2rw10; ?></b></td>
      <td width="10">Jumlah<b> <?php echo $query3rw10; ?></b></td>
      <td width="10"><?php echo $query4rw10; ?></td>
      <td width="10"><?php echo $query5rw10; ?></td>
      <td width="10"><?php echo $query6rw10; ?></td>
      <td width="10"><?php echo $query7rw10; ?></td>
      <td width="10"><?php echo $query8rw10; ?></td>
      <td width="10"><?php echo $query9rw10; ?></td>
      <td width="10"><?php echo $query10rw10; ?></td>
      <td width="10"><?php echo $query11rw10; ?></td>
      <td width="10"><?php echo $query12rw10; ?></td>
      <td width="10"><?php echo $query13rw10; ?></td>
      <td width="10"><?php echo $query14rw10; ?></td>      
    </tr>
    <tr>
      <td  colspan="18">Jumlah</td>
      </tr>
    <tr>  
      <td colspan="3"></td>
        <td width="100">Laki-laki<b> <?php echo $query; ?></b></td>
      <td width="10">Perempuan<b> <?php echo $query2; ?></b></td>
      <td width="10">Jumlah<b> <?php echo $query3; ?></b></td>
      
     
     
        </table>
    </thead>
  </table>
      </div>
    </div>
  </section>
</div>

    
<?php 
  include ('../part/footer.php');
?>