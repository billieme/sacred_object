<?php
    $sacredSelectAll = new shopSacredObj();

?>



<div class="container mt-4 mb-4">
    <div class="card">
        <div class="card-header ">
            <h3 class="text-center"><b><i class="fa fa-archive text-warning" aria-hidden="true"></i> วัตถุมงคลทั้งหมด
            </h3>
        </div>
        <div class="card-body pt-4 min-vh-100">
            <div class="row d-flex justify-content-center">
                <?php
                
                if(isset($_POST['search']) && !empty($_POST['search'])){

/*-------------------------- Show Search SacredOBJ ------------------------- */


                        $SearchSObj = $_POST['search'];
                        $sqlSearch = $sacredSelectAll->runQuery("SELECT * FROM product WHERE product_name LIKE '%$SearchSObj%' ");
                        if($sqlSearch){
                            $row = mysqli_num_rows($sqlSearch);
                            if($row < 1){
                                ?>
                                <h5 class="textbill-primary font-weight-bold">
                                    <?php echo"ไม่พบวัตถุมงคล ' $SearchSObj ' ที่ท่านค้นหา"; ?>
                                </h5>
                                <?php
                            }else{
                            ?>
                            <div class=" pl-5 pr-5 col-md-12 alert alert-primary">
                                <text class="font-weight-bold">ผลการค้นหา : </text><text class="text-secondary"><?php echo $SearchSObj;?></text>
                            
                            </div>
                            <?php
                                while($fetchSeach = mysqli_fetch_array($sqlSearch)){
                                    ?>

                                    


                <div class="card col-md-3 m-2 p-3">
                    <a class="card" href="index.php?p=readSacredObj&id4readSacredObj=<?php echo $fetchSeach['id_product']; ?>">
                        <img id="picSize" src="image/product/<?php echo $fetchSeach['product_cover']; ?>"
                            title="คลิกเพื่อดูรายละเอียดวัตถุมงคล">
                    </a>

                    <div>
                        <p class="mb-1 mt-1" id="name_shop_card"><?php echo $fetchSeach['product_name']; ?></p>
                    </div>

                    <div class="alert alert-success p-0 pr-2 pl-2 mb-0 mt-2">
                        <strong class="d-flex d-inline">
                            <p class="mb-1 mt-1 text-right text-danger">
                                ฿
                            </p>
                            <p class="mb-1 mt-1 text-right text-success" id="name_shop_card">
                                <?php echo number_format($fetchSeach['product_price']); ?>
                                บาท
                            </p>
                        </strong>
                    </div>

                </div>
                <?php
                                }
                            }
                        }else{
                            echo"Can't Search data";
                        }

/* -------------------------------------------------------------------------- */

                    }else{
                        ?>
                <?php
                    $sql = $sacredSelectAll->runQuery("SELECT * FROM product ORDER BY id_product");
                    if($sql){
                        while( $fetchArray = mysqli_fetch_array($sql)){
                            ?>
                <div class="card col-md-3 m-2 p-3">
                    <a class="card" href="index.php?p=readSacredObj&id4readSacredObj=<?php echo $fetchArray['id_product']; ?>">
                        <img id="picSize" src="image/product/<?php echo $fetchArray['product_cover']; ?>"
                            title="คลิกเพื่อดูรายละเอียดวัตถุมงคล">
                    </a>

                    <div>
                        <p class="mb-1 mt-1" id="name_shop_card"><?php echo $fetchArray['product_name']; ?></p>
                    </div>

                    <div class="alert alert-success p-0 pr-2 pl-2 mb-0 mt-2">
                        <strong class="d-flex d-inline">
                            <p class="mb-1 mt-1 text-right text-danger">
                                ฿
                            </p>
                            <p class="mb-1 mt-1 text-right text-success" id="name_shop_card">
                                <?php echo number_format($fetchArray['product_price']); ?>
                                บาท
                            </p>
                        </strong>
                    </div>

                </div>




                <?php
                        }                       
                    }else{
                        ?>

                <script>
                alert("Can't SQL");
                </script>

                <?php
                    }              
                    }
                    ?>



            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {

    $('[data-toggle="tooltip"]').tooltip('show');

});
</script>