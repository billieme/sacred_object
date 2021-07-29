<div class="">

    <div class="card min-vh-100">
        <div class="card-header text-center alert-primary">
            <h3 class="font-weight-bold ">รายละเอียดประวัติการเช่าวัตถุมงคล 📦</h3>
        </div>
        <div class="card-body">
            <div class="jumbotron jumbotron-fluid p-3 alert-success mb-3">
                <table class="w-100">
                    <thead>
                        <tr>
                            <th>ชื่อสินค้า</th>
                            <th class="text-right">Qty</th>
                            <th class="text-right">ราคา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $queryThis = new shopSacredObj();
                        $sl_save_basket1 = $queryThis->runQuery("SELECT * FROM save_basket WHERE id_save_basket='$_GET[id4_save_basket]' ");
                        $fetch_SSB1 = mysqli_fetch_array($sl_save_basket1);

                        //* -------------------------------------------------------------------------- */
                        
                        $sl_basket2 = $queryThis->runQuery("SELECT * FROM basket WHERE id_basket in($fetch_SSB1[id_basket])");
                        
                        
                        //* -------------------------------------------------------------------------- */
                    while($fetch_SB2 = mysqli_fetch_array($sl_basket2)){
                        ?>
                        <tr>
                            <td><?php echo $fetch_SB2['b_product_name']; ?></td>
                            <td class="text-right"><?php echo $fetch_SB2['b_product_qty']; ?></td>
                            <td class="text-right"><?php echo number_format($fetch_SB2['b_price']); ?></td>
                        </tr>
                        <?php } 
                        $sl_basket3 = $queryThis->runQuery("SELECT sum(b_price) FROM basket WHERE id_basket in($fetch_SSB1[id_basket])");
                        $fetch_SB3 = mysqli_fetch_array($sl_basket3)
                    ?>
                        <tr>
                            <td colspan="3" class="text-right mr-2 pt-3 font-weight-bold">
                                Total : <?php echo number_format($fetch_SB3['sum(b_price)']);?> ฿
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="jumbotron jumbotron-fluid alert-success mb-3 p-3">
                <?php
                    if($fetch_SSB1['name_cus'] =="-"){
                        $sl_user4 = $queryThis->runQuery("SELECT * FROM user WHERE id='$fetch_SSB1[id_user]' ");
                        $fetch_SU4 = mysqli_fetch_array($sl_user4);
                        ?>
                <strong><u>รายละเอียดการจัดส่ง</u> </strong><br><br>
                <text>ชื่อ :
                    <?php echo $fetch_SU4['title_name']." ".$fetch_SU4['first_name']." ".$fetch_SU4['last_name'] ; ?></text><br>
                <text>เบอร์โทรติดต่อกลับ : <?php echo $fetch_SSB1['phone_number'];?> </text><br>
                <text>ที่อยู่จัดส่ง : <?php echo $fetch_SSB1['address_for_send'];?></text><br>
                <?php
                    }else{
                    ?>
                <strong><u>รายละเอียดการจัดส่ง</u> </strong><br><br>
                <text>ชื่อ :
                    <?php echo $fetch_SSB1['name_cus'] ; ?></text><br>
                <text>เบอร์โทรติดต่อกลับ : <?php echo $fetch_SSB1['phone_number'];?> </text><br>
                <text>ที่อยู่จัดส่ง : <?php echo $fetch_SSB1['address_for_send'];?></text><br>
                <?php
                    }
                    ?>

            </div>

            <div class="jumbotron jumbotron-fluid alert-success mb-3 p-3">
                <div class="row d-flex justify-content-between mb-4">
                    <div class="col d-flex align-self-center">
                        <strong><u>หลักฐานการชำระเงิน</u> </strong>
                    </div>

                    <?php
                        $pdo4thisP =  new connect_db();
                        $sl_s_p = $pdo4thisP->runQuery('SELECT * FROM save_basket WHERE id_save_basket=:id_s_b') ;

                    $sl_s_p->execute(['id_s_b' => $_GET['id4_save_basket']]);
                    $post_sl_s_p = $sl_s_p->fetch();
                    if($post_sl_s_p->status_pay == 'approved'){
                        
                    }else{
                        ?>
                    <div class="col-lg d-flex justify-content-end mt-2">
                        <button id="approve" class="btn btn-success" style="border:3px solid white;">อนุมัติ</button>
                        <button id="request_again" class="btn btn-warning"
                            style="border:3px solid white;">ร้องขอหลักฐานการชำระเงินใหม่</button>
                    </div>
                    <?php
                        
                    }
                    ?>
                </div>

                <?php
                    if($post_sl_s_p->name_cus =="-"){

                        ?>
                <div class="row">

                    <div class="col-md-7">

                        <img class="w-100 rounded" style="border:2px solid white;"
                            src="../image/slip_chk/<?php echo $fetch_SSB1['slip_img']; ?>" alt="">
                    </div>
                </div>
                <?php
                    }else{
                        echo"เช่าบูชาที่ซุ้มพระ  / ชำระเงินเรียบร้อยแล้ว";
                    }
                    ?>
            </div>
        </div>


    </div> <!-- close body card -->
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jquery-->
<script src="../sweetalert/sweetalert2.all.min.js"></script>

