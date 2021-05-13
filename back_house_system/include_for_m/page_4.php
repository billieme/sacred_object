<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jquery-->
<script src="../sweetalert/sweetalert2.all.min.js"></script>



<div class="alert alert-primary mb-5">
    <h3>📢 คำชี้แจงสำหรับเจ้าหน้าที่ และ ผู้ขาย</h3>
    <hr>
    <text class="text-danger font-weight-bold mr-1">*</text><text>หัวข้อ วัตถุมงคลใกล้หมด จะแสดงตัวเลขจำนวนวัตถุมงคลแต่ละชนิดที่เหลือน้อยกว่า 5 ชิ้นใน Stock สินค้า</text><br>
    <text class="text-danger font-weight-bold mr-1">*</text><text>หัวข้อ ออร์เดอร์ใหม่ เป็นระบบแจ้งเตือนแบบ Realtime
        ระบบจะแสดงเลขจำนวนผู้สั่งซื้อวัตถุมงคล ไม่จำเป็นต้อง Reload หน้าเว็บ
        โปรดเปิดหน้านี้ทิ้งไว้เพื่อดูการสั่งซื้อวัตถุมงคลที่เข้ามาใหม่</text>

</div>

 <div class="w-100 mb-5">
    <a href="manager.php?m=m4_sell_sacred_obj" class=" p-4 btn btn-warning font-weight-bold " style="border: 3px solid white;"><h4>ทำรายการขายวัตถุมงคล <i class="fas fa-cart-arrow-down"></i></h4></a> 
 </div>







<div class="row">
    <div class="col-md-4 text-decoration-none mb-2">
        <a href="manager.php?m=m4_sell_sys" class="card p-5 bg-primary text-decoration-none"
            style="border: 5px solid white;">
            <script>
                $(document).ready(()=>{
                    
                    setInterval(()=>{
                        $.ajax({
                            method: 'GET',
                            url: 'include_for_m/api_ajax_list_sell_all.php',
                            dataType: 'json',
                            success:function(data_api_sell_all){
                                $("#api_sell_all").text(data_api_sell_all.msg)
                            }
                        })
                    }, 500)
                })
            </script>
            <h3 class="text-light p-0 m-0 text-center"><i style="font-size: 5rem;"
                    class="fas fa-cash-register mb-2"></i><br> ขายแล้วทั้งหมด <span class="badge-pill badge-danger ml-1"
                    id="api_sell_all"></span></h3>
        </a>
    </div>
    <div class="col-md-4 text-decoration-none mb-2">

        <a href="manager.php?m=m3" class="card p-5 text-decoration-none"
            style="background-color: rgb(134, 77, 3); border: 5px solid white;">
            <script>
            $(document).ready(() => {
                setInterval(() => {
                    $.ajax({
                        method: 'POST',
                        url: 'include_for_m/ajax_product_low.php',
                        success: function(data_p_r) {
                            $("#request_p_r").text(data_p_r)
                        }
                    })
                }, 500)
            })
            </script>

            <h3 class="text-light p-0 m-0 text-center"><i style="font-size: 5rem;"
                    class="fas fa-cubes mb-2"></i><br>วัตถุมงคลใกล้หมด<span class="badge-pill pl-2 badge-danger ml-1"
                    id="request_p_r"></span></h3>
        </a>
    </div>
    <div id="test" class="col-md-4">
        <a href="manager.php?m=m4_order_come" class="card p-5 bg-success text-decoration-none"
            style="border: 5px solid white;">
            <?php
                $sqlThisP = new connect_db();
                $sql = $sqlThisP->runQuery("SELECT count(id_save_basket) FROM save_basket WHERE status_pay=:value");
                $sql->execute(['value' => 'wait_process']);
                $post = $sql->fetch(PDO::FETCH_ASSOC);
                ?>
                <input type="number" name="" id="a" hidden="true" value="<?php echo$post['count(id_save_basket)'] ; ?>">
            
            <script>
            $(document).ready(function() {
                
                let a = $("#a").val()
                setInterval(function() {
                    $.ajax({
                        method: 'GET',
                        url: 'include_for_m/ajax_order.php',
                        data: {
                            value: "wait_process",
                            a:a
                        },
                        dataType: 'json',
                        success: function(data) {
                            $("#order").text(data.msg)
                            if(data.status_noti == "1"){
                                Swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            text: 'แจ้งเตือน : Order ใหม่จากลูกค้า',
                                            showConfirmButton: false,
                                            timer: 5500,
                                            timerProgressBar: true  
                                    })
                            }
                            a = data.msg
                        }
                    })
                }, 500)






            })
            </script>

            <h3 class="text-light p-0 m-0 text-center"><i style="font-size: 5rem;"
                    class="fas fa-clipboard-list mb-2"></i><br> ออร์เดอร์ใหม่ <span class="badge-pill badge-danger"
                    id="order"></span></h3>
        </a>
    </div>
</div>


<!-- //!#################################################### -->

