<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Pengantar KTP";
        $nik = $_POST['fnik'];
        $no_kk = $_POST['fnokk'];
        $no_hp = $_POST['fno_hp'];
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO surat_ktp (jenis_surat, nik, bukti_ktp, bukti_kk, status_surat, id_profil_desa, no_hp) VALUES('$jenis_surat', '$nik', '$bukti_ktp', '$no_kk','$status_surat', '$id_profil_desa','$no_hp')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>