<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $level = $_POST['level'];
        $frt   = $_POST['frt'];
        $frw   = $_POST['frw'];
        
        $qCekUser = mysqli_query($connect, "SELECT * FROM login WHERE username='$username'");
        $row          = mysqli_num_rows($qCekUser);

        if($row > 0){
            header('location:index.php?pesan=gagal-menambah');
        }else{
            $qTambahUser = "INSERT INTO login VALUES(NULL, '$username', '$nama', '$email', '$password', '$level','$frt','$frw')";
            $tambahUser = mysqli_query($connect, $qTambahUser);
            if($tambahUser){
                header("location:index.php");
            }
        }
    }
?>