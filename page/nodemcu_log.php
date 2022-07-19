<?php
    class Nodemcu_log{
        private $conn;
        private $db_table = "tb_ultrasonic";
        public $id;
        public $nilai;

        public function __construct($db){
            $this->conn = $db;
        }

        public function createLogData(){
            $sqlQuery = "INSERT INTO ". $this->db_table ." SET nilai = :nilai"; 
            // $sqlQuery = "UPDATE ". $this->db_table ." SET nilai = :nilai"; 
            $stmt =  $this->conn->prepare($sqlQuery);

            $this->nilai=htmlspecialchars(strip_tags($this->nilai));
            $stmt->bindParam(":nilai", $this->nilai);
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>