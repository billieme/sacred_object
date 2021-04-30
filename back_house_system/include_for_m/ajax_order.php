<?php
       require_once('../../func4pdo/connect.php');

                $sqlThisP = new connect_db();
                $sql = $sqlThisP->runQuery("SELECT count(id_save_basket) FROM save_basket WHERE status_pay=:value");
                $sql->execute(['value' => $_POST['value']]);
                $post = $sql->fetch(PDO::FETCH_ASSOC);

    echo $post['count(id_save_basket)'];
    
?>