<?php
include ('../../config/koneksi.php');

if (isset($_POST['submit'])) {
    $jenis_surat = "Permohonan Mutasi SPPT";
    $nik = $_POST['fnik'];
    $namawp = $_POST['fnama_wp'];
    $alamatwp = $_POST['falamat_wp'];
    $luaswp = $_POST['fluas_wp'];
    $nopwp = $_POST['fnop_wp'];
    $alamatowp = $_POST['falamat_owp'];
    $luasbangun = $_POST['fluasbangun'];
    $jualnamawp = $_POST['fjualnama_wp'];
    $jualalamatwp = $_POST['fjualalamat_wp'];
    $jualluaswp = $_POST['fjualluas_wp'];
    $jualnopwp = $_POST['fjualnop_wp'];
    $jualalamatowp = $_POST['fjualalamat_owp'];
    $jualluasbangun = $_POST['fjualluasbangun'];
    $no_hp = $_POST['fno_hp'];
    $status_surat = "PENDING";
    $id_profil_desa = "1";

    $qTambahSurat = "INSERT INTO surat_mutasi_sppt (jenis_surat, nik, nama_wp, status_surat, id_profil_desa, no_hp, alamat_wp, luas_wp, nop_wp, alamat_owp, keperluan, nama_penjual, alamat_penjual, luas_dijual, luasbangun_jual, NOP, letak) 
                     VALUES ('$jenis_surat', '$nik', '$namawp', '$status_surat', '$id_profil_desa', '$no_hp','$alamatwp','$luaswp','$nopwp','$alamatowp', '$luasbangun','$jualnamawp','$jualalamatwp','$jualluaswp','$jualnopwp','$jualluasbangun','$jualalamatowp')";
    $TambahSurat = mysqli_query($connect, $qTambahSurat);

    if ($TambahSurat) {
        // Ambil ID terakhir yang baru saja dimasukkan
        $id_sk = mysqli_insert_id($connect);

        // Kirim WA sebelum redirect
        $url = "http://localhost/desa/surat/surat_mutasi_sppt/message.php?id=$id_sk"; // Sesuaikan dengan URL message.php di server Anda
        $response = file_get_contents($url);

        // Debugging: Cek apakah WA terkirim sebelum redirect
        if ($response) {
            echo "WA Terkirim untuk ID: $id_sk<br>";
        } else {
            echo "Gagal mengirim WA untuk ID: $id_sk<br>";
        }

        // Redirect setelah WA terkirim
        header("location:../surat_mutasi_sppt/message.php?id=$id_sk");
        exit();
    } else {
        echo "<script LANGUAGE='JavaScript'>window.alert('Gagal menyimpan data!'); window.location.href='../index.php'</script>";
    }
}
?>
