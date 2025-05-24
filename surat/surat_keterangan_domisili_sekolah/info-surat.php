<?php
include ('../../config/koneksi.php');
include ('../part/header.php');
?>

<body class="bg-light">
    <div class="container" style="max-height:cover; padding-top:30px; padding-bottom:60px; position:relative; min-height: 100%;">
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
                        <h6 class="container-fluid" align="right"><i class="fas fa-user"></i> Informasi Pribadi</h6>
                        <hr width="97%">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Nama Lengkap</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fnama" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Nama Lengkap" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
                                    <div class="col-sm-12">
                                        <select name="fjenis_kelamin" class="form-control" required>
                                            <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Tempat, Tanggal Lahir</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="ftempat_tgl_lahir" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Tempat & Tanggal Lahir" required>
                                    </div>
                                </div>
                            </div>
							<div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Agama</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fagama" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Agama Anda" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Pekerjaan</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fpekerjaan" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Pekerjaan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">NIK</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fnik" class="form-control" placeholder="Masukkan NIK Anda" required>
                                    </div>
                                </div>
                            </div>
							<div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">NO KK</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fnokk" class="form-control" placeholder="Masukkan NO KK Anda" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Alamat</label>
                                    <div class="col-sm-12">
                                        <textarea name="falamat" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Alamat KTP" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Kewarganegaraan</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fkewarganegaraan" class="form-control" style="text-transform: uppercase;" placeholder="Masukkan Kewarganegaraan" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h6 class="container-fluid" align="right"><i class="fas fa-edit"></i> Formulir Informasi Domisili</h6>
                        <hr width="97%">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Alamat Yayasan</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="falamat2" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Alamat Sekarang" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Nama Yayasan</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fnamau" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Nama Usaha Anda" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Akta Pendirian</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fakta" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Akta Pendirian Usaha Anda" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Jenis Kegiatan</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fjenis" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Jenis Usaha Anda" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h6 class="container-fluid" align="right"><i class="fas fa-edit"></i> Formulir Surat</h6>
                        <hr width="97%">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Keadaan Bangunan</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fpassport" class="form-control" placeholder="Kondisi Bangunan Anda">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Status Bangunan</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fsejak" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Luas Tanah/Bangunan</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fmaksud" class="form-control" style="text-transform: capitalize;" placeholder="Isi Keperluan Surat" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Luas PBB</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fpbb" class="form-control" style="text-transform: capitalize;" placeholder="Isi Keperluan Surat" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Jumlah Pekerja</label>
                                    <div class="col-sm-12">
                                        <input type="number" name="fworker" class="form-control" style="text-transform: capitalize;" placeholder="Isi Keperluan Surat" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Penanggung Jawab</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fpic" class="form-control" style="text-transform: capitalize;" placeholder="Isi Keperluan Surat" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">Lampiran-lampiran</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="flampiran" class="form-control" style="text-transform: capitalize;" placeholder="Isi Keperluan Surat" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-12" style="font-weight: 500;">No WA</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fwa" class="form-control" style="text-transform: capitalize;" placeholder="Masukan Nomor Whatsapp Anda" required>
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
