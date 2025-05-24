<?php
include('../../config/koneksi.php');

// Memeriksa sesi user yang login dan levelnya
session_start();
if (!isset($_SESSION['lvl']) || !isset($_SESSION['rw'])) {
    die('Akses ditolak.');
}

// Mendapatkan level user dan RW yang dimiliki
$level = $_SESSION['lvl'];
$rw_user = $_SESSION['rw']; // RW user yang login

// Query untuk filter berdasarkan RW
$sql = "
    SELECT 
        rw, 
        COUNT(*) AS total_penduduk, 
        SUM(CASE WHEN jenis_kelamin = 'Laki-laki' THEN 1 ELSE 0 END) AS total_laki_laki, 
        SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) AS total_perempuan,
        SUM(CASE WHEN PEND_DITEMPUH = 'LAHIR' THEN 1 ELSE 0 END) AS jumlah_baru_lahir,
        SUM(CASE WHEN PEND_DITEMPUH = 'MATI' THEN 1 ELSE 0 END) AS jumlah_meninggal,
        SUM(CASE WHEN PEND_DITEMPUH = 'Datang' THEN 1 ELSE 0 END) AS jumlah_datang,
        SUM(CASE WHEN PEND_DITEMPUH = 'Pindah' THEN 1 ELSE 0 END) AS jumlah_pindah,
        COUNT(*) 
          + SUM(CASE WHEN PEND_DITEMPUH = 'Datang' THEN 1 ELSE 0 END) 
          - SUM(CASE WHEN PEND_DITEMPUH = 'Pindah' THEN 1 ELSE 0 END) 
          - SUM(CASE WHEN PEND_DITEMPUH = 'MATI' THEN 1 ELSE 0 END) 
        AS total_akhir
    FROM penduduk
    WHERE rw = ?
    GROUP BY rw;
";

// Mempersiapkan statement
$stmt = $connect->prepare($sql);
$stmt->bind_param('s', $rw_user); // Menggunakan RW user yang login

// Menjalankan query dan mendapatkan hasilnya
$stmt->execute();
$result = $stmt->get_result();

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Mengembalikan data sebagai JSON
header('Content-Type: application/json');
echo json_encode($data);

$connect->close();
?>
