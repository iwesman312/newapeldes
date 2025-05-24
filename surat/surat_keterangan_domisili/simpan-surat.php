<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Domisili";
        $nik = $_POST['fnik'];
        $alamat2 = $_POST['falamat2'];
        $tanggal = $_POST['ftanggal2'];
        $sejak = $_POST['fsejak'];
        $keperluan = addslashes($_POST['fkeperluan']);
        $no = $_POST['fno'];
        $nama1 = $_POST['fnama1'];
        $tanggal3 = $_POST['ftanggal3'];
        $jk = $_POST['fjk'];
        $hub1 = $_POST['fhub1'];
        $no2 = $_POST['fno2'];
        $nama2 = $_POST['fnama2'];
        $tanggal4 = $_POST['ftanggal4'];
        $jk2 = $_POST['fjk2'];
        $hub2 = $_POST['fhub2'];
        $no3 = $_POST['fno3'];
        $nama3 = $_POST['fnama3'];
        $tanggal5 = $_POST['ftanggal5'];
        $jk3 = $_POST['fjk3'];
        $hub3 = $_POST['fhub3'];
        $no4 = $_POST['fno4'];
        $nama4 = $_POST['fnama4'];
        $tanggal6 = $_POST['ftanggal6'];
        $jk4 = $_POST['fjk4'];
        $hub4 = $_POST['fhub4'];
        $no5 = $_POST['fno5'];
        $nama5 = $_POST['fnama5'];
        $tanggal7 = $_POST['ftanggal7'];
        $jk5 = $_POST['fjk5'];
        $hub5 = $_POST['fhub5'];
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO surat_keterangan_domisili (jenis_surat, nik, alamat2, tanggal, sejak, keperluan, no, nama1, tanggal3, jk, hub1, no2, nama2, tanggal4, jk2, hub2, no3, nama3, tanggal5, jk3, hub3, no4, nama4, tanggal6, jk4, hub4, no5, nama5, tanggal7, jk5, hub5, status_surat, id_profil_desa) VALUES('$jenis_surat', '$nik', '$alamat2', '$tanggal', '$sejak', '$keperluan', '$no', '$nama1', '$tanggal3', '$jk', '$hub1', '$no2', '$nama2', '$tanggal4', '$jk2', '$hub2', '$no3', '$nama3', '$tanggal5', '$jk3', '$hub3', '$no4', '$nama4', '$tanggal6', '$jk4', '$hub4', '$no5', '$nama5', '$tanggal7', '$jk5', '$hub5', '$status_surat', '$id_profil_desa')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>