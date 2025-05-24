<?php
 include ('../../config/koneksi.php');
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
    GROUP BY rw;
";

$result = $connect->query($sql);

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
