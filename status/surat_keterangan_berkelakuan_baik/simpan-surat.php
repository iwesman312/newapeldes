<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Berkelakuan Baik";
        $nik = $_POST['fnik'];
        $keperluan = addslashes($_POST['fkeperluan']);
        $no_hp = $_POST['fno_hp'];
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO surat_keterangan_berkelakuan_baik (jenis_surat, nik, keperluan, status_surat, id_profil_desa, no_hp) VALUES('$jenis_surat', '$nik', '$keperluan', '$status_surat', '$id_profil_desa', '$no_hp')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>