<?php
    include "page/config.php";

    $pass = md5($_POST['password']);
    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $pass);

    $cek_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' and password='$password'");
    $user_valid = mysqli_fetch_array($cek_user);

    if ($user_valid){
        if($password == $user_valid['password']){
            session_start();
            $_SESSION['username'] = $user_valid['username'];

            if ($username == "user1"){
                header('location:page/index.php');
            }
        }
        else{
            echo "<script> alert ('username/password salah!'); document.location='index.php'</script>";
        }
    }else{
        echo "<script> alert ('username/password salah!'); document.location='index.php'</script>";
    }
?>