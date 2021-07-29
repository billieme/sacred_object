<div class="card min-vh-100">
    <div class="card-header text-center bg-danger">
        <h3 class=" text-light">รายละเอียดประวัติการเช่าวัตถุมงคล 📦</h3>
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
                    
                    ?>
            </div>

            <?php
                    if($post_sl_s_p->name_cus =="-"){
                        ?>
            <div class="row">
                    <div class="col">
                        <h4 class="alert alert-danger text-center font-weight-bold">
                            เช่าบูชาผ่านทางออนไลน์ / ยังไม่ชำระเงิน
                        </ก>
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