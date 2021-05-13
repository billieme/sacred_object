<?php 

require_once('../../func4pdo/connect.php');

$pdo4ThisP = new connect_db();
$sl_list_sell_all =$pdo4ThisP->runQuery('SELECT count(id_save_basket) from save_basket where status_pay=:sta_p');
$parame = array(
    'sta_p' => 'approved'
);
$sl_list_sell_all->execute($parame);
$post = $sl_list_sell_all->fetch(PDO::FETCH_ASSOC);

if(count($post)){
    $response = array(
        'status' => true,
        'msg' => $post['count(id_save_basket)'],
    );
    echo json_encode($response);
}else{
    $response = array(
        'status' => false,
        'msg' => 'เกิดข้อผิดพลาด'
    );
    http_response_code(404);
    echo json_encode($response);
    
}
?>