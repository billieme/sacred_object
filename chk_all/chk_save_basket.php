<pre>
<?php
    include_once('../function.php');
    $selectBasket = new shopSacredObj();
   echo  var_dump($_POST);

   
?>
</pre>
<hr>
<?php
            $id4basket = implode(", ", $_POST['id4basket']);
            $sql = $selectBasket->runQuery("SELECT * FROM basket WHERE id_basket IN($id4basket)");
?>

