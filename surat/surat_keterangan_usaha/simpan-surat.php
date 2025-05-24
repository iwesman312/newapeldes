<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Usaha";
        $nik = $_POST['fnik'];
        $usaha = addslashes($_POST['fusaha']);
        $alamat_usaha = addslashes($_POST['falamat_usaha']);
        $keperluan = addslashes($_POST['fkeperluan']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";
        $nohp   = $_POST['fno_hp'];

        $qTambahSurat = "INSERT INTO surat_keterangan_usaha (jenis_surat, nik, usaha, alamat_usaha, keperluan, status_surat, id_profil_desa, no_hp, FLAG_SMS) VALUES('$jenis_surat', '$nik', '$usaha', '$alamat_usaha', '$keperluan', '$status_surat', '$id_profil_desa', '$nohp' ,'N')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        if ($TambahSurat) {
            // Ambil ID terakhir yang baru saja dimasukkan
            $id_sk = mysqli_insert_id($connect);
    
            // Kirim WA sebelum redirect
            $url = "http://localhost/desa/surat/surat_keterangan_usaha/message.php?id=$id_sk"; // Sesuaikan dengan URL message.php di server Anda
            $response = file_get_contents($url);
    
            // Debugging: Cek apakah WA terkirim sebelum redirect
            if ($response) {
                echo "WA Terkirim untuk ID: $id_sk<br>";
            } else {
                echo "Gagal mengirim WA untuk ID: $id_sk<br>";
            }
    
            // Redirect setelah WA terkirim
            header("location:../surat_keterangan_usaha/message.php?id=$id_sk");
            exit();
        } else {
            echo "<script LANGUAGE='JavaScript'>window.alert('Gagal menyimpan data!'); window.location.href='../index.php'</script>";
        }
    }
?>