<?php
	include ('../../config/koneksi.php');

	$id		= $_GET['id'];
	$qHapus		= mysqli_query($connect, "DELETE FROM login WHERE id = '$id'");

	if($qHapus){
		header('location:index.php');
	} else {
		header('location:index.php?pesan=gagal-menghapus');
	}
?>