<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat KK";
        $nik = $_POST['fnik'];
        $nama = $_POST['fnama'];
        $alamat = $_POST['falamat'];
        $rt = $_POST['frt'];
        $kdpos =$_POST['fkdpos'];
        $desa =$_POST['fdesa'];
        $kec = $_POST['fkec'];
        $kab = $_POST['fkab'];
        $prov = $_POST['fprov'];
        $no1 = $_POST['fno1'];
        $nama1 = $_POST['fnama1'];
        $jk1 = $_POST['fjk1'];
        $hub1 = $_POST['fhub1'];
        $tempat1 = $_POST['ftempat1'];
        $tanggal1 = $_POST['ftanggal1'];
        $negara1 = $_POST['fnegara1'];
        $status1 = $_POST['fstatus1'];
        $agama1 = $_POST['fagama1'];
        $darah1 = $_POST['fdarah1'];
        $wnri1 = $_POST['fwnri1'];
        $asing1 = $_POST['fasing1'];
        $pend1 = $_POST['fpend'];
        $latin1 = $_POST['flatin1'];
        $arab1 = $_POST['farab1'];
        $lain1 = $_POST['flain1'];
        $kerja1 = $_POST['fkerja1'];
        $mulai1 = $_POST['fmulai1'];
        $asal1 = $_POST['fasal1'];
        $ortu1 = $_POST['fortu1'];
        $nopen1 = $_POST['fnopen1'];
        $kb1 = $_POST['fkb1'];
        $cacat1 = $_POST['fcacat1'];
        $ket1 = $_POST['fket1'];
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO surat_kk ( jenis_surat, nik, nama, alamat, rt, kdpos, desa, kec, kab, prov, no1, nama1, jk1, hub1, tempat1, tanggal1, negara1, status1, agama1, darah1, wnri1, asing1, pend1, latin1, arab1, lain1, kerja1, mulai1, asal1, ortu1, nopen1, kb1, cacat1, ket1,  status_surat, id_profil_desa) VALUES('$jenis_surat', $nik, '$nama', '$alamat', '$rt', '$kdpos','$desa', '$kec', '$kab','$prov', '$no1', '$nama1', '$jk1', '$hub1','$tempat1','$tanggal1','$negara1','$status1','$agama1','$darah1','$wnri1','$asing1','$pend1','$latin1','$arab1','$lain1','$kerja1','$mulai1','$asal1','$ortu1','$nopen1','$kb1','$cacat1','$ket1','$status_surat', '$id_profil_desa')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>