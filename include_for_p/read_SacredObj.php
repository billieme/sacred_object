<div class="container mt-4 mb-4">
    <div class="card min-vh-100">
        <div class="card-body">
            <?php 
                $readSacredObj = new shopSacredObj();
                $id4readSacredObj = $_GET['id4readSacredObj'];
                
                $sql = $readSacredObj->runQuery("SELECT * FROM product WHERE id_product='$id4readSacredObj' ");
                if($sql){
                    $fetchData = mysqli_fetch_array($sql);
                }else{
                    ?>
            <script>
            alert("Can't SQL");
            </script>
            <?php
                }        

                ?>

            <div class="row">
                <div class="col-md-7">
                    <div class="card w-100 p-3">
                        <img src="image/product/<?php echo $fetchData['product_cover']; ?>" alt="">
                    </div>
                </div>
                <div class="col-md">
                    <div class="w-100 p-0 pl-2 ">
                        <strong>
                            <h2 id="name_shop_card" class="pt-3 font-weight-bold">
                                <?php echo $fetchData['product_name']; ?>
                            </h2>
                        </strong>
                        <p class="m-0">
                            ประเภทวัตถุมงคล : <?php echo $fetchData['product_type'];?>
                        </p>
                        <div class="m-0 d-flex d-inline ">
                            ราคา <p class="m-0 mr-2 ml-2 text-danger font-weight-bold">
                                <b><?php echo $fetchData['product_price'];?></b>
                            </p>บาท
                        </div>
                        <div class="d-flex d-inline">
                            <p class="font-weight-bold mr-2">คงเหลือ</p> <?php echo $fetchData['product_qty'];?> ชิ้น
                        </div>
                        <div>
                            <p id="detailSacredObj"><?php echo $fetchData['product_des'];?></p>
                        </div>

                        <div class="d-flex d-inline justify-content-between align-items-center">
                            <div class="d-flex">
                                <div class="">จำนวน</div>
                                <input id="qty" type="number" value="1">
                                <div for="">ชิ้น</div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-success">
                                    <i class="fas fa-cart-arrow-down"></i> เพิ่มลงตะกร้าสินค้า
                                </button>
                            </div>
                        </div>
                        <p>
                       
            
                        </p>






                    </div>
                </div>
            </div>
            <hr>







        </div>
    </div>
</div>