<?php
    session_start();
    if(isset($_POST['msg'])){
        if($_POST['msg'] == "click"){
            include_once("../../func4pdo/connect.php");
            include_once("../../function.php");

            $pdo = new connect_db();
            $parame = array(
              'id' => $_POST['id']
            );
            $sl_prod = $pdo->runQuery('SELECT * from product where id_product=:id ');
            $sl_prod->execute($parame);
            $post_sl_prod = $sl_prod->fetch();
            $fetch_prod = $sl_prod->fetch(PDO::FETCH_ASSOC);
            
            if($_POST['qty'] > $post_sl_prod->product_qty){
                $response = array(
                    'status' =>"qty",
                    'msg' => "จำนวนวัตถุมงคลคงเหลือ ไม่เพียงพอ"
                );
                echo json_encode($response);
            }elseif($_POST['qty'] <= 0){
                
                
                                $response = array(
                                    'status' =>"qty",
                                    'msg' => "จำนวนสินค้าไม่ควรน้อยกว่า 1"
                                );
                                echo json_encode($response);
                                
            }else{


                        //? เช็คซ้ำ
                        $pdo2 = new shopSacredObj();
                        $sl_bas = $pdo2->runQuery("SELECT * FROM basket WHERE id_product='$_POST[id]' and status_basket='wait'");
                        $fetch2 = mysqli_num_rows($sl_bas);
                        $fetchArr = mysqli_fetch_array($sl_bas);
                        if($fetch2 > 0){
                            $sl_prod_fet2 = $pdo2->runQuery("SELECT * from product where id_product='$_POST[id]'");
                            $fetch_prod_fet2 = mysqli_fetch_array($sl_prod_fet2);

                            $qtyold = $fetchArr['b_product_qty'];
                            $qtyNew = $_POST['qty'] + $qtyold;
                            $raca_new = $qtyNew * $fetch_prod_fet2['product_price'];
                            $updateQty = $pdo2->runQuery("UPDATE basket SET b_product_qty='$qtyNew', b_price='$raca_new' WHERE id_product='$_POST[id]' and status_basket='wait' ");
                            if($updateQty){
                                $response = array(
                                    'status' =>"pass",
                                    'msg' => "บันทึกลงตะกร้าสินค้าเรียบร้อยแล้ว"
                                );
                                echo json_encode($response);
                            }
                        }else{
                                $sl_prod2 = $pdo2->runQuery("SELECT * from product where id_product='$_POST[id]'");
                                $fetch_prod = mysqli_fetch_array($sl_prod2);
                                        
                                    $id_user = $_SESSION['id'];
                                    
                                    $id_product = $fetch_prod['id_product'];
                                
                                    $cover_basket = $fetch_prod['product_cover'];
                                
                                    $b_product_name = $fetch_prod['product_name'];
                                
                                    $b_product_price = $fetch_prod['product_price'];
                                
                                    $b_product_qty = $_POST['qty'];
                                
                                    $b_price = $_POST['qty']*$b_product_price;

                
                $inst_data = $pdo2->runQuery("INSERT INTO basket(`id_user`, `id_product`, `cover_basket`, `b_product_name`, `b_product_price`, `b_product_qty`, `b_price`, `status_basket`) VALUE ('$id_user', '$id_product', '$cover_basket', '$b_product_name', '$b_product_price', '$b_product_qty', '$b_price', 'wait') ");

                if($inst_data){

                    $response = array(
                        'status' =>"pass",
                        'msg' => "บันทึกลงตะกร้าสินค้าเรียบร้อยแล้ว"
                    );
                    echo json_encode($response);
                }

            }
                
            }
        }
    }else{
        echo"ไปมาแต่ไม่ผ่าน";
    }
?>