<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jquery-->
<script src="../sweetalert/sweetalert2.all.min.js"></script>


<a href='manager.php?m=m4' class="btn btn-primary"><i data-feather="corner-down-left"></i> ย้อนกลับ</a>

<hr>

<div class="alert alert-primary">
    <taxt class="d-flex align-items-center">
        <h3>ค้นหาวัตถุมงคล สำหรับเจ้าหน้าที่</h3>
        <text class="ml-2 font-weight-bold text-danger">*</text><text> เช่น ชื่อของวัตถุมงคล หรือ
            ชื่อชนิดของวัตถุมงคล</text>
    </taxt>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <div class="row d-flex d-inline">
            <div class="col-md">
                <input class="form-control mr-sm-2 w-100" type="text" placeholder="ค้นหาวัตถุมงคล" aria-label="Search"
                    name="search" autocomplete="off" required>
            </div>
            <div class="col-md">
                <!-- <button class="btn btn-outline-success btn-success text-light my-2 my-sm-0" type="submit" name="search"><i
                        class="fas fa-search"></i> Search
                </button> -->
                <input class="btn btn-outline-success btn-success text-light" type="submit" value="Search">
            </div>
        </div>
    </form>
</div>

<?php
                
                if(isset($_POST['search'])){
                    ?>
<div id="div_td">

    <table class="table w-100 table-hover animate__animated animate__backInLeft animate_faster" id="tb">
        <thead class="text-nowrap alert-success">
            <tr>
                <th>ชื่อวัตถุมงคล</th>
                <th>คงเหลือ/จำนวน</th>
                <th>ราคา</th>
                <th>จำนวนที่ต้องการ</th>
                <th>เพิ่มลงรายการสินค้า</th>
            </tr>
        </thead>
        <?php
        $pdo4slAll = new connect_db();
        $slAll = $pdo4slAll->runQuery('SELECT * from product where product_name like :search or product_type like :search');
        $parame = array(
                'search' => "%".$_POST['search']."%"
        );
        $slAll->execute($parame);
        $row = $slAll->rowCount();
    
        
   ?>
        <tbody class="text-nowrap" id="t_body">
            <?php
            if($row > 0){
                $i=1;
            while($post_slAll = $slAll->fetch()){
        ?>

            <tr>
                <td><?=$post_slAll->product_name;?></td>
                <td><?=$post_slAll->product_qty;?></td>
                <td><?= number_format( $post_slAll->product_price);?></td>
                <td>
                    <input style="width:60px;" type="number" name="id[]" id="id<?=$i;?>"
                        value="<?=$post_slAll->id_product;?>" hidden="true" />
                    <input style="width:60px;" type="number" name="qty[]" id="qty<?=$i;?>" value="1">
                </td>
                <td>
                    <input id="sb<?=$i;?>" class="btn btn-primary" type="submit" name="submit[]"
                        value="เพิ่มลงตะกร้าสินค้า">
                </td>

            </tr>


            <script>
            $(document).ready(() => {
                $("#sb<?=$i;?>").click(() => {
                    console.log($("#id<?=$i;?>").val() + ", " + $("#qty<?=$i;?>").val())
                    var id = $("#id<?=$i;?>").val()
                    var qty = $("#qty<?=$i;?>").val()
                    $.ajax({
                        method: "POST",
                        url: "include_for_m/api_ins_basket.php",
                        dataType: 'json',
                        data: {
                            id: id,
                            qty: qty,
                            msg: "click"
                        },
                        success: ((data) => {
                            if (data.status == "qty") {
                                Swal.fire({
                                    icon: 'error',
                                    text: data.msg,
                                    showConfirmButton: false,
                                    timer: 3300,
                                    timerProgressBar: true
                                })
                            }else{
                                Swal.fire({
                                    icon: 'success',
                                    text: data.msg,
                                    showConfirmButton: false,
                                    timer: 1900,
                                    timerProgressBar: true
                                }).then(()=>{
                                    location.href='manager.php?m=m4_sell_sacred_obj';
                                })
                                
                            }


                        })

                    })
                })
            })
            </script>
            <?php
                $i++;
            }
        }else{
            ?>
            <tr>
                <td colspan="5" class="p-5 text-center font-weight-bold text-danger">
                    ไม่พบข้อมูล " <u><?=$_POST['search'];?></u> " ในระบบ
                </td>
            </tr>
            <?php
        }
       
            ?>
        </tbody>

    </table>
</div>
<?php
                }else{

                }
?>


