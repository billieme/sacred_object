<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script><!--jquery-->
<script src="../sweetalert/sweetalert2.all.min.js"></script>

<?php
                session_start();
                require_once('../function.php');
                $forBasket = new shopSacredObj();
                                                        

                if(isset($_POST['data4basket'])){
                    
                                
                                $qty = $_POST['data4basket']['qty'];
                                $id = $_POST['data4basket']['id'];
                                $sql = $forBasket->runQuery("SELECT * FROM product WHERE id_product='$id' ");
                                if($sql){
                                    if($qty <= 0 ){
                                        ?>
                <script>
                window.location.href = 'index.php?p=readSacredObj&id4readSacredObj=<?php echo $id ?>&alert=noqty';
                </script>

                <?php
                                    }else{
                                        //! Do work 
                                        
                                        $fetch = mysqli_fetch_array($sql);
                                        $id_user = $_SESSION['id'];
                                        $id_product = $fetch['id_product'];
                                        $cover_basket = $fetch['product_cover'];
                                        $b_product_name = $fetch['product_name'];
                                        $b_product_price = $fetch['product_price'];
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
                                                        $(document).ready(function(){
                        
                                                            Swal.fire({
                                                            icon: 'success',
                                                            text: 'บันทึกลงตะกร้าสินค้าเรียบร้อยแล้ว',
                                                            showConfirmButton: false,
                                                            timer: 2500
                                                            }).then(function(){ 
                                                                window.history.back();
                                                            });
                    
                                                         });

                                                    
                                                </script>
                                            <?php
                                        }
                                        
                                        
                                    }
                                }else{
                                    //! if can have SQL
                                    echo"Can't connect SQL";
                                }
                }else{
                    //! check if don't have data4basket
                    ?>
                        <script>
                            window.location.href='index.php';
                        </script>
                    <?php
                }
?>

