<?php
// Autoload Composer
require '../../vendor/autoload.php';

// Menggunakan namespace FPDF dari setasign
use setasign\Fpdi\Fpdi;

class PDF extends \setasign\Fpdi\Fpdi
{
    function Header()
    {
        // Tambahkan header pada PDF
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Laporan Penduduk', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        // Tambahkan footer pada PDF
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'C');
    }
}

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

// Query untuk mengambil data
$query = "SELECT 
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
    GROUP BY rw;";

$result = $conn->query($query);

// Membuat PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

// Header tabel
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 220, 255);
$pdf->Cell(20, 10, 'RW', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Total Penduduk', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Laki-Laki', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Perempuan', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Lahir', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Meninggal', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Datang', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Pindah', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Total Akhir', 1, 1, 'C', true);

// Isi tabel
$pdf->SetFont('Arial', '', 10);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(20, 10, $row['rw'], 1);
        $pdf->Cell(30, 10, $row['total_penduduk'], 1);
        $pdf->Cell(25, 10, $row['total_laki_laki'], 1);
        $pdf->Cell(25, 10, $row['total_perempuan'], 1);
        $pdf->Cell(20, 10, $row['jumlah_baru_lahir'], 1);
        $pdf->Cell(25, 10, $row['jumlah_meninggal'], 1);
        $pdf->Cell(20, 10, $row['jumlah_datang'], 1);
        $pdf->Cell(20, 10, $row['jumlah_pindah'], 1);
        $pdf->Cell(25, 10, $row['total_akhir'], 1, 1);
    }
} else {
    $pdf->Cell(0, 10, 'Tidak ada data untuk ditampilkan', 1, 1, 'C');
}

// Output PDF
$pdf->Output('I', 'Laporan_Lampid.pdf');
?>
