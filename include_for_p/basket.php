<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jquery-->
<script src="sweetalert/sweetalert2.all.min.js"></script>

<?php
    if(!isset($_SESSION['id'])){
        ?>
<script>
window.location.href = 'index.php';
</script>
<?php
    }
?>

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
            <div id="table4overflowX">
                <form action="chk_all/chk_del_basket.php" method="post">
                                        <div id="delBasket" class="alert alert-danger" hidden>
                                            <button class="btn btn-danger">ล้างตะกร้าสินค้า</button>
                                        </div>
            <table class="table table-striped w-100" >
                <thead class="alert alert-primary font-weight-bold">
                    <tr>
                        <th scope="col">
                          <label for="checkAll"><input type="checkbox" id="checkAll"> All </label>
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
                            ราคา/บาท
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
                            <input class="checkboxId4del" type="checkbox" name="id4del[]" value="<?php echo $numfetch['id_basket']; ?>">
                        </td>
                        <td>

                            <img id="img4basket" src="image/product/<?php echo $numfetch['cover_basket']; ?>" alt="">

                        </td>
                        <td>
                            <?php echo $numfetch['b_product_name'] ;?>
                        </td>
                        <td>
                            <?php echo number_format($numfetch['b_product_price']) ;?>
                        </td>
                        <td>
                            <?php echo $numfetch['b_product_qty'] ;?>
                        </td>
                        <td>
                            <?php echo number_format($numfetch['b_price']) ;?>
                        </td>
                    </tr>
                    <?php
                                        $i4Fetch++;
                                            }
                                }else{
                                    ?>
                    <tr class="text-center">
                        <td colspan="7" class="font-weight-bold text-danger">
                                    <div class="alert alert-danger">ไม่มีสินค้าในตะกร้าของท่าน</div>
                        </td>
                    </tr>
                    <?php
                                }
                                ?>
                </tbody>

            </table>

            </form>


            </div>
            <?php
                                                            
                                                        }else{
                                                            echo"Can't SQL";
                                                        }
                                    
            ?>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
       $("#checkAll").on('click', function(){
           if(this.checked){
               $(".checkboxId4del").each(function(){
                    $(this).prop('checked', true);
                })
                
                $("#delBasket").prop('hidden', false)
                $("#delBasket").addClass('animate__animated animate__bounceIn')

                
            }else{
                $(".checkboxId4del").each(function(){
                    $(this).prop('checked', false);
                })
                $("#delBasket").removeClass('animate__animated animate__bounceIn')  
                $("#delBasket").prop('hidden', true)  
           }
       })
       $(".checkboxId4del").on('click', function(){
           if(this.checked){
                $("#delBasket").prop('hidden', false)
                $("#delBasket").addClass('animate__animated animate__bounceIn')
           }
           $(this).each(function(){
               if($(".checkboxId4del:checked").length == 0){
                $("#delBasket").removeClass('animate__animated animate__bounceIn')  
                $("#delBasket").prop('hidden', true)  
               }
           })

           if($(".checkboxId4del:checked").length == $(".checkboxId4del").length){
               $("#checkAll").prop('checked', true)
               
           }else{
            $("#checkAll").prop('checked', false)
           }
           
       })
    });

</script>