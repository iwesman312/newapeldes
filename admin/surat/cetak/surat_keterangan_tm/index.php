<?php 
include ('../../permintaan_surat/konfirmasi/part/akses.php');
include ('../../../../config/koneksi.php');

$id = $_GET['id'];

// Ambil data penduduk dan surat keterangan
$qCek = mysqli_query($connect, "SELECT penduduk.*, surat_keterangan_tm.* 
                                FROM penduduk 
                                LEFT JOIN surat_keterangan_tm 
                                ON surat_keterangan_tm.nik = penduduk.nik 
                                WHERE surat_keterangan_tm.id_sk='$id'");

while ($row = mysqli_fetch_assoc($qCek)) {
    $kk = $row['no_kk'];

    // Ambil anggota keluarga (selain kepala keluarga)
    $qCek2 = mysqli_query($connect, "SELECT DISTINCT penduduk.* 
                                     FROM penduduk 
                                     WHERE penduduk.no_kk ='$kk' 
                                     AND penduduk.status_dlm_keluarga NOT IN('Kepala Keluarga', 'Istri')");

    $qCek3 = mysqli_query($connect, "SELECT DISTINCT penduduk.* 
                                     FROM penduduk 
                                     WHERE penduduk.no_kk ='$kk' 
                                     AND penduduk.status_dlm_keluarga = 'Istri'");

    // Ambil profil desa
    $qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
    $rows = mysqli_fetch_assoc($qTampilDesa);

    // Ambil pejabat desa
    $id_pejabat_desa = $row['id_pejabat_desa'];
    $qCekPejabatDesa = mysqli_query($connect, "SELECT pejabat_desa.jabatan, pejabat_desa.nama_pejabat_desa 
                                                FROM pejabat_desa 
                                                WHERE id_pejabat_desa = '$id_pejabat_desa'");
    $rowss = mysqli_fetch_assoc($qCekPejabatDesa);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="../../../../assets/img/minibogor.png">
    <title>CETAK SURAT</title>
    <link href="../../../../assets/formsuratCSS/formsurat.css" rel="stylesheet" type="text/css"/>
    <style type="text/css" media="print">
        @page { 
            size: 220mm 300mm;
            margin: 0; }
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
            <h5 class="kop2" style="text-transform: capitalize;">
                <?php echo $rows['alamat'] . " Telp. " . $rows['no_telpon'] . " Kode Pos " . $rows['kode_pos']; ?>
            </h5>
            <div style="text-align: center;">
                <hr>
            </div>
        </div>
    </table>
    
    <br>
    <div align="center">
        <u><h4 class="kop3">SURAT KETERANGAN TIDAK MAMPU</h4></u>
    <p></p>
        <h4 class="kop2">Nomor : <?php echo $row['no_surat']; ?></h4>
    </div>

    <br>
    <div id="isi3">
        <p>Yang bertanda tangan di bawah ini, <strong><?php echo $rowss['jabatan']; ?></strong> Desa <?php echo $rows['nama_desa']; ?>, Kecamatan <?php echo $rows['kecamatan']; ?>, <?php echo $rows['kota']; ?>, menerangkan bahwa :</p>
        <br>

        <table width="100%" style="text-transform: capitalize;">
            <tr>
                <td width="30%">Nama</td>
                <td width="2%">:</td>
                <td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?php echo $row['jenis_kelamin']; ?></td>
            </tr>
            <tr>
                <td>Tempat/Tgl. Lahir</td>
                <td>:</td>
                <td><?php echo $row['tempat_lahir'] . ", " . date('d-m-Y', strtotime($row['tgl_lahir'])); ?></td>
            </tr>
            <tr>
                <td>Bangsa/Agama</td>
                <td>:</td>
                <td><?php echo $row['kewarganegaraan'] . "/" . $row['agama']; ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?php echo $row['nik']; ?></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td><?php echo $row['pekerjaan']; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $row['jalan'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . ", Dusun " . $row['dusun'] . ", Desa " . $row['desa'] . ", Kecamatan " . $row['kecamatan'] . ", " . $row['kota']; ?></td>
            </tr>
        </table>
        <?php while ($istri = mysqli_fetch_assoc($qCek3)): ?>
		<table width="100%" style="text-transform: capitalize;">
            <tr>
                <td width="30%">Nama</td>
                <td width="2%">:</td>
                <td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $istri['nama']; ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?php echo $istri['nik']; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?php echo $istri['jenis_kelamin']; ?></td>
            </tr>
            <tr>
                <td>Tempat/Tgl. Lahir</td>
                <td>:</td>
                <td><?php echo $istri['tempat_lahir'] . ", " . date('d-m-Y', strtotime($istri['tgl_lahir'])); ?></td>
            </tr>
            <tr>
                <td>Bangsa/Agama</td>
                <td>:</td>
                <td><?php echo $istri['kewarganegaraan'] . "/" . $istri['agama']; ?></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td><?php echo $istri['pekerjaan']; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $istri['jalan'] . ", RT" . $row['rt'] . "/RW" . $istri['rw'] . ", Dusun " . $istri['dusun'] . ", Desa " . $istri['desa'] . ", Kecamatan " . $istri['kecamatan'] . ", " . $istri['kota']; ?></td>
            </tr>
			<br>
        </table>
        <?php endwhile; ?>
		<br>
		<p>Adalah Orang tua dari seorang anak yang bernama :</p>
    
        <br>
        
		<?php while ($anggota = mysqli_fetch_assoc($qCek2)): ?>
		<table width="100%" style="text-transform: capitalize;">
            <tr>
                <td width="30%">Nama</td>
                <td width="2%">:</td>
                <td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $anggota['nama']; ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?php echo $anggota['nik']; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?php echo $anggota['jenis_kelamin']; ?></td>
            </tr>
            <tr>
                <td>Tempat/Tgl. Lahir</td>
                <td>:</td>
                <td><?php echo $anggota['tempat_lahir'] . ", " . date('d-m-Y', strtotime($anggota['tgl_lahir'])); ?></td>
            </tr>
            <tr>
                <td>Bangsa/Agama</td>
                <td>:</td>
                <td><?php echo $anggota['kewarganegaraan'] . "/" . $anggota['agama']; ?></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td><?php echo $anggota['pekerjaan']; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $anggota['jalan'] . ", RT" . $row['rt'] . "/RW" . $anggota['rw'] . ", Dusun " . $anggota['dusun'] . ", Desa " . $anggota['desa'] . ", Kecamatan " . $anggota['kecamatan'] . ", " . $anggota['kota']; ?></td>
            </tr>
			<br>
        </table>
        <?php endwhile; ?>
		<table width="100%">
			<tr>
				<td class="indentasi">Benar nama tersebut diatas adalah warga Desa kami dan nama tersebut dalam sepengetahuan kami termasuk keluarga Tidak Mampu.</td>
			</tr>
		</table>
		<br>
		
		<p>Surat keterangan ini dibuat untuk persyaratan pembuatan <?php echo $row['keperluan']; ?>.</p>
		<br>
        <p>Demikian surat keterangan ini dibuat dengan sebenarnya agar yang berkepentingan menjadi maklum.</p>
    </div>

    <br>
    <table width="100%" style="text-transform: capitalize;">
		
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
			<td align="center">A/N Kepala Desa <?php echo $rows['nama_desa']; ?></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td align="center"><?php echo $rowss['jabatan']; ?>,</td>
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
} // Akhir while
?>
