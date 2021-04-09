<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jquery-->
<script src="sweetalert/sweetalert2.all.min.js"></script>

<div class="container mt-4 mb-4">
    <div class="card min-vh-100">
        <div class="card-header text-center">
            <h3 class="font-weight-bold"><i class="fas fa-shopping-basket text-warning"></i> ตะกร้าสินค้าของฉัน</h3>
        </div>
        <div class="card-body">


            <?php

                                        $forBasket = new shopSacredObj();
                                        

                                        if(isset($_POST['data4basket'])){
                                            
                                                        
                                                        $qty = $_POST['data4basket']['qty'];
                                                        $id = $_POST['data4basket']['id'];
                                                        $sql = $forBasket->runQuery("SELECT * FROM product WHERE id_product='$id' ");
                                                        if($sql){
                                                            if($qty <= 0 ){
                                                                ?>
            <script>
            window.location.href = 'index.php?p=readSacredObj&id4readSacredObj=<?php echo $id ?>&alert=noqty';
            </script>
            <?php
                                                            }else{
                                                                ?>
            <table class="table table-striped">
                <thead class="alert alert-primary font-weight-bold">
                    <tr>
                        <th scope="col">
                            <input type="checkbox" id="checkAll">
                        </th>
                        <th scope="col">
                            #
                        </th>
                        <th scope="col">
                            ภาพตัวอย่าง
                        </th>
                        <th scope="col">
                            ชื่อสินค้า
                        </th>
                        <th scope="col">
                            ราคา/ชิ้น
                        </th>
                        <th scope="col">
                            จำนวน
                        </th>
                        <th scope="col">
                            ราคา
                        </th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                                $numFetch1=1;
                                while($fetch1 = mysqli_fetch_array($sql)){
                        ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="id4d[]" value="<?php echo $fetch1['id_product'];?>">
                        </td>
                        <td>
                        <?php echo $fetch1['product_name'];?>
                        </td>
                        <td>
                        <?php echo $numFetch1; ?>
                        </td>
                    </tr>
                    <?php
                            $numFetch1++;
                                }
                    ?>
                </tbody>

            </table>
            <?php
                                                            }
                                                        }else{
                                                            echo"Can't SQL";
                                                        }
                                    }
            ?>
        </div>
    </div>
</div>