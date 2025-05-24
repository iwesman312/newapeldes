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
 			<!-- <li class="active">
 				<a href="#">
   				<i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
 				</a>
 			</li> -->
   		<li class="treeview">
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
            <a href="../penduduk/lampid.php"><i class="fa fa-circle-notch"></i>LAMPID</a>
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
      <li>
   			<a href="../laporan/"><i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;Laporan</span></a>
   		</li>
       <?php 
        }else{
          
        }
      ?>
   		
  	</ul>
  </section>
</aside>
<div class="content-wrapper">
  <section class="content-header">
  	<h1>Dashboard</h1>
     	<ol class="breadcrumb">
       	<li><a href="#"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
         <a href="../../penduduk" class="btn btn-primary btn-lg shadow">
          <i class="fas fa-envelope-open-text"></i> Tambah Warga
      </a>
     	</ol>
  </section>
  <section class="content">
   	<div class="row">
      <?php 
        if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
      ?>
     	<div class="col-lg-4 col-xs-6">
     		<div class="small-box bg-aqua">
       		<div class="inner">
       			<h3>
              <?php
                include ('../../config/koneksi.php');

                $qTampil = mysqli_query($connect, "SELECT * FROM penduduk");
                $jumlahPenduduk = mysqli_num_rows($qTampil);
                echo $jumlahPenduduk;
              ?>
            </h3>
      			<p>Data Penduduk</p>
       		</div>
       		<div class="icon">
       			<i class="fas fa-users" style="font-size:70px"></i>
       		</div>
       		<a href="../penduduk/" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
     		</div>
     	</div>
      <div class="col-lg-4 col-xs-6">
       	<div class="small-box bg-green">
         	<div class="inner">
         		<h3>
              <?php
                $qTampil = mysqli_query($connect, "SELECT tanggal_surat FROM surat_keterangan WHERE status_surat='pending' 
                  UNION SELECT tanggal_surat FROM surat_keterangan_berkelakuan_baik WHERE status_surat='pending' 
                  UNION SELECT tanggal_surat FROM surat_keterangan_domisili WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_kepemilikan_kendaraan_bermotor WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_perhiasan WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_usaha WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_lapor_hajatan WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_tidak_mampu WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_domisili_tempat_tinggal WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_pengantar_skck WHERE status_surat='pending'");
                $jumlahPermintaanSurat = mysqli_num_rows($qTampil);
                echo $jumlahPermintaanSurat;
              ?>
            </h3>
         		<p>Permintaan Surat</p>
         	</div>
         	<div class="icon">
         		<i class="fas fa-envelope-open-text" style="font-size:70px"></i>
         	</div>
         	<a href="../surat/permintaan_surat/" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
       	</div>
      </div>
      <div class="col-lg-4 col-xs-6">
       	<div class="small-box bg-yellow">
         	<div class="inner">
         		<h3>
              <?php
                $qTampil = mysqli_query($connect, "SELECT tanggal_surat FROM surat_keterangan WHERE status_surat='selesai' 
                  UNION SELECT tanggal_surat FROM surat_keterangan_berkelakuan_baik WHERE status_surat='selesai' 
                  UNION SELECT tanggal_surat FROM surat_keterangan_domisili WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_kepemilikan_kendaraan_bermotor WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_perhiasan WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_usaha WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_lapor_hajatan WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_pengantar_skck WHERE status_surat='selesai'");
                $jumlahPermintaanSurat = mysqli_num_rows($qTampil);
                echo $jumlahPermintaanSurat;
              ?>
            </h3>
         		<p>Surat Selesai</p>
         	</div>
         	<div class="icon">
         		<i class="fas fa-envelope" style="font-size:70px"></i>
         	</div>
         	<a href="../surat/surat_selesai/" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
       	</div>
      </div>
      <?php 
        } else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
      ?>
      <div class="col-lg-1"></div>
      <div class="col-lg-5 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>
              <?php
                include ('../../config/koneksi.php');

                $qTampil = mysqli_query($connect, "SELECT * FROM penduduk");
                $jumlahPenduduk = mysqli_num_rows($qTampil);
                echo $jumlahPenduduk;
              ?>
            </h3>
            <p>Data Penduduk</p>
          </div>
          <div class="icon">
            <i class="fas fa-users" style="font-size:70px"></i>
          </div>
          <a href="../penduduk/" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-5 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>
              <?php
                $qTampil = mysqli_query($connect, "SELECT * FROM surat_keterangan WHERE status_surat='selesai' UNION SELECT * FROM surat_keterangan_berkelakuan_baik WHERE status_surat='selesai' UNION SELECT * FROM surat_keterangan_domisili WHERE status_surat='selesai' UNION SELECT * FROM surat_keterangan_usaha WHERE status_surat='selesai'");
                $jumlahPermintaanSurat = mysqli_num_rows($qTampil);
                echo $jumlahPermintaanSurat;
              ?>
            </h3>
            <p>Laporan Surat Administrasi Desa - Surat Keluar</p>
          </div>
          <div class="icon">
            <i class="fas fa-envelope" style="font-size:70px"></i>
          </div>
          <a href="../laporan/" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-1"></div>
      <?php  
        }
      else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'rt')){
      ?>
      <div class="col-lg-1"></div>
      <div class="col-lg-5 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>
              <?php
                include ('../../config/koneksi.php');

                $qTampil = mysqli_query($connect, "SELECT * FROM penduduk");
                $jumlahPenduduk = mysqli_num_rows($qTampil);
                echo $jumlahPenduduk;
              ?>
            </h3>
            <p>Data Penduduk</p>
          </div>
          <div class="icon">
            <i class="fas fa-users" style="font-size:70px"></i>
          </div>
          <a href="../penduduk/" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-5 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>
              <?php
                $qTampil = mysqli_query($connect, "SELECT tanggal_surat FROM surat_keterangan WHERE status_surat='SELESAI' 
                UNION SELECT tanggal_surat FROM surat_keterangan_berkelakuan_baik WHERE status_surat='SELESAI' 
                UNION SELECT tanggal_surat FROM surat_keterangan_domisili WHERE status_surat='SELESAI'
                UNION SELECT tanggal_surat FROM surat_keterangan_kepemilikan_kendaraan_bermotor WHERE status_surat='SELESAI'
                UNION SELECT tanggal_surat FROM surat_keterangan_perhiasan WHERE status_surat='SELESAI'
                UNION SELECT tanggal_surat FROM surat_keterangan_usaha WHERE status_surat='SELESAI'
                UNION SELECT tanggal_surat FROM surat_lapor_hajatan WHERE status_surat='SELESAI'
                UNION SELECT tanggal_surat FROM surat_keterangan_tidak_mampu WHERE status_surat='SELESAI'
                UNION SELECT tanggal_surat FROM surat_keterangan_domisili_tempat_tinggal WHERE status_surat='SELESAI'
                UNION SELECT tanggal_surat FROM surat_pengantar_skck WHERE status_surat='SELESAI'");$jumlahPermintaanSurat = mysqli_num_rows($qTampil);
                echo $jumlahPermintaanSurat;
              ?>
            </h3>
            <p>Laporan Surat Administrasi Desa - Surat Keluar</p>
          </div>
          <div class="icon">
            <i class="fas fa-envelope" style="font-size:70px"></i>
          </div>
          <a href="../../surat/" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-1"></div>
      <?php  
        }
      ?>
   	
                    </div><br>
                    
        				</div>
              </form>
        		</div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php 
  include ('../part/footer.php');
?>