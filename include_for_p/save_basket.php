<form action="chk_all\chk_save_basket.php" method="POST">
<?php
if (isset($_POST['submitOrder'])) {
?>
<div class="container mt-4 mb-4">

    <div class="card min-vh-100">
        <div class="card-header bg-primary text-center text-light">
            <h3>📋 ยืนยันการสั่งซื้อสินค้า</h3>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <div class="w-100 alert alert-success">
                    <div class="text-center">
                        <h4 class="font-weight-bold"><u>ORDER</u></h4>
                    </div>
                    <table class="w-100">
                        <thead class="">
                            <tr>
                                <th>ชื่อสินค้า</th>
                                <th class="text-right">Qty</th>
                                <th class="text-right">ราคา</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $selectBasket = new shopSacredObj();
                                $sql = $selectBasket->runQuery("SELECT * FROM basket WHERE id_user='$_SESSION[id]' and status_basket='wait' ");
                                while ($num = mysqli_fetch_array($sql)) {
                                    ?>

                            <tr>
                                <td>
                                <input type="text" name="id4basket[]" id="" value="<?php echo $num['id_basket'] ;?>" hidden="true">
                                <?php echo $num['b_product_name']; ?>
                                </td>
                                <td class="text-right"><?php echo $num['b_product_qty']; ?></td>
                                <td class="text-right"><?php echo number_format($num['b_price']); ?></td>
                            </tr>
                            <?php
                                }
                                ?>
                            <tr class="">
                                <?php
                                    $sqlSelectSum = $selectBasket->runQuery("SELECT sum(b_price) FROM basket WHERE status_basket='wait'");
                                    $fetchSum = mysqli_fetch_assoc($sqlSelectSum);
                                ?>
                                <td class="text-right pt-4 font-weight-bold" colspan="3">Total : <input style="width: 6rem;" class="font-weight-bold alert-success border-0 text-right" name="total_prod" readonly type="text" value="<?php echo number_format($fetchSum['sum(b_price)']);?>"> ฿</td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- //!------------------------------- -->
            <!-- //! ข้อมูลจัดส่ง -->
            <!-- //!------------------------------- -->

            <div class="d-flex justify-content-center">
                <div class="w-md-50 alert alert-primary d-flex justify-content-center">

                    <table class="">
                        <tbody class="p-2">
                            <tr>
                                <td class="text-right">คำนำหน้าชื่อ : </td>
                                <td>
                                    <text class="ml-2"><?php echo $_SESSION['tname']; ?></text>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right pt-2">ชื่อ - นามสกุล : </td>
                                <td class="pt-2">
                                    <text
                                        class="ml-2"><?php echo $_SESSION['name'] . " " . $_SESSION['lname']; ?></text>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right pt-2">เบอร์โทรติดต่อกลับ : </td>
                                <td class="pt-2">
                                    <input class="ml-2 form-control" type="text"
                                        value="<?php echo $_SESSION['pnumber']; ?>" name="p_number" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right pt-2 d-flex align-items-start justify-content-end">
                                    ที่อยู่สำหรับจัดส่ง : </td>
                                <td class="pt-2">
                                    <textarea class="form-control ml-2" name="address4send" id="" cols="" rows="2"
                                        required></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-right pt-2">
                                    <button class="btn btn-success w-50" name="submit">ยืนยัน</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>

            <div class="d-flex justify-content-center">
                <div class="w-md-50 d-flex justify-content-end">

                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
</form>