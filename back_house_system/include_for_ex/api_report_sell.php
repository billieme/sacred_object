<?php
require_once('../../func4pdo/connect.php');
 if(isset($_POST['sell'])){ //!จากหน้า report_sell.php line 25 มันส่ง POST มา 
        $pdo_sell = new connect_db();
        $parame_online = array( //! ของ PDO
            "name_cus" => "-",
            "status_pay" => "approved"
        );
        $sql_sl_sell_admin = $pdo_sell->runQuery("SELECT sum(total_prod) from `save_basket` where `name_cus`=:name_cus and `status_pay`=:status_pay "); //! ของ PDO
        $sql_sl_sell_admin->execute($parame_online); //! ของ PDO
        $fet = $sql_sl_sell_admin->fetch(PDO::FETCH_ASSOC); //! fetch ข้อมูลออกมา
        // echo $fet['sum(total_prod)'];
        
        $value_sum = array(); //! ตัวแปรเอาไว้เก็บข้อมูล อาเร

        $value_online = array(
            "title" => "เช่าซื้อผ่านออนไลน์",
            "sum" => $fet['sum(total_prod)']
        );
        array_push($value_sum, $value_online); //! ของ ผลัก array line 16 ไปเก็บไว้ line 14 parametor ตัวแรกคือจะเอาไว้เก็บที่ไหน ชี้ไปที่ line 14 parametor ตัวที่ 2 คือ array ที่เราจะผลักไปเก็บ
        


        $parame2 = array( //! ของ PDO
            "name_cus" => "-",
            "status_pay" => "approved"
        );
        $sql2 = $pdo_sell->runQuery("SELECT sum(total_prod) from `save_basket` where `name_cus`!=:name_cus and `status_pay`=:status_pay"); //! ของ PDO
        $sql2->execute($parame2); //! ของ PDO
        $fet2 = $sql2->fetch(PDO::FETCH_ASSOC); //! fetch ข้อมูลออกมา
        // echo $fet2['sum(total_prod)'];

        $value_onshop = array( 
            "title" => "เช่าซื้อผ่านซุ้มวัตถุมงคลในวัด",
            "sum" => $fet2['sum(total_prod)']
        );
        array_push($value_sum, $value_onshop); //! ของ ผลัก array line 33 ไปเก็บไว้ line 14 parametor ตัวแรกคือจะเอาไว้เก็บที่ไหน ชี้ไปที่ line 14 parametor ตัวที่ 2 คือ array ที่เราจะผลักไปเก็บ

        echo json_encode($value_sum, JSON_UNESCAPED_UNICODE); //! echo เข้ารหัส  แปลง array line 14 เป็น json หน้า report_sell.php จะได้ข้อมูลจากตรงนี้ไปใช้งาน จะได้ข้อมู,ในรูปแบบนี้ [{title: "เช่าซื้อผ่านออนไลน์", sum: "500"}, {title: "เช่าซื้อผ่านซุ้มวัตถุมงคลในวัด", sum: "500"}]
        
    }else{
        echo"ERROR_PAGE: who r u";
    }
?>