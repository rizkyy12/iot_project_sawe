<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once 'database.php';
    include_once 'nodemcu_log.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Nodemcu_log($db);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"));
        $item->nilai = $data->nilai;
    }
    elseif ($_SERVER['REQUEST_METHOD'] === 'GET'){
        $item->nilai = isset($_GET['nilai']) ? $_GET['nilai'] : die('wrong structure!');
    }
    else {
        die('wrong request method');
    }
    if($item->createLogData()){
        echo 'Data created successfully.';
    }else{
        echo 'Data could not be created.';
    }
?>