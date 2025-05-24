<?php
include ('../../config/koneksi.php');

if (isset($_POST['submit'])) {
    $jenis_surat = "Surat Keterangan SPPT";
    $nik = $_POST['fnik'];
    $namawp = addslashes($_POST['fnama_wp']);
    $alamatwp = addslashes($_POST['falamat_wp']);
    $luaswp = addslashes($_POST['fluas_wp']);
    $nopwp = addslashes($_POST['fnop_wp']);
    $alamatowp = addslashes($_POST['falamat_owp']);
    $no_hp = $_POST['fno_hp'];
    $status_surat = "PENDING";
    $id_profil_desa = "1";

    $qTambahSurat = "INSERT INTO surat_keterangan_sppt (jenis_surat, nik, nama_wp, status_surat, id_profil_desa, no_hp, alamat_wp, luas_wp, nop_wp, alamat_owp) 
                     VALUES ('$jenis_surat', '$nik', '$namawp', '$status_surat', '$id_profil_desa', '$no_hp','$alamatwp','$luaswp','$nopwp','$alamatowp')";
    $TambahSurat = mysqli_query($connect, $qTambahSurat);

    if ($TambahSurat) {
        // Ambil ID terakhir yang baru saja dimasukkan
        $id_sk = mysqli_insert_id($connect);

        // Kirim WA sebelum redirect
        $url = "http://localhost/desa/surat/surat_keterangan_sppt/message.php?id=$id_sk"; // Sesuaikan dengan URL message.php di server Anda
        $response = file_get_contents($url);

        // Debugging: Cek apakah WA terkirim sebelum redirect
        if ($response) {
            echo "WA Terkirim untuk ID: $id_sk<br>";
        } else {
            echo "Gagal mengirim WA untuk ID: $id_sk<br>";
        }

        // Redirect setelah WA terkirim
        header("location:../surat_keterangan_sppt/message.php?id=$id_sk");
        exit();
    } else {
        echo "<script LANGUAGE='JavaScript'>window.alert('Gagal menyimpan data!'); window.location.href='../index.php'</script>";
    }
}
?>
