<?php
include ('../../config/koneksi.php');

if (isset($_POST['submit'])){
    $jenis_surat = "Surat Keterangan Domisili Sekolah";
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
    $namau = $_POST['fnamau'];
    $akta = $_POST['fakta'];
    $jenis = $_POST['fjenis'];
    $pbb = $_POST['fpbb'];
    $worker = $_POST['fworker'];
    $pic = $_POST['fpic'];
    $lampiran = $_POST['flampiran'];

    $qTambahSurat = "INSERT INTO surat_domisili_sekolah (jenis_surat, nik, alamat2, tanggal, status_bangunan, status_surat, id_profil_desa, nama, alamat, kk, bangunan, pekerjaan, warganegara, agama, jenis_kelamin, luas, no_hp, namau, akta, jenis, pbb, worker, pic, lampiran) VALUES('$jenis_surat', '$nik', '$alamat2','$tanggal','$sejak','$status_surat', '$id_profil_desa', '$nama', '$alamat','$kk','$passport','$pekerjaan','$warganegara','$agama','$jenis_kelamin','$tujuan', '$wa','$namau','$akta','$jenis','$pbb','$worker','$pic','$lampiran')";
    $TambahSurat = mysqli_query($connect, $qTambahSurat);

    if ($TambahSurat) {
        // Ambil ID terakhir yang baru saja dimasukkan
        $id_sk = mysqli_insert_id($connect);

        // Kirim WA sebelum redirect
        $url = "http://localhost/desa/surat/surat_keterangan_domisili_sekolah/message.php?id=$id_sk"; // Sesuaikan dengan URL message.php di server Anda
        $response = file_get_contents($url);

        // Debugging: Cek apakah WA terkirim sebelum redirect
        if ($response) {
            echo "WA Terkirim untuk ID: $id_sk<br>";
        } else {
            echo "Gagal mengirim WA untuk ID: $id_sk<br>";
        }

        // Redirect setelah WA terkirim
        header("location:../surat_keterangan_domisili_sekolah/message.php?id=$id_sk");
        exit();
    } else {
        echo "<script LANGUAGE='JavaScript'>window.alert('Gagal menyimpan data!'); window.location.href='../index.php'</script>";
    }
}
?>
