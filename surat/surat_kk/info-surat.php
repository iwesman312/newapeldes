<?php
	include ('../../config/koneksi.php');
	include ('../part/header.php');
		 
		 	$nik = $_POST['fnik'];
	 
	$qCekNik = mysqli_query($connect,"SELECT * FROM penduduk WHERE nik = '$nik'");
	$row = mysqli_num_rows($qCekNik);
	 
	if($row > 0){
		$data = mysqli_fetch_assoc($qCekNik);
		if($data['nik']==$nik){
			$_SESSION['nik'] = $nik;
	 
?>
<body class="bg-light">
	<div class="container" style="max-height:cover; padding-top:30px;  padding-bottom:60px; position:relative; min-height: 100%;">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<h5 class="card-header"><i class="fas fa-envelope"></i> INFORMASI SURAT</h5>
					<br>
					<div class="container-fluid">
						<div class="row">
							<a class="col-sm-6"><h5><b>FORMULIR DK 1</b></h5></a>
							<a class="col-sm-6"><h5><b>NOMOR SURAT : -</b></h5></a>
						</div>
					</div>
					<hr>
					<form method="post" action="simpan-surat.php">
						<h6 class="container-fluid" align="right"><i class="fas fa-user"></i> Informasi Pribadi</h6>
						<hr width="97%">
						<div class="row">
						  	<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">NIK</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnik" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['nik']; ?>" readonly>
						           	</div>
						        </div>
						    </div>
						</div>
						<div class="row">
						  	<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">NAMA</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['nama']; ?>" readonly>
						           	</div>
						        </div>
						    </div>
						  	<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">ALAMAT</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="falamat" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['jalan']; ?>" readonly>
						           	</div>
						        </div>
						  	</div>
						  	<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">RT</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="frt" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['rt']; ?>" readonly>
						           	</div>
						        </div>
						  	</div>
						  	<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Kode Pos</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkdpos" class="form-control" style="text-transform: capitalize;" value="16920" readonly>
						           	</div>
						        </div>
						  	</div>
						  	<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Desa</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fdesa" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['desa']; ?>" readonly>
						           	</div>
						        </div>
						  	</div>
						  	<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Kecamatan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkec" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['kecamatan']; ?>" readonly>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Provinsi</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fprov" class="form-control" style="text-transform: capitalize;" value="Jawa Barat" readonly>
						           	</div>
						        </div>
						  	</div>
						  	<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Kabupaten</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkab" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['kota']; ?>" readonly>
						           	</div>
						        </div>
						    </div>
						<h5 class="container-fluid" align="right"><i class="fas fa-edit"></i> Anggota Keluarga</h5>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No Urut</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fno1" class="form-control" style="text-transform: capitalize;" value="1" readonly>
						           	</div>
						        </div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap (Nama Kaum/Tua dan Nama Kecil)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama1" class="form-control" style="text-transform: capitalize;" placeholder="Masukan Nama Keluarga" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjk1" class="form-control" style="text-transform: capitalize;" placeholder="Jenis Kelamin" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Hub Dengan Kepala Keluarga</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fhub1" class="form-control" style="text-transform: capitalize;" placeholder="Hubungan Dalam KK" >
						        </div>
						  	</div>
						</div>
					</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftempat1" class="form-control" style="text-transform: capitalize;" placeholder="Tempat lahir" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal Lahir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftanggal1" class="form-control" style="text-transform: capitalize;" placeholder="Tempat Tanggal lahir" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Provinsi/Negara</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnegara1" class="form-control" style="text-transform: capitalize;" placeholder="PROVINSI/NEGARA" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Status Perkawinan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fstatus1" class="form-control" style="text-transform: capitalize;" placeholder="STATUS PERKAWINAN" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Agama</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama1" class="form-control" style="text-transform: capitalize;" placeholder="AGAMA" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Gol Darah</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fdarah1" class="form-control" style="text-transform: capitalize;" placeholder="GOL DARAH" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No dan Tanggal SBK (WNRI)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fwnri1" class="form-control" style="text-transform: capitalize;" placeholder="NO DAN TANGGAL SBK" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal DOK Imigrasi (Orang Asing)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fasing1" class="form-control" style="text-transform: capitalize;" placeholder="TANGGAL DOK IMIGRASI" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pendidikan Umum Terakhir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fpend1" class="form-control" style="text-transform: capitalize;" placeholder="PENDIDIKAN TERAKHIR" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i>Kemampuan Bahasa</h6>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Latin </label>
						           	<div class="col-sm-12">
						           		<select name="flatin1" class="form-control" style="text-transform: capitalize;">
						           		 
						               	 <option value="&nbsp;">&nbsp;</option>
						               	 <option value=v">&check;</option> 
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Arab </label>
						           	<div class="col-sm-12">
						           		<select name="farab1" class="form-control" style="text-transform: capitalize;">
						           		 
						               	 <option value="&nbsp;">&nbsp;</option>
						               	 <option value=v">&check;</option> 
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Lain-lain </label>
						           	<div class="col-sm-12">
						           		<select name="flain1" class="form-control" style="text-transform: capitalize;">
						           		 
						               	 <option value="&nbsp;">&nbsp;</option>
						               	 <option value=v">&check;</option> 
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pekerjaan/Jabatan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkerja1" class="form-control" style="text-transform: capitalize;" placeholder="PEKERJAAN/JABATAN" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal Mulai Tinggal di Desa ini</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fmulai1" class="form-control" style="text-transform: capitalize;" placeholder="Tanggal MULAI TINGGAL" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pindah dari tempat tinggal terakhir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fasal1" class="form-control" style="text-transform: capitalize;" placeholder="ASAL" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Bapak/Ibu</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fortu1" class="form-control" style="text-transform: capitalize;" placeholder="NAMA BAPAK/IBU" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No Pokok Penduduk (NOPEN)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnopen1" class="form-control" style="text-transform: capitalize;" placeholder="NOPEN" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Akseptor KB</label>
						           	<div class="col-sm-12">
						               	<select name="fkb1" class="form-control" style="text-transform: capitalize;">
						           		 <option value="&nbsp;">&nbsp;</option> 
						               	 <option value="PIL">PIL</option>
						               	 <option value="KONDOM">KONDOM</option>
						               	 <option value="SUNTIK">SUNTIK</option>
						               	 <option value="DLL">DLL</option>   
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Cacat Menurut Jenis</label>
						           	<div class="col-sm-12">
						               	<select name="fcacat1" class="form-control" style="text-transform: capitalize;">
						           		 <option value="&nbsp;">&nbsp;</option> 
						               	 <option value="CB">CB</option>
						               	 <option value="CM">CM</option>
						               	 <option value="TR">TR</option>
						               	 <option value="TN">TN</option>   
						               	 <option value="TW">TW</option>  
						               	 <option value="JP">JP</option>  
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Keterangan Lain-lain</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fket1" class="form-control" style="text-transform: capitalize;" placeholder="Keterangan Lain Lain" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<h5 class="container-fluid" align="right"><i class="fas fa-edit"></i> Anggota Keluarga 2</h5>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No Urut</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fno1" class="form-control" style="text-transform: capitalize;" value="2" readonly>
						           	</div>
						        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap (Nama Kaum/Tua dan Nama Kecil)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama1" class="form-control" style="text-transform: capitalize;" placeholder="Masukan Nama Keluarga" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjk1" class="form-control" style="text-transform: capitalize;" placeholder="Jenis Kelamin" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Hub Dengan Kepala Keluarga</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fhub1" class="form-control" style="text-transform: capitalize;" placeholder="Hubungan Dalam KK" >
						        </div>
						  	</div>
						</div>
					</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftempat1" class="form-control" style="text-transform: capitalize;" placeholder="Tempat lahir" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal Lahir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftanggal1" class="form-control" style="text-transform: capitalize;" placeholder="Tempat Tanggal lahir" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Provinsi/Negara</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnegara1" class="form-control" style="text-transform: capitalize;" placeholder="PROVINSI/NEGARA" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Status Perkawinan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fstatus1" class="form-control" style="text-transform: capitalize;" placeholder="STATUS PERKAWINAN" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Agama</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama1" class="form-control" style="text-transform: capitalize;" placeholder="AGAMA" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Gol Darah</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fdarah1" class="form-control" style="text-transform: capitalize;" placeholder="GOL DARAH" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No dan Tanggal SBK (WNRI)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fwnri1" class="form-control" style="text-transform: capitalize;" placeholder="NO DAN TANGGAL SBK" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal DOK Imigrasi (Orang Asing)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fasing1" class="form-control" style="text-transform: capitalize;" placeholder="TANGGAL DOK IMIGRASI" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pendidikan Umum Terakhir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fpend1" class="form-control" style="text-transform: capitalize;" placeholder="PENDIDIKAN TERAKHIR" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i>Kemampuan Bahasa</h6>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Latin </label>
						           	<div class="col-sm-12">
						           		<select name="flatin1" class="form-control" style="text-transform: capitalize;">
						           		 
						               	 <option value="&nbsp;">&nbsp;</option>
						               	 <option value=v">&check;</option> 
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Arab </label>
						           	<div class="col-sm-12">
						           		<select name="farab1" class="form-control" style="text-transform: capitalize;">
						           		 
						               	 <option value="&nbsp;">&nbsp;</option>
						               	 <option value=v">&check;</option> 
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Lain-lain </label>
						           	<div class="col-sm-12">
						           		<select name="flain1" class="form-control" style="text-transform: capitalize;">
						           		 
						               	 <option value="&nbsp;">&nbsp;</option>
						               	 <option value=v">&check;</option> 
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pekerjaan/Jabatan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkerja1" class="form-control" style="text-transform: capitalize;" placeholder="PEKERJAAN/JABATAN" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal Mulai Tinggal di Desa ini</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fmulai1" class="form-control" style="text-transform: capitalize;" placeholder="Tanggal MULAI TINGGAL" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pindah dari tempat tinggal terakhir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fasal1" class="form-control" style="text-transform: capitalize;" placeholder="ASAL" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Bapak/Ibu</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fortu1" class="form-control" style="text-transform: capitalize;" placeholder="NAMA BAPAK/IBU" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No Pokok Penduduk (NOPEN)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnopen1" class="form-control" style="text-transform: capitalize;" placeholder="NOPEN" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Akseptor KB</label>
						           	<div class="col-sm-12">
						               	<select name="fkb1" class="form-control" style="text-transform: capitalize;">
						           		 <option value="&nbsp;">&nbsp;</option> 
						               	 <option value="PIL">PIL</option>
						               	 <option value="KONDOM">KONDOM</option>
						               	 <option value="SUNTIK">SUNTIK</option>
						               	 <option value="DLL">DLL</option>   
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Cacat Menurut Jenis</label>
						           	<div class="col-sm-12">
						               	<select name="fcacat1" class="form-control" style="text-transform: capitalize;">
						           		 <option value="&nbsp;">&nbsp;</option> 
						               	 <option value="CB">CB</option>
						               	 <option value="CM">CM</option>
						               	 <option value="TR">TR</option>
						               	 <option value="TN">TN</option>   
						               	 <option value="TW">TW</option>  
						               	 <option value="JP">JP</option>  
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Keterangan Lain-lain</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fket1" class="form-control" style="text-transform: capitalize;" placeholder="Keterangan Lain Lain" >
						           	</div>
						        </div>
						  	</div>
						</div>
					<h5 class="container-fluid" align="right"><i class="fas fa-edit"></i> Anggota Keluarga 3</h5>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No Urut</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fno1" class="form-control" style="text-transform: capitalize;" value="3" readonly>
						           	</div>
						        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap (Nama Kaum/Tua dan Nama Kecil)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama1" class="form-control" style="text-transform: capitalize;" placeholder="Masukan Nama Keluarga" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjk1" class="form-control" style="text-transform: capitalize;" placeholder="Jenis Kelamin" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Hub Dengan Kepala Keluarga</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fhub1" class="form-control" style="text-transform: capitalize;" placeholder="Hubungan Dalam KK" >
						        </div>
						  	</div>
						</div>
					</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftempat1" class="form-control" style="text-transform: capitalize;" placeholder="Tempat lahir" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal Lahir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftanggal1" class="form-control" style="text-transform: capitalize;" placeholder="Tempat Tanggal lahir" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Provinsi/Negara</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnegara1" class="form-control" style="text-transform: capitalize;" placeholder="PROVINSI/NEGARA" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Status Perkawinan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fstatus1" class="form-control" style="text-transform: capitalize;" placeholder="STATUS PERKAWINAN" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Agama</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama1" class="form-control" style="text-transform: capitalize;" placeholder="AGAMA" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Gol Darah</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fdarah1" class="form-control" style="text-transform: capitalize;" placeholder="GOL DARAH" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No dan Tanggal SBK (WNRI)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fwnri1" class="form-control" style="text-transform: capitalize;" placeholder="NO DAN TANGGAL SBK" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal DOK Imigrasi (Orang Asing)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fasing1" class="form-control" style="text-transform: capitalize;" placeholder="TANGGAL DOK IMIGRASI" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pendidikan Umum Terakhir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fpend1" class="form-control" style="text-transform: capitalize;" placeholder="PENDIDIKAN TERAKHIR" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i>Kemampuan Bahasa</h6>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Latin </label>
						           	<div class="col-sm-12">
						           		<select name="flatin1" class="form-control" style="text-transform: capitalize;">
						           		 
						               	 <option value="&nbsp;">&nbsp;</option>
						               	 <option value=v">&check;</option> 
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Arab </label>
						           	<div class="col-sm-12">
						           		<select name="farab1" class="form-control" style="text-transform: capitalize;">
						           		 
						               	 <option value="&nbsp;">&nbsp;</option>
						               	 <option value=v">&check;</option> 
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Lain-lain </label>
						           	<div class="col-sm-12">
						           		<select name="flain1" class="form-control" style="text-transform: capitalize;">
						           		 
						               	 <option value="&nbsp;">&nbsp;</option>
						               	 <option value=v">&check;</option> 
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pekerjaan/Jabatan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkerja1" class="form-control" style="text-transform: capitalize;" placeholder="PEKERJAAN/JABATAN" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal Mulai Tinggal di Desa ini</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fmulai1" class="form-control" style="text-transform: capitalize;" placeholder="Tanggal MULAI TINGGAL" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pindah dari tempat tinggal terakhir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fasal1" class="form-control" style="text-transform: capitalize;" placeholder="ASAL" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Bapak/Ibu</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fortu1" class="form-control" style="text-transform: capitalize;" placeholder="NAMA BAPAK/IBU" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No Pokok Penduduk (NOPEN)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnopen1" class="form-control" style="text-transform: capitalize;" placeholder="NOPEN" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Akseptor KB</label>
						           	<div class="col-sm-12">
						               	<select name="fkb1" class="form-control" style="text-transform: capitalize;">
						           		 <option value="&nbsp;">&nbsp;</option> 
						               	 <option value="PIL">PIL</option>
						               	 <option value="KONDOM">KONDOM</option>
						               	 <option value="SUNTIK">SUNTIK</option>
						               	 <option value="DLL">DLL</option>   
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Cacat Menurut Jenis</label>
						           	<div class="col-sm-12">
						               	<select name="fcacat1" class="form-control" style="text-transform: capitalize;">
						           		 <option value="&nbsp;">&nbsp;</option> 
						               	 <option value="CB">CB</option>
						               	 <option value="CM">CM</option>
						               	 <option value="TR">TR</option>
						               	 <option value="TN">TN</option>   
						               	 <option value="TW">TW</option>  
						               	 <option value="JP">JP</option>  
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Keterangan Lain-lain</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fket1" class="form-control" style="text-transform: capitalize;" placeholder="Keterangan Lain Lain" >
						           	</div>
						        </div>
						  	</div>
						</div>
					<h5 class="container-fluid" align="right"><i class="fas fa-edit"></i> Anggota Keluarga 4</h5>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No Urut</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fno1" class="form-control" style="text-transform: capitalize;" value="4" readonly>
						           	</div>
						        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap (Nama Kaum/Tua dan Nama Kecil)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama1" class="form-control" style="text-transform: capitalize;" placeholder="Masukan Nama Keluarga" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjk1" class="form-control" style="text-transform: capitalize;" placeholder="Jenis Kelamin" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Hub Dengan Kepala Keluarga</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fhub1" class="form-control" style="text-transform: capitalize;" placeholder="Hubungan Dalam KK" >
						        </div>
						  	</div>
						</div>
					</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftempat1" class="form-control" style="text-transform: capitalize;" placeholder="Tempat lahir" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal Lahir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftanggal1" class="form-control" style="text-transform: capitalize;" placeholder="Tempat Tanggal lahir" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Provinsi/Negara</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnegara1" class="form-control" style="text-transform: capitalize;" placeholder="PROVINSI/NEGARA" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Status Perkawinan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fstatus1" class="form-control" style="text-transform: capitalize;" placeholder="STATUS PERKAWINAN" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Agama</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama1" class="form-control" style="text-transform: capitalize;" placeholder="AGAMA" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Gol Darah</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fdarah1" class="form-control" style="text-transform: capitalize;" placeholder="GOL DARAH" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No dan Tanggal SBK (WNRI)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fwnri1" class="form-control" style="text-transform: capitalize;" placeholder="NO DAN TANGGAL SBK" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal DOK Imigrasi (Orang Asing)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fasing1" class="form-control" style="text-transform: capitalize;" placeholder="TANGGAL DOK IMIGRASI" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pendidikan Umum Terakhir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fpend1" class="form-control" style="text-transform: capitalize;" placeholder="PENDIDIKAN TERAKHIR" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i>Kemampuan Bahasa</h6>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Latin </label>
						           	<div class="col-sm-12">
						           		<select name="flatin1" class="form-control" style="text-transform: capitalize;">
						           		 
						               	 <option value="&nbsp;">&nbsp;</option>
						               	 <option value=v">&check;</option> 
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Arab </label>
						           	<div class="col-sm-12">
						           		<select name="farab1" class="form-control" style="text-transform: capitalize;">
						           		 
						               	 <option value="&nbsp;">&nbsp;</option>
						               	 <option value=v">&check;</option> 
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Lain-lain </label>
						           	<div class="col-sm-12">
						           		<select name="flain1" class="form-control" style="text-transform: capitalize;">
						           		 
						               	 <option value="&nbsp;">&nbsp;</option>
						               	 <option value="v">&check;</option> 
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pekerjaan/Jabatan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkerja1" class="form-control" style="text-transform: capitalize;" placeholder="PEKERJAAN/JABATAN" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal Mulai Tinggal di Desa ini</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fmulai1" class="form-control" style="text-transform: capitalize;" placeholder="Tanggal MULAI TINGGAL" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pindah dari tempat tinggal terakhir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fasal1" class="form-control" style="text-transform: capitalize;" placeholder="ASAL" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Bapak/Ibu</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fortu1" class="form-control" style="text-transform: capitalize;" placeholder="NAMA BAPAK/IBU" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No Pokok Penduduk (NOPEN)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnopen1" class="form-control" style="text-transform: capitalize;" placeholder="NOPEN" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Akseptor KB</label>
						           	<div class="col-sm-12">
						               	<select name="fkb1" class="form-control" style="text-transform: capitalize;">
						           		 <option value="&nbsp;">&nbsp;</option> 
						               	 <option value="PIL">PIL</option>
						               	 <option value="KONDOM">KONDOM</option>
						               	 <option value="SUNTIK">SUNTIK</option>
						               	 <option value="DLL">DLL</option>   
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Cacat Menurut Jenis</label>
						           	<div class="col-sm-12">
						               	<select name="fcacat1" class="form-control" style="text-transform: capitalize;">
						           		 <option value="&nbsp;">&nbsp;</option> 
						               	 <option value="CB">CB</option>
						               	 <option value="CM">CM</option>
						               	 <option value="TR">TR</option>
						               	 <option value="TN">TN</option>   
						               	 <option value="TW">TW</option>  
						               	 <option value="JP">JP</option>  
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Keterangan Lain-lain</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fket1" class="form-control" style="text-transform: capitalize;" placeholder="Keterangan Lain Lain" >
						           	</div>
						        </div>
						  	</div>
						</div>
					<h5 class="container-fluid" align="right"><i class="fas fa-edit"></i> Anggota Keluarga 5</h5>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No Urut</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fno1" class="form-control" style="text-transform: capitalize;" value="5" readonly>
						           	</div>
						        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap (Nama Kaum/Tua dan Nama Kecil)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama1" class="form-control" style="text-transform: capitalize;" placeholder="Masukan Nama Keluarga" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjk1" class="form-control" style="text-transform: capitalize;" placeholder="Jenis Kelamin" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Hub Dengan Kepala Keluarga</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fhub1" class="form-control" style="text-transform: capitalize;" placeholder="Hubungan Dalam KK" >
						        </div>
						  	</div>
						</div>
					</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftempat1" class="form-control" style="text-transform: capitalize;" placeholder="Tempat lahir" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal Lahir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftanggal1" class="form-control" style="text-transform: capitalize;" placeholder="Tempat Tanggal lahir" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Provinsi/Negara</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnegara1" class="form-control" style="text-transform: capitalize;" placeholder="PROVINSI/NEGARA" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Status Perkawinan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fstatus1" class="form-control" style="text-transform: capitalize;" placeholder="STATUS PERKAWINAN" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Agama</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama1" class="form-control" style="text-transform: capitalize;" placeholder="AGAMA" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Gol Darah</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fdarah1" class="form-control" style="text-transform: capitalize;" placeholder="GOL DARAH" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No dan Tanggal SBK (WNRI)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fwnri1" class="form-control" style="text-transform: capitalize;" placeholder="NO DAN TANGGAL SBK" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal DOK Imigrasi (Orang Asing)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fasing1" class="form-control" style="text-transform: capitalize;" placeholder="TANGGAL DOK IMIGRASI" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pendidikan Umum Terakhir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fpend1" class="form-control" style="text-transform: capitalize;" placeholder="PENDIDIKAN TERAKHIR" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i>Kemampuan Bahasa</h6>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Latin </label>
						           	<div class="col-sm-12">
						           		<select name="flatin1" class="form-control" style="text-transform: capitalize;">
						           		 
						               	 <option value="&nbsp;">&nbsp;</option>
						               	 <option value=v">&check;</option> 
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Arab </label>
						           	<div class="col-sm-12">
						           		<select name="farab1" class="form-control" style="text-transform: capitalize;">
						           		 
						               	 <option value="&nbsp;">&nbsp;</option>
						               	 <option value=v">&check;</option> 
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Lain-lain </label>
						           	<div class="col-sm-12">
						           		<select name="flain1" class="form-control" style="text-transform: capitalize;">
						           		 
						               	 <option value="&nbsp;">&nbsp;</option>
						               	 <option value=v">&check;</option> 
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pekerjaan/Jabatan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkerja1" class="form-control" style="text-transform: capitalize;" placeholder="PEKERJAAN/JABATAN" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal Mulai Tinggal di Desa ini</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fmulai1" class="form-control" style="text-transform: capitalize;" placeholder="Tanggal MULAI TINGGAL" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pindah dari tempat tinggal terakhir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fasal1" class="form-control" style="text-transform: capitalize;" placeholder="ASAL" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Bapak/Ibu</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fortu1" class="form-control" style="text-transform: capitalize;" placeholder="NAMA BAPAK/IBU" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No Pokok Penduduk (NOPEN)</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnopen1" class="form-control" style="text-transform: capitalize;" placeholder="NOPEN" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Akseptor KB</label>
						           	<div class="col-sm-12">
						               	<select name="fkb1" class="form-control" style="text-transform: capitalize;">
						           		 <option value="&nbsp;">&nbsp;</option> 
						               	 <option value="PIL">PIL</option>
						               	 <option value="KONDOM">KONDOM</option>
						               	 <option value="SUNTIK">SUNTIK</option>
						               	 <option value="DLL">DLL</option>   
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Cacat Menurut Jenis</label>
						           	<div class="col-sm-12">
						               	<select name="fcacat1" class="form-control" style="text-transform: capitalize;">
						           		 <option value="&nbsp;">&nbsp;</option> 
						               	 <option value="CB">CB</option>
						               	 <option value="CM">CM</option>
						               	 <option value="TR">TR</option>
						               	 <option value="TN">TN</option>   
						               	 <option value="TW">TW</option>  
						               	 <option value="JP">JP</option>  
						               	</select>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Keterangan Lain-lain</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fket1" class="form-control" style="text-transform: capitalize;" placeholder="Keterangan Lain Lain" >
						           	</div>
						        </div>
						  	</div>
						</div>
					</div>
					<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No WA Pemohon Surat</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fno_hp" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Nomor Wa Anda" required>
						           	</div>
						        </div>
					<hr width="97%">
						<div class="container-fluid">
		                	<input type="reset" class="btn btn-warning" value="Batal">
		                	<input type="submit" name="submit" class="btn btn-info" value="Submit">
		              	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

<?php 
		
		}
	}else{
		header("location:index.php?pesan=gagal");
	}
	

	include ('../part/footer.php');
?>