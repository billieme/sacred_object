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
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page=1;

                    }
                    $row_data  = 6; //! ข้อมูลที่จะโชว์ต่อ 1 หน้า
                    $set_limit = ($page-1) * $row_data;
                    

                        ?>
                <?php
                    $sql = $sacredSelectAll->runQuery("SELECT * FROM product ORDER BY id_product DESC limit $set_limit, $row_data");
                    if($sql){
                        while( $fetchArray = mysqli_fetch_array($sql)){
                            ?>
                <div class="card col-md-3 m-2 p-3">
                    <a class="card"
                        href="index.php?p=readSacredObj&id4readSacredObj=<?php echo $fetchArray['id_product']; ?>">
                        <?php
                            $pic =explode(',', $fetchArray['product_cover']) ;
                        ?>
                        <img id="picSize" src="image/product/<?php echo $pic[0]; ?>"
                            title="คลิกเพื่อดูรายละเอียดวัตถุมงคล">
                    </a>

                    <div>
                        <p class="mb-1 mt-1" id="name_shop_card"><?php echo $fetchArray['product_name']; ?></p>
                    </div>
                    <small class="font-weight-bold">หมวดหมู่ : <?php echo $fetchArray['product_type'] ?></small>
                    <small class="font-weight-bold">คงเหลือ : <?php echo $fetchArray['product_qty'] ?> ชิ้น</small>

                    <div class=" p-0 pr-2 pl-2 mb-0 mt-2">
                        <strong class="d-flex d-inline">
                            <h4 class="mb-1 mt-1 text-right text-success font-weight-bold" id="name_shop_card">
                                <?php echo number_format($fetchArray['product_price']); ?>
                                <text class="text-danger">฿</text>
                            </h4>
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

<nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="index.php?p=sacredOb&page=1" tabindex="-1"
                                aria-disabled="true">หน้าแรก</a>
                        </li>
                        <li class="page-item <?=$page > 1 ? '' : 'disabled' ?>">
                            <a class="page-link" href="index.php?p=sacredOb&page=<?=$page-1;?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            <?php
        $sql_page_all4pagination = $sacredSelectAll->runQuery("SELECT * from `product`");
        $fetch_page = mysqli_num_rows($sql_page_all4pagination);
        $page_all4pagination = ceil($fetch_page/$row_data);
        
        for($xx = 1 ; $xx <= $page_all4pagination; $xx++){
            ?>
                        </li>
                        <li class="page-item <?=$page == $xx ? 'active' : '' ?>"><a class="page-link"
                                href="index.php?p=sacredOb&page=<?=$xx?>"><?=$xx?></a></li>
                        <?php
            }
            ?>


                        <li class="page-item <?=$page < $page_all4pagination ? '' : 'disabled'; ?>">
                            <a class="page-link" href="index.php?p=sacredOb&page=<?=$page+1;?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"
                                href="index.php?p=sacredOb&page=<?=$page_all4pagination?>">หน้าสุดท้าย</a>
                        </li>
                    </ul>
                </nav>