<script>
$(document).ready(() => {
    $("#approve").click(() => {
        Swal.fire({
            title: 'ต้องการอนุมัติ?',
            text: "คุณต้องการอนุมัติการสั่งวัตถุมงคลจริงหรือไม่!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ไม่ต้องการ',
            confirmButtonText: 'ต้องการ !'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href =
                    'manager.php?m=m4_veiw_order_come&id4_save_basket=<?php echo $_GET['id4_save_basket'];?>&approve=ok'
            }
        })
    })
    $("#request_again").click(() => {
        Swal.fire({
            title: 'ต้องการร้องขอหลักฐานการชำระเงินใหม่?',
            text: "คุณต้องการร้องขอหลักฐานการชำระเงินใหม่จริงหรือไม่!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ไม่ต้องการ',
            confirmButtonText: 'ต้องการ !'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href =
                    'manager.php?m=m4_veiw_order_come&id4_save_basket=<?php echo $_GET['id4_save_basket'];?>&request_again=ok'
            }
        })
    })
})
</script>



<!-- //! ------------------------------ PHP PROCRESS ------------------------------ */ -->
<!-- //! ------------------------------ PHP PROCRESS ------------------------------ */ -->
<!-- //! ------------------------------ PHP PROCRESS ------------------------------ */ -->

<?php
        if(isset($_GET['approve']) =='ok'){
            $queryThis = new shopSacredObj();
                        $sl_save_basket1 = $queryThis->runQuery("SELECT * FROM save_basket WHERE id_save_basket='$_GET[id4_save_basket]' ");
                        $fetch_SSB1 = mysqli_fetch_array($sl_save_basket1);

                        //* -------------------------------------------------------------------------- */
                        
                        $sl_basket2 = $queryThis->runQuery("SELECT * FROM basket WHERE id_basket in($fetch_SSB1[id_basket])");
                        
                        
                        //* -------------------------------------------------------------------------- */

            while($fetch_SB2 = mysqli_fetch_array($sl_basket2)){
                    
                    $sql_sl4product = $pdo4thisP->runQuery("SELECT * from `product` where id_product=:id_product ");
                    $sql_sl4product->execute(['id_product' => $fetch_SB2['id_product']]); 
                    $post_sl4product = $sql_sl4product->fetch(PDO::FETCH_ASSOC);//! ดึงสินค้า

                    $compute = intval($post_sl4product['product_qty']) - intval($fetch_SB2['b_product_qty']); //! คำนวนลบจำนวนหาจำนวนคงเหลือ

                    //*-------------------------------------------------------------
                    
                    $compute2 = intval($post_sl4product['sell_already']) + intval($fetch_SB2['b_product_qty']); //! คำนวนเพิ่มจำนวนหาจำนวนซื้อแล้วทั้งหมด

                    //*-------------------------------------------------------------
                    $sql_ud4product = $pdo4thisP->runQuery("UPDATE product set `product_qty`=:prod_qty,  `sell_already`=:sell_already where id_product=:id_product ");
                    $sql_ud4product->execute([
                        'prod_qty' => $compute,
                        'sell_already' => $compute2, 
                        'id_product' => $fetch_SB2['id_product']
                     ]);

            }
            if($sql_ud4product){

                $sql4update = $pdo4thisP->runQuery('UPDATE save_basket set status_pay=:s_b  where id_save_basket=:id_s_b ');
                $sql4update->execute(['s_b' => 'approved', 'id_s_b' => $_GET['id4_save_basket']]);
            }

            if($sql4update){
                ?>
<script>
$(document).ready(() => {
    Swal.fire({

        icon: 'success',
        title: 'อนุมัติการสั่งวัตถุมงคลเรียบร้อยแล้ว',
        showConfirmButton: false,
        timer: 1500
    }).then(() => {
        window.location.href = 'manager.php?m=m4_order_come';
    })
})
</script>
<?php
            }
            
        }
?>


<?php
if(isset($_GET['request_again']) =="ok"){
    $pdo4thisP2 = new connect_db();

    $sl_img = $pdo4thisP2->runQuery('SELECT slip_img FROM save_basket WHERE id_save_basket=:id_s_b');
    $sl_img->execute(['id_s_b' => $_GET['id4_save_basket']]);
    $post_sl_img = $sl_img->fetch();
    $path = "../image/slip_chk/";
    $nameOld = $post_sl_img->slip_img;
    $file = $path.$nameOld;
    unlink($file);
    


    $sql4upd_np = $pdo4thisP2->runQuery('UPDATE save_basket SET `status_pay`=:np_s_b, `slip_img`=:np_s_img WHERE id_save_basket=:np_id_s_b');
    $sql4upd_np->execute(['np_s_b' =>'request_img', 'np_s_img' => 'wait', 'np_id_s_b' => $_GET['id4_save_basket']]);
    if($sql4upd_np){
   ?>
<script>
$(document).ready(() => {
    Swal.fire({

        icon: 'success',
        title: 'ร้องขอหลักฐานการชำระเงินใหม่เรียบร้อยแล้ว',
        showConfirmButton: false,
        timer: 1500
    }).then(() => {
        window.location.href = 'manager.php?m=m4_order_come';
    })
})
</script>
<?php
    }
}

?>