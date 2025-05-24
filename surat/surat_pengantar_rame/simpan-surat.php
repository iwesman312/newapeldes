<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Pengantar Rame";
        $nik = $_POST['fnik'];
        $bukti_ktp = $_POST['fbukti_ktp'];
        $bukti_kk = $_POST['fbukti_kk'];
        $jenis_hajat = addslashes($_POST['fjenis_hajat']);
        $hari = addslashes($_POST['fhari']);
        $tanggal = $_POST['ftanggal'];
        $jenis_hiburan = addslashes($_POST['fjenis_hiburan']);
        $pemilik = addslashes($_POST['fpemilik']);
        $alamat_pemilik = addslashes($_POST['falamat_pemilik']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";
        $flag_sms = "N";

        $qTambahSurat = "INSERT INTO surat_pengantar_rame (jenis_surat, nik, bukti_ktp, bukti_kk, jenis_hajat, hari, tanggal, jenis_hiburan, pemilik, alamat_pemilik, status_surat, id_profil_desa, FLAG_SMS) VALUES('$jenis_surat', '$nik', '$bukti_ktp', '$bukti_kk', '$jenis_hajat', '$hari', '$tanggal', '$jenis_hiburan', '$pemilik', '$alamat_pemilik', '$status_surat', '$id_profil_desa', '$FLAG_SMS')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        if ($TambahSurat) {
            // Ambil ID terakhir yang baru saja dimasukkan
            $id_sk = mysqli_insert_id($connect);
    
            // Kirim WA sebelum redirect
            $url = "http://localhost/desa/surat/surat_pengantar_rame/message.php?id=$id_sk"; // Sesuaikan dengan URL message.php di server Anda
            $response = file_get_contents($url);
    
            // Debugging: Cek apakah WA terkirim sebelum redirect
            if ($response) {
                echo "WA Terkirim untuk ID: $id_sk<br>";
            } else {
                echo "Gagal mengirim WA untuk ID: $id_sk<br>";
            }
    
            // Redirect setelah WA terkirim
            header("location:../surat_pengantar_rame/message.php?id=$id_sk");
            exit();
        } else {
            echo "<script LANGUAGE='JavaScript'>window.alert('Gagal menyimpan data!'); window.location.href='../index.php'</script>";
        }
    }
    
?>