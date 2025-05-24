<html>	
<head>
	<meta charset="utf-8">
	<?php include "waktu.php"; ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="assets/img/minibogor.png">
	<title>APELDES</title>
  	<link rel="stylesheet" href="assets/fontawesome-5.10.2/css/all.css">
	<link rel="stylesheet" href="assets/bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<style type="text/css">
		body{
			background-image: url('assets/img/kantordesasusukan.jpg') ;
			height: 100%;
		    background-position: center;
		    background-repeat: no-repeat;
		    background-size: cover;
		    background-attachment:fixed;
		}
	</style>
</head>
<body>
<div>
	<navbar class="navbar navbar-expand-lg navbar-dark bg-transparent">
	  
	  	<button class="navbar-toggler mr-4 mt-3" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">	
	    	<span class="navbar-toggler-icon"></span>
	  	</button>
	      		<a class="nav-item active ml-5">
	      			<!-- <a href="login/" class="btn btn-light" style="font-size:15pt"></i> Login</a> -->
	      			<?php
						session_start();

						if(empty($_SESSION['username'])){
						    echo '<a class="btn btn-dark" href="login/"><i class="fas fa-sign-in-alt"></i>&nbsp;LOGIN</a>';
						}else if(isset($_SESSION['lvl'])){
							echo '<a class="btn btn-transparent text-light" href="admin/"><i class="fa fa-user-cog"></i> '; echo $_SESSION['lvl']; echo '</a>';
							echo '<a class="btn btn-transparent text-light" href="login/logout.php"><i class="fas fa-power-off"></i></a>';
						}
					?>
	      		</a>
	      		<a href="surat/" class="btn btn-light" style="font-size:15pt"><i class="fas fa-envelope"></i> BUAT SURAT</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="penduduk/" class="btn btn-light" style="font-size:15pt"><i class="fas fa-envelope"></i> Penduduk Baru</a>
				  <!-- <a href="status/" class="btn btn-light" style="font-size:15pt"><i class="fas fa-envelope"></i> STATUS SURAT</a> -->
				   &nbsp;
				<a href="location/" class="btn btn-light" style="font-size:15pt"><i calss="fas fa-envelope"></i> Laporan Maling</a>
	    	</ul>
	  	</div>
	</navbar>
</div>
<div class="container" style="max-height:cover; padding-top:50px; padding-bottom:120px" align="center">
	<img src="assets/img/logobogor.png"><hr>
	<a class="text" style="font-size:18pt; color: whitesmoke;"><strong>WEB PELAYANAN DESA</strong></a><br>
	<?php  
		include('config/koneksi.php');

        $qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
        foreach($qTampilDesa as $row){
    ?>
	<a class="text" style="font-size:15pt; text-transform: uppercase; color: whitesmoke;"><strong>DESA <?php echo $row['nama_desa']; ?></strong><br>
	<a class="text" style="font-size:15pt; text-transform: uppercase; color: whitesmoke;"><strong><?php echo $row['kota']; ?></strong></a><hr>
	<?php  
		}
	?>
</div>
</body>
</html>