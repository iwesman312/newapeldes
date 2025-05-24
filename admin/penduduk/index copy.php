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
          <?php 
            if(isset($_GET['pesan'])){
              if($_GET['pesan']=="gagal-menambah"){
                echo "<div class='alert alert-danger'><center>Anda tidak bisa menambah data. NIK tersebut sudah digunakan.</center></div>";
              }
              if($_GET['pesan']=="gagal-menghapus"){
                echo "<div class='alert alert-danger'><center>Anda tidak bisa menghapus data tersebut.</center></div>";
              }
            }
          ?>
        </div>
        <?php 
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
        ?>
        <a class="btn btn-success btn-md" href='tambah-penduduk.php'><i class="fa fa-user-plus"></i> Tambah Data Penduduk</a>
        <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter Status <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="filter" data-status="HIDUP">Hidup</a></li>
                        <li><a href="#" class="filter" data-status="LAHIR">Lahir</a></li>
                        <li><a href="#" class="filter" data-status="DATANG">Datang</a></li>
                        <li><a href="#" class="filter" data-status="MATI">Mati</a></li>
                        <li><a href="#" class="filter" data-status="PINDAH">Pindah</a></li>
                    </ul>
                </div>
                <br><br>
        <?php 
          } else {

          }
        ?>
        <br><br>
        <div style="overflow-x: auto;">
  <table class="table table-striped table-bordered" id="data-table" width="100%" cellspacing="0">
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
          }
        ?>
      </tr>
    </thead>
</div>

          <tbody>
            <?php
              include ('../../config/koneksi.php');

              $no = 1;
              $qTampil = mysqli_query($connect, "SELECT * FROM penduduk");
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
              <td style="text-transform: capitalize;"><?php echo 'Dsn. ', $row['jalan'], ', RT', $row['rt'], '/RW', $row['rw']; ?></td>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        // Event listener untuk tombol filter
        $('.filter').click(function(){
            var status = $(this).data('status');
            filterData(status);
        });

        // Fungsi untuk filter data
        function filterData(status){
            $.ajax({
                url: 'filter_penduduk.php', // Ganti dengan file PHP yang menangani filter
                method: 'POST',
                data: {status: status},
                success: function(response){
                    $('#data-table tbody').html(response);
                }
            });
        }
    });
