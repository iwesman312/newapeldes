<?php
	include ('../../config/koneksi.php');
	include ('../part/header.php');
		 

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
							<a class="col-sm-6"><h5><b>SURAT KETERANGAN SPPT</b></h5></a>
							<a class="col-sm-6"><h5><b>NOMOR SURAT : -</b></h5></a>
						</div>
					</div>
					<hr>
					<form method="post" action="simpan-surat.php">
						<h6 class="container-fluid" align="right"><i class="fas fa-user"></i> Informasi SPPT ASAL</h6><hr width="97%">
						<div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Nama Wajib Pajak</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fjualnama_wp" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Nama Penjual"  required >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Luas Tanah</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fjualluas_wp" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Luas Tanah" required >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Luas Bangunan</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fjualluasbangun" class="form-control" placeholder="Masukkan Luas Bangunan" required >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">NOP</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fjualnop_wp" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan NOP Penjual" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Alamat Wajib Pajak</label>
                                    <div class="col-sm-12">
                                       <textarea type="text" name="fjualalamat_wp" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Alamat Penjual" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Letak Objek Pajak</label>
                                    <div class="col-sm-12">
                                        <textarea type="text" name="fjualalamat_owp" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Alamat Objek Pajak"  required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
						<br>
						<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i> Informasi SPPT Tujuan</h6><hr width="97%">
						<div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Nama Wajib Pajak</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fnama_wp" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Nama Pembeli" required >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Luas Tanah</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fluas_wp" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Luas Tanah Objek Pajak" required >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Luas Bangunan</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fluasbangun" class="form-control" placeholder="Masukkan Luas Bangunan" required >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">NOP</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fnop_wp" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan NOP Pembeli" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Alamat Wajib Pajak</label>
                                    <div class="col-sm-12">
                                       <textarea type="text" name="falamat_wp" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Alamat Pembeli" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Letak Objek Pajak</label>
                                    <div class="col-sm-12">
                                        <textarea type="text" name="falamat_owp" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Alamat Objek Pajak" required></textarea>
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


	include ('../part/footer.php');
?>