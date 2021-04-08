<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script><!--jquery-->
<script src="sweetalert/sweetalert2.all.min.js"></script>

<div class="container mt-4 mb-4">
    <div class="card min-vh-100">
        <div class="card-header text-center">
            <h3 class="font-weight-bold"><i class="fas fa-shopping-basket text-warning"></i> ตะกร้าสินค้าของฉัน</h3>
        </div>
        <div class="card-body">

    
            <?php
                                        $forBasket = new shopSacredObj();
                                        $qty = $_POST['data4basket']['qty'];
                                        $id = $_POST['data4basket']['id'];
                                        $sql = $forBasket->runQuery("SELECT * FROM product WHERE id_product='$id' ");
                                        if($sql){
                                            if($qty <= 0 ){
                                                ?>
                                                    <script>
                                                         window.location.href='index.php?p=readSacredObj&id4readSacredObj=<?php echo $id ?>&alert=noqty';
                                                    
                                                    </script>
                                                    <?php
                                            }else{
                                                ?>
                                                <script>
                                                        alert("sdfsdg");
                                                        
                                                    
                                                    </script>
                                                <?php
                                            }
                                        }else{
                                            echo"Can't SQL";
                                        }
            ?>
        </div>
    </div>
</div>