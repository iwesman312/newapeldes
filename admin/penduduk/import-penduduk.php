<?php
// Include koneksi database
include('../../config/koneksi.php');

// Cek apakah file telah diunggah
if (isset($_FILES['datapenduduk'])) {
    $file = $_FILES['datapenduduk']['tmp_name'];

    if (($handle = fopen($file, 'r')) !== false) {
        $berhasil = 0;

        // Loop melalui setiap baris di file CSV
        while (($row = fgetcsv($handle, 1000, ";")) !== false) {
            // Lewati baris header (baris pertama)
            if ($row[0] == 'NIK') {
                continue;
            }

            // Pastikan jumlah kolom sesuai
            if (count($row) < 22) {
                echo "Baris tidak valid ditemukan (jumlah kolom kurang): ";
                print_r($row);
                continue; // Lewati baris ini
            }

            // Ambil data dari setiap kolom
            $nik = $row[0];
            $nama = $row[1];
            $tempat_lahir = $row[2];
            $tgl_lahir = $row[3];
            $jenis_kelamin = $row[4];
            $agama = $row[5];
            $jalan = addslashes($row[6]);
            $dusun = $row[7];
            $rt = $row[8];
            $rw = $row[9];
            $desa = $row[10];
            $kecamatan = $row[11];
            $kota = $row[12];
            $no_kk = $row[13];
            $pend_kk = $row[14];
            $pend_terakhir = $row[15];
            $pekerjaan = $row[16];
            $status_perkawinan = $row[17];
            $status_dlm_keluarga = $row[18];
            $kewarganegaraan = $row[19];
            $nama_ayah = $row[20];
            $nama_ibu = $row[21];

            // Validasi data (pastikan tidak ada kolom kosong)
            if (
                $nik != "" && $nama != "" && $tempat_lahir != "" && $tgl_lahir != "" && $jenis_kelamin != "" &&
                $agama != "" && $jalan != "" && $dusun != "" && $rt != "" && $rw != "" && $desa != "" &&
                $kecamatan != "" && $kota != "" && $no_kk != "" && $pend_kk != "" && $pend_terakhir != "" &&
                $pekerjaan != "" && $status_perkawinan != "" && $status_dlm_keluarga != "" &&
                $kewarganegaraan != "" && $nama_ayah != "" && $nama_ibu != ""
            ) {
                // Simpan ke database
                $query = "INSERT INTO penduduk VALUES (
                    NULL, '$nik', '$nama', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', 
                    '$jalan', '$dusun', '$rt', '$rw', '$desa', '$kecamatan', '$kota', 
                    '$no_kk', '$pend_kk', '$pend_terakhir', '', '$pekerjaan', 
                    '$status_perkawinan', '$status_dlm_keluarga', '$kewarganegaraan', '$nama_ayah', '$nama_ibu','','','','')";
                mysqli_query($connect, $query);
                $berhasil++;
            }
        }

        fclose($handle);

        echo "$berhasil data berhasil diimpor!";
    } else {
        echo "Gagal membuka file CSV!";
    }
} else {
    echo "Tidak ada file yang diunggah!";
}
?>
