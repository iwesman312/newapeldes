<?php 
  include ('../part/akses.php');
  include ('../../../../../config/koneksi.php');
  include ('../part/header.php');

  $id = $_GET['id'];
  $qCek = mysqli_query($connect,"SELECT penduduk.*, surat_kk.* FROM penduduk LEFT JOIN surat_kk ON surat_kk.nik = penduduk.nik WHERE surat_kk.id_skk='$id'");
  while($row = mysqli_fetch_array($qCek)){
?>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php  
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../../../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          }else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
            echo '<img src="../../../../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
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
        <a href="../../../../dashboard/">
          <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
        </a>
      </li>
      <li>
        <a href="../../../../penduduk/">
          <i class="fa fa-users"></i><span>&nbsp;Data Penduduk</span>
        </a>
      </li>
      <li class="active treeview">
        <a href="#">
          <i class="fas fa-envelope-open-text"></i> <span>&nbsp;&nbsp;Surat</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="../../../permintaan_surat/">
              <i class="fa fa-circle-notch"></i> Permintaan Surat
            </a>
          </li>
          <li>
            <a href="../../../surat_selesai/"><i class="fa fa-circle-notch"></i> Surat Selesai
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="../../../../laporan/">
          <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;Laporan</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
<div class="content-wrapper">
  <section class="content-header">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb">
      <li><a href="../../../../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Permintaan Surat</li>
    </ol>
  </section>
  <section class="content">      
    <div class="row">
      <div class="col-md-12">
        <div class="box box-default">
          <div class="box-header with-border">
            <h2 class="box-title"><i class="fas fa-envelope"></i> Konfirmasi Surat KK</h2>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
            <form class="form-horizontal" method="post" action="update-konfirmasi.php">
              <div class="row">
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tanda Tangan</label>
                      <div class="col-sm-9">
                        <select name="ft_tangan" class="form-control" style="text-transform: uppercase;" required>
                          <option value="">-- Pilih Tanda Tangan --</option>
                          <?php
                            $selectedPejabat  = $row['jabatan'];
                            $qTampilPejabat   = "SELECT * FROM pejabat_desa";
                            $tampilPejabat  = mysqli_query($connect, $qTampilPejabat);
                            while($rows = mysqli_fetch_assoc($tampilPejabat) ){
                              if($rows['jabatan'] == $selectedPejabat){
                          ?>
                          <option value="<?php echo $rows['id_pejabat_desa']; ?>" selected="selected"><?php echo $rows['jabatan']; ?></option>
                          <?php
                              }else{
                          ?>
                          <option value="<?php echo $rows['id_pejabat_desa']; ?>"><?php echo $rows['jabatan'], " (", $rows['nama_pejabat_desa'], ")"; ?></option>

                          <?php 
                              } 
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">No. Surat</label>
                      <div class="col-sm-9">
                        <input type="text" name="fno_surat" value="<?php echo $row['no_surat']; ?>" class="form-control" placeholder="Masukkan No. Surat" required>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <h5 class="box-title pull-right" style="color: #696969;"><i class="fas fa-info-circle"></i> <b>Informasi Penduduk</b></h5>
              <br><hr style="border-bottom: 1px solid #DCDCDC;">
              <div class="row">
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" name="fnama" style="text-transform: uppercase;" value="<?php echo $row['nama']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <?php
                      $tgl_lhr = date($row['tgl_lahir']);
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
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Alamat</label>
                      <div class="col-sm-9">
                        <input type="text" name="falamat" style="text-transform: capitalize;" value="<?php echo $row['jalan'];?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">RT</label>
                      <div class="col-sm-9">
                        <input type="text" name="frt" style="text-transform: capitalize;" value="<?php echo $row['rt']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Kode Pos</label>
                      <div class="col-sm-9">
                        <input type="text" name="fkdpos" style="text-transform: capitalize;" value="<?php echo $row['kdpos'];?>" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Desa</label>
                      <div class="col-sm-9">
                        <input type="text" name="fdesa" value="<?php echo $row['desa']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Kecamatan</label>
                      <div class="col-sm-9">
                        <input type="text" name="fkec" style="text-transform: capitalize;" value="<?php echo $row['kec']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Kabupaten</label>
                      <div class="col-sm-9">
                        <input type="text" name="fkab" value="<?php echo $row['kab']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Provinsi</label>
                      <div class="col-sm-9">
                        <input type="text" name="fprov" style="text-transform: uppercase;" value="<?php echo $row['prov']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <h5 class="box-title pull-right" style="color: #696969;"><i class="fas fa-info-circle"></i> <b>Anggota Keluarga</b></h5>
                <br><hr style="border-bottom: 1px solid #DCDCDC;">
                <div class="row">
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">No</label>
                      <div class="col-sm-9">
                        <input type="text" name="fno1" style="text-transform: uppercase;" value="<?php echo $row['no1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" name="fnama1" style="text-transform: uppercase;" value="<?php echo $row['nama1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                   <div class="form-group">
                      <label class="col-sm-3 control-label">Jenis Kelamin</label>
                      <div class="col-sm-9">
                        <input type="text" name="fjk1" style="text-transform: uppercase;" value="<?php echo $row['jk1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Hubungan Dengan KK</label>
                      <div class="col-sm-9">
                        <input type="text" name="fhub1" value="<?php echo $row['hub1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tempat Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" name="ftempat1" style="text-transform: uppercase;" value="<?php echo $row['tempat1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tanggal Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" name="ftanggal1" style="text-transform: uppercase;" value="<?php echo $row['tanggal1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Provinsi/Negara</label>
                      <div class="col-sm-9">
                        <input type="text" name="fnegara1" style="text-transform: uppercase;" value="<?php echo $row['negara1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Status Perkawinan</label>
                      <div class="col-sm-9">
                        <input type="text" name="fstatus1" style="text-transform: uppercase;" value="<?php echo $row['status1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Agama</label>
                      <div class="col-sm-9">
                        <input type="text" name="fagama1" value="<?php echo $row['agama1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Golongan Darah</label>
                      <div class="col-sm-9">
                        <input type="text" name="fdarah1" value="<?php echo $row['darah1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">W.N.R.I Tuliskan No. Dan Tgl. SBK</label>
                      <div class="col-sm-9">
                        <input type="text" name="fwnri1" value="<?php echo $row['wnri1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Orang Asing Tuliskan No. Tanggal Dok. Imigrasi</label>
                      <div class="col-sm-9">
                        <input type="text" name="fasing1" value="<?php echo $row['asing1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Pendidikan Umum Terakhir</label>
                      <div class="col-sm-9">
                        <input type="text" name="fpend1" value="<?php echo $row['pend1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Latin</label>
                      <div class="col-sm-9">
                        <input type="text" name="flatin1" value="<?php echo $row['latin1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Arab</label>
                      <div class="col-sm-9">
                        <input type="text" name="farab1" value="<?php echo $row['arab1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Lain-lain</label>
                      <div class="col-sm-9">
                        <input type="text" name="flain1" value="<?php echo $row['lain1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Pekerjaan/Jabatan</label>
                      <div class="col-sm-9">
                        <input type="text" name="fkerja1" value="<?php echo $row['kerja1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tanggal Mulai Tinggal di Desa ini</label>
                      <div class="col-sm-9">
                        <input type="text" name="fmulai1" value="<?php echo $row['mulai1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Pidah dari(Tempat tinggal terakhir)</label>
                      <div class="col-sm-9">
                        <input type="text" name="fasal1" value="<?php echo $row['asal1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nama Bapak/Ibu</label>
                      <div class="col-sm-9">
                        <input type="text" name="fortu1" value="<?php echo $row['ortu1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">No. Pokok Penduduk (NOPEN)</label>
                      <div class="col-sm-9">
                        <input type="text" name="fnopen1" value="<?php echo $row['nopen1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Akseptor KB</label>
                      <div class="col-sm-9">
                        <input type="text" name="fkb1" value="<?php echo $row['kb1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Cacat Menurut Jenis</label>
                      <div class="col-sm-9">
                        <input type="text" name="fcacat1" value="<?php echo $row['cacat1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Keterangan Lain-lain</label>
                      <div class="col-sm-9">
                        <input type="text" name="fket1" value="<?php echo $row['ket1']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br><hr style="border-bottom: 1px solid #DCDCDC;">
                  <div class="row">
                    <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">No</label>
                      <div class="col-sm-9">
                        <input type="text" name="fno2" style="text-transform: uppercase;" value="<?php echo $row['no2']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" name="fnama2" style="text-transform: uppercase;" value="<?php echo $row['nama2']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" name="ftanggal4" style="text-transform: uppercase;" value="<?php echo $row['tanggal4']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Jenis Kelamin</label>
                      <div class="col-sm-9">
                        <input type="text" name="fjk2" style="text-transform: uppercase;" value="<?php echo $row['jk2']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Hubungan Dengan KK</label>
                      <div class="col-sm-9">
                        <input type="text" name="fhub2" style="text-transform: uppercase;" value="<?php echo $row['hub2']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                    <div class="row">
                    <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">No</label>
                      <div class="col-sm-9">
                        <input type="text" name="fno3" style="text-transform: uppercase;" value="<?php echo $row['no3']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" name="fnama3" style="text-transform: uppercase;" value="<?php echo $row['nama3']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" name="ftanggal5" style="text-transform: uppercase;" value="<?php echo $row['tanggal5']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Jenis Kelamin</label>
                      <div class="col-sm-9">
                        <input type="text" name="fjk3" style="text-transform: uppercase;" value="<?php echo $row['jk3']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Hubungan Dengan KK</label>
                      <div class="col-sm-9">
                        <input type="text" name="fhub3" style="text-transform: uppercase;" value="<?php echo $row['hub3']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                      <div class="row">
                      <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">No</label>
                      <div class="col-sm-9">
                        <input type="text" name="fno4" style="text-transform: uppercase;" value="<?php echo $row['no4']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" name="fnama4" style="text-transform: uppercase;" value="<?php echo $row['nama4']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" name="ftanggal6" style="text-transform: uppercase;" value="<?php echo $row['tanggal6']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Jenis Kelamin</label>
                      <div class="col-sm-9">
                        <input type="text" name="fjk4" style="text-transform: uppercase;" value="<?php echo $row['jk4']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Hubungan Dengan KK</label>
                      <div class="col-sm-9">
                        <input type="text" name="fhub4" style="text-transform: uppercase;" value="<?php echo $row['hub4']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                    <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">No</label>
                      <div class="col-sm-9">
                        <input type="text" name="fno5" style="text-transform: uppercase;" value="<?php echo $row['no5']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" name="fnama5" style="text-transform: uppercase;" value="<?php echo $row['nama5']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" name="ftanggal7" style="text-transform: uppercase;" value="<?php echo $row['tanggal7']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Jenis Kelamin</label>
                      <div class="col-sm-9">
                        <input type="text" name="fjk5" style="text-transform: uppercase;" value="<?php echo $row['jk5']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Hubungan Dengan KK</label>
                      <div class="col-sm-9">
                        <input type="text" name="fhub5" style="text-transform: uppercase;" value="<?php echo $row['hub5']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">NO WA Pemohon</label>
                      <div class="col-sm-9">
                        <input type="text" name="fno_hp" style="text-transform: capitalize;" value="<?php echo $row['no_hp']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                      <input type="hidden" name="id" value="<?php echo $row['id_skk']; ?>" class="form-control">
                    </div>
                <div class="col-md-6">
                  <div class="box-body pull-right">
                    <input type="submit" name="submit" class="btn btn-success" value="Konfirmasi">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="box-footer">
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
  }

  include ('../part/footer.php');
?>