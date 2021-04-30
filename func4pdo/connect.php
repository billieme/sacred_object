<?php
    class connect_db {
        function __construct()
        {
            $dsn = "mysql:host=localhost; dbname=sacred_object";
            $conn_db = new PDO($dsn, 'root','');
            $this->conn=$conn_db;
            if($conn_db){
                date_default_timezone_set("Asia/Bangkok");
                $conn_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                $conn_db->exec("set names utf8");
            }
        }
        function runQuery($sql){
            $re = $this->conn->prepare($sql);
            return $re;
        }
    }
    
?>




