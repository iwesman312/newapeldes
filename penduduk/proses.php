<?php
$servername = "localhost";  // Nama server database
$username = "root";         // Username database
$password = "";             // Password database
$dbname = "desa";           // Nama database
$port = "3306";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Input</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_kk = $_POST['no_kk'];
    $niks = $_POST['nik'];
    $namas = $_POST['nama'];
    $tempat_lahirs = $_POST['tempat_lahir'];
    $tgl_lahirs = $_POST['tgl_lahir'];
    $rts = $_POST['rt'];
    $rws = $_POST['rw'];
    $desas = $_POST['desa'];
    $kecamatans = $_POST['kecamatan'];
    $kotas = $_POST['kota'];
    $pend_terakhirs = $_POST['pend_terakhir'];
    $pend_ditempuhs = $_POST['status'];
    $pekerjaans = $_POST['pekerjaan'];
    $status_perkawinans = $_POST['status_perkawinan'];
    $status_dlm_keluargas = $_POST['status_dlm_keluarga'];
    $kewarganegaraans = $_POST['kewarganegaraan'];
    $nama_ayahs = $_POST['nama_ayah'];
    $nama_ibus = $_POST['nama_ibu'];
    $jalans = $_POST['jalan'];
    $agamans = $_POST['agama'];
    $jenis_kelamins = $_POST['jenis_kelamin'];

    // Proses file upload
    $uploads_dir = '../uploads';
    $foto_ktps = $_FILES['foto_ktp'];
    $foto_kks = $_FILES['foto_kk'];
    $foto_lainnyas = $_FILES['foto_lain'];

    function uploadFile($file, $uploads_dir, $index) {
        if ($file['error'][$index] === UPLOAD_ERR_OK) {
            $tmp_name = $file['tmp_name'][$index];
            $name = uniqid() . "_" . basename($file['name'][$index]);
            $target_file = "$uploads_dir/$name";
            if (move_uploaded_file($tmp_name, $target_file)) {
                return $target_file;
            } else {
                throw new Exception("Gagal mengunggah file: " . $file['name'][$index]);
            }
        } else {
            throw new Exception("Kesalahan upload file: " . $file['name'][$index]);
        }
    }

    // Mulai transaksi
    $conn->begin_transaction();

    try {
        // Loop melalui data yang dikirimkan
        for ($i = 0; $i < count($namas); $i++) {
            // Proses upload file untuk setiap data
            $path_foto_ktp = uploadFile($foto_ktps, $uploads_dir, $i);
            $path_foto_kk = uploadFile($foto_kks, $uploads_dir, $i);
            $path_foto_lainnya = uploadFile($foto_lainnyas, $uploads_dir, $i);

            // Simpan data ke database
            $stmt = $conn->prepare("INSERT INTO penduduk_temp (no_kk, nik, nama, tempat_lahir, tgl_lahir, rt, rw, desa, kecamatan, kota, pend_terakhir, pend_ditempuh, pekerjaan, status_perkawinan, status_dlm_keluarga, kewarganegaraan, nama_ayah, nama_ibu, jalan, agama, jenis_kelamin, foto_ktp, foto_kk, foto_lainnya, flag_approve) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'N')");
            $stmt->bind_param(
                "ssssssssssssssssssssssss",
                $no_kk,
                $niks[$i],
                $namas[$i],
                $tempat_lahirs[$i],
                $tgl_lahirs[$i],
                $rts[$i],
                $rws[$i],
                $desas[$i],
                $kecamatans[$i],
                $kotas[$i],
                $pend_terakhirs[$i],
                $pend_ditempuhs[$i],
                $pekerjaans[$i],
                $status_perkawinans[$i],
                $status_dlm_keluargas[$i],
                $kewarganegaraans[$i],
                $nama_ayahs[$i],
                $nama_ibus[$i],
                $jalans[$i],
                $agamans[$i],
                $jenis_kelamins[$i],
                $path_foto_ktp,
                $path_foto_kk,
                $path_foto_lainnya
            );
            

            // Eksekusi query
            if (!$stmt->execute()) {
                throw new Exception("Insert data gagal: " . $stmt->error);
            }
        }

        // Commit transaksi
        $conn->commit();
        ?>
        <div class="alert alert-success text-center" role="alert">
            <h4 class="alert-heading">Berhasil!</h4>
            <p>Data dan file berhasil disimpan ke dalam sistem.</p>
        </div>
        <?php
    } catch (Exception $e) {
        // Rollback transaksi jika ada kesalahan
        $conn->rollback();
        ?>
        <div class="alert alert-danger text-center" role="alert">
            <h4 class="alert-heading">Gagal!</h4>
            <p>Terjadi kesalahan saat menyimpan data: <?= $e->getMessage(); ?></p>
        </div>
        <?php
    }

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>
</div>
<footer class="text-center mt-5">
    <p>&copy; <?= date("Y"); ?> Sistem Informasi Desa</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
