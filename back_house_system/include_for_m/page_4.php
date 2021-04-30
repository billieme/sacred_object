<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jquery-->



<div class="alert alert-primary mb-5">
    <h3>หัวข้อ</h3>
    <text>เนื้อความ</text>

</div>

<div class="row">
    <div class="col-md-4 text-decoration-none mb-2">
        <a href="#" class="card p-5 bg-primary text-decoration-none" style="border: 5px solid white;">
            <h3 class="text-light p-0 m-0 text-center"><i style="font-size: 5rem;" class="fas fa-cash-register mb-2"></i><br> จัดการขายสินค้า</h3>
        </a>
    </div>
    <div class="col-md-4 text-decoration-none mb-2">
        <a href="manager.php?m=m3" class="card p-5 bg-warning text-decoration-none" style="border: 5px solid white;">
            <h3 class="text-light p-0 m-0 text-center"><i style="font-size: 5rem;" class="fas fa-cubes mb-2"></i><br> จัดการ Stock สินค้า</h3>
        </a>
    </div>
    <div id="test" class="col-md-4">
        <a href="#" class="card p-5 bg-success text-decoration-none" style="border: 5px solid white;">
            <script>
            $(document).ready(function() {
                
                    setInterval(function(){
                        $.ajax({
                        method: 'POST',
                        url: 'include_for_m/ajax_order.php',
                        data: {
                            value: "wait_process"
                        },
                        success:function(data){
                            $("#order").text(data)
                            
                        }
                    })
                    },500)
                    


                


            })
            </script>

            <h3 class="text-light p-0 m-0 text-center"><i style="font-size: 5rem;" class="fas fa-clipboard-list mb-2"></i><br> ออร์เดอร์ใหม่ <span
                    class="badge-pill badge-danger" id="order"></span></h3>
        </a>
    </div>
</div>


<!-- //!#################################################### -->
