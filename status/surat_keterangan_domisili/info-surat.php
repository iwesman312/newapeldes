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
							<a class="col-sm-6"><h5><b>SURAT KETERANGAN DOMISILI TEMPAT TINGGAL</b></h5></a>
							<a class="col-sm-6"><h5><b>NOMOR SURAT : -</b></h5></a>
						</div>
					</div>
					<hr>
					<form method="post" action="simpan-surat.php">
						<h6 class="container-fluid" align="right"><i class="fas fa-user"></i> Informasi Pribadi</h6><hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['nama']; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjenis_kelamin" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['jenis_kelamin']; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat, Tgl Lahir</label>
						           	<div class="col-sm-12">
						           		<?php
											$tgl_lhr = date($data['tgl_lahir']);
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
						               	<input type="text" name="ftempat_tgl_lahir" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['tempat_lahir'], ", ", $tgl . $blnIndo[$bln] . $thn; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Agama</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['agama']; ?>" readonly>
						           	</div>
						        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pekerjaan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fpekerjaan" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['pekerjaan']; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">NIK</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnik" class="form-control" value="<?php echo $data['nik']; ?>" readonly>
						           	</div>
						        </div>
						  	</div>
						  	<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Alamat</label>
						           	<div class="col-sm-12">
						               	<textarea type="text" name="falamat" class="form-control" style="text-transform: capitalize;" readonly><?php echo $data['jalan'] . ", RT" . $data['rt'] . "/RW" . $data['rw'] . ", Dusun " . $data['dusun'] . ",\nDesa " . $data['desa'] . ", Kecamatan " . $data['kecamatan'] . ", " . $data['kota']; ?></textarea>
						           	</div>
						        </div>
						  	</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Kewarganegaraan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkewarganegaraan" class="form-control" style="text-transform: uppercase;" value="<?php echo $data['kewarganegaraan']; ?>" readonly>
						           	</div>
						        </div>
							</div>
						</div>
						<br>
						<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i> Informasi Domisili</h6><hr width="97%">
						<div class="row">
						  	<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Alamat Sekarang</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="falamat2" class="form-control" style="text-transform: capitalize;" placeholder="Masukan Alamat Sekarang" required>
						           	</div>
						        </div>
						    </div>
						<br>
						<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i> Formulir Surat</h6><hr width="97%">
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Keperluan Surat</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkeperluan" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Keperluan Surat" required>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal Surat RT</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftanggal2" class="form-control" style="text-transform: capitalize;" placeholder="Tanggal Surat RT" required>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tinggal Sejak</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fsejak" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan tanggal tinggal sejak" required>
						           	</div>
						        </div>
						  	</div>
						</div>
						<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i> Anggota Keluarga</h6><hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fno" class="form-control" style="text-transform: capitalize;" value="1" readonly>
						           	</div>
						        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama1" class="form-control" style="text-transform: capitalize;" placeholder="Masukan Nama Keluarga" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat Tanggal Lahir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftanggal3" class="form-control" style="text-transform: capitalize;" placeholder="Tempat Tanggal lahir" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjk" class="form-control" style="text-transform: capitalize;" placeholder="Jenis Kelamin" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Hub Dengan KK</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fhub1" class="form-control" style="text-transform: capitalize;" placeholder="Hubungan Dalam KK" >
						        </div>
						  	</div>
						</div>
					</div>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fno2" class="form-control" style="text-transform: capitalize;" value="2" readonly>
						           	</div>
						        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama2" class="form-control" style="text-transform: capitalize;" placeholder="Masukan Nama Keluarga" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat Tanggal Lahir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftanggal4" class="form-control" style="text-transform: capitalize;" placeholder="Tempat Tanggal lahir" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjk2" class="form-control" style="text-transform: capitalize;" placeholder="Jenis Kelamin" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Hub Dengan KK</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fhub2" class="form-control" style="text-transform: capitalize;" placeholder="Hubungan Dalam KK" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fno3" class="form-control" style="text-transform: capitalize;" value="3" readonly>
						           	</div>
						        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama3" class="form-control" style="text-transform: capitalize;" placeholder="Masukan Nama Keluarga" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat Tanggal Lahir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftanggal5" class="form-control" style="text-transform: capitalize;" placeholder="Tempat Tanggal lahir" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjk3" class="form-control" style="text-transform: capitalize;" placeholder="Jenis Kelamin" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Hub Dengan KK</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fhub3" class="form-control" style="text-transform: capitalize;" placeholder="Hubungan Dalam KK" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fno4" class="form-control" style="text-transform: capitalize;" value="4" readonly>
						           	</div>
						        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama4" class="form-control" style="text-transform: capitalize;" placeholder="Masukan Nama Keluarga" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat Tanggal Lahir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftanggal6" class="form-control" style="text-transform: capitalize;" placeholder="Tempat Tanggal lahir" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjk4" class="form-control" style="text-transform: capitalize;" placeholder="Jenis Kelamin" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Hub Dengan KK</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fhub4" class="form-control" style="text-transform: capitalize;" placeholder="Hubungan Dalam KK" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fno5" class="form-control" style="text-transform: capitalize;" value="5" readonly>
						           	</div>
						        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama5" class="form-control" style="text-transform: capitalize;" placeholder="Masukan Nama Keluarga" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat Tanggal Lahir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftanggal7" class="form-control" style="text-transform: capitalize;" placeholder="Tempat Tanggal lahir" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjk5" class="form-control" style="text-transform: capitalize;" placeholder="Jenis Kelamin" >
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Hub Dengan KK</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fhub5" class="form-control" style="text-transform: capitalize;" placeholder="Hubungan Dalam KK" >
						           	</div>
						        </div>
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
</form>
</div>
<?php 
		}
	}else{
		header("location:index.php?pesan=gagal");
	}

	include ('../part/footer.php');
?>