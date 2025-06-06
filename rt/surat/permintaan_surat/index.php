<?php
  include ('../../../config/koneksi.php');
  include ('../part/akses.php');
  include ('../part/header.php');
?>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php  
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          }else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
            echo '<img src="../../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
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
      <li>
        <a href="../../dashboard/">
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
            <a href="../../penduduk/"><i class="fa fa-circle-notch"></i>Data Penduduk</a>
          </li>
          <li>
            <a href="../../penduduk/index2.php"><i class="fa fa-circle-notch"></i>Data Penduduk RT/RW</a>
          </li>
        </ul>
      </li>
      <li class="active treeview">
        <a href="#">
          <i class="fas fa-envelope-open-text"></i> <span>&nbsp;&nbsp;Surat</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
          <li class="active">
            <a href="#">
              <i class="fa fa-circle-notch"></i> Permintaan Surat
            </a>
          </li>
          <li>
            <a href="../../surat/surat_selesai/">
              <i class="fa fa-circle-notch"></i> Surat Selesai
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="../../laporan/">
          <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;Laporan</span>
        </a>
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
    <h1>Permintaan Surat</h1>
    <ol class="breadcrumb">
      <li><a href="../../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Permintaan Surat</li>
    </ol>
  </section>
  <section class="content">      
    <div class="row">
      <div class="col-md-12">
        <br><br>
        <table class="table table-striped table-bordered table-responsive" id="data-table" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th><strong>Tanggal</strong></th>
              <th><strong>NIK</strong></th>
              <th><strong>Nama</strong></th>
              <th><strong>Jenis Surat</strong></th>
              <th><strong>Status</strong></th>
              <th><strong>Aksi</strong></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $qTampil = mysqli_query($connect, "SELECT penduduk.nama, surat_keterangan.id_sk, surat_keterangan.no_surat, surat_keterangan.nik, surat_keterangan.jenis_surat, surat_keterangan.status_surat, surat_keterangan.tanggal_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='pending' 
                UNION SELECT penduduk.nama, surat_keterangan_berkelakuan_baik.id_skbb, surat_keterangan_berkelakuan_baik.no_surat, surat_keterangan_berkelakuan_baik.nik, surat_keterangan_berkelakuan_baik.jenis_surat, surat_keterangan_berkelakuan_baik.status_surat, surat_keterangan_berkelakuan_baik.tanggal_surat FROM penduduk LEFT JOIN surat_keterangan_berkelakuan_baik ON surat_keterangan_berkelakuan_baik.nik = penduduk.nik WHERE surat_keterangan_berkelakuan_baik.status_surat='pending' 
                UNION SELECT penduduk.nama, surat_keterangan_domisili.id_skd, surat_keterangan_domisili.no_surat, surat_keterangan_domisili.nik, surat_keterangan_domisili.jenis_surat, surat_keterangan_domisili.status_surat, surat_keterangan_domisili.tanggal_surat FROM penduduk LEFT JOIN surat_keterangan_domisili ON surat_keterangan_domisili.nik = penduduk.nik WHERE surat_keterangan_domisili.status_surat='pending' 
                UNION SELECT penduduk.nama, surat_keterangan_kepemilikan_kendaraan_bermotor.id_skkkb, surat_keterangan_kepemilikan_kendaraan_bermotor.no_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.nik, surat_keterangan_kepemilikan_kendaraan_bermotor.jenis_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat FROM penduduk LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat='pending'
                UNION SELECT penduduk.nama, surat_keterangan_perhiasan.id_skp, surat_keterangan_perhiasan.no_surat, surat_keterangan_perhiasan.nik, surat_keterangan_perhiasan.jenis_surat, surat_keterangan_perhiasan.status_surat, surat_keterangan_perhiasan.tanggal_surat FROM penduduk LEFT JOIN surat_keterangan_perhiasan ON surat_keterangan_perhiasan.nik = penduduk.nik WHERE surat_keterangan_perhiasan.status_surat='pending' 
                UNION SELECT penduduk.nama, surat_keterangan_usaha.id_sku, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.nik, surat_keterangan_usaha.jenis_surat, surat_keterangan_usaha.status_surat, surat_keterangan_usaha.tanggal_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='pending'
                UNION SELECT penduduk.nama, surat_lapor_hajatan.id_slh, surat_lapor_hajatan.no_surat, surat_lapor_hajatan.nik, surat_lapor_hajatan.jenis_surat, surat_lapor_hajatan.status_surat, surat_lapor_hajatan.tanggal_surat FROM penduduk LEFT JOIN surat_lapor_hajatan ON surat_lapor_hajatan.nik = penduduk.nik WHERE surat_lapor_hajatan.status_surat='pending' 
                UNION SELECT penduduk.nama, surat_pengantar_skck.id_sps, surat_pengantar_skck.no_surat, surat_pengantar_skck.nik, surat_pengantar_skck.jenis_surat, surat_pengantar_skck.status_surat, surat_pengantar_skck.tanggal_surat FROM penduduk LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.nik = penduduk.nik WHERE surat_pengantar_skck.status_surat='pending'
                UNION SELECT penduduk.nama, surat_keterangan_tidak_mampu.id_sktm, surat_keterangan_tidak_mampu.no_surat, surat_keterangan_tidak_mampu.nik, surat_keterangan_tidak_mampu.jenis_surat, surat_keterangan_tidak_mampu.status_surat, surat_keterangan_tidak_mampu.tanggal_surat FROM penduduk LEFT JOIN surat_keterangan_tidak_mampu ON surat_keterangan_tidak_mampu.nik = penduduk.nik WHERE surat_keterangan_tidak_mampu.status_surat='pending'
                UNION SELECT penduduk.nama, surat_ktp.id_sktp, surat_ktp.no_surat, surat_ktp.nik, surat_ktp.jenis_surat, surat_ktp.status_surat, surat_ktp.tanggal_surat FROM penduduk LEFT JOIN surat_ktp ON surat_ktp.nik = penduduk.nik WHERE surat_ktp.status_surat='pending'
                UNION SELECT penduduk.nama, surat_keterangan_domisili_tempat_tinggal.id_skdtt, surat_keterangan_domisili_tempat_tinggal.no_surat, surat_keterangan_domisili_tempat_tinggal.nik, surat_keterangan_domisili_tempat_tinggal.jenis_surat, surat_keterangan_domisili_tempat_tinggal.status_surat, surat_keterangan_domisili_tempat_tinggal.tanggal_surat FROM penduduk LEFT JOIN surat_keterangan_domisili_tempat_tinggal ON surat_keterangan_domisili_tempat_tinggal.nik = penduduk.nik WHERE surat_keterangan_domisili_tempat_tinggal.status_surat='pending'
                UNION SELECT penduduk.nama, surat_kk.id_skk, surat_kk.no_surat, surat_kk.nik, surat_kk.jenis_surat, surat_kk.status_surat, surat_kk.tanggal_surat FROM penduduk LEFT JOIN surat_kk ON surat_kk.nik = penduduk.nik WHERE surat_kk.status_surat='pending'");
                if ($qTampil->num_rows > 0){
                  foreach ($qTampil as $row){ 
            ?>
                    <tr>
                      <?php
                        $tgl_lhr = date($row['tanggal_surat']);
                        $tgl = date('d ', strtotime($tgl_lhr));
                        $bln = date('F', strtotime($tgl_lhr));
                        $thn = date(' Y', strtotime($tgl_lhr));
                        $blnIndo = array(
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
                      <td><?php echo $tgl . $blnIndo[$bln] . $thn; ?></td>
                      <td><?php echo $row['nik']; ?></td>
                      <td style="text-transform: capitalize;"><?php echo $row['nama']; ?></td>
                      <td><?php echo $row['jenis_surat']; ?></td>
                      <td><a class="btn btn-danger btn-sm" href='#'><i class="fa fa-spinner"></i><b> <?php echo $row['status_surat']; ?></b></a></td>
                      <td>
                        <?php  
                          if($row['jenis_surat']=="Surat Keterangan"){
                        ?>
                        <a class="btn btn-success btn-sm" href='konfirmasi/surat_keterangan/index.php?id=<?php echo $row['id_sk']; ?>'><i class="fa fa-check"></i><b> KONFIRMASI</b></a>
                        <?php
                          } else if($row['jenis_surat']=="Surat Keterangan Berkelakuan Baik"){
                        ?>
                        <a class="btn btn-success btn-sm" href='konfirmasi/surat_keterangan_berkelakuan_baik/index.php?id=<?php echo $row['id_sk']; ?>'><i class="fa fa-check"></i><b> KONFIRMASI</b></a>
                        <?php
                          } else if($row['jenis_surat']=="Surat Keterangan Domisili"){
                        ?>
                        <a class="btn btn-success btn-sm" href='konfirmasi/surat_keterangan_domisili/index.php?id=<?php echo $row['id_sk']; ?>'><i class="fa fa-check"></i><b> KONFIRMASI</b></a>
                        <?php
                          } else if($row['jenis_surat']=="Surat Keterangan Kepemilikan Kendaraan Bermotor"){
                        ?>
                        <a class="btn btn-success btn-sm" href='konfirmasi/surat_keterangan_kepemilikan_kendaraan_bermotor/index.php?id=<?php echo $row['id_sk']; ?>'><i class="fa fa-check"></i><b> KONFIRMASI</b></a>
                        <?php
                          } else if($row['jenis_surat']=="Surat Keterangan Perhiasan"){
                        ?>
                        <a class="btn btn-success btn-sm" href='konfirmasi/surat_keterangan_perhiasan/index.php?id=<?php echo $row['id_sk']; ?>'><i class="fa fa-check"></i><b> KONFIRMASI</b></a>
                        <?php
                          } else if($row['jenis_surat']=="Surat Keterangan Usaha"){
                        ?>
                        <a class="btn btn-success btn-sm" href='konfirmasi/surat_keterangan_usaha/index.php?id=<?php echo $row['id_sk']; ?>'><i class="fa fa-check"></i><b> KONFIRMASI</b></a>
                        <?php
                          } else if($row['jenis_surat']=="Surat Lapor Hajatan"){
                        ?>
                        <a class="btn btn-success btn-sm" href='konfirmasi/surat_lapor_hajatan/index.php?id=<?php echo $row['id_sk']; ?>'><i class="fa fa-check"></i><b> KONFIRMASI</b></a>
                        <?php
                          } else if($row['jenis_surat']=="Surat Keterangan Tidak Mampu"){
                        ?>
                        <a class="btn btn-success btn-sm" href='konfirmasi/surat_keterangan_tidak_mampu/index.php?id=<?php echo $row['id_sk']; ?>'><i class="fa fa-check"></i><b> KONFIRMASI</b></a>
                        <?php
                          } else if($row['jenis_surat']=="Surat Keterangan Domisili Tempat Tinggal"){
                        ?>
                        <a class="btn btn-success btn-sm" href='konfirmasi/surat_keterangan_domisili_tempat_tinggal/index.php?id=<?php echo $row['id_sk']; ?>'><i class="fa fa-check"></i><b> KONFIRMASI</b></a>
                        <?php
                          } else if($row['jenis_surat']=="Surat Pengantar SKCK"){
                        ?>
                        <a class="btn btn-success btn-sm" href='konfirmasi/surat_pengantar_skck/index.php?id=<?php echo $row['id_sk']; ?>'><i class="fa fa-check"></i><b> KONFIRMASI</b></a>
                        <?php
                          } else if ($row['jenis_surat']=="Surat Pengantar KTP"){
                        ?>
                        <a class="btn btn-success btn-sm" href='konfirmasi/surat_ktp/index.php?id=<?php echo $row['id_sk']; ?>'><i class="fa fa-check"></i><b> KONFIRMASI </b></a>
                        <?php
                          } else if($row['jenis_surat']=="Surat KK"){
                        ?>
                        <a class="btn btn-success btn-sm" href='konfirmasi/surat_kk/index.php?id=<?php echo $row['id_sk']; ?>'><i class="fa fa-check"></i><b> KONFIRMASI</b></a>
                        <?php
                      }
                      ?>
                      </td>
                    </tr>
            <?php 
                  } 
                }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<?php 
  include ('../part/footer.php');
?>