<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['image'])) {
        // Konversi Base64 ke gambar
        $imageData = $_POST['image'];
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $decodedImage = base64_decode($imageData);

        // Simpan gambar sementara (opsional, jika perlu debugging)
        $fileName = 'temp_image.png';
        file_put_contents($fileName, $decodedImage);

        // Gunakan Tesseract OCR untuk memproses gambar
        $output = shell_exec("tesseract $fileName stdout -l ind");

        // Ekstraksi NIK (16 digit)
        if (preg_match('/\b\d{16}\b/', $output, $matches)) {
            echo json_encode(['nik' => $matches[0]]);
        } else {
            echo json_encode(['nik' => null]);
        }

        // Hapus file sementara
        unlink($fileName);
    } else {
        echo json_encode(['error' => 'Tidak ada data gambar yang diterima.']);
    }
} else {
    echo json_encode(['error' => 'Metode HTTP tidak valid.']);
}
?>
