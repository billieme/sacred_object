<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../sweetalert/sweetalert2.all.min.js"></script>


<?php
    require_once('../function.php');
    $connect_database = new DB_conn();
    $pd_sl = new DB_conn();
    $pd_slD = new DB_conn();
    $del = new DB_conn();



    
    if(isset($_GET['del']) == "chk"){
        //! del in folder
        ?>
        <script>
            $(document).ready(function(){
                Swal.fire({
                            title: 'คุณแน่ใจที่จะลบหรือไม่?',
                            text: "คุณต้องการลบสินค้าใช่หรือไม่!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'ไม่ต้องการ',
                            confirmButtonText: 'ตกลง'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                    window.location.href = 'manager.php?m=m3&statusDel=ok&del_id=<?php echo $_GET['del_id'];?>';
                            };
                    });
            });
            
        </script>
        
  
<?php
    } //! ปีกการับ isset GET chk
    if(isset($_GET['statusDel']) =="ok"){
        
        $idS = $_GET['del_id'];
        $path = "../image/product/";
        $resSFDinFol = $pd_slD->pdSlm3_d($idS);
        $numSFDinFol = mysqli_fetch_array($resSFDinFol);
        if($numSFDinFol){
            $nameold = $numSFDinFol['product_cover'];
            $file = $path.$nameold;
         
            $id = $_GET['del_id'];
            $delSucc = $del->delPd($id, $file);
        }
                                
        ?>
        <script>
            $(document).ready(function(){
                Swal.fire({
                            icon: 'success',
                            title: 'ลบสินค้าเรียบร้อยแล้ว',
                            showConfirmButton: false,
                            timer: 2500
                            }).then(function(){ 
                                window.location.href = 'manager.php?m=m3';
                            });
            });
        </script>
    <?php
    }
?>


<div class="d-flex justify-content-end mb-2">
    <a href="manager.php?m=m3_add" class="btn btn-primary">เพิ่มสินค้า <i class="fas fa-plus-square"></i></a>
</div>
<div class="card">
    <div class="card-header" id="bg_hd_card_m3">
        <h3 class="text-center"><b> <i class="fas fa-box-open"></i> ตรางจัดการสินค้า</b></h3>
    </div>
    <div class="card-body bg-light">
                
                    <table class="min-vw-100 table table-striped pb-3" id="myTable1">
                <thead class="min-vw-100">
                    <tr class="text-center" id="bg_hd_table_m">
                    <th scope="col">ลำดับ</th>
                    <th scope="col">รูปวัตถุมงคล</th>
                    <th scope="col">ชื่อวัตถุมงคล</th>
                    <th scope="col">ชนิดของวัตถุมงคล</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">คงเหลือ</th>
                    <th scope="col">วันที่เพิ่มสินค้า</th>
                    <th scope="col">จัดการ</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                        $res1 = $pd_sl->pdSlm3();
                        
                        $n=1;
                        while($num1 = mysqli_fetch_array($res1))
                           
                            
                        {

                        

                ?>

                
                    <tr class="text-center">
                    <th scope="row"><?php $num1['id_product']; echo $n;  ?></th>
                    <td>
                        <div class="divImageProduct">
                            <img src="../image/product/<?php echo $num1['product_cover'];?>" alt="">
                        </div>
                        
                    </td>
                    <td><?php echo $num1['product_name'];?></td>
                    <td><?php echo $num1['product_type'];?></td>
                    <td><?php echo $num1['product_price'];?></td>
                    <td><?php echo $num1['product_qty'];?></td>
                    <td><?php echo $num1['date_create'];?></td>
                    <td>
                        
                    <a href="manager.php?m=m3_edit&edit_id=<?php echo $num1['id_product']; ?>" class="btn btn-warning text-light">แก้ไข <i class="fas fa-edit"></i></a>
                    <a href="manager.php?m=m3&del=chk&del_id=<?php echo $num1['id_product']; ?>" class="btn btn-danger text-light">ลบ <i class="fas fa-trash-alt"></i></a>
                    </td>
                    </tr>
                    <?php
                    $n++;
                    }
                    ?>
                
                
                    
                </tbody>
                </table>

    </div>
</div>





<!-- function Data table ภาษาไทย--> 
<script type="text/javascript" charset="utf-8">
        $(document).ready( function () {
            $('#myTable1').DataTable({
                
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                    "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                    "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                    "sSearch": "ค้นหา :",
                    "aaSorting" :[[0,'desc']],
                    "oPaginate": {
                    "sFirst":    "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext":     "ถัดไป",
                    "sLast":     "หน้าสุดท้าย"
                    },
                },
                "scrollX": true 
            });
        } );

</script>