</script>
    
        <!-- <li>Lampiran Pendudukan Meninggal</li>
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
          </thead>
          <li>Lampiran Pendudukan Datang</li>
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

              $no5 = 1;
              $qTampil5 = mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh = 'DATANG'");
              foreach($qTampil5 as $row5){
                $tanggal = $row['tgl_lahir'];
            ?>
            <tr>
              <td><?php echo $no5++; ?></td>
              <td><?php echo $row5['nik']; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row5['nama']; ?></td>
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
              <td style="text-transform: capitalize;"><?php echo $row5['tempat_lahir'] . ", " . $tanggal . " " . $bulanIndo[$bulan] . " " . $tahun; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row5['jenis_kelamin']; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row5['agama']; ?></td>
              <td style="text-transform: capitalize;"><?php echo 'Dsn. ', $row5['dusun'], ', RT', $row['rt'], '/RW', $row['rw']; ?></td>
              <?php 
                if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
              ?>
             
              <?php  
                } else {
                  
                }
              ?>
                            <td style="text-transform: capitalize;"><?php echo $row5['pend_ditempuh']; ?></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
            </tr>
          </thead>
          <li>Lampiran Pendudukan Lahir</li>
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

              $no6 = 1;
              $qTampil6 = mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh = 'LAHIR'");
              foreach($qTampil6 as $row6){
                $tanggal = $row['tgl_lahir'];
            ?>
            <tr>
              <td><?php echo $no6++; ?></td>
              <td><?php echo $row6['nik']; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row6['nama']; ?></td>
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
              <td style="text-transform: capitalize;"><?php echo $row6['tempat_lahir'] . ", " . $tanggal . " " . $bulanIndo[$bulan] . " " . $tahun; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row6['jenis_kelamin']; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row6['agama']; ?></td>
              <td style="text-transform: capitalize;"><?php echo 'Dsn. ', $row6['dusun'], ', RT', $row['rt'], '/RW', $row['rw']; ?></td>
              <?php 
                if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
              ?>
             
              <?php  
                } else {
                  
                }
              ?>
                            <td style="text-transform: capitalize;"><?php echo $row6['pend_ditempuh']; ?></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
            </tr>
          </thead>
         <li>Detail Data Penduduk</li>
          <table class="table table-striped table-bordered table-responsive" id="data-table" width="100%" cellspacing="0">
          <thead>
          <?php $sql =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='001'");
      $sql2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='001'");
      $query =mysqli_num_rows($sql);
      $query2=mysqli_num_rows($sql2);
      $sql3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='HIDUP' and rw='001'");
      $query3 =mysqli_num_rows($sql3);
      $sql4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='MATI' and rw='001'");
      $query4 =mysqli_num_rows($sql4);?>
      <tr><td>Jumlah Laki-laki Pada RW 001 : <b> <?php echo $query; ?></b></td>
      <td>Jumlah Perempuan Pada RW 001 : <b> <?php echo $query2; ?></b></td>
      <td>Jumlah Hidup Pada RW 001 : <b> <?php echo $query3; ?></b></td>
      <td>Jumlah Mati Pada RW 001 : <b> <?php echo $query4; ?></b></td>
    </tr>
      <?php
      $sql =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='002'");
      $sql2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='002'");
      $query =mysqli_num_rows($sql);
      $query2=mysqli_num_rows($sql2);
      $sql3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='HIDUP' and rw='002'");
      $query3 =mysqli_num_rows($sql3);
      $sql4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='MATI' and rw='002'");
      $query4 =mysqli_num_rows($sql4);?>
      <tr><td>Jumlah Laki-laki Pada RW 002 : <b> <?php echo $query; ?></b></td>
        <td>Jumlah Perempuan Pada RW 002 : <b> <?php echo $query2; ?></b></td>
        <td>Jumlah Hidup Pada RW 002 : <b> <?php echo $query3; ?></b></td>
        <td>Jumlah Mati Pada RW 002 : <b> <?php echo $query4; ?></b></td>
        </tr>
        <?php $sql =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='003'");
      $sql2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='003'");
      $query =mysqli_num_rows($sql);
      $query2=mysqli_num_rows($sql2);
      $sql3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='HIDUP' and rw='003'");
      $query3 =mysqli_num_rows($sql3);
      $sql4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='MATI' and rw='003'");
      $query4 =mysqli_num_rows($sql4);?>
      <tr><td>Jumlah Laki-laki Pada RW 003 : <b> <?php echo $query; ?></b></td>
      <td>Jumlah Perempuan Pada RW 003 : <b> <?php echo $query2; ?></b></td>
      <td>Jumlah Hidup Pada RW 003 : <b> <?php echo $query3; ?></b></td>
      <td>Jumlah Mati Pada RW 003 : <b> <?php echo $query4; ?></b></td>
      </tr>
      <?php
      $sql =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='004'");
      $sql2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='004'");
      $query =mysqli_num_rows($sql);
      $query2=mysqli_num_rows($sql2);
      $sql3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='HIDUP' and rw='004'");
      $query3 =mysqli_num_rows($sql3);
      $sql4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='MATI' and rw='004'");
      $query4 =mysqli_num_rows($sql4);?>
      <tr><td>Jumlah Laki-laki Pada RW 004 : <b> <?php echo $query; ?></b></td>
      <td>Jumlah Perempuan Pada RW 004 : <b> <?php echo $query2; ?></b></td>
      <td>Jumlah Hidup Pada RW 004 : <b> <?php echo $query3; ?></b></td>
      <td>Jumlah Mati Pada RW 004 : <b> <?php echo $query4; ?></b></td>
      </tr>  
      <?php $sql =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='005'");
      $sql2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='005'");
      $query =mysqli_num_rows($sql);
      $query2=mysqli_num_rows($sql2);
      $sql3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='HIDUP' and rw='005'");
      $query3 =mysqli_num_rows($sql3);
      $sql4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='MATI' and rw='005'");
      $query4 =mysqli_num_rows($sql4);?>
      <tr><td>Jumlah Laki-laki Pada RW 005 : <b> <?php echo $query; ?></b></td>
        <td>Jumlah Perempuan Pada RW 005 : <b> <?php echo $query2; ?></b></td>
        <td>Jumlah Hidup Pada RW 005 : <b> <?php echo $query3; ?></b></td>
        <td>Jumlah Mati Pada RW 005 : <b> <?php echo $query4; ?></b></td>
      </tr>
      <?php
      $sql =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='006'");
      $sql2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='006'");
      $query =mysqli_num_rows($sql);
      $query2=mysqli_num_rows($sql2);
      $sql3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='HIDUP' and rw='006'");
      $query3 =mysqli_num_rows($sql3);
      $sql4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='MATI' and rw='006'");
      $query4 =mysqli_num_rows($sql4);?>
      <tr><td>Jumlah Laki-laki Pada RW 006 : <b> <?php echo $query; ?></b></td>
      <td>Jumlah Perempuan Pada RW 006 : <b> <?php echo $query2; ?></b></td>
      <td>Jumlah Hidup Pada RW 006 : <b> <?php echo $query3; ?></b></td>
      <td>Jumlah Mati Pada RW 006 : <b> <?php echo $query4; ?></b></td>
    </tr>
      <?php $sql =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='007'");
      $sql2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='007'");
      $query =mysqli_num_rows($sql);
      $query2=mysqli_num_rows($sql2);
      $sql3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='HIDUP' and rw='007'");
      $query3 =mysqli_num_rows($sql3);
      $sql4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='MATI' and rw='007'");
      $query4 =mysqli_num_rows($sql4);?>
      <tr><td>Jumlah Laki-laki Pada RW 007 : <b> <?php echo $query; ?></b></td>
      <td>Jumlah Perempuan Pada RW 007 : <b> <?php echo $query2; ?></b></td>
      <td>Jumlah Hidup Pada RW 007 : <b> <?php echo $query3; ?></b></td>
      <td>Jumlah Mati Pada RW 007 : <b> <?php echo $query4; ?></b></td>
      <?php
      $sql =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='008'");
      $sql2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='008'");
      $query =mysqli_num_rows($sql);
      $query2=mysqli_num_rows($sql2);
      $sql3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='HIDUP' and rw='008'");
      $query3 =mysqli_num_rows($sql3);
      $sql4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='MATI' and rw='008'");
      $query4 =mysqli_num_rows($sql4);?>
      <tr><td>Jumlah Laki-laki Pada RW 008 : <b> <?php echo $query; ?></b></td>
      <td>Jumlah Perempuan Pada RW 008 : <b> <?php echo $query2; ?></b></td>
      <td>Jumlah Hidup Pada RW 008 : <b> <?php echo $query3; ?></b></td>
      <td>Jumlah Mati Pada RW 008 : <b> <?php echo $query4; ?></b></td>
    </tr>
      <?php $sql =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='009'");
       $sql2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='009'");
      $query =mysqli_num_rows($sql);
      $query2=mysqli_num_rows($sql2);
      $sql3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='HIDUP' and rw='009'");
      $query3 =mysqli_num_rows($sql3);
      $sql4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='MATI' and rw='009'");
      $query4 =mysqli_num_rows($sql4);?>
      <tr><td>Jumlah Laki-laki Pada RW 009 : <b> <?php echo $query; ?></b></td>
      <td>Jumlah Perempuan Pada RW 009 : <b> <?php echo $query2; ?></b></td>
      <td>Jumlah Hidup Pada RW 009 : <b> <?php echo $query3; ?></b></td>
      <td>Jumlah Mati Pada RW 009 : <b> <?php echo $query4; ?></b></td>
    </tr>
      <?php
      $sql =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='Laki-laki' and rw='010'");
      $sql2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin ='PEREMPUAN' and rw='010'");
      $query =mysqli_num_rows($sql);
      $query2=mysqli_num_rows($sql2);
      $sql3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='HIDUP' and rw='010'");
      $query3 =mysqli_num_rows($sql3);
      $sql4 =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh ='MATI' and rw='010'");
      $query4 =mysqli_num_rows($sql4);?>
      <tr><td>Jumlah Laki-laki Pada RW 010 : <b> <?php echo $query; ?></b></td>
        <td>Jumlah Perempuan Pada RW 010 : <b> <?php echo $query2; ?></b></td>
        <td>Jumlah Hidup Pada RW 010 : <b> <?php echo $query3; ?></b></td>
        <td>Jumlah Mati Pada RW 010 : <b> <?php echo $query4; ?></b></td>
      <br>
      <table class="table table-striped table-bordered table-responsive" id="data-table" width="100%" cellspacing="0">
          <thead>
      <tr>
        <?php $qpl3 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin='Perempuan' AND pend_ditempuh IN ('HIDUP','LAHIR','DATANG')"); 
        $tampil3 =mysqli_num_rows($qpl3);?><td>Jumlah Penduduk Perempuan : <b> <?php echo $tampil3; ?></b></td>
        <?php $qpl2 =mysqli_query($connect, "SELECT * FROM penduduk WHERE jenis_kelamin='Laki-laki' AND pend_ditempuh IN ('HIDUP','LAHIR','DATANG')");
        $tampil2 =mysqli_num_rows($qpl2);?>
        <td>Jumlah Penduduk Laki-Laki: <b> <?php echo $tampil2; ?></b></td>
      </tr>
      </tr>
      <?php $qpl =mysqli_query($connect, "SELECT * FROM penduduk WHERE pend_ditempuh IN ('HIDUP','LAHIR','DATANG')"); 
        $tampil =mysqli_num_rows($qpl);?>
        <td>Jumlah Penduduk : <b> <?php echo $tampil; ?></b></td>
      </tr>
        </table>
    </thead>
  </table>
      </div> -->
    </div>

    
  </section>
</div>

    
<?php 
  include ('../part/footer.php');
?>