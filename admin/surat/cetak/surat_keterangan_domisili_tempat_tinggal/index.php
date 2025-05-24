<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
  	include ('../../../../config/koneksi.php');

  	$id = $_GET['id'];
  	$qCek = mysqli_query($connect,"SELECT * FROM surat_keterangan_domisili_tempat_tinggal WHERE id_skdtt='$id'");
  	while($row = mysqli_fetch_array($qCek)){

  		$qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
        foreach($qTampilDesa as $rows){

			$id_pejabat_desa = $row['id_pejabat_desa'];
		  	$qCekPejabatDesa = mysqli_query($connect,"SELECT pejabat_desa.jabatan, pejabat_desa.nama_pejabat_desa FROM pejabat_desa LEFT JOIN surat_keterangan_domisili_tempat_tinggal ON surat_keterangan_domisili_tempat_tinggal.id_pejabat_desa = pejabat_desa.id_pejabat_desa WHERE surat_keterangan_domisili_tempat_tinggal.id_pejabat_desa = '$id_pejabat_desa' AND surat_keterangan_domisili_tempat_tinggal.id_skdtt='$id'");
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
		<div align="center"><u><h4 class="kop3">SURAT KETERANGAN DOMISILI TEMPAT TINGGAL</h4></u></div>
		<div align="center"><h4 class="kop3">Nomor :&nbsp;&nbsp;&nbsp;<?php echo $row['no_surat']; ?></h4></div>
	</table>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
			<tr>
				<td class="indentasi">Yang bertanda tangan di bawah ini,KEPALA DESA <a style="text-transform: capitalize;"><?php echo$rows['nama_desa']; ?>, Kecamatan <?php echo $rows['kecamatan']; ?>, <?php echo $rows['kota']; ?></a>Desa <?php echo $rows['nama_desa']; ?>, Kecamatan <?php echo $rows['kecamatan']; ?>, <?php echo $rows['kota']; ?> menerangkan dengan sebenarnya bahwa :
				</td>
			</tr>
		</table>
		<br><br>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">N&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;M&nbsp;&nbsp;&nbsp;A</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo $row['jenis_kelamin']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Tempat Tanggal Lahir</td>
				<td>:</td>
				<td><?php echo $row['tanggal']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Warganegara/Agama</td>
				<td>:</td>
				<td><?php echo $row['warganegara']; ?>/<?php echo $row['agama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Pekerjaan</td>
				<td>:</td>
				<td><?php echo $row['pekerjaan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Alamat Asal</td>
				<td>:</td>
				<td><?php echo $row['alamat'] ; ?></td>
			</tr>
		</table>
		<br>
		<table width="100%">
			<tr>
				<td class="indentasi">Menerangkan bahwa nama tersebut diatas adalah benar <a><b> PENDUDUK SEMENTARA </b></a> Desa <?php echo$rows['nama_desa']; ?> dan bertempat tinggal/berdomisili di <b><?php echo $row['alamat2']; ?></b> Adapun dokumen yang dimiliki :
				</td>
			</tr>
		</table>
		<br><br>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="35%" class="indentasi">KTP/KK NOMOR :</td>
				<td width="2%">:</td>
				<td width="63%" style="text-transform: uppercase;"><?php echo $row['nik']; ?> / <?php echo $row['kk']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Passport Nomor</td>
				<td>:</td>
				<td><?php echo $row['passport']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Berdomisili Sejak</td>
				<td>:</td>
				<td><?php echo $row['sejak']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Maksud/Tujuan</td>
				<td>:</td>
				<td><?php echo $row['tujuan']; ?></td>
			</tr>
		</table>
		<br><br>
		<table width="100%">
			<tr>
				<td class="indentasi">Data tersebut diatas sesuai dengan dokumen yang dimiliki dan keterangan yang bersangkutan.
				</td>
			</tr>
		</table>
		<br>
		<table width="100%">
			<tr>
				<td class="indentasi">Demikian surat keterangan ini diberikan untuk dipergunakan sebagaimana mestinya.
				</td>
			</tr>
		</table>
	</div>
	<br><br><br>
	<table width="100%" style="text-transform: capitalize;">
    <tr>
        <td align="center"><br>Yang Bersangkutan,</td>
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