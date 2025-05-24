<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('../../config/koneksi.php'); // Include koneksi database

    $nik = $_POST['fnik'];

    // Validasi NIK
    if (!preg_match('/^\d{16}$/', $nik)) {
        echo "NIK tidak valid!";
        exit;
    }

    // Cek NIK di database
    $qCekNik = mysqli_query($connect, "SELECT * FROM penduduk WHERE nik = '$nik'");
    if (mysqli_num_rows($qCekNik) > 0) {
        $data = mysqli_fetch_assoc($qCekNik);
        echo "NIK ditemukan: " . $data['nama'];
    } else {
        echo "NIK tidak ditemukan!";
    }
} else {
    echo "Metode HTTP tidak valid.";
}
?>
