<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jquery-->
<script src="../sweetalert/sweetalert2.all.min.js"></script>

<?php
    session_start();
    include_once('../function.php');
    include_once('../func4pdo/connect.php');
    $selectBasket = new shopSacredObj();

?>
<?php
    if(isset($_POST['submit'])){
        $id4basket = implode(", ",$_POST['id4basket']); //! data
        $sql4SLBasket = $selectBasket->runQuery("SELECT id_product, b_product_name, b_product_qty FROM basket WHERE id_basket IN($id4basket)");
        $id_product['id_prod']=[];
        $pdo4ThisP = new connect_db();

        while($fetch4insert = mysqli_fetch_array($sql4SLBasket)){
            array_push($id_product['id_prod'], $fetch4insert['id_product']);
            $sl_prod = $pdo4ThisP->runQuery('SELECT product_qty FROM product WHERE id_product=:id_sl_prod');
            $sl_prod->execute(['id_sl_prod' => $fetch4insert['id_product']]);
            $post_sl = $sl_prod->fetch();

            if(intval($fetch4insert['b_product_qty']) > intval($post_sl->product_qty)){
                ?>
<script>
$(document).ready(function() {

    Swal.fire({
        icon: 'error',
        title: 'ไม่สามารถทำรายการได้',
        text: 'จำนวนวัตถุมงคล "<?php echo $fetch4insert['b_product_name'];?>" เหลือไม่เพียงพอต่อความต้องการของท่าน ',
        showConfirmButton: false,
        timer: 4500
    }).then(function() {
        window.location.href = '../index.php?p=basket';
    });

});
</script>
<?php
            }else{
                
                $ud_qty_prod = $pdo4ThisP->runQuery('UPDATE product SET `product_qty`=:qty_new where id_product=:id_prod ');
                $qty_new = intval($post_sl->product_qty) - intval($fetch4insert['b_product_qty']);
                $ud_qty_prod->execute(['qty_new' => $qty_new, 'id_prod' =>$fetch4insert['id_product']]);
            }
        }
        

        if(isset($ud_qty_prod)){
        $newData_id_prod = implode(", ", $id_product['id_prod']); //!data
        $total_prod = $_POST['total_prod']; //!data
        $p_number = $_POST['p_number']; //!data
        $address4send = $_POST['address4send']; //!data

        $sqlInsert = $selectBasket->runQuery("INSERT INTO save_basket(`id_user`, `id_basket`, `id_product`, `total_prod`, `phone_number`, `address_for_send`) VALUE (
            '$_SESSION[id]',
            '$id4basket',
            '$newData_id_prod',
            '$total_prod',
            '$p_number',
            '$address4send'
        )");
        
        if($sqlInsert){
            $clearBasket = $selectBasket->runQuery("UPDATE basket SET status_basket='order' WHERE id_basket IN($id4basket) ");

            if($clearBasket){
                ?>
<script>
$(document).ready(function() {

    Swal.fire({
        icon: 'success',
        title: 'Order Success',
        text: 'สั่งเช่าวัตถุมงคลเรียบร้อยแล้ว โปรดดำเนินการโอนเงินและแจ้งสลิป',
        showConfirmButton: false,
        timer: 3500
    }).then(function() {
        window.location.href = '../index.php?p=basket';
    });

});
</script>

<?php
            }

        }else{
            echo"Can't SQL";
            
        }

    }else{

    }
    }else{
        header("Location: ../index.php");
    }
?>