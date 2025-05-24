<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
  	include ('../../../../config/koneksi.php');

  	$id = $_GET['id'];
  	$qCek = mysqli_query($connect,"SELECT penduduk.*, surat_kk.* FROM penduduk LEFT JOIN surat_kk ON surat_kk.nik = penduduk.nik WHERE surat_kk.id_skk='$id'");
  	while($row = mysqli_fetch_array($qCek)){

  		$qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
        foreach($qTampilDesa as $rows){

			$id_pejabat_desa = $row['id_pejabat_desa'];
		  	$qCekPejabatDesa = mysqli_query($connect,"SELECT pejabat_desa.jabatan, pejabat_desa.nama_pejabat_desa FROM pejabat_desa LEFT JOIN surat_kk ON surat_kk.id_pejabat_desa = pejabat_desa.id_pejabat_desa WHERE surat_kk.id_pejabat_desa = '$id_pejabat_desa' AND surat_kk.id_skk='$id'");
		  	while($rowss = mysqli_fetch_array($qCekPejabatDesa)){
?>

<html>
<head>
	<link rel="shortcut icon" href="../../../../assets/img/minibogor.png">
	<title>PERMOHONAN KK <?php echo $row['nik']; ?></title>
	<link href="../../../../assets/formsuratCSS/formsurat.css" rel="stylesheet" type="text/css"/>
	<style type="text/css" media="print">
	    @page { margin: 0; }
		{size: landscape;}
  		body { 
  			table-layout: "landscape";
  			vertical-align: middle;
  			size: "landscape";
  			margin: 1cm;
  			margin-left: 2cm;
  			margin-right: 2cm;
  			font-family: "Times New Roman", Times, serif;
  		}
	</style>
	
</head>
<body>

	<table width="100%">
		<div align="center"><h3 class="kop7">KARTU KELUARGA</h3></div>
		<div align="center"><h1 class="kop7"><b>FORMULIR DK.1/D. 1999</h1></div>
		<div align="center"><h4 class="kop7">Nomor : <?php echo $row['no_surat'];?></h4></div>	

		<br><br>
	</table>
</head>
<body>
<div>
	<table width="30%" align="left">
	<div align="left">
		<tr>
			<td width="10%" align="right" class="kop7">Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width="2%" align="left" class="kop7">:</td>
			<td width="20%" align="left" class="kop7"><?php echo $row['nama'] ?></td>
			</tr>
			<tr>
				<td width="30%" align="right" class="kop7">Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td width="2%" align="left" class="kop7">:</td>
				<td width="25%" align="left" class="kop7"><?php echo $row['jalan']?></td>
			</tr>
			<tr>
			<td width="10%" align="right" class="kop7">RT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width="2%" align="left" class="kop7">:</td>
			<td width="20%" align="left" class="kop7"><?php echo $row['rt'] ?></td>
			</tr>
			<tr>
			<td width="10%" align="right" class="kop7">Kode Pos&nbsp;</td>
			<td width="2%" align="left" class="kop7">:</td>
			<td width="20%" align="left" class="kop7"><?php echo $row['kdpos'] ?></td>
			</tr>
		</div>
	</table>
	<div>
	<table width="30%" align="right">
	<div align="left">
		<tr>
			<td width="10%" align="right" class="kop7">Desa&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width="2%" align="left" class="kop7">:</td>
			<td width="20%" align="left" class="kop7"><?php echo $row['desa'] ?></td>
			</tr>
			<tr>
				<td width="30%" align="right" class="kop7">Kecamatan</td>
				<td width="2%" align="left" class="kop7">:</td>
				<td width="25%" align="left" class="kop7"><?php echo $row['kec'] ?></td>
			</tr>
			<tr>
			<td width="10%" align="right" class="kop7">Kabupaten&nbsp;</td>
			<td width="2%" align="left" class="kop7">:</td>
			<td width="20%" align="left" class="kop7"><?php echo $row['kab'] ?></td>
			</tr>
			<tr>
			<td width="10%" align="right" class="kop7">Provinsi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td width="2%" align="left" class="kop7">:</td>
			<td width="20%" align="left" class="kop7"><?php echo $row['prov'] ?></td>
			</tr>
			<tr></tr>
		</div>
	</table>
		</div>
		</table>
	</div>
	<div>
		<table width="100%" style="text-transform: capitalize;" border="1px" cellspacing="0" align="center">
			<th width="40" rowspan="2" align="bottom"><br>NO<br></th>
			<th width="140" rowspan="2" colspan="1"><br>Nama<br></th>
			<th width="60" rowspan="2">Jenis Kelamin L/P</th>
			<th width="140" rowspan="2"><br>Hub Dalam KK<br></th>
			<th width="60" colspan="3">Kelahiran</th>
			<th width="60" rowspan="2">Status Perkawinan</th>
			<th width="60" rowspan="2"><br>Agama<br></th>
			<th width="60" rowspan="2">Gol. Darah</th>
			<th width="200" colspan="2">Kewarganegaraan</th>
			<tr>
				<td align="center" width="40">Tempat</td>
				<td align="center">Tanggal/Bulan/Tahun</td>
				<td>Provinsi/Negara</td>
				<td align="center" size="10px">W.N.R.I Tuliskan No. Dan Tgl.SBK</td>
				<td align="center">Orang Asing Tuliskan No. Tanggal Dok. Imigrasi</td>
				
			</tr>
			<tr>
				<td align="center"><?php echo $row['no1']; ?></td>
				<td align="center"><?php echo $row['nama1']; ?></td>
				<td align="center"><?php echo $row['jk1']; ?></td>
				<td align="center"><?php echo $row['hub1']; ?></td>
				<td align="center"><?php echo $row['tempat1']; ?></td>
				<td align="center"><?php echo $row['tanggal1']; ?></td>
				<td align="center"><?php echo $row['negara1']; ?></td>
				<td align="center"><?php echo $row['status1']; ?></td>
				<td align="center"><?php echo $row['agama1']; ?></td>
				<td align="center"><?php echo $row['darah1']; ?></td>
				<td align="center"><?php echo $row['wnri1']; ?></td>
				<td align="center"><?php echo $row['asing1']; ?></td>
			</tr>
			<tr>
				<td align="center"><?php echo $row['no2']; ?></td>
				<td align="center"><?php echo $row['nama2']; ?></td>
				<td align="center"><?php echo $row['jk2']; ?></td>
				<td align="center"><?php echo $row['hub2']; ?></td>
				<td align="center"><?php echo $row['tempat2']; ?></td>
				<td align="center"><?php echo $row['tanggal2']; ?></td>
				<td align="center"><?php echo $row['negara2']; ?></td>
				<td align="center"><?php echo $row['status2']; ?></td>
				<td align="center"><?php echo $row['agama2']; ?></td>
				<td align="center"><?php echo $row['darah2']; ?></td>
				<td align="center"><?php echo $row['wnri2']; ?></td>
				<td align="center"><?php echo $row['asing2']; ?></td>
			</tr>
			<br>
			</table>
		</div>
		<div>
			<table width="100%" style="text-transform: capitalize;" border="1px" cellspacing="0" align="center">
			<th width="40" rowspan="2" align="bottom">NO</th>
			<th width="140" rowspan="2" colspan="1">Pendidikan Umum Terakhir</th>
			<th width="60" colspan="3">Membaca/Menulis</th>
			<th width="140" rowspan="2">Pekerjaan / Jabatan</th>
			<th width="2000" rowspan="2" >Tanggal Mulai Tinggal di Desa ini</th>
			<th width="1500" rowspan="2">Pindah Dari (tempat tinggal terakhir)</th>
			<th width="60" rowspan="2">Nama Bapak/Ibu</th>
			<th width="60" rowspan="2">No Pokok Penduduk</th>
			<th width="100">Akseptor KB.</th>
			<th width="100">Cacat Menurut Jenis</th>
			<th width="100" rowspan="2">Keterangan Lain-lain</th>
			<tr>
				<td align="center" width="40">Latin</td>
				<td align="center">Arab</td>
				<td>Lain-Lain</td>
				<td align="center" size="10px">PIL/KONDOM/SUNTIK/DLL</td>
				<td align="center">CB/CM/TR/TN/TW/JP</td>
			</tr>
			<tr>
				<td align="center"><?php echo $row['no1']; ?></td>
				<td align="center"><?php echo $row['pend1']; ?></td>
				<td align="center"><?php echo $row['latin1']; ?></td>
				<td align="center"><?php echo $row['arab1']; ?></td>
				<td align="center"><?php echo $row['lain1']; ?></td>
				<td align="center"><?php echo $row['kerja1']; ?></td>
				<td align="center"><?php echo $row['mulai1']; ?></td>
				<td align="center"><?php echo $row['asal1']; ?></td>
				<td align="center"><?php echo $row['ortu1']; ?></td>
				<td align="center"><?php echo $row['nopen1']; ?></td>
				<td align="center"><?php echo $row['kb1']; ?></td>
				<td align="center"><?php echo $row['cacat1']; ?></td>
				<td align="center"><?php echo $row['ket1']; ?></td>
			</tr>
			
			<br>
			</table>
		</div>
		</body>
	<br>
	<table width="100%" style="text-transform: capitalize;">
		<tr>
			<td></td>
			<td width="10%"></td>
			<td width="30%"></td>
			<td width="10%"></td>
			<td></td>
			<td align="center">
				<?php echo $rows['nama_desa']; ?>, 
				<?php
					$tanggal = date('d F Y');
					$bulan = date('F', strtotime($tanggal));
					$bulanIndo = array(
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
					echo date('d ') . $bulanIndo[$bulan] . date(' Y');
				?>
			</td>
		</tr>
		<tr>
			<td align="center">A/N Kepala Desa <?php echo $rows['nama_desa']; ?></td>
			<td></td>
			<td align="center" style="text-transform: uppercase">Ketua RT <?php echo $row['rt']; ?></td>
	<td></td>
			<td></td>
			<td align="center">A/N Kepala Desa <?php echo $rows['nama_desa']; ?></td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr>
			<td align="center" style="text-transform: uppercase"><b><u><?php echo $rowss['nama_pejabat_desa']; ?></u></b></td>
			<td></td>
<td align="center" style="text-transform: uppercase">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
			<td></td>
			<td></td>
			<td align="center" style="text-transform: uppercase"><b><u><?php echo $row['nama']; ?></u></b></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
<td></td>
			<td></td>
			<td></td>
			<td align="center" style="text-transform: uppercase">tanda tangan / cap jempol kiri</u></b></td>
		</tr>
	</table>
</div>
<script>
	window.print();
</script>
</body>
</html>

<?php
			}
		}
  	}
?>