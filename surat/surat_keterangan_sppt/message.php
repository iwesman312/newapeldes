<?php
include ('../../config/koneksi.php');

$id = isset($_GET['id']) ? mysqli_real_escape_string($connect, $_GET['id']) : '';

if (empty($id)) {
    die("<h3>ID tidak valid atau tidak tersedia.</h3><br><a href='../index.php'>Kembali ke Menu Utama</a>");
}

// Ambil nomor HP dan nomor surat dari database
$sql = "SELECT no_hp, id_sk FROM surat_keterangan_sppt WHERE id_sk = '$id'";
$result = mysqli_query($connect, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    $no_hp = '6281289818521';
    $no_surat = $data['id_sk'];
} else {
    die("<h3>Data surat tidak ditemukan.</h3><br><a href='../index.php'>Kembali ke Menu Utama</a>");
}

// Cek apakah pesan sudah dikirim sebelumnya
$flagFile = 'flag_sent_' . $id . '.txt';

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengiriman Pesan WA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Proses Pengiriman WhatsApp</h2>
    <p>ID: <b><?php echo $id; ?></b></p>
    <p>No Surat: <b><?php echo $no_surat; ?></b></p>
    <p>No HP: <b><?php echo $no_hp; ?></b></p>

    <?php
    if (!file_exists($flagFile)) {
        echo "<p>Mengirim pesan untuk ID: $id...</p>";

        $curl = curl_init();
        $message = "Silahkan ambil surat Anda dengan nomor surat $no_surat pada kantor desa.";

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
            die("<p style='color:red;'>CURL Error: $error_msg</p>");
        }

        curl_close($curl);

        $response_data = json_decode($response, true);
        if (isset($response_data['status']) && $response_data['status'] == 'success') {
            file_put_contents($flagFile, 'sent');

            $SQL = "UPDATE surat_keterangan SET FLAG_SMS = 'N' WHERE id_sk = '$id'";
            if (mysqli_query($connect, $SQL)) {
                echo "<p style='color:green;'>Pesan berhasil dikirim ke WA!</p>";
            } else {
                echo "<p style='color:red;'>Gagal memperbarui database.</p>";
            }
        } else {
            echo "<p style='color:red;'>Gagal mengirim pesan. Error: " . $response_data['message'] . "</p>";
        }
    } else {
        echo "<p style='color:orange;'>Pesan sudah dikirim sebelumnya untuk ID: $id</p>";
    }
    ?>

    <br>
    <a href="../index.php" class="btn">Kembali ke Menu Utama</a>
</div>

</body>
</html>
