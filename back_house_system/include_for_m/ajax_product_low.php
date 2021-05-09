<?php
    
    require_once('../../func4pdo/connect.php');
    $sqlThisP = new connect_db();
    $sl_product = $sqlThisP->runQuery('SELECT
	COUNT( id_product ) 
FROM
	`product` 
WHERE
	product_qty < 5');
    $sl_product->execute();
    $post = $sl_product->fetch(PDO::FETCH_ASSOC);
    $data = $post['COUNT( id_product )'];
    echo$data;

?>