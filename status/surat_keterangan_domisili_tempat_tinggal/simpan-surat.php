<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Domisili Tempat Tinggal";
        $nik = $_POST['fnik'];
        $alamat2 = $_POST['falamat2'];
        $tanggal = $_POST['ftanggal2'];
        $sejak = $_POST['fsejak'];
        $keperluan = addslashes($_POST['fkeperluan']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO surat_keterangan_domisili_tempat_tinggal (jenis_surat, nik, alamat2, tanggal, sejak, keperluan, status_surat, id_profil_desa) VALUES('$jenis_surat', '$nik', '$alamat2','$tanggal','$sejak','$keperluan','$status_surat', '$id_profil_desa')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>