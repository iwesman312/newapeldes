<?php
include ('../../../../../config/koneksi.php');

$id = isset($_POST['id']) ? mysqli_real_escape_string($connect, $_POST['id']) : '';
$no_surat = isset($_POST['fno_surat']) ? mysqli_real_escape_string($connect, $_POST['fno_surat']) : '';
$id_pejabat_desa = isset($_POST['ft_tangan']) ? mysqli_real_escape_string($connect, $_POST['ft_tangan']) : '';
$no_hp = isset($_POST['fno_hp']) ? mysqli_real_escape_string($connect, $_POST['fno_hp']) : '';

echo "Processing ID: $id, No Surat: $no_surat, No HP: $no_hp\n"; // Debugging output

$flagFile = 'flag_sent_' . $id . '.txt';

if (!file_exists($flagFile)) {
    echo "Sending message for ID: $id\n"; // Debugging output
    $curl = curl_init();

    $message = "Silahkan ambil surat Anda dengan nomor surat $no_surat pada kantor desa";

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

        $SQL = "UPDATE surat_keterangan_nikah_wali SET FLAG_SMS = 'Y' WHERE custom_id = '$id' AND FLAG_SMS != 'Y'";
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
