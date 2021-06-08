<?php
        require_once('../../func4pdo/connect.php');
    if(isset($_POST['product'])){
        $pdo = new connect_db();
        $sql_sl = $pdo->runQuery("SELECT * from `product` order by id_product ");
        $sql_sl->execute();
        
        $data= array();
        
        while ($fetch_data = $sql_sl->fetch()){
           array_push($data, $data_r = array(
                "name_prod" => $fetch_data->product_name,
                "qty_prod" => $fetch_data->product_qty,
               
           )); 
        }
        
        
        echo json_encode($data, JSON_UNESCAPED_UNICODE); //! Json TH
    }else{
        echo"ERROR_PAGE0: who r u";
    }

?>