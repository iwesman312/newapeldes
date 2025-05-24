<?php
	include ('../../config/koneksi.php');
	include ('../part/header.php');
		 
	$nik = $_POST['fnik'];
	 
	$qCekNik = mysqli_query($connect,"SELECT * FROM penduduk WHERE nik = '$nik'");
	$row = mysqli_num_rows($qCekNik);

	if ($row > 0) {
		$data = mysqli_fetch_assoc($qCekNik);
		$no_kk = $data['no_kk']; // Ambil no_kk dari hasil query pertama

		if ($data['nik'] == $nik) {
			$_SESSION['nik'] = $nik;

			// Query untuk mencari penduduk lain dengan no_kk yang sama tetapi status perkawinan berbeda
			$qCekayah = mysqli_query($connect,"SELECT * FROM penduduk WHERE no_kk = '$no_kk' AND status_dlm_keluarga='Kepala Keluarga'");
            $rows = mysqli_fetch_assoc($qCekayah);

            $qCekibu = mysqli_query($connect,"SELECT * FROM penduduk WHERE no_kk = '$no_kk' AND status_dlm_keluarga='Istri'");
            $rowss = mysqli_fetch_assoc($qCekibu);
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
							<a class="col-sm-6"><h5><b>SURAT KETERANGAN</b></h5></a>
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
                            <div class="col-sm-6">
                            <div class="col-sm-6">
    <div class="form-group">
        <label class="col-sm-12" style="font-weight: 500;">Status Perkawinan</label>
        <div class="col-sm-12">
            <select name="fstatus" id="fstatus" class="form-control" style="text-transform: uppercase;" onchange="toggleNamaTerdahulu()">
                <option value="">Pilih Status</option>
                <?php
                $jenis_kelamin = $data['jenis_kelamin']; // Ambil jenis kelamin dari database
                
                if ($jenis_kelamin == "Laki-laki") {
                    echo '<option value="Jejaka">Jejaka</option>';
                    echo '<option value="Duda">Duda</option>';
                    echo '<option value="Beristri">Beristri</option>';
                } elseif ($jenis_kelamin == "Perempuan") {
                    echo '<option value="Perawan">Perawan</option>';
                    echo '<option value="Janda">Janda</option>';
                }
                ?>
            </select>
        </div>
    </div>
</div>

<!-- Kolom Nama Istri/Suami Terdahulu (Hidden by Default) -->
<div class="col-sm-6" id="namaTerdahuluDiv" style="display: none;">
    <div class="form-group">
        <label class="col-sm-12" style="font-weight: 500;">Nama Istri/Suami Terdahulu/Jumlah Istri</label>
        <div class="col-sm-12">
            <input type="text" name="nama_terdahulu" class="form-control" style="text-transform: uppercase;">
        </div>
    </div>
</div>
            </div>

<script>
function toggleNamaTerdahulu() {
    var statusPerkawinan = document.getElementById("fstatus").value;
    var namaTerdahuluDiv = document.getElementById("namaTerdahuluDiv");

    // Jika status adalah Duda atau Janda, tampilkan input nama istri/suami terdahulu
    if (statusPerkawinan === "Duda" || statusPerkawinan === "Janda" || statusPerkawinan === "Beristri") {
        namaTerdahuluDiv.style.display = "block";
    } else {
        namaTerdahuluDiv.style.display = "none";
    }
}
</script>
					</div>
                    <h6 class="container-fluid" align="right"><i class="fas fa-user"></i> Informasi Orang Tua</h6><hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama_ayah" class="form-control" style="text-transform: capitalize;" value="<?php echo $rows['nama']; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjenis_kelamin_ayah" class="form-control" style="text-transform: capitalize;" value="<?php echo $rows['jenis_kelamin']; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat, Tgl Lahir</label>
						           	<div class="col-sm-12">
						           		<?php
											$tgl_lhr = date($rows['tgl_lahir']);
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
						               	<input type="text" name="ftempat_tgl_lahir_ayah" class="form-control" style="text-transform: capitalize;" value="<?php echo $rows['tempat_lahir'], ", ", $tgl . $blnIndo[$bln] . $thn; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Agama</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama_ayah" class="form-control" style="text-transform: capitalize;" value="<?php echo $rows['agama']; ?>" readonly>
						           	</div>
						        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pekerjaan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fpekerjaan_ayah" class="form-control" style="text-transform: capitalize;" value="<?php echo $rows['pekerjaan']; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">NIK</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnik_ayah" class="form-control" value="<?php echo $rows['nik']; ?>" readonly>
						           	</div>
						        </div>
						  	</div>
						  	<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Alamat</label>
						           	<div class="col-sm-12">
						               	<textarea type="text" name="falamat_ayah" class="form-control" style="text-transform: capitalize;" readonly><?php echo $rows['jalan'] . ", RT" . $rows['rt'] . "/RW" . $rows['rw'] . ", Dusun " . $rows['dusun'] . ",\nDesa " . $rows['desa'] . ", Kecamatan " . $rows['kecamatan'] . ", " . $rows['kota']; ?></textarea>
						           	</div>
						        </div>
						  	</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Kewarganegaraan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkewarganegaraan_ayah" class="form-control" style="text-transform: uppercase;" value="<?php echo $rows['kewarganegaraan']; ?>" readonly>
						           	</div>
						        </div>
							</div>
                      </div>
                      <h6 class="container-fluid" align="right"><i class="fas fa-user"></i> Informasi Orang Tua</h6><hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama_ibu" class="form-control" style="text-transform: capitalize;" value="<?php echo $rowss['nama']; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjenis_kelamin_ibu" class="form-control" style="text-transform: capitalize;" value="<?php echo $rowss['jenis_kelamin']; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat, Tgl Lahir</label>
						           	<div class="col-sm-12">
						           		<?php
											$tgl_lhr = date($rowss['tgl_lahir']);
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
						               	<input type="text" name="ftempat_tgl_ibu" class="form-control" style="text-transform: capitalize;" value="<?php echo $rowss['tempat_lahir'], ", ", $tgl . $blnIndo[$bln] . $thn; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Agama</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama_ibu" class="form-control" style="text-transform: capitalize;" value="<?php echo $rowss['agama']; ?>" readonly>
						           	</div>
						        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pekerjaan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fpekerjaan_ibu" class="form-control" style="text-transform: capitalize;" value="<?php echo $rowss['pekerjaan']; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">NIK</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnik_ibu" class="form-control" value="<?php echo $rowss['nik']; ?>" readonly>
						           	</div>
						        </div>
						  	</div>
						  	<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Alamat</label>
						           	<div class="col-sm-12">
						               	<textarea type="text" name="falamat_ibu" class="form-control" style="text-transform: capitalize;" readonly><?php echo $rowss['jalan'] . ", RT" . $rowss['rt'] . "/RW" . $rowss['rw'] . ", Dusun " . $rowss['dusun'] . ",\nDesa " . $rowss['desa'] . ", Kecamatan " . $rowss['kecamatan'] . ", " . $rowss['kota']; ?></textarea>
						           	</div>
						        </div>
						  	</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Kewarganegaraan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkewarganegaraan_ibu" class="form-control" style="text-transform: uppercase;" value="<?php echo $rowss['kewarganegaraan']; ?>" readonly>
						           	</div>
						        </div>
							</div>
                        </div>
                        <h6 class="container-fluid" align="right"><i class="fas fa-user"></i> Informasi Mempelai</h6><hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama_mempelai" class="form-control" style="text-transform: capitalize;">
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjenis_kelamin_mempelai" class="form-control" style="text-transform: capitalize;">
						           	</div>
						        </div>
							</div>
                            <div class="col-sm-6">
                            <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat, Tgl Lahir</label>
                                       <div class="col-sm-12">
						               	<input type="text" name="ftempat_tgl_lahir_mempelai" class="form-control" style="text-transform: capitalize;" >
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Agama</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama_mempelai" class="form-control" style="text-transform: capitalize;">
						           	</div>
						        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pekerjaan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fpekerjaan_mempelai" class="form-control" style="text-transform: capitalize;">
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">NIK</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnik_mempelai" class="form-control">
						           	</div>
						        </div>
						  	</div>
						  	<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Alamat</label>
						           	<div class="col-sm-12">
						               	<textarea type="text" name="falamat_mempelai" class="form-control" style="text-transform: capitalize;"></textarea>
						           	</div>
						        </div>
						  	</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Kewarganegaraan</label>
						           	<div class="col-sm-12">
                                       <input type="text" name="fkewarganegaraan_mempelai" class="form-control">
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Orang Tua Laki-laki Mempelai</label>
						           	<div class="col-sm-12">
                                       <input type="text" name="fortu_mempelai" class="form-control">
						           	</div>
						        </div>
							</div>
                        </div>
						<br>
						<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i> Formulir Nikah</h6><hr width="97%">
						<div class="row">
						  	<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tanggal Pernikahan</label>
						               	<input type="text" name="ftanggal_nikah" class="form-control" placeholder="Tanggal Bulan Tahun Pernikahan" required>
						           	</div>
						        </div>
                              <div class="col-sm-6">
						      	<div class="form-group">
                                  <label class="col-sm-12" style="font-weight: 500;">Tempat Akad Pernikahan</label>
						               	<input type="text" name="fakad_nikah" class="form-control" placeholder="Tempat Akad" required>
                                    </div>
						        </div>			
                            </div>
						<br>
						<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i> Formulir Surat</h6><hr width="97%">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">No WA</label>
                                    <div class="col-sm-12">
                                        <input type="number" name="fwa" class="form-control" style="text-transform: capitalize;" placeholder="Masukan Nomor Whatsapp Anda" required>
                                    </div>
                                </div>
                            </div>
                        </div>
										</div>
										</div>
						  	<!-- <div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Keterangan Surat</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fketerangan" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Keterangan Surat" required>
						           	</div>
						        </div>
						  	</div> -->
						  	<!-- <div class="col-sm-12">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Akta Kelahiran</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fakta" class="form-control" style="text-transform: capitalize;" value="Terlampir" readonly>
						           	</div>
						        </div>
						  	</div>
						</div> -->
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