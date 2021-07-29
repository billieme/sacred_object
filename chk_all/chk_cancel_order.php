<?php
include_once('../function.php');
include_once('../func4pdo/connect.php');

if(isset($_GET['cancel'])=="go"){
    $sql4thispage = new shopSacredObj();
    $cancel_order = $sql4thispage->runQuery("UPDATE save_basket SET status_pay='cancel_order' WHERE id_save_basket='$_GET[id_cancel]' ");
                            if($cancel_order){

                                $pdo4thisP = new connect_db();

                                $sl4_img = $pdo4thisP->runQuery('SELECT id_basket, slip_img, id_product FROM save_basket WHERE id_save_basket=:id_s_b ');
                                $sl4_img->execute(['id_s_b' => $_GET['id_cancel']]);
                                $post_sl = $sl4_img->fetch();
                            
                                $sl4_id_prod = $pdo4thisP->runQuery('SELECT * FROM product Where id_product in(:id_prod)');
                                $sl4_id_prod->execute(['id_prod' => $post_sl->id_product]);


                                $sl_newQty = $pdo4thisP->runQuery('SELECT * FROM basket where id_basket in(:id_basket) ');
                                $sl_newQty->execute(['id_basket' => $post_sl->id_basket]);
                                
                                
                                while($post_id_prod = $sl4_id_prod->fetch()){
                                    $qtyOld = intval($post_id_prod->product_qty);
                                    $qtyOld2 = intval($post_id_prod->sell_already);

                                    while($post_sl_newQty = $sl_newQty->fetch()){
                                        $newQty = intval($post_sl_newQty->b_product_qty) + $qtyOld; //!เพิ่ม qty กลับคืน prod
                                        //*---------------------------------
                                        $newQty2 = $qtyOld2 - intval($post_sl_newQty->b_product_qty); //!ลบ qty กลับคืน จำนวนที่ซื้อ
                                        //*---------------------------------

                                        
                                        $ud_qty_prod = $pdo4thisP->runQuery('UPDATE product SET `product_qty`=:ud_p_q, `sell_already`=:sell_already where id_product=:ud_id_prod ');
                                        $ud_qty_prod->execute([
                                            'ud_p_q' => $newQty, 
                                            'sell_already' => $newQty2, 
                                            'ud_id_prod' => $post_sl_newQty->id_product
                                            ]);
                                    }

                                    
                                    
                                }


                                if($post_sl->slip_img =='wait'){
                                    
                                }else{
                                    $path = "../image/slip_chk/";
                                    $sql4del_img = $post_sl->slip_img;
                                    $file = $path.$sql4del_img;
                                    unlink($file);
                                    
                                }
                                if(isset($_GET['admin'])){
                                    ?>
<script>
window.location.href = '../back_house_system/manager.php?m=m4_sell_sys';
</script>
<?php
                                }else{

                                ?>
<script>
window.location.href = '../index.php?p=basket';
</script>
<?php
                                }
                            }
}

?>