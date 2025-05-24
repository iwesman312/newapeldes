<?php
// Sertakan koneksi ke database di sini
include ('../../config/koneksi.php');

// Ambil status dari permintaan POST
$status = $_POST['status'];

// Query untuk mengambil data penduduk berdasarkan status
$query = "SELECT * FROM penduduk WHERE pend_ditempuh = '$status'";
$result = mysqli_query($connect, $query);
$no = 1;

// Periksa apakah ada hasil
if(mysqli_num_rows($result) > 0) {
    // Tampilkan data dalam format tabel
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>"; 
        // echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nik'] . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['tempat_lahir'] . ", " . $row['tgl_lahir'] . "</td>";
        echo "<td>" . $row['jenis_kelamin'] . "</td>";
        echo "<td>" . $row['agama'] . "</td>";
        echo "<td>" . $row['alamat'] . "</td>";
        // Tambahkan tombol aksi
        echo "<td>";
        echo "<a class='btn btn-success btn-sm' href='edit-penduduk.php?id=" . $row['id_penduduk'] . "'><i class='fa fa-edit'></i></a>";
        echo "<a class='btn btn-danger btn-sm' href='hapus-penduduk.php?id=" . $row['id_penduduk'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\"><i class='fa fa-trash'></i></a>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    // Jika tidak ada hasil, tampilkan pesan kosong
    echo "<tr><td colspan='8'>Data tidak ditemukan</td></tr>";
}

// Tutup koneksi database
mysqli_close($connect);
?>
