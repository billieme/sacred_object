<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jquery-->



<div class="alert alert-primary mb-5">
    <h3>📢 คำชี้แจงสำหรับเจ้าหน้าที่ และ ผู้ขาย</h3>
    <hr>
    <text class="text-danger font-weight-bold mr-1">*</text><text>หัวข้อ ออร์เดอร์ เป็นระบบแจ้งเตือนแบบ Realtime
        ระบบจะแสดงเลขจำนวนผู้สั่งซื้อวัตถุมงคล ไม่จำเป็นต้อง Reload หน้าเว็บ
        โปรดเปิดหน้านี้ทิ้งไว้เพื่อดูการสั่งซื้อวัตถุมงคลที่เข้ามาใหม่</text>

</div>

<div class="row">
    <div class="col-md-4 text-decoration-none mb-2">
        <a href="manager.php?m=m4_sell_sys" class="card p-5 bg-primary text-decoration-none"
            style="border: 5px solid white;">
            <h3 class="text-light p-0 m-0 text-center"><i style="font-size: 5rem;"
                    class="fas fa-cash-register mb-2"></i><br> จัดการขายสินค้า</h3>
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
            <script>
            $(document).ready(function() {

                setInterval(function() {
                    $.ajax({
                        method: 'POST',
                        url: 'include_for_m/ajax_order.php',
                        data: {
                            value: "wait_process"
                        },
                        success: function(data) {
                            $("#order").text(data)

                        }
                    })
                }, 500)






            })
            </script>

            <h3 class="text-light p-0 m-0 text-center"><i style="font-size: 5rem;"
                    class="fas fa-clipboard-list mb-2"></i><br> ออร์เดอร์ <span class="badge-pill badge-danger"
                    id="order"></span></h3>
        </a>
    </div>
</div>


<!-- //!#################################################### -->