<!-- //!ตะกร้า -->
<!-- //!ตะกร้า -->
<!-- //!ตะกร้า -->
<!-- //!ตะกร้า -->
<!-- //!ตะกร้า -->
<!-- //!ตะกร้า -->


<?php
$forBasket = new shopSacredObj();
$id_user = $_SESSION['id'];
$sql = $forBasket->runQuery("SELECT * FROM basket WHERE id_user='$id_user' and status_basket='wait' ");
if($sql){

        ?>
<div id="table4overflowX">
<?php
$chkqty4del = mysqli_num_rows($sql);
if($chkqty4del > 0){
?>
<form id="form_basket" action="manager.php?m=m4_save_basket" method="post">

<div id="delBasket" class="alert alert-danger" hidden>
<button id="del" class="btn btn-danger">ล้างตะกร้าสินค้า 📛</button>
</div>
<?php
}
?>

<table class="table w-100 table-hover animate__animated animate__backInLeft animate_faster">
<thead class="alert alert-primary font-weight-bold text-nowrap">
<tr>
<th scope="col">
<label class="m-0" for="checkAll"><input type="checkbox" id="checkAll"> เลือกทั้งหมด
</label>
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

<tbody class="text-nowrap">
<?php
$i4Fetch = 1;
$num = mysqli_num_rows($sql);

if($num > 0){
while($numfetch = mysqli_fetch_array($sql)){
?>
<tr>
<td>
<input class="checkboxId4del" type="checkbox" name="id4del[]"
value="<?php echo $numfetch['id_basket']; ?>">
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
<div class="alert alert-danger"> ไม่มีสินค้าในตะกร้า</div>
</td>
</tr>
<?php
}
?>

</tbody>

</table>
</div>
<?php
$slectSumprice = new shopSacredObj();
$sql4slectSumprice = $slectSumprice->runQuery("SELECT SUM(b_price) FROM basket WHERE status_basket='wait' ");
$fetchDT = mysqli_fetch_assoc($sql4slectSumprice);
?>
<div class="text-right alert alert-primary p-2">

<h4 class="font-weight-bold m-0">💰 ยอดรวม : <text><input style="width: 10rem;"
class="text-success font-weight-bold alert-primary border-0 text-right" name="total_prod"
readonly type="text" value="<?php echo number_format($fetchDT['SUM(b_price)']) ;?>"></text>
บาท</h4>
</div>

<?php
$chkQtybasket = mysqli_num_rows($sql);
if($chkQtybasket > 0){
?>
<div class="d-flex justify-content-end">
<button id="confirm" class="btn btn-success d-flex align-items-center" type="submit" name="submitOrder">ยืนยันตะกร้าสินค้า <i data-feather="check-square"></i></button>
</div>
<?php
}
?>

</form>
<?php
    
}else{
    echo"Can't SQL";
}
?>


<script>
$(document).ready(function() {
    $("#checkAll").on('click', function() {
        if (this.checked) {
            $(".checkboxId4del").each(function() {
                $(this).prop('checked', true);
            })

            $("#form_basket").attr('action', "include_for_m/chk_del_basket.php")
            $("#confirm").prop('hidden', true)

            $("#delBasket").prop('hidden', false)
            $("#delBasket").addClass('animate__animated animate__bounceIn')


        } else {
            $(".checkboxId4del").each(function() {
                $(this).prop('checked', false);
            })
            $("#form_basket").attr('action', "manager.php?m=m4_save_basket")
            $("#confirm").prop('hidden', false)

            $("#delBasket").removeClass('animate__animated animate__bounceIn')
            $("#delBasket").prop('hidden', true)
        }
    })
    $(".checkboxId4del").on('click', function() {
        if (this.checked) {

            $("#form_basket").attr('action', "include_for_m/chk_del_basket.php")
            $("#confirm").prop('hidden', true)

            $("#delBasket").prop('hidden', false)
            $("#delBasket").addClass('animate__animated animate__bounceIn')
        }
        $(this).each(function() {
            if ($(".checkboxId4del:checked").length == 0) {
                $("#delBasket").removeClass('animate__animated animate__bounceIn')
                $("#delBasket").prop('hidden', true)

                $("#form_basket").attr('action', "manager.php?m=m4_save_basket")
                $("#confirm").prop('hidden', false)
            }
        })

        if ($(".checkboxId4del:checked").length == $(".checkboxId4del").length) {
            $("#checkAll").prop('checked', true)

        } else {
            $("#checkAll").prop('checked', false)
        }

    })
});
</script>