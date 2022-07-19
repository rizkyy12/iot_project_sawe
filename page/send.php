<?php
    include_once ("config.php");
    if($_POST['ON']){
        $sql = mysqli_query($koneksi,"UPDATE tb_servo (data) values (90)");
    }
    else{
        $sql = mysqli_query($koneksi,"INSERT INTO tb_servo (data) values (0)");

    }
    if($sql){
        header("location:index.php");
    }else{
        echo "Error";
    }     
?>