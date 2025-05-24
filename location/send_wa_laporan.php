<?php
// File: send_wa_laporan.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include ('../config/koneksi.php');

    // Tangkap data dari frontend
    $nama_pelapor = isset($_POST['nama_pelapor']) ? mysqli_real_escape_string($connect, $_POST['nama_pelapor']) : '';
    $no_hp_pelapor = isset($_POST['no_hp_pelapor']) ? mysqli_real_escape_string($connect, $_POST['no_hp_pelapor']) : '';
    $latitude = isset($_POST['latitude']) ? mysqli_real_escape_string($connect, $_POST['latitude']) : '';
    $longitude = isset($_POST['longitude']) ? mysqli_real_escape_string($connect, $_POST['longitude']) : '';

    // Nomor WhatsApp admin
    $admin_wa = '6281289818521'; // Format: 62xxx

    // Validasi data
    if (empty($nama_pelapor) || empty($no_hp_pelapor) || empty($latitude) || empty($longitude)) {
        die(json_encode(['status' => 'error', 'message' => 'Data tidak lengkap.']));
    }

    // Pesan yang akan dikirimkan
    $message = "Pelaporan Kejadian:\n" .
               "Nama: $nama_pelapor\n" .
               "Nomor Telepon: $no_hp_pelapor\n" .
               "Lokasi: https://www.google.com/maps?q=$latitude,$longitude";

    // Kirim pesan menggunakan API Fonnte
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query(array(
            'target' => $admin_wa,
            'message' => $message,
            'countryCode' => '62'
        )),
        CURLOPT_HTTPHEADER => array(
            'Authorization: F4-KLmSRBXSxqb5TF!+U' // Ganti dengan API Key Anda
        ),
    ));

    $response = curl_exec($curl);

    if ($response === false) {
        $error_msg = curl_error($curl);
        curl_close($curl);
        die(json_encode(['status' => 'error', 'message' => "CURL Error: $error_msg"]));
    }

    curl_close($curl);

    $response_data = json_decode($response, true);
    if (isset($response_data['status']) && $response_data['status'] === 'success') {
        echo json_encode(['status' => 'success', 'message' => 'Laporan berhasil dikirim ke admin.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal mengirim laporan.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Metode HTTP tidak valid.']);
}
?>
