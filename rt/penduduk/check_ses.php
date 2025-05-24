<?php
// Mulai sesi jika belum dimulai
session_start();

// Menampilkan isi $_SESSION
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

// Atau menggunakan var_dump untuk informasi lebih detail
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
?>
