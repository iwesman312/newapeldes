<?php
include ('../../config/koneksi.php');

if (isset($_POST['submit'])){
    $jenis_surat = "Surat Keterangan Domisili Tempat Tinggal";
    $nik = $_POST['fnik'];
    $alamat2 = $_POST['falamat2'];
    $tanggal = $_POST['ftempat_tgl_lahir'];
    $sejak = $_POST['fsejak'];
    $alamat = $_POST['falamat'];
    $tujuan = $_POST['fmaksud'];
    $kk = $_POST['fnokk'];
    $nama = $_POST['fnama'];
    $passport = $_POST['fpassport'];
    $pekerjaan = $_POST['fpekerjaan'];
    $warganegara = $_POST['fkewarganegaraan'];
    $agama = $_POST['fagama'];
    $jenis_kelamin = $_POST['fjenis_kelamin'];
    $status_surat = "PENDING";
    $id_profil_desa = "1";
    $wa = $_POST['fwa'];

    $qTambahSurat = "INSERT INTO surat_keterangan_domisili_tempat_tinggal (jenis_surat, nik, alamat2, tanggal, sejak, status_surat, id_profil_desa, nama, alamat, kk, passport, pekerjaan, warganegara, agama, jenis_kelamin, tujuan, no_hp) VALUES('$jenis_surat', '$nik', '$alamat2','$tanggal','$sejak','$status_surat', '$id_profil_desa', '$nama', '$alamat','$kk','$passport','$pekerjaan','$warganegara','$agama','$jenis_kelamin','$tujuan', '$wa')";
    $TambahSurat = mysqli_query($connect, $qTambahSurat);

    if ($TambahSurat) {
        // Ambil ID terakhir yang baru saja dimasukkan
        $id_sk = mysqli_insert_id($connect);

        // Kirim WA sebelum redirect
        $url = "http://localhost/desa/surat/surat_keterangan_domisili_tempat_tinggal/message.php?id=$id_sk"; // Sesuaikan dengan URL message.php di server Anda
        $response = file_get_contents($url);

        // Debugging: Cek apakah WA terkirim sebelum redirect
        if ($response) {
            echo "WA Terkirim untuk ID: $id_sk<br>";
        } else {
            echo "Gagal mengirim WA untuk ID: $id_sk<br>";
        }

        // Redirect setelah WA terkirim
        header("location:../surat_keterangan_domisili_tempat_tinggal/message.php?id=$id_sk");
        exit();
    } else {
        echo "<script LANGUAGE='JavaScript'>window.alert('Gagal menyimpan data!'); window.location.href='../index.php'</script>";
    }
}
?>
