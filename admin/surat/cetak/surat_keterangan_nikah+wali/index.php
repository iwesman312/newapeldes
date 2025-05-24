<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
  	include ('../../../../config/koneksi.php');

  	$id = $_GET['id'];
  	$qCek = mysqli_query($connect,"SELECT penduduk.*, surat_keterangan_nikah_wali.* FROM penduduk LEFT JOIN surat_keterangan_nikah_wali ON surat_keterangan_nikah_wali.nik = penduduk.nik WHERE surat_keterangan_nikah_wali.custom_id='$id'");
  	while($row = mysqli_fetch_array($qCek)){
		$nik_ayah = $row['nik_ayah']; 
		$nik_ibu = $row['nik_ibu']; 
	
		// Cek data ayah
		$qCekayah = mysqli_query($connect, "SELECT * FROM penduduk WHERE nik = '$nik_ayah' AND status_dlm_keluarga='Kepala Keluarga'");
		$rowsss = mysqli_fetch_assoc($qCekayah);
	
		// Cek data ibu
		$qCekibu = mysqli_query($connect, "SELECT * FROM penduduk WHERE nik= '$nik_ibu' AND status_dlm_keluarga='Istri'");
		$rowssss = mysqli_fetch_assoc($qCekibu);

        $qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
        foreach($qTampilDesa as $rows){

			
			$id_pejabat_desa = $row['id_pejabat_desa'];
		  	$qCekPejabatDesa = mysqli_query($connect,"SELECT pejabat_desa.jabatan, pejabat_desa.nama_pejabat_desa FROM pejabat_desa LEFT JOIN surat_keterangan_nikah_wali ON surat_keterangan_nikah_wali.id_pejabat_desa = pejabat_desa.id_pejabat_desa WHERE surat_keterangan_nikah_wali.id_pejabat_desa = '$id_pejabat_desa' AND surat_keterangan_nikah_wali.custom_id='$id'");
		  	while($rowss = mysqli_fetch_array($qCekPejabatDesa)){
?>

<html>
<head>
	<link rel="shortcut icon" href="../../../../assets/img/minibogor.png">
	<title>CETAK SURAT</title>
	<link href="../../../../assets/formsuratCSS/formsurat.css" rel="stylesheet" type="text/css"/>
	<style type="text/css" media="print">
    @page { 
        size: 24cm 33cm; /* F4 */
        margin: 1; /* Atur margin sesuai kebutuhan */
    }

    body { 
        font-family: "Times New Roman", Times, serif;
        font-size: 11pt;
        margin: 0;
        padding: 0.5cm;
    }
	
</style>
<style>
    @media print {
        .page-break {
            page-break-before: always; /* Mulai dari halaman baru */
        }
    }
</style>
<style>
    .label {
        width: 25%; /* Lebih kecil agar titik dua tidak terlalu jauh */
    }
    .separator {
        width: 5%;
        text-align: center; /* Agar titik dua berada di tengah */
    }
    .content {
        width: 70%;
    }
</style>

	</style>
</head>
<body>
<div>
    <table width="100%">
        <tr>
            <td width="80%">
                <!-- <b>Kantor Desa/Kelurahan</b> : <?php echo $rows['nama_desa']; ?><br>
                <b>Kecamatan</b> : <?php echo $rows['kecamatan']; ?><br>
                <b>Kabupaten/Kota</b> : <?php echo $rows['kota']; ?> -->
            </td>
            <td width="20%" style="text-align: left;">
                <b>Lampiran V</b><br>
                Kepdirjen Bimas Islam<br>
                <b>Nomor :</b> 47 Tahun 2020<br>
                <b>Tanggal :</b> 01 Juli 2020<br>
                <b>Model. N 1</b>
            </td>
        </tr>
    </table>
	<table width="55%">
    <tr>
        <td width="40%">Kantor Desa/Kelurahan</td>
        <td width="5%">:</td>
        <td width="55%"><?php echo $rows['nama_desa']; ?></td>
    </tr>
    <tr>
        <td width="40%">Kecamatan</td>
        <td width="5%">:</td>
        <td width="55%"><?php echo $rows['kecamatan']; ?></td>
    </tr>
    <tr>
        <td>Kabupaten/Kota</td>
        <td>:</td>
        <td><?php echo $rows['kota']; ?></td>
    </tr>
</table>

    <div align="center"><u><h4 class="kop">SURAT KETERANGAN UNTUK NIKAH</h4></u></div>
    <div align="center"><h4 class="kop2">Nomor : <?php echo $row['no_surat']; ?></h4></div>
</div>
	<br>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
			<tr>
				<td class="indentasi">Yang bertanda tangan di bawah ini menjelaskan dengan sesungguhnya bahwa :
				</td>
			</tr>
		</table>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">1. Nama</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">2. Nomor Induk Kependudukan</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nik']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">3. Jenis Kelamin</td>
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
				<td class="indentasi">4. Tempat/Tgl. Lahir</td>
				<td>:</td>
				<td><?php echo $row['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?></td>
			</tr>
			<tr>
				<td class="indentasi">5. Kewarganegaraan</td>
				<td>:</td>
				<td><?php echo $row['kewarganegaraan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">6. Agama</td>
				<td>:</td>
				<td><?php echo $row['agama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">7. Pekerjaan</td>
				<td>:</td>
				<td><?php echo $row['pekerjaan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">8. Alamat</td>
				<td>:</td>
				<td><?php echo $row['jalan'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . ", Dusun " . $row['dusun'] . ", Desa " . $row['desa'] . ", Kecamatan " . $row['kecamatan'] . ", " . $row['kota']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">9. Status Perkawinan</td>
				<td>:</td>
				<td></td>
			</tr>
			<?php if ($row['jenis_kelamin'] == "Laki-laki") { ?>
				<tr>
    <td class="indentasi">a. &nbsp;Jika Pria, Terangkan Jejaka,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Duda atau beristri dan Berapa istrinya
    </td>
    <td><br>:</td>
    <td><br><?php echo ($row['jenis_kelamin'] == "Laki-laki") ? $row['status_nik'] : ""; ?></td>
</tr>
<tr>
    <td class="indentasi">b. &nbsp;Jika Wanita, Terangkan Perawan, atau Janda
    </td>
    <td>:</td>
    <td><?php echo ($row['jenis_kelamin'] == "Perempuan") ? $row['status_nik'] : ""; ?></td>
</tr>
<tr>
    <td class="indentasi">b. &nbsp;Nama Istri/Suami Terdahulu</td>
    <td>:</td>
    <td><?php echo $row['nama_terdahulu']; ?></td>
</tr>
<?php } ?>

		</table>
		<br>
		<table width="100%">
			<tr>
				<td class="indentasi">Adalah benar anak dari pernikahan seorang pria :</td>
			</tr>
		</table><br>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">Nama</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $rowsss['nama']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">Nomor Induk Kependudukan</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $rowsss['nik']; ?></td>
			</tr>
			<?php
				$tgl_lhr = date($rowsss['tgl_lahir']);
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
				<td><?php echo $rowsss['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Kewarganegaraan</td>
				<td>:</td>
				<td><?php echo $rowsss['kewarganegaraan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Agama</td>
				<td>:</td>
				<td><?php echo $rowsss['agama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Pekerjaan</td>
				<td>:</td>
				<td><?php echo $rowsss['pekerjaan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Alamat</td>
				<td>:</td>
				<td><?php echo $rowsss['jalan'] . ", RT" . $rowsss['rt'] . "/RW" . $rowsss['rw'] . ", Dusun " . $rowsss['dusun'] . ", Desa " . $rowsss['desa'] . ", Kecamatan " . $rowsss['kecamatan'] . ", " . $rowsss['kota']; ?></td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td class="indentasi">Dengan Seorang Wanita :</td>
			</tr>
		</table><br>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">Nama</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $rowssss['nama']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">Nomor Induk Kependudukan</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $rowssss['nik']; ?></td>
			</tr>
			<?php
				$tgl_lhr = date($rowssss['tgl_lahir']);
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
				<td><?php echo $rowssss['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Kewarganegaraan</td>
				<td>:</td>
				<td><?php echo $rowssss['kewarganegaraan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Agama</td>
				<td>:</td>
				<td><?php echo $rowssss['agama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Pekerjaan</td>
				<td>:</td>
				<td><?php echo $rowssss['pekerjaan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Alamat</td>
				<td>:</td>
				<td><?php echo $rowssss['jalan'] . ", RT" . $rowssss['rt'] . "/RW" . $rowssss['rw'] . ", Dusun " . $rowssss['dusun'] . ", Desa " . $rowssss['desa'] . ", Kecamatan " . $rowssss['kecamatan'] . ", " . $rowssss['kota']; ?></td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td class="indentasi">Demikian surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk digunakan seperlunya.</td>
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
<div class="page-break"></div>

<style type="text/css" media="print">
    @page { 
        size: 24cm 33cm; /* F4 */
        margin: 1; /* Atur margin sesuai kebutuhan */
    }

    body { 
        font-family: "Times New Roman", Times, serif;
        font-size: 11pt;
        margin: 0;
        padding: 0.5cm;
    }
	
</style>
<table width="100%">
        <tr>
            <td width="80%">
                <!-- <b>Kantor Desa/Kelurahan</b> : <?php echo $rows['nama_desa']; ?><br>
                <b>Kecamatan</b> : <?php echo $rows['kecamatan']; ?><br>
                <b>Kabupaten/Kota</b> : <?php echo $rows['kota']; ?> -->
            </td>
            <td width="20%" style="text-align: left;">
                <b>Lampiran V</b><br>
                Kepdirjen Bimas Islam<br>
                <b>Nomor :</b> 47 Tahun 2020<br>
                <b>Tanggal :</b> 01 Juli 2020<br>
                <b>Model. N 2</b>
            </td>
        </tr>
    </table>
	<table width="55%">
    <tr>
        <td width="40%">Perihal</td>
        <td width="5%">:</td>
        <td width="55%">Permohonan Kehendak Nikah</td>
    </tr>
   
</table>
<br>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
		<tr>
				<td>Kepada,<br> 
				Yth Kepala KUA Kecamatan/PPN LN <br>
				Di Jonggol
				</td>
			</tr>	
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
			<tr>
				<td>Dengan Hormat, kami mengajukan permohonan kehendak nikah untuk atas nama:
				</td>
			</tr>
		</table>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">Calon Suami</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? $row['nama'] : $row['nama_mempelai']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">Calon Istri</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo ($row['jenis_kelamin'] == 'Perempuan') ? $row['nama'] : $row['nama_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Hari/Tanggal/Jam</td>
				<td>:</td>
				<td><?php echo $row['tanggal_nikah']; ?>................/...........WIB</td>
			</tr>
			<tr>
				<td class="indentasi">Tempat Akad nikah</td>
				<td>:</td>
				<td><?php echo $row['tempat_nikah']; ?></td>
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
			</table>
			<br>
	<table>
		<tr>
				<td>Bersama ini kami lampirkan surat-surat yang diperlukan untuk diperiksa sebagai berikut:
				</td>
			</tr>
	</table>
<br>
	<table>
		<tr>
				<td class="indentasi">1. Surat Pengantar Nikah dari Desa/Kelurahan;</td>
			</tr>
			<tr>
				<td class="indentasi">2. Persetujuan Calon Mempelai</td>
			</tr>
			<tr>
				<td class="indentasi">3. Fc KTP;</td>
			</tr>
			<tr>
				<td class="indentasi">4. Fc Akte Kelahiran;</td>
			</tr>
			<tr>
				<td class="indentasi">5. Fc Kartu Keluarga;</td>
			</tr>
			<tr>
				<td class="indentasi">6. Pas Foto 4x3 = 4 lembar berlatar belakang biru;</td>
			</tr>
			<tr>
				<td class="indentasi">7. Pas Foto 4x6 = 1 lembar berlatar belakang biru;</td>
			</tr>
			<tr>
				<td class="indentasi">8. ..................................................</td>
			</tr>
			<tr>
				<td class="indentasi">9. ..................................................</td>
			</tr>
			<tr>
				<td class="indentasi">10. ................................................</td>
			</tr>
			<tr>
				<td class="indentasi">11. ................................................</td>
			</tr>
			<tr>
				<td class="indentasi">12. ................................................</td>
			</tr>
			<tr>
				<td class="indentasi">13. ................................................</td>
			</tr>
	</table>
	<br>
	<table>
		<tr>
				<td class="indentasi">Demikian permohonan ini kami sampaikan, kiranya dapat diperiksa, dihadiri, dan dicatat sesuai dengan ketentuan
					peraturan perundang-undangan.
				</td>
			</tr>
	</table>
			</div>
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
		<tr>
			<td width="30%" align="left">Diterima Tanggal, ..........................</td>
		</tr>
		<tr>
			<td width="10%">Yang Menerima,</td>
			<td width="30%"></td>
			<td width="10%"></td>
			<td align="center">
				Wasalam
			</td>
		</tr>
		<tr>
			<td>Kepala KUA/PPN LN</td>
			<td></td>
			<td></td>
			<td align="center">Pemohon</td>
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
			<td><b><u>................................................</b></u></td>
			<td></td>
			<td></td>
			<td align="center" style="text-transform: uppercase;"><u><b><?php echo $row['nama']; ?></b></u></td>
		</tr>
	</table>
</div>
<div class="page-break"></div>
<div>
    <table width="100%">
        <tr>
            <td width="80%">
                <!-- <b>Kantor Desa/Kelurahan</b> : <?php echo $rows['nama_desa']; ?><br>
                <b>Kecamatan</b> : <?php echo $rows['kecamatan']; ?><br>
                <b>Kabupaten/Kota</b> : <?php echo $rows['kota']; ?> -->
            </td>
            <td width="20%" style="text-align: left;">
                <b>Lampiran V</b><br>
                Kepdirjen Bimas Islam<br>
                <b>Nomor :</b> 47 Tahun 2020<br>
                <b>Tanggal :</b> 01 Juli 2020<br>
                <b>Model. N 4</b>
            </td>
        </tr>
    </table>

    <div align="center"><u><h4 class="kop">SURAT PERSETUJUAN MEMPELAI</h4></u></div>
</div>
	<br>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
			<tr>
				<td class="indentasi">Yang bertanda tangan di bawah ini :
				</td>
			</tr>
		</table>
		<br>
		<table width="100%" style="text-transform: capitalize;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I. CALON SUAMI
			<tr>
				<td width="30%" class="indentasi">1. Nama</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? $row['nama'] : $row['nama_mempelai']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">2. Bin</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? $rowsss['nama'] : $row['ortu_mempelai']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">3. Nomor Induk Kependudukan</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? $row['nik'] : $row['nik_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">4. Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? $row['jenis_kelamin'] : $row['jenis_kelamin_mempelai']; ?></td>
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
				<td class="indentasi">5. Tempat/Tgl. Lahir</td>
				<td>:</td>
				<td><?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? $row['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn : $row['ttl_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">6. Kewarganegaraan</td>
				<td>:</td>
				<td><?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? $row['kewarganegaraan'] : $row['kewarganegaraan_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">7. Agama</td>
				<td>:</td>
				<td><?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? $row['agama'] : $row['agama_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">8. Pekerjaan</td>
				<td>:</td>
				<td><?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? $row['pekerjaan'] : $row['pekerjaan_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">9. Alamat</td>
				<td>:</td>
				<td><?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? $row['jalan'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . ", Dusun " . $row['dusun'] . ", Desa " . $row['desa'] . ", Kecamatan " . $row['kecamatan'] . ", " . $row['kota'] : $row['alamat_mempelai']; ?></td>
			</tr>
		</table>
		<br>
		<table width="100%" style="text-transform: capitalize;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;II. CALON ISTRI
			<tr>
				<td width="30%" class="indentasi">1. Nama</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo ($row['jenis_kelamin'] == 'Perempuan') ? $row['nama'] : $row['nama_mempelai']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">2. Binti</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo ($row['jenis_kelamin'] == 'Perempuan') ? $rowsss['nama'] : $row['ortu_mempelai']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">3. Nomor Induk Kependudukan</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo ($row['jenis_kelamin'] == 'Perempuan') ? $row['nik'] : $row['nik_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">4. Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo ($row['jenis_kelamin'] == 'Perempuan') ? $row['jenis_kelamin'] : $row['jenis_kelamin_mempelai']; ?></td>
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
				<td class="indentasi">5. Tempat/Tgl. Lahir</td>
				<td>:</td>
				<td><?php echo ($row['jenis_kelamin'] == 'Perempuan') ? $row['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn : $row['ttl_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">6. Kewarganegaraan</td>
				<td>:</td>
				<td><?php echo ($row['jenis_kelamin'] == 'Perempuan') ? $row['kewarganegaraan'] : $row['kewarganegaraan_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">7. Agama</td>
				<td>:</td>
				<td><?php echo ($row['jenis_kelamin'] == 'Perempuan') ? $row['agama'] : $row['agama_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">8. Pekerjaan</td>
				<td>:</td>
				<td><?php echo ($row['jenis_kelamin'] == 'Perempuan') ? $row['pekerjaan'] : $row['pekerjaan_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">9. Alamat</td>
				<td>:</td>
				<td><?php echo ($row['jenis_kelamin'] == 'Perempuan') ? $row['jalan'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . ", Dusun " . $row['dusun'] . ", Desa " . $row['desa'] . ", Kecamatan " . $row['kecamatan'] . ", " . $row['kota'] : $row['alamat_mempelai']; ?></td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td class="indentasi">Menyatakan dengan sesungguhnya bahwa atas dasar suka rela, dengan kesadaran sendiri, tanpa paksaan dari siapapun juga,
					setuju untuk melangsungkan pernikahan.
				</td>
			</tr>
		</table><br>
		<table width="100%">
			<tr>
				<td class="indentasi">Demikian surat persetujuan ini dibuat untuk digunakan seperlunya.</td>
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
		<tr></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr>
			<td></td>
			<td align="center">I. Calon Suami</td>
			<td></td>
			<td align="center">II. Calon Istri</td>
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
			<td align="center" style="text-transform: uppercase;"><u><b><?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? $row['nama'] : $row['nama_mempelai']; ?></b></u></td>
			<td></td>
			<td align="center" style="text-transform: uppercase;"><u><b><?php echo ($row['jenis_kelamin'] == 'Perempuan') ? $row['nama'] : $row['nama_mempelai']; ?></b></u></td>
		</tr>
	</table>
</div>
<div class="page-break"></div>
<div>
    <table width="100%">
        <tr>
            <td width="80%">
                <!-- <b>Kantor Desa/Kelurahan</b> : <?php echo $rows['nama_desa']; ?><br>
                <b>Kecamatan</b> : <?php echo $rows['kecamatan']; ?><br>
                <b>Kabupaten/Kota</b> : <?php echo $rows['kota']; ?> -->
            </td>
            <td width="20%" style="text-align: left;">
                <b>Lampiran V</b><br>
                Kepdirjen Bimas Islam<br>
                <b>Nomor :</b> 47 Tahun 2020<br>
                <b>Tanggal :</b> 01 Juli 2020<br>
                <b>Model. N 5</b>
            </td>
        </tr>
    </table>
    <div align="center"><u><h4 class="kop">SURAT IZIN ORANG TUA</h4></u></div>
</div>
	<br>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
			<tr>
				<td class="indentasi">Yang bertanda tangan di bawah ini menerangkan dengan sesungguhnya bahwa :
				</td>
			</tr>
		</table>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">Nama Lengkap</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $rowsss['nama']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">Nomor Induk Kependudukan</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $rowsss['nik']; ?></td>
			</tr>
			<?php
				$tgl_lhr = date($rowsss['tgl_lahir']);
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
				<td><?php echo $rowsss['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Kewarganegaraan</td>
				<td>:</td>
				<td><?php echo $rowsss['kewarganegaraan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Agama</td>
				<td>:</td>
				<td><?php echo $rowsss['agama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Pekerjaan</td>
				<td>:</td>
				<td><?php echo $rowsss['pekerjaan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Alamat</td>
				<td>:</td>
				<td><?php echo $rowsss['jalan'] . ", RT" . $rowsss['rt'] . "/RW" . $rowsss['rw']. ", Desa " . $rowsss['desa'] . ",<br> Kecamatan " . $rowsss['kecamatan'] . "," . $rowsss['kota']; ?></td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td class="indentasi"><b>Dengan Seorang Wanita</b> :</td>
			</tr>
		</table><br>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">Nama Lengkap</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $rowssss['nama']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">Nomor Induk Kependudukan</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $rowssss['nik']; ?></td>
			</tr>
			<?php
				$tgl_lhr = date($rowssss['tgl_lahir']);
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
				<td><?php echo $rowssss['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Kewarganegaraan</td>
				<td>:</td>
				<td><?php echo $rowssss['kewarganegaraan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Agama</td>
				<td>:</td>
				<td><?php echo $rowssss['agama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Pekerjaan</td>
				<td>:</td>
				<td><?php echo $rowssss['pekerjaan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Alamat</td>
				<td>:</td>
				<td><?php echo $rowssss['jalan'] . ", RT" . $rowssss['rt'] . "/RW" . $rowssss['rw'] . ", Desa " . $rowssss['desa'] . ",<br> Kecamatan " . $rowssss['kecamatan'] . ", " . $rowssss['kota']; ?></td>
			</tr>
		</table>
		<br>
		<table width="100%">
			<tr>
				<td class="indentasi">Adalah Kedua Orang tua yang bernama :</td>
			</tr>
		</table><br>
		
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">1. Nama</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">2. Nomor Induk Kependudukan</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nik']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">3. Jenis Kelamin</td>
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
				<td class="indentasi">4. Tempat/Tgl. Lahir</td>
				<td>:</td>
				<td><?php echo $row['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?></td>
			</tr>
			<tr>
				<td class="indentasi">5. Kewarganegaraan</td>
				<td>:</td>
				<td><?php echo $row['kewarganegaraan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">6. Agama</td>
				<td>:</td>
				<td><?php echo $row['agama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">7. Pekerjaan</td>
				<td>:</td>
				<td><?php echo $row['pekerjaan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">8. Alamat</td>
				<td>:</td>
				<td><?php echo $row['jalan'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . ", Desa " . $row['desa'] . ", Kecamatan " . $row['kecamatan'] . ", " . $row['kota']; ?></td>
			</tr>
		</table>
		<br>
		<table width="100%">
			<tr>
				<td class="indentasi">Memberi izin kepad anak kami untuk melaksanakan pernikahan dengan:</td>
			</tr>
		</table>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">1. Nama</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama_mempelai']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">2. Nomor Induk Kependudukan</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nik_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">3. Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo $row['jenis_kelamin_mempelai']; ?></td>
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
				<td class="indentasi">4. Tempat/Tgl. Lahir</td>
				<td>:</td>
				<td><?php echo $row['ttl_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">5. Kewarganegaraan</td>
				<td>:</td>
				<td><?php echo $row['kewarganegaraan_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">6. Agama</td>
				<td>:</td>
				<td><?php echo $row['agama_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">7. Pekerjaan</td>
				<td>:</td>
				<td><?php echo $row['pekerjaan_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">8. Alamat</td>
				<td>:</td>
				<td><?php echo $row['alamat_mempelai'];?></td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td class="indentasi">Demikian surat izin ini dibuat dengan kesadaran tanpa ada paksaan dari siapapun dan untuk digunakan seperlunya.</td>
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
			<td align="center">Ayah/Wali/Pengampu</td>
			<td></td>
			<td align="center">Ibu/Wali/Pengampu</td>
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
		<tr>
			<td></td>
			<td align="center" style="text-transform: uppercase;"><u><b><?php echo $rowsss['nama']; ?></b></u></td>
			<td></td>
			<td align="center" style="text-transform: uppercase;"><u><b><?php echo $rowssss['nama']; ?></b></u></td>
		</tr>
	</table>
</div>
<div class="page-break"></div>
<br><br><br>
<div align="center"><u><h4 class="kop">SURAT PERNYATAAN</h4></u></div>
    <div align="center"><h4 class="kop2">Di bawah Sumpah</h4></div>
</div>
	<br>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
			<tr>
			<td>Dengan mengucapkan sumpah "<b>DEMI ALLAH</b>" :
				</td>
			</tr>
				<tr>
					<td>Yang bertanda tangan di bawah ini saya :
				</td>
			</tr>
		</table>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">1. Nama</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">2. Nomor Induk Kependudukan</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nik']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">3. Jenis Kelamin</td>
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
				<td class="indentasi">4. Tempat/Tgl. Lahir</td>
				<td>:</td>
				<td><?php echo $row['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?></td>
			</tr>
			<tr>
				<td class="indentasi">5. Kewarganegaraan</td>
				<td>:</td>
				<td><?php echo $row['kewarganegaraan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">6. Agama</td>
				<td>:</td>
				<td><?php echo $row['agama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">7. Pekerjaan</td>
				<td>:</td>
				<td><?php echo $row['pekerjaan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">8. Alamat</td>
				<td>:</td>
				<td><?php echo $row['jalan'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . ", Dusun " . $row['dusun'] . ", Desa " . $row['desa'] . ", Kecamatan " . $row['kecamatan'] . ", " . $row['kota']; ?></td>
			</tr>
			</table>
		<?php
	function tanggalIndo($tanggal) {
    $bulanIndo = [
        'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret',
        'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli',
        'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober',
        'November' => 'November', 'December' => 'Desember'
    ];

    $formatTanggal = date('d F Y', strtotime($tanggal));
    foreach ($bulanIndo as $en => $id) {
        $formatTanggal = str_replace($en, $id, $formatTanggal);
    }
    return $formatTanggal;
}
?>
<br>
		<table width="100%">
    <td>Menyatakan dengan sebenarnya, bahwa sampai saat ini, tanggal :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u><?php echo tanggalIndo(date('Y-m-d')); ?></u></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
	saya berstatus : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><i><?php echo $row['status_nik']; ?></b></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	atau dalam ikatan hukum perkawinan menurut agama atau Undang-Undang Perkawinan
    </td>
</table>
<br>
<table width="100%">
    <td>Surat pernyataan ini saya buat dalam keadaan sehat walafiat serta tanpa ada paksaan dari pihak manapun. Jika pernyataan ini tidak benar,
		maka saya siap dan bersedia dituntut dihadapan pihak berwenang atas tanggung jawab saya sendiri dengan tidak melibatkan orang lain.
    </td>
</table>
<br>
<table width="100%">
	<td>Demikian surat pernyataan ini dibuat dengan sebenarnya agar dapat diketahui dan dipergunakan untuk melengkapi keterangan Status
		yang dikeluarkan oleh Kantor Desa dalam melangsungkan Perkawinan
	</td>
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
			<td align="center">Menyetujui/Mengetahui</td>
			<td></td>
			<td align="center">Yang membuat Pernyataan</td>
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
		<tr>
		<td></td>
			<td></td>
			<td></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Materai Rp.10.000,-</td>
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
		<tr>
			<td></td>
			<td align="center" style="text-transform: uppercase;"><u><b><?php echo $rowsss['nama']; ?></b></u></td>
			<td></td>
			<td align="center" style="text-transform: uppercase;"><u><b><?php echo $row['nama']; ?></b></u></td>
		</tr>
				</table>
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
				Mengetahui
			</td>
		</tr>
		<tr>
			<td></td>
			<td><u>Saksi-saksi :</u></td>
			<td></td>
			<td align="center">a.n <?php echo $rowss['jabatan'] . " " . $rows['nama_desa']; ?></td>
		</tr>
		<tr></tr>
		<tr>
		<td></td>
			<td><u>1.............................................</u></td>
			<td></td>
			<td></td>
		</tr>
		<tr><td></td>
			<td><u>2.............................................</u></td>
			<td></td>
			<td></td></tr>
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
<div class="page-break"></div>
<br><br>
<div align="center"><u><h4 class="kop">SURAT PERNYATAAN WALI</h4></u></div>
</div>
	<br>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
			<tr>
				<td class="indentasi">Yang bertanda tangan di bawah ini menerangkan dengan sesungguhnya bahwa :
				</td>
			</tr>
		</table>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">Nama Lengkap</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['wali']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">Nomor Induk Kependudukan</td>
				<td width="2%">:</td>
				<!-- <td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $rowsss['nik']; ?></td> -->
				<td width="68%" style="text-transform: uppercase; font-weight: bold;">-</td>
			</tr>
			<?php
				$tgl_lhr = date($rowsss['tgl_lahir']);
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
				<!-- <td><?php echo $rowsss['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?></td>-->
				<td width="68%" style="text-transform: uppercase; font-weight: bold;">-</td>
			</tr>
			<tr>
				<td class="indentasi">Kewarganegaraan</td>
				<td>:</td>
				<!-- <td><?php echo $rowsss['kewarganegaraan']; ?></td> -->
				<td width="68%" style="text-transform: uppercase; font-weight: bold;">-</td>
			</tr>
			<tr>
				<td class="indentasi">Agama</td>
				<td>:</td>
				<!-- <td><?php echo $rowsss['agama']; ?></td> -->
				<td width="68%" style="text-transform: uppercase; font-weight: bold;">-</td>
			</tr>
			<tr>
				<td class="indentasi">Pekerjaan</td>
				<td>:</td>
				<!-- <td><?php echo $rowsss['pekerjaan']; ?></td> -->
				<td width="68%" style="text-transform: uppercase; font-weight: bold;">-</td>
			</tr>
			<tr>
				<td class="indentasi">Alamat</td>
				<td>:</td>
				<!-- <td><?php echo $rowsss['jalan'] . ", RT" . $rowsss['rt'] . "/RW" . $rowsss['rw']. ", Desa " . $rowsss['desa'] . ",<br> Kecamatan " . $rowsss['kecamatan'] . "," . $rowsss['kota']; ?></td> -->
				<td width="68%" style="text-transform: uppercase; font-weight: bold;">-</td>
			</tr>
		</table>
		<br>
		<table width="100%">
			<tr>
				<td class="indentasi">Adalah Wali/Ayah kandung dari seorang anak yang bernama:</td>
			</tr>
		</table><br>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">1. Nama</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">2. Nomor Induk Kependudukan</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nik']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">3. Jenis Kelamin</td>
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
				<td class="indentasi">4. Tempat/Tgl. Lahir</td>
				<td>:</td>
				<td><?php echo $row['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?></td>
			</tr>
			<tr>
				<td class="indentasi">5. Kewarganegaraan</td>
				<td>:</td>
				<td><?php echo $row['kewarganegaraan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">6. Agama</td>
				<td>:</td>
				<td><?php echo $row['agama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">7. Pekerjaan</td>
				<td>:</td>
				<td><?php echo $row['pekerjaan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">8. Alamat</td>
				<td>:</td>
				<td><?php echo $row['jalan'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . ", Desa " . $row['desa'] . ", Kecamatan " . $row['kecamatan'] . ", " . $row['kota']; ?></td>
			</tr>
		</table>
		
		<br>
		<table width="100%">
			<tr>
				<td class="indentasi">Untuk menikah dengan seorang laki laki yang bernama :</td>
			</tr>
		</table>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">1. Nama</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama_mempelai']; ?></td>
			</tr>
			<tr>
				<td width="50%" class="indentasi">2. Nomor Induk Kependudukan</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nik_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">3. Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo $row['jenis_kelamin_mempelai']; ?></td>
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
				<td class="indentasi">4. Tempat/Tgl. Lahir</td>
				<td>:</td>
				<td><?php echo $row['ttl_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">5. Kewarganegaraan</td>
				<td>:</td>
				<td><?php echo $row['kewarganegaraan_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">6. Agama</td>
				<td>:</td>
				<td><?php echo $row['agama_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">7. Pekerjaan</td>
				<td>:</td>
				<td><?php echo $row['pekerjaan_mempelai']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">8. Alamat</td>
				<td>:</td>
				<td><?php echo $row['alamat_mempelai'];?></td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td class="indentasi">Demikian surat izin ini dibuat dengan kesadaran tanpa ada paksaan dari siapapun dan untuk digunakan seperlunya.</td>
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
			<td align="center"><u>Saksi/Saksi: </u></td>
			<td></td>
			<td align="center">Pemohon/Wali</td>
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
		<tr>
		<td></td>
			<td>1..............................</td>
			<td>...............</td>
			<td></td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr>
		<td></td>
			<td>2..............................</td>
			<td>...............</td>
			<td></td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td align="center" style="text-transform: uppercase;"><u><b><?php echo $row['wali']; ?></b></u></td>
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