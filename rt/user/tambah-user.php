<?php 
  include ('../part/akses.php');
  include ('../part/header.php');
  include ('../../config/koneksi.php');
?> 

<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
</head>
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
      <li>
        <a href="../dashboard/">
          <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
        </a>
      </li>
      <li class="active">
        <a href="../penduduk/">
          <i class="fa fa-users"></i><span>&nbsp;Data Penduduk</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fas fa-envelope-open-text"></i> <span>&nbsp;&nbsp;Surat</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="../surat/permintaan_surat/">
              <i class="fa fa-circle-notch"></i> Permintaan Surat
            </a>
          </li>
          <li>
            <a href="../surat/surat_selesai/"><i class="fa fa-circle-notch"></i> Surat Selesai
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="../laporan/">
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
      <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">User</li>
    </ol>
  </section>
  <section class="content">      
    <div class="row">
      <div class="col-md-12">
        <!-- <form method="post" enctype="multipart/form-data" action="import-penduduk.php">
          <div class="col-md-3">
            <input name="datapenduduk" type="file" required="required">
          </div>
          <div>
            <input name="upload" type="submit" class="btn btn-primary" value="Import .XLS">
          </div>
        </form><br> -->
      </div>
      <div class="col-md-12">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fas fa-user-plus"></i> Tambah User</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <form class="form-horizontal" method="post" action="simpan-user.php" onsubmit="hashPassword()">
            <div class="col-md-6">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-8">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" name="nama" class="form-control" style="text-transform: capitalize;" placeholder="Nama" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" name="email" class="form-control" placeholder="Email Anda" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Level</label>
                  <div class="col-sm-8">
                    <select name="level" class="form-control" required>
                      <option value="">-- Level --</option>
                      <option value="admin">Administrator</option>
                      <option value="kades">Kepala Desa</option>
                      <option value="rt">RT</option>
                    </select>
                  </div>
                </div>
                <div class="box-footer pull-right">
                  <input type="reset" class="btn btn-default" value="Batal">
                  <input type="submit" name="submit" class="btn btn-info" value="Submit">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    function hashPassword() {
      var passwordField = document.getElementById('password');
      var hashedPassword = CryptoJS.MD5(passwordField.value).toString();
      passwordField.value = hashedPassword;
    }
  </script>
          <div class="box-footer">
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php 
  include ('../part/footer.php');
?>