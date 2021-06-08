<?php
    require_once('../../func4pdo/connect.php');
    $pdo_sell = new connect_db();
    $parame_online = array(
        "name_cus" => "-",
        "status_pay" => "approved",
        "value_ip" => "%".$_POST['value_ip']."%"
    );
    $sql_sl_sell_admin = $pdo_sell->runQuery("SELECT sum(total_prod) from `save_basket` where `name_cus`=:name_cus and `status_pay`=:status_pay and `date` like :value_ip");
    $sql_sl_sell_admin->execute($parame_online);
    $fet = $sql_sl_sell_admin->fetch(PDO::FETCH_ASSOC);
    // echo $fet['sum(total_prod)'];
    
    $value_sum = array();

    $value_online = array(
        "title" => "เช่าซื้อผ่านออนไลน์",
        "sum" => number_format( $fet['sum(total_prod)'])
    );
    array_push($value_sum, $value_online);
    


    $parame2 = array(
        "name_cus" => "-",
        "status_pay" => "approved",
        "value_ip" => "%".$_POST['value_ip']."%"
    );
    $sql2 = $pdo_sell->runQuery("SELECT sum(total_prod) from `save_basket` where `name_cus`!=:name_cus and `status_pay`=:status_pay and `date` like :value_ip ");
    $sql2->execute($parame2);
    $fet2 = $sql2->fetch(PDO::FETCH_ASSOC);
    // echo $fet2['sum(total_prod)'];

    $value_onshop = array(
        "title" => "เช่าซื้อผ่านซุ้มวัตถุมงคลในวัด",
        "sum" => number_format($fet2['sum(total_prod)'])
    );
    array_push($value_sum, $value_onshop);

    echo json_encode($value_sum, JSON_UNESCAPED_UNICODE);
    
?>