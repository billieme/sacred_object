<?php
    require_once('../../func4pdo/connect.php');
    $pdo4thisP = new connect_db();
    

    $sl_search = $pdo4thisP->runQuery('SELECT * From product where product_name like :pd_name OR product_type like :pd_type ');
    $parame = array(
        'pd_name' => '%'.$_POST['value'].'%',
        'pd_type' => '%'.$_POST['value'].'%'
    );

    $sl_search->execute($parame);

    
        $result = [];
        while($post = $sl_search->fetch(PDO::FETCH_ASSOC)){
           $result[] = $post;
        }
       
        if(count($result) == 0){
            $response = array(
            'status' => 0,
            'msg' => 'ไม่พบข้อมูล '."' ".$_POST['value']." '".' ในระบบ'
            
        );
        echo json_encode($response);
        }else{

            echo json_encode($result);
        }
    
        


        

        
    
    
?>