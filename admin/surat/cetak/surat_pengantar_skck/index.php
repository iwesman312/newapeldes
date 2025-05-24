<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
  	include ('../../../../config/koneksi.php');

  	$id = $_GET['id'];
  	$qCek = mysqli_query($connect,"SELECT penduduk.*, surat_pengantar_skck.* FROM penduduk LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.nik = penduduk.nik WHERE surat_pengantar_skck.id_sps='$id'");
  	while($row = mysqli_fetch_array($qCek)){

  		$qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
        foreach($qTampilDesa as $rows){

			$id_pejabat_desa = $row['id_pejabat_desa'];
		  	$qCekPejabatDesa = mysqli_query($connect,"SELECT pejabat_desa.jabatan, pejabat_desa.nama_pejabat_desa FROM pejabat_desa LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.id_pejabat_desa = pejabat_desa.id_pejabat_desa WHERE surat_pengantar_skck.id_pejabat_desa = '$id_pejabat_desa' AND surat_pengantar_skck.id_sps='$id'");
		  	while($rowss = mysqli_fetch_array($qCekPejabatDesa)){
?>

<html>
<head>
	<link rel="shortcut icon" href="../../../../assets/img/minibogor.png">
	<title>CETAK SURAT</title>
	<link href="../../../../assets/formsuratCSS/formsurat.css" rel="stylesheet" type="text/css"/>
	<style type="text/css" media="print">
	    @page { margin: 0; }
  		body { 
  			margin: 1cm;
  			margin-left: 2cm;
  			margin-right: 2cm;
  			font-family: "Times New Roman", Times, serif;
  		}
	</style>
</head>
<body>
<div>
	<table width="100%">
		<tr><img src="../../../../assets/img/kopbogor.png" alt="" class="logo"></tr>
		<div class="header">
			<h4 class="kop" style="text-transform: uppercase">PEMERINTAH <?php echo $rows['kota']; ?></h4>
			<h4 class="kop" style="text-transform: uppercase">KECAMATAN <?php echo $rows['kecamatan']; ?></h4>
			<h4 class="kop" style="text-transform: uppercase">DESA <?php echo $rows['nama_desa']; ?></h4>
			<h5 class="kop2" style="text-transform: capitalize;"><?php echo $rows['alamat'] . " Telp. " . $rows['no_telpon'] . " Kode Pos " . $rows['kode_pos']; ?></h5>
			<div style="text-align: center;">
				<hr>
			</div>
		</div>
		<br>
		<div align="center"><u><h4 class="kop">SURAT PENGANTAR PEMBUATAN SKCK</h4></u></div>
		<div align="center"><h4 class="kop3">Nomor :&nbsp;&nbsp;&nbsp;<?php echo $row['no_surat']; ?></h4></div>
	</table>
	<br>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
			<tr>
				<td class="indentasi">Yang bertanda tangan dibawah ini, Kepala Desa Sukamaju Kecamatan Jonggol Kabupaten Bogor. Menerangkan bahwa:<?php
				// 	$tanggal = date('d F Y');
				// 	$bulan = date('F', strtotime($tanggal));
				// 	$bulanIndo = array(
				// 	    'January' => 'Januari',
				// 	    'February' => 'Februari',
				// 	    'March' => 'Maret',
				// 	    'April' => 'April',
				// 	    'May' => 'Mei',
				// 	    'June' => 'Juni',
				// 	    'July' => 'Juli',
				// 	    'August' => 'Agustus',
				// 	    'September' => 'September',
				// 	    'October' => 'Oktober',
				// 	    'November' => 'November',
				// 	    'December' => 'Desember'
				// 	);
				// 	echo date('d ') . $bulanIndo[$bulan] . date(' Y');
				?> 
				</td>
			</tr>
		</table>
		<br>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">N&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;M&nbsp;&nbsp;&nbsp;A</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></td>
			</tr>
			<tr>
				<td width="30%" class="indentasi">N&nbsp;&nbsp;&nbsp;I&nbsp;&nbsp;&nbsp;K&nbsp;&nbsp;&nbsp;</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nik']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo $row['jenis_kelamin']; ?></td>
			</tr>
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
			<tr>
				<td class="indentasi">Tempat/Tgl. Lahir</td>
				<td>:</td>
				<td><?php echo $row['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?></td>
			</tr>
			<?php 
				$tgl_lahir = new DateTime($row['tgl_lahir']);
			    $tgl_hari_ini = new DateTime();
			    $umur = $tgl_hari_ini->diff($tgl_lahir);
			?>
			<!-- <tr>
				<td class="indentasi">Umur</td>
				<td>:</td>
				<td><?php echo $umur->y; echo " Tahun"; ?></td>
			</tr> -->
			<tr>
				<td class="indentasi">Agama</td>
				<td>:</td>
				<td><?php echo $row['agama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Status Perkawinan</td>
				<td>:</td>
				<td><?php echo $row['status_perkawinan']; ?></td>
			</tr>
			<!-- <tr>
				<td class="indentasi">NIK</td>
				<td>:</td>
				<td><?php echo $row['nik']; ?></td>
			</tr> -->
			<tr>
				<td class="indentasi">Kewarganegaraan</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo $row['kewarganegaraan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Alamat</td>
				<td>:</td>
				<td><?php echo $row['jalan'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . ", Dusun " . $row['dusun'] . ", Desa " . $row['desa'] . ", Kecamatan " . $row['kecamatan'] . ", " . $row['kota']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Keterangan</td>
				<td>:</td>
				<td style="text-transform: uppercase; font-weight: bold;"><?php echo $row['keterangan']; ?></td>
			</tr>
			<tr></tr>
			<tr></tr>	
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<td></td>
			<table width="100%">
			<tr>
				<td class="indentasi">Nama tersebut diatas benar warga desa kami dan sepanjang pengetahuan/penyidikan kami nama tersebut tidak tersangkut dengan perkara hukum dan berkelakuan baik.
				</td>
			</tr>
			<tr>
			<tr></tr>
			<tr></tr>
			<td class="indentasi">Demikian surat pengantar ini dibuat dengan sebenarnya agar yang berwajib mengetahui dan dipergunakan sebagaimana mestinya</td>
				</tr>
		</table>
		<tr></tr>
			<td></td>
			
		<tr></tr>
			
			<td></td>
			<!-- <table width="100%" style="text-transform: capitalize;">
					<tr>
				<td width="30%" class="indentasi">
				<td width="2%"></td><tr>
				<td class="indentasi">Keperluan</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo $row['keperluan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Keterangan</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo $row['keterangan']; ?></td>
			</tr>
			
		</table><br>
		<table width="100%">
			<tr>
				<td class="indentasi">Demikian keterangan ini di buat dengan sebenar- benarnya untuk dipergunakan seperlunya.
				</td>
			</tr>
		</table> -->
	</div>
	<br>
	<table width="100%" style="text-transform: capitalize;">
    <tr>
        <td align="center">Tanda tangan<br>Yang Bersangkutan</td>
        <td align="center"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td align="center"><?php echo $rows['nama_desa']; ?>, 
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
            <br>A/N KEPALA DESA <?php echo $rows['nama_desa']; ?>
        </td>
    </tr>
    <tr>
        <td align="center"><br><br><br><br><b><u><?php echo $row['nama']; ?></u></b></td>
        <td align="center"><br><br><br><br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
        <td align="center"><br><br><br><br><b><u><?php echo $rowss['nama_pejabat_desa']; ?></u></b></td>
    </tr>
</table>
	<br>
	<table width="100%" style="text-transform: capitalize;">
		<tr>
		<td align="center">Mengetahui<br>&nbsp;</td>
		</tr>

	<table width="100%" style="text-transform: capitalize;">
    <tr>
        <td align="center">CAMAT JONGGOL<br>&nbsp;</td>
        <td align="center">DANRAMIL JONGGOL<br>&nbsp;</td>
        <td align="center">POLSEK JONGGOL
        </td>
    </tr>
    <tr>
        <td align="center"><br><br><br><br><b><u>______________________</u></b></td>
        <td align="center"><br><br><br><br><b><u>______________________</u></b></td>
        <td align="center"><br><br><br><br><b><u>______________________</u></b></td>
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