<?php
    $sacredSelectAll = new shopSacredObj();

?>



<div class="container mt-4 mb-4">
    <div class="card">
        <div class="card-header ">
            <h3 class="text-center"><b><i class="fa fa-archive text-warning" aria-hidden="true"></i> วัตถุมงคลทั้งหมด
            </h3>
        </div>
        <div class="card-body pt-4">
            <div class="row d-flex justify-content-center">
                <?php
                    $sql = $sacredSelectAll->runQuery("SELECT * FROM product ORDER BY id_product");
                    if($sql){
                        while( $fetchArray = mysqli_fetch_array($sql)){
                            ?>
                <div class="card col-md-3 m-2 p-3">
                    <!-- //! ครอบแต่ละสิ้นค้า -->
                    <div class="card">
                        <img id="picSize" src="image/product/160643352358633.png" alt="">
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
                
                ?>


            </div>
        </div>
    </div>
</div>