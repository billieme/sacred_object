<?php
        require_once('../../func4pdo/connect.php');
    if(isset($_POST['product'])){
        $pdo = new connect_db();
        $sql_sl = $pdo->runQuery("SELECT product_name, SUM(sell_already) FROM `product` GROUP BY `product_name` ORDER BY `sell_already` DESC limit 5");
        $sql_sl->execute();
        
        $data= array();
        
        while ($fetch_data = $sql_sl->fetch(PDO::FETCH_ASSOC)){
           
           array_push($data, $data_r = array(
                "name_prod" => $fetch_data['product_name'],
                "qty_sell" => $fetch_data['SUM(sell_already)']
               
           )); 
        }
        
        
        echo json_encode($data, JSON_UNESCAPED_UNICODE); //! Json TH
    }else{
        echo"ERROR_PAGE0: who r u";
    }

?>