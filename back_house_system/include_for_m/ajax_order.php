<?php
       require_once('../../func4pdo/connect.php');

                $sqlThisP = new connect_db();
                $sql = $sqlThisP->runQuery("SELECT count(id_save_basket) FROM save_basket WHERE status_pay=:value");
                $sql->execute(['value' => $_GET['value']]);
                $post = $sql->fetch(PDO::FETCH_ASSOC);

                if(count($post)){
                    $a = $_GET['a'];
                    $b = $post['count(id_save_basket)'];
                    if($a<$b){
                        $stat_noti = "1";
                    }elseif($a === $b){
                        $stat_noti = "~";
                    }elseif($a>$b){
                        $stat_noti = "0";
                    }
                    $response = array(
                        'status' => true,
                        'msg' => $post['count(id_save_basket)'],
                        'status_noti' => $stat_noti
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