<?php
    include_once ("config.php");
    $sql=mysqli_query($koneksi,"SELECT nilai from tb_ultrasonic ORDER BY id DESC Limit 1");
    if($data = mysqli_fetch_array($sql)){
        echo "Ultrasonic: ";
        echo $data['nilai'];
        echo "//";
    }
?>

<?php
    include_once ("config.php");
    $sql_servo = mysqli_query($koneksi,"SELECT data from tb_servo ORDER BY id DESC Limit 1");

    if($data = mysqli_fetch_array($sql_servo)){
        echo "<br>Servo: ";
        echo $data['data'];
        echo "//";
    }
?>



