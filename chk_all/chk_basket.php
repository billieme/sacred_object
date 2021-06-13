<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jquery-->
<script src="../sweetalert/sweetalert2.all.min.js"></script>

<?php
                session_start();
                require_once('../function.php');
                $forBasket = new shopSacredObj();
                                                        

                if(isset($_POST['submit'])){
                    
                                
                                $qty = $_POST['data4basket']['qty'];
                                $id = $_POST['data4basket']['id'];
                                $sql = $forBasket->runQuery("SELECT * FROM product WHERE id_product='$id' ");
                                $fetch_prod = mysqli_fetch_array($sql);
                                if($qty > $fetch_prod['product_qty']){
                                    ?>
<script>
$(document).ready(function() {

    Swal.fire({
        icon: 'error',
        text: 'จำนวนวัตถุมงคลคงเหลือไม่เพียงพอต่อความต้องการของท่าน',
        showConfirmButton: false,
        timer: 3500
    }).then(function() {
        window.location.href = '../index.php?p=readSacredObj&id4readSacredObj=<?php echo $id; ?>';
    });

});
</script>
<?php
                                }else{
                                if($sql){
                                    if($qty <= 0 ){
                                        ?>
<script>
window.location.href = '../index.php?p=readSacredObj&id4readSacredObj=<?php echo $id ?>&alert=noqty';
</script>

<?php
                                    }else{

                                        $sql2 = $forBasket->runQuery("SELECT b_product_qty FROM basket WHERE id_product='$id' and status_basket='wait'");
                                        $fetch2 = mysqli_num_rows($sql2);
                                        $fetchArr = mysqli_fetch_array($sql2);
                                        if($fetch2 > 0){
                                            $qtyold = $fetchArr['b_product_qty'];
                                            $qtyNew = $qty + $qtyold;
                                            $raca_sum =  $qtyNew * $fetch_prod['product_price'];
                                            $updateQty = $forBasket->runQuery("UPDATE basket SET b_product_qty='$qtyNew', b_price='$raca_sum' WHERE id_product='$id' and status_basket='wait' ");
                                            if($updateQty){
                                                ?>
<script>
$(document).ready(function() {

    Swal.fire({
        icon: 'success',
        text: 'บันทึกลงตะกร้าสินค้าเรียบร้อยแล้ว',
        showConfirmButton: false,
        timer: 2500
    }).then(function() {
        window.location.href ='../index.php?p=readSacredObj&id4readSacredObj=<?php echo $id; ?>&basketSuccess=ok';
    });

});
</script>
<?php
                                            }
                                            
                                        }else{



                                        //! Do work 
                                        
                                        $fetch = mysqli_fetch_array($sql);
                                        $id_user = $_SESSION['id'];
                                        $id_product = $fetch_prod['id_product'];
                                        $cover_basket = $fetch_prod['product_cover'];
                                        $b_product_name = $fetch_prod['product_name'];
                                        $b_product_price = $fetch_prod['product_price'];
                                        $b_product_qty = $qty;
                                        $b_price = $qty*$b_product_price;
                                        
                                        $insertBasket  = $forBasket->runQuery("INSERT INTO basket(`id_user`, 
                                        `id_product`, 
                                        `cover_basket`, 
                                        `b_product_name`, 
                                        `b_product_price`, 
                                        `b_product_qty`, 
                                        `b_price`, 
                                        `status_basket`) VALUE ('$id_user',
                                        '$id_product',
                                        '$cover_basket',
                                        '$b_product_name',
                                        '$b_product_price',
                                        '$b_product_qty',
                                        '$b_price',
                                        'wait'
                                        )");
                                        //todo : status (wait== รอสั่งซื้อ, pass==ทำการสั่งซื้อแล้ว )

                                        if($insertBasket){
                                            ?>
<script>
$(document).ready(function() {

    Swal.fire({
        icon: 'success',
        text: 'บันทึกลงตะกร้าสินค้าเรียบร้อยแล้ว',
        showConfirmButton: false,
        timer: 2500
    }).then(function() {
        window.location.href =
            '../index.php?p=readSacredObj&id4readSacredObj=<?php echo $id_product; ?>&basketSuccess=ok';
    });

});
</script>
<?php
                                        }

                                        }
                                        
                                        
                                    }
                                }else{
                                    //! if can have SQL
                                    echo"Can't connect SQL";
                                }
                            }
                }else{
                    //! check if don't have data4basket
                    ?>
<script>
window.history.back();
</script>
<?php
                }
?>