<?php
	$host 		= "localhost";
	$username 	= "root";
	$password 	= "";
	$db_name 	= "desa2";
	$port 		= 3306;

	$connect = mysqli_connect($host,$username,$password,$db_name,$port);

	if (mysqli_connect_errno()){
		echo "Error Connection!" . mysqli_connect_error();
	}
?>