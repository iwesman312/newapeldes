<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Pengantar SKCK";
        $nik = $_POST['fnik'];
        $bukti_ktp = $_POST['fbukti_ktp'];
        $bukti_kk = $_POST['fbukti_kk'];
        $keperluan = addslashes($_POST['fkeperluan']);
        $keterangan = addslashes($_POST['fketerangan']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";
        $FLAG_SMS = "N";

        $qTambahSurat = "INSERT INTO surat_pengantar_skck (jenis_surat, nik, bukti_ktp, bukti_kk, keperluan, keterangan, status_surat, id_profil_desa, FLAG_SMS) VALUES('$jenis_surat', '$nik', '$bukti_ktp', '$bukti_kk', '$keperluan', '$keterangan', '$status_surat', '$id_profil_desa', '$FLAG_SMS')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);

    if ($TambahSurat) {
        // Ambil ID terakhir yang baru saja dimasukkan
        $id_sk = mysqli_insert_id($connect);

        // Kirim WA sebelum redirect
        $url = "http://localhost/desa/surat/surat_pengantar_skck/message.php?id=$id_sk"; // Sesuaikan dengan URL message.php di server Anda
        $response = file_get_contents($url);

        // Debugging: Cek apakah WA terkirim sebelum redirect
        if ($response) {
            echo "WA Terkirim untuk ID: $id_sk<br>";
        } else {
            echo "Gagal mengirim WA untuk ID: $id_sk<br>";
        }

        // Redirect setelah WA terkirim
        header("location:../surat_pengantar_skck/message.php?id=$id_sk");
        exit();
    } else {
        echo "<script LANGUAGE='JavaScript'>window.alert('Gagal menyimpan data!'); window.location.href='../index.php'</script>";
    }
}

?>
?>