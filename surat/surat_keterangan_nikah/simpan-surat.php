<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Nikah";
        $nik = $_POST['fnik'];
        $nikayah = $_POST['fnik_ayah'];
        $nikibu = $_POST['fnik_ibu'];
        $NO_HP = addslashes($_POST['fwa']);
        $status = $_POST['fstatus'];
        $namadulu = $_POST['nama_terdahulu'];
        $namamempelai = $_POST['fnama_mempelai'];
        $jkmempelai = $_POST['fjenis_kelamin_mempelai'];
        $ttlmempelai = $_POST['ftempat_tgl_lahir_mempelai'];
        $pekerjaanmempelai = $_POST['fpekerjaan_mempelai'];
        $nikmempelai = $_POST['fnik_mempelai'];
        $agamamempelai = $_POST['fagama_mempelai'];
        $alamatmempelai = $_POST['falamat_mempelai'];
        $kwnmempelai = $_POST['fkewarganegaraan_mempelai'];
        $tanggal_nikah = addslashes($_POST['ftanggal_nikah']);
        $tempat_nikah = addslashes($_POST['fakad_nikah']);
        $ortu = addslashes($_POST['fortu_mempelai']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";
        $FLAG_SMS = "N";

        $qTambahSurat = "INSERT INTO surat_keterangan_nikah (jenis_surat, nik, nik_ayah, nik_ibu, status_surat, status_nik, nama_terdahulu, 
        nama_mempelai, profil_desa, tanggal_nikah, tempat_nikah, no_hp, jenis_kelamin_mempelai, 
        ttl_mempelai, agama_mempelai, nik_mempelai, pekerjaan_mempelai,
        alamat_mempelai, kewarganegaraan_mempelai, FLAG_SMS, ortu_mempelai) VALUES('$jenis_surat', '$nik', '$nikayah', '$nikibu', '$status_surat', '$status','$namadulu',
        '$namamempelai','$id_profil_desa','$tanggal_nikah','$tempat_nikah','$NO_HP','$jkmempelai',
        '$ttlmempelai','$agamamempelai','$nikmempelai','$pekerjaanmempelai','$alamatmempelai','$kwnmempelai','$FLAG_SMS','$ortu')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);

    if ($TambahSurat) {
        // Ambil ID terakhir yang baru saja dimasukkan
        $id_sk = mysqli_insert_id($connect);

        // Kirim WA sebelum redirect
        $url = "http://localhost/desa/surat/surat_keterangan_nikah/message.php?id=$id_sk"; // Sesuaikan dengan URL message.php di server Anda
        $response = file_get_contents($url);

        // Debugging: Cek apakah WA terkirim sebelum redirect
        if ($response) {
            echo "WA Terkirim untuk ID: $id_sk<br>";
        } else {
            echo "Gagal mengirim WA untuk ID: $id_sk<br>";
        }

        // Redirect setelah WA terkirim
        header("location:../surat_keterangan_nikah/message.php?id=$id_sk");
        exit();
    } else {
        echo "<script LANGUAGE='JavaScript'>window.alert('Gagal menyimpan data!'); window.location.href='../index.php'</script>";
    }
}

?>
?>