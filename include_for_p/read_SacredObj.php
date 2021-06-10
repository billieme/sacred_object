<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script><!--jquery-->
<script src="sweetalert/sweetalert2.all.min.js"></script>

<?php
    if(isset($_GET['alert'])=="noqty"){
        ?>
            <script>
                    $(document).ready(function(){
                        
                            Swal.fire({
                            icon: 'error',
                            title: 'จำนวนชิ้นต้องไม่ต่ำกว่า 1 ชิ้น',
                            showConfirmButton: false,
                            timer: 2500
                            });
                        
                    });
            </script>
        <?php
    }
?>

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
                <div class="col-md-6">
                    <div class="card w-100 p-3">
                    <?php
                            $pic =explode(',', $fetchData["product_cover"]);
                            $countPic = count($pic);
                            for($i = 0 ; $i<$countPic ; $i++){
                    ?>
                        <img id="imgSacredObj<?=$i?>" src="image/product/<?php echo $pic[$i]; ?>" alt=""> <?php if($countPic ==1){}else{ ?><hr> <?php  } ?>
                        <?php
                    }
                    ?>
                    </div>
                </div>
                <div class="col-md">
                    <div class="w-100 p-0 pl-2 ">
                        <strong>
                            <h2 id="name_shop_card" class="pt-3 font-weight-bold text-wrap">
                                <?php echo $fetchData['product_name']; ?>
                            </h2>
                        </strong>
                        <p class="m-0">
                            ประเภทวัตถุมงคล : <?php echo $fetchData['product_type'];?>
                        </p>
                        <div class="m-0 d-flex d-inline ">
                            ราคา <p class="m-0 mr-2 ml-2 text-danger font-weight-bold">
                                <b><?php echo number_format( $fetchData['product_price']);?></b>
                            </p>บาท
                        </div>
                        <div class="d-flex d-inline">
                            <p class="font-weight-bold mr-2">คงเหลือ</p> <?php echo $fetchData['product_qty'];?> ชิ้น
                        </div>
                        <hr class="mt-0">
                        <div>
                            <p id="detailSacredObj"><?php echo $fetchData['product_des'];?></p>
                        </div>

                        <form action="chk_all/chk_basket.php" method="post">
                                <!-- //! Form -->

                        <div class="row d-flex d-inline justify-content-between align-items-center">
                        
                            <div class=" col d-flex align-self-end">

                                    <div class="">จำนวน</div>
                                    <input id="qty" type="number" name="data4basket[qty]" value="1">
                                    <div for="">ชิ้น</div>
                            </div>

                            <div class="col-md text-right">
                                <?php 
                                    if(!isset($_SESSION['id'])){
                                ?>
                                <text id="notSessionID" class="btn btn-danger w-100 mt-2">
                                    <i class="fas fa-cart-arrow-down"></i> เพิ่มลงตะกร้าสินค้า
                                </text>
                                <?php
                                }
                                if(isset($_SESSION['id'])){
                                ?>

                                <input name="data4basket[id]" value="<?php echo$id4readSacredObj;?>" hidden></input>

                                <button class="btn btn-success w-100 mt-2" type="submit" name="submit">
                                    <i class="fas fa-cart-arrow-down"></i> เพิ่มลงตะกร้าสินค้า
                                </button>

                                </form>
                                <?php
                                }
                                ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jquery-->
<script src="sweetalert/sweetalert2.all.min.js"></script>
<script src="zoom"></script>

<script>
$(document).ready(function() {

    <?php
        for ($x = 0; $x < $countPic; $x++){
            ?>

            $("#imgSacredObj<?=$x;?>").imageZoom();
            <?php
        }
    ?>


    $("#notSessionID").click(function() {

        Swal.fire({
            text: 'โปรดเข้าสู่ระบบ เพื่อเพิ่มสินค้าลงตะกร้า',
            icon: 'warning',
            showClass: {
                popup: 'animate__animated animate__wobble'
            },
            hideClass: {
                popup: 'animate__animated animate__flipOutY'
            }
        
        })
    

    })
});
</script>