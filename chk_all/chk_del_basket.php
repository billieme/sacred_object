<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script><!--jquery-->
<script src="../sweetalert/sweetalert2.all.min.js"></script>
<?php
                    session_start();
                    require_once('../function.php');
                    $forDelBasket = new shopSacredObj();
    ?>
    <?php
    $allid4del = implode(", ", $_POST['id4del']);
    
    $sql = $forDelBasket->runQuery("DELETE FROM basket WHERE id_basket IN ($allid4del)");
    if($sql){
        ?>
                                                <script>
                                                        $(document).ready(function(){
                        
                                                            Swal.fire({
                                                            icon: 'success',
                                                            text: 'ล้างสินค้าในตะกร้าเรียบร้อยแล้ว',
                                                            showConfirmButton: false,
                                                            timer: 2500
                                                            }).then(function(){ 
                                                                window.history.back();
                                                            });
                    
                                                         });

                                                    
                                                </script>
                                            <?php
    }else{
        echo"Can't SQL";
    }

?>