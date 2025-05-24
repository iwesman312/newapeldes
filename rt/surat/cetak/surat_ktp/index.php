<?php 
	
  	include ('../../../../config/koneksi.php');

  	$id = $_GET['id'];
  	$qCek = mysqli_query($connect,"SELECT penduduk.*, surat_ktp.* FROM penduduk LEFT JOIN surat_ktp ON surat_ktp.nik = penduduk.nik WHERE surat_ktp.id_sktp='$id'");
  	while($row = mysqli_fetch_array($qCek)){

  		$qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
        foreach($qTampilDesa as $rows){

			$id_pejabat_desa = $row['id_pejabat_desa'];
		  	$qCekPejabatDesa = mysqli_query($connect,"SELECT pejabat_desa.jabatan, pejabat_desa.nama_pejabat_desa FROM pejabat_desa LEFT JOIN surat_ktp ON surat_ktp.id_pejabat_desa = pejabat_desa.id_pejabat_desa WHERE surat_ktp.id_pejabat_desa = '$id_pejabat_desa' AND surat_ktp.id_sktp='$id'");
		  	while($rowss = mysqli_fetch_array($qCekPejabatDesa)){
?>

<html>
<head>
	<link rel="shortcut icon" href="../../../../assets/img/minibogor.png">
	<title>PERMOHONAN KTP <?php echo $row['nik']; ?></title>
	<link href="../../../../assets/formsuratCSS/formsurat.css" rel="stylesheet" type="text/css"/>
	<style type="text/css" media="print">
		.comment {
        resize: none;
        height: 100px;
        width: 110px;
	    @page { margin: 0; }

  		body { 
  			margin: 1cm;
  			margin-left: 2cm;
  			margin-right: 2cm;
  			font-family: "Times New Roman", Times, serif;
  		}
	</style>
	<style type="text/css" meida="print">
		.comment2 {
        resize: none;
        height: 100px;
        width: 100px;
	    @page { margin: 0; }
}
	</style>
	<style type="text/css" meida="print">
		.comment3 {
        resize: none;
        height: 70px;
        width: 170px;
	    @page { margin: 0; }
}
	</style>
</head>
<body>
<div>
	<table width="35%" border="1px solid" align="left">
	<div align="left">
			<td width="30%" align="left" class="kop7">Nomor : <?php echo $row['no_surat'] ?></td>
		</div>
		</table>
	<table width="10%" border="1" align="right">

		<div align="right">
			<td width ="30%" align="center" class="kop7">F-1.21</a></td>
		</div>
		
	</table>
	<br>
	<br>
	<br>
	<br>
	<table width="100%">
		<div align="center"><h1 class="kop7">FORMULIR PERMOHONAN KARTU TANDA PENDUDUK (KTP) WARGA NEGARA INDONESIA</h1></div>
		<br><br>
	</table>
	<table width="85%" border="1px solid black" cellspacing="0">
<tr>
			<td width="40%" class="indentasi">PERHATIAN: <br>
			1.Harap Isi dengan huruf cetak dan menggunakan tinta hitam. <br>
			2.Untuk kolom pilihan, harap memberi tanda silang (X) pada kotak pilihan<br>
			3.Setelah formulir ini diisi dan ditandatangani, harap diserahkan kembali ke kantor Desa/Kelurahan
</td>
	</tr>
	</table>
	<br>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%" >
			<tr>
			<td width="30%" class="indentasi">PEMERINTAH</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;">JAWA BARAT</td>
				</tr>					
			<tr>
			<td width="30%" class="indentasi">PEMERINTAH</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['kota']; ?></td></tr>
			<tr>
			<td width="30%" class="indentasi">KECAMATAN</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['kecamatan']; ?></td></tr>
				<tr>
			<td width="30%" class="indentasi">KELURAHAN/DESA</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $rows['nama_desa']; ?></td></tr>	
		</table>
		<table>
		<tr>
	<td class="indentasi">Permohonan KTP</td>
	<td>


<input size="1" type="text">&nbsp;&nbsp;&nbsp;


<input size="1" type="text">A. Baru&nbsp;&nbsp;&nbsp;


<input size="1" type="text">B. Perpanjang&nbsp;&nbsp;&nbsp;


<input size="1" type="text">C. Penggantian&nbsp;&nbsp;&nbsp;




</td>
	
</tr>
</table>
		<br>
		<table width="100%" style="text-transform: capitalize;" border="1px" cellspacing="0">
			<tr>
				<td width="30%" class="indentasi">N&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;M&nbsp;&nbsp;&nbsp;A</td>
				
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></td>
			</tr>

			<tr>
				<td class="indentasi">No. KK</td>
				
				<td><?php echo $row['no_kk']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">NIK</td>
				
				<td><?php echo $row['nik']; ?></td>
			</tr>
			<tr>
				<td rowspan="2" class="indentasi">Alamat</td>
				
				<td><?php echo $row['jalan'];?></td>
			</tr>
			<tr>
				<td><?php echo "Desa".$row['desa']. ", Kecamatan " . $row['kecamatan'] . ", " . $row['kota'];  ?></td>
			</tr>
			<br>
			
			<table width="100%" align="right">
			
			</table>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>RT</td>
			<td><input size="1" type="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RW</td>
			<td><input size="1" type="text"></td>
			<br><br>
			<table width="30%"  align="center">
			<tr>	
				
			<table width="100%" cellpadding="0" cellspacing="0">
				
         <td>Photo(2x3)<textarea class="comment"></textarea></td>
         <td>Cap Jempol<textarea class="comment2"></textarea></td>
         <td>Secimen Tanda Tangan<textarea class="comment3"></textarea></td>
         <td width="10%"></td>
			<td width="35%"></td>
			<td width="20%"></td>
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
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pemohon 
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td align="right">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
		</tr>
      </table>
			
		
	<br>
	<table width="100%" style="text-transform: capitalize;">
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr>
			<td width="10%"></td>
			<td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mengetahui</td>
			<td width="10%"></td>
			<td></td>
			<td align="center">
				
			</td>
		</tr>
		<tr>
			<td align="center"></td>
			<td align="center">Camat Bojonggede</td>
			<td></td>
			<td></td>
			<td></td>
			<td align="center">Kepala Desa <?php echo $rows['nama_desa'];?></td>
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
			<td>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )</td>
			<td></td>
			<td></td>
			 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td align="center" style="text-transform: uppercase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u><?php echo $rowss['nama_pejabat_desa']; ?></u></b></td>
		</tr>

			</table><br><br>
	
</div>
<script>
	window.print();
</script>
</tr>
</table>
</table>
</div>
</div>
</body>
</html>
</body>
</html>

<?php
			}
		}
  	}
?>