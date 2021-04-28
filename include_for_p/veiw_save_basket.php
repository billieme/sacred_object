<?php
    if(isset($_POST['sm_slip'])){
        ?>

        <pre>
        <?php echo var_dump($_FILES); ?>
        </pre>

        <?php
        
        
        
    }
?>

<div class="container mt-4 mb-4">
    <div class="card min-vh-100">
        <div class="card-header text-center alert-primary">
            <h3 class="font-weight-bold ">รายละเอียดประวัติการเช่าวัตถุมงคลทั้งหมดของฉัน 📦</h3>
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
                        $sl_user4 = $queryThis->runQuery("SELECT * FROM user WHERE id='$fetch_SSB1[id_user]' ");
                        $fetch_SU4 = mysqli_fetch_array($sl_user4);
                        ?>
                <strong><u>รายละเอียดการจัดส่ง</u> </strong><br><br>
                <text>ชื่อ :
                    <?php echo $fetch_SU4['title_name']." ".$fetch_SU4['first_name']." ".$fetch_SU4['last_name'] ; ?></text><br>
                <text>เบอร์โทรติดต่อกลับ : <?php echo $fetch_SSB1['phone_number'];?> </text><br>
                <text>ที่อยู่จัดส่ง : <?php echo $fetch_SSB1['address_for_send'];?></text><br>

            </div>

            <div class="jumbotron jumbotron-fluid alert-success mb-3 p-3">
                <strong><u>หลักฐานการชำระเงิน</u> </strong> <br><br>
                <?php
                        if($fetch_SSB1['slip_img'] =="wait"){
                            ?>
                <div class="m-1 alert alert-warning text-center">
                    <strong>ท่านยังไม่มีการอัพโหลดเอกสารหลักฐานการชำระเงิน</strong><br>
                    <small>(โปรดอัพเอกสารหลักฐานการชำระเงิน เช่น สลิป หรือ ใบเสร็จการโอนเงิน)</small>

                    <form action="index.php?p=veiw_save_basket&id4_save_basket=<?php echo $_GET['id4_save_basket'];?>" method="post" enctype="multipart/form-data" class="was-validated">
                        <div class="custom-file mb-3 mt-2">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" name="slip_img" required>
                            <label class="custom-file-label" for="validatedCustomFile">เลือกไฟล์ รูปภาพ...</label>
                            <div class="invalid-feedback">โปรดเลือกไฟล์รูปภาพที่มีนามสกุลดังนี้ .png .jpg .jpeg</div>
                        </div>
                        <button class="btn btn-success" type="submit" name="sm_slip">บันทึก</button>
                    </form>

                </div>
                <?php
                        }
                      ?>

            </div>


        </div> <!-- close body card -->
    </div>
</div>