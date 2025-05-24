$no_hp1 = '6281289818521'; // Nomor pertama
$no_hp2 = '6281234567890'; // Nomor kedua

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
        'target' => [$no_hp1, $no_hp2], // Kirim ke dua nomor
        'message' => $message,
        'countryCode' => '62'
    )),
    CURLOPT_HTTPHEADER => array(
        'Authorization: F4-KLmSRBXSxqb5TF!+U'
    ),
));