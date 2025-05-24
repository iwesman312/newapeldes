<?php
include ('../../config/koneksi.php');

$id = isset($_GET['id']) ? mysqli_real_escape_string($connect, $_GET['id']) : '';
$no_hp = '';

if (empty($id)) {
    die("ID tidak valid atau tidak tersedia.");
}

// Ambil nomor HP dan nomor surat dari database
$sql = "SELECT no_hp, nik, id_sk FROM surat_keterangan WHERE id_sk = '$id'";
$result = mysqli_query($connect, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    $no_hp = '6281289818521';
    $no_surat = $data['id_sk'];
    $nik = $data['nik'];
} else {
    die("Data surat tidak ditemukan.");
}

echo "Processing ID: $id, No Surat: $no_surat, No HP: $no_hp\n"; // Debugging output

$flagFile = 'flag_sent_' . $id . '.txt';

if (!file_exists($flagFile)) {
    echo "Sending message for ID: $id\n"; // Debugging output
    $curl = curl_init();

    $message = "Terdapat surat Baru yang dibuat Oleh  $no_surat tolong segera difollow up.";

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
            'target' => $no_hp,
            'message' => $message,
            'countryCode' => '62'
        )),
        CURLOPT_HTTPHEADER => array(
            'Authorization: F4-KLmSRBXSxqb5TF!+U'
        ),
    ));

    $response = curl_exec($curl);

    if ($response === false) {
        $error_msg = curl_error($curl);
        curl_close($curl);
        die("CURL Error: $error_msg");
    }

    curl_close($curl);

    $response_data = json_decode($response, true);
    if (isset($response_data['status']) && $response_data['status'] == 'success') {
        if (file_put_contents($flagFile, 'sent') === false) {
            die("Failed to write flag file");
        }

        $SQL = "UPDATE surat_keterangan SET FLAG_SMS = 'N' WHERE id_sk = '$id'";
        if (mysqli_query($connect, $SQL)) {
            echo "Success Send Message for ID: $id\n";
        } else {
            echo "Failed to update database for ID: $id\n";
        }
    } else {
        echo "Failed to send message for ID: $id, Error: " . $response_data['message'] . "\n";
    }

    echo $response;
} else {
    echo "Pesan sudah dikirim sebelumnya untuk ID: $id\n";
}
?>
