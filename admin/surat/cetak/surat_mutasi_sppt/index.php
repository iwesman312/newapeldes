<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
  	include ('../../../../config/koneksi.php');

  	$id = $_GET['id'];
  	$qCek = mysqli_query($connect,"SELECT surat_mutasi_sppt.* FROM surat_mutasi_sppt WHERE surat_mutasi_sppt.id_sk='$id'");
  	while($row = mysqli_fetch_array($qCek)){

        $qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
        foreach($qTampilDesa as $rows){

			$id_pejabat_desa = $row['id_pejabat_desa'];
		  	$qCekPejabatDesa = mysqli_query($connect,"SELECT pejabat_desa.jabatan, pejabat_desa.nama_pejabat_desa FROM pejabat_desa LEFT JOIN surat_mutasi_sppt ON surat_mutasi_sppt.id_pejabat_desa = pejabat_desa.id_pejabat_desa WHERE surat_mutasi_sppt.id_pejabat_desa = '$id_pejabat_desa' AND surat_mutasi_sppt.id_sk='$id'");
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
		<table width="100%">
    <tr>
        <td width="50%">
            <table>
                <tr>
                    <td><b>Nomor</b></td>
                    <td>:</td>
                    <td><?php echo $row['no_surat'];?></td>
                </tr>
                <tr>
                    <td><b>Perihal</b></td>
                    <td>:</td>
                    <td>Permohonan Mutasi Sebagian SPPT</td>
                </tr>
            </table>
        </td>
        <td width="50%" align="right">
            
			<?php echo $rows['nama_desa']; ?>,<?php
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
					echo date('d ') . $bulanIndo[$bulan] . date(' Y') ;
				?>
        </td>
</table>

<table width="100%">
<tr>
	<td width="70%"></td>
	<td></td>
<td width="30%" align="Left" valign="top"><b>Yth. <br>Kepada<br>Kepala Badan Pendapatan<br>Daerah Kabupaten Bogor<br> Di - <br> Cibinong</b></td>
</tr>

</table>

	</table>
	<br>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
			<tr>
				<td class="indentasi">Yang bertanda tangan di bawah ini, <a style="text-transform: capitalize;"><?php echo $rowss['jabatan'] . " " . $rows['nama_desa']; ?>, Kecamatan <?php echo $rows['kecamatan']; ?>, <?php echo $rows['kota']; ?></a>, Menerangkan bahwa SPPT atas nama :
				</td>
			</tr>
		</table>
		<br><br>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">Nama Wajib Pajak</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama_penjual']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Alamat Wajib Pajak</td>
				<td>:</td>
				<td><?php echo $row['alamat_penjual']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Luas Tanah</td>
				<td>:</td>
				<td><?php echo $row['luas_dijual']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Luas Bangunan</td>
				<td>:</td>
				<td><?php echo $row['luasbangun_jual']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">NOP</td>
				<td>:</td>
				<td><?php echo $row['NOP']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Letak Objek Pajak</td>
				<td>:</td>
				<td><?php echo $row['letak']; ?></td>
			</tr>
		</table>
		<br><br>
		<table width="100%">
			<tr>
				<td class="indentasi">Adalaj benar berlokasi di Desa kami, mutasi sebagian berdasarkan Jual Beli kepada :</td>
			</tr>
		</table><br>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">Nama Wajib Pajak</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama_wp']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Alamat Wajib Pajak</td>
				<td>:</td>
				<td><?php echo $row['alamat_wp']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Luas Tanah</td>
				<td>:</td>
				<td><?php echo $row['luas_wp']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Luas Bangunan</td>
				<td>:</td>
				<td><?php echo $row['keperluan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">NOP</td>
				<td>:</td>
				<td><?php echo $row['nop_wp']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Letak Objek Pajak</td>
				<td>:</td>
				<td><?php echo $row['alamat_owp']; ?></td>
			</tr>
		</table>
		<br><br>
		<table width="100%">
			<tr>
				<td class="indentasi">Dan tanah tersebut tidak dalam sengketa baik kepemilikan maupun batas-batasnya.</td>
			</tr>
		</table>
		<br>
		<table width="100%">
			<tr>
				<td class="indentasi">Demikian surat keterangan ini dibuat dengan sebenarnya, agar yang berkepentingan menjadi maklum.</td>
			</tr>
		</table>
	</div>
	<br>
	<table width="100%" style="text-transform: capitalize;">
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr>
			<td width="10%"></td>
			<td width="30%"></td>
			<td width="10%"></td>
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
			<td></td>
			<td></td>
			<td></td>
			<td align="center">a.n <?php echo $rowss['jabatan'] . " " . $rows['nama_desa']; ?></td>
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
			<td></td>
			<td></td>
			<td></td>
			<td align="center" style="text-transform: uppercase;"><u><b><?php echo $rowss['nama_pejabat_desa']; ?></b></u></td>
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