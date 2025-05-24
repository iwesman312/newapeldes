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
    $pend_ditempuhs = $_POST['pend_ditempuh'];
    $pekerjaans = $_POST['pekerjaan'];
    $status_perkawinans = $_POST['status_perkawinan'];
    $status_dlm_keluargas = $_POST['status_dlm_keluarga'];
    $kewarganegaraans = $_POST['kewarganegaraan'];
    $nama_ayahs = $_POST['nama_ayah'];
    $nama_ibus = $_POST['nama_ibu'];
    $jalans = $_POST['jalan'];
    $agamans = $_POST['agama'];
    $jenis_kelamins = $_POST['jenis_kelamin'];

    // Mulai transaksi
    $conn->begin_transaction();

    try {
        // Loop melalui data yang dikirimkan
        for ($i = 0; $i < count($namas); $i++) {
            $stmt = $conn->prepare("INSERT INTO penduduk (no_kk, nik, nama, tempat_lahir, tgl_lahir, rt, rw, desa, kecamatan, kota, pend_terakhir, pend_ditempuh, pekerjaan, status_perkawinan, status_dlm_keluarga, kewarganegaraan, nama_ayah, nama_ibu, jalan, agama, jenis_kelamin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param(
                "sssssssssssssssssssss", 
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
                $jenis_kelamins[$i]
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
            <p>Data berhasil disimpan ke dalam sistem. Berikut adalah data yang telah diinput:</p>
            <hr>
            <p class="mb-0">Terima kasih telah menggunakan layanan kami.</p>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-primary text-white">Data Warga</div>
            <div class="card-body">
                <p><strong>No KK:</strong> <?= htmlspecialchars($no_kk); ?></p>
                <ul class="list-group">
                    <?php for ($i = 0; $i < count($namas); $i++): ?>
                    <li class="list-group-item">
                        <strong>NIK:</strong> <?= htmlspecialchars($niks[$i]); ?><br>
                        <strong>Nama:</strong> <?= htmlspecialchars($namas[$i]); ?><br>
                        <strong>Tempat Lahir:</strong> <?= htmlspecialchars($tempat_lahirs[$i]); ?><br>
                        <!-- Tambahkan elemen data lainnya sesuai kebutuhan -->
                    </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
        <a href="index.php" class="btn btn-primary mt-3">Kembali</a>
        <?php
    } catch (Exception $e) {
        // Rollback transaksi jika ada kesalahan
        $conn->rollback();
        ?>
        <div class="alert alert-danger text-center" role="alert">
            <h4 class="alert-heading">Gagal!</h4>
            <p>Terjadi kesalahan saat menyimpan data: <?= $e->getMessage(); ?></p>
            <hr>
            <p class="mb-0">Silakan coba lagi atau hubungi administrator jika masalah terus berlanjut.</p>
        </div>
        <a href="index.php" class="btn btn-danger mt-3">Kembali</a>
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
