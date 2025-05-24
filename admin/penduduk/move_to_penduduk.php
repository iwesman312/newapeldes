<?php
// include('../part/akses.php');
// include('../part/header.php');

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "desa";
$port = "3306";

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_kk = $_POST['no_kk'];

    if (!$no_kk) {
        die("No KK tidak ditemukan.");
    }

    // Mulai transaksi
    $conn->begin_transaction();

    try {
        // Ambil semua data dari tabel penduduk_temp berdasarkan no_kk
        $query_select = "SELECT * FROM penduduk_temp WHERE no_kk = ?";
        $stmt_select = $conn->prepare($query_select);
        $stmt_select->bind_param("s", $no_kk);
        $stmt_select->execute();
        $result = $stmt_select->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Insert semua kolom dari tabel penduduk_temp ke tabel penduduk
                $query_insert = "
                INSERT INTO penduduk 
                (id_penduduk, nik, nama, tempat_lahir, tgl_lahir, jenis_kelamin, agama, jalan, dusun, rt, rw, desa, kecamatan, kota, no_kk, pend_kk, pend_terakhir, pend_ditempuh, pekerjaan, status_perkawinan, status_dlm_keluarga, kewarganegaraan, nama_ayah, nama_ibu, foto_ktp, foto_kk, foto_lainnya, flag_approve) 
                VALUES 
                (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                
                $stmt_insert = $conn->prepare($query_insert);
                $stmt_insert->bind_param(
                    "sssssssssssssssssssssssssss",
                    $row['nik'],
                    $row['nama'],
                    $row['tempat_lahir'],
                    $row['tgl_lahir'],
                    $row['jenis_kelamin'],
                    $row['agama'],
                    $row['jalan'],
                    $row['dusun'],
                    $row['rt'],
                    $row['rw'],
                    $row['desa'],
                    $row['kecamatan'],
                    $row['kota'],
                    $row['no_kk'],
                    $row['pend_kk'],
                    $row['pend_terakhir'],
                    $row['pend_ditempuh'],
                    $row['pekerjaan'],
                    $row['status_perkawinan'],
                    $row['status_dlm_keluarga'],
                    $row['kewarganegaraan'],
                    $row['nama_ayah'],
                    $row['nama_ibu'],
                    $row['foto_ktp'],
                    $row['foto_kk'],
                    $row['foto_lainnya'],
                    $row['flag_approve']
                );
                $stmt_insert->execute();
            }

            // Update flag_approve menjadi 'Y' di tabel penduduk_temp
            $query_update = "UPDATE penduduk_temp SET flag_approve = 'Y' WHERE no_kk = ?";
            $stmt_update = $conn->prepare($query_update);
            $stmt_update->bind_param("s", $no_kk);
            $stmt_update->execute();

            // Commit transaksi
            $conn->commit();

            echo "<script>alert('Data berhasil di-approve dan dipindahkan.'); window.location.href = 'approval.php';</script>";
        } else {
            echo "<script>alert('Tidak ada data ditemukan untuk No KK ini.'); window.location.href = 'approval.php';</script>";
        }
    } catch (Exception $e) {
        // Rollback jika ada kesalahan
        $conn->rollback();
        echo "<script>alert('Terjadi kesalahan: " . $e->getMessage() . "'); window.location.href = 'approval.php';</script>";
    }
}

$conn->close();
?>
