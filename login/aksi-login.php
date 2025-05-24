<?php
session_start();
include('../config/koneksi.php');

$username = $_POST['username'];
$password = md5($_POST['password']);

$qLogin = mysqli_query($connect, "SELECT * FROM login WHERE username='$username' AND password='$password'");
$row = mysqli_num_rows($qLogin);

if ($row > 0) {
    $login = mysqli_fetch_assoc($qLogin);

    
    $_SESSION['username'] = $username;
    $_SESSION['id_user'] = $login['id']; 
    $_SESSION['rt'] = $login['rt']; 
    $_SESSION['rw'] = $login['rw']; 

    
    if ($login['level'] == "admin") {
        $_SESSION['lvl'] = "Administrator";
        header("location:../admin/");
    } else if ($login['level'] == "kades") {
        $_SESSION['lvl'] = "Kepala Desa";
        header("location:../admin/");
    } else if ($login['level'] == "rt") {
        $_SESSION['lvl'] = "rt";
        header("location:../rt/");
    } else {
        header("location:index.php?pesan=login-gagal");
    }
} else {
    header("location:index.php?pesan=login-gagal");
}
?>
