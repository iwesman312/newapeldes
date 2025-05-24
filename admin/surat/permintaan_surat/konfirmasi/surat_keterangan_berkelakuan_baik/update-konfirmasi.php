<?php
include ('../../../../../config/koneksi.php');

$id = $_POST['id'];
$no_surat = $_POST['fno_surat'];
$id_pejabat_desa = $_POST['ft_tangan'];
$no_hp = $_POST['fno_hp'];
$status_surat = "SELESAI";

$qUpdate = "UPDATE surat_keterangan_berkelakuan_baik SET no_surat='$no_surat', id_pejabat_desa='$id_pejabat_desa', status_surat='$status_surat' WHERE id_skbb='$id'";
$update = mysqli_query($connect, $qUpdate);

if ($update) {
    echo "Update successful for ID: $id<br>"; // Debugging output
    $sqlChk = "SELECT FLAG_SMS FROM surat_keterangan_berkelakuan_baik WHERE id_skbb = '$id'";
    $rstChk = mysqli_query($connect, $sqlChk);

    if ($rstChk) {
        $result = mysqli_fetch_array($rstChk);
        $FLAG_SMS = $result['FLAG_SMS'];

        if ($FLAG_SMS != 'Y') {
            echo "FLAG_SMS is not 'Y' for ID: $id<br>"; // Debugging output
            include 'message.php';
        } else {
            echo "FLAG_SMS is 'Y' for ID: $id, no need to send message<br>"; // Debugging output
        }
    } else {
        echo "Failed to check FLAG_SMS for ID: $id<br>"; // Debugging output
    }

    header('Location: ../../');
} else {
    echo "<script LANGUAGE='JavaScript'>window.alert('Gagal mengonfirmasi surat untuk ID $id'); window.location.href='#'</script>";
}
?>
