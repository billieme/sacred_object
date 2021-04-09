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

                                        $id_user = $_SESSION['id'];

                                        $forBasket = new shopSacredObj();

                                                        $sql = $forBasket->runQuery("SELECT * FROM basket WHERE id_user='$id_user'");
                                                        if($sql){
          
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
                                $i4Fetch = 1;
                                $num = mysqli_num_rows($sql);

                                if($num > 0){
                                            while($numfetch = mysqli_fetch_array($sql)){
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo $i4Fetch; ?>
                                        </td>
                                    </tr>
                                    <?php
                                        $i4Fetch++;
                                            }
                                }else{
                                    ?>
                                        <tr class="text-center">
                                            <td colspan="7" class="font-weight-bold text-danger">sdg</td>
                                        </tr>
                                    <?php
                                }
                                ?>
                </tbody>

            </table>
            <?php
                                                            
                                                        }else{
                                                            echo"Can't SQL";
                                                        }
                                    
            ?>
        </div>
    </div>
</div>