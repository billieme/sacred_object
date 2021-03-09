<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../sweetalert/sweetalert2.all.min.js"></script>

<?php
    $slN = new DB_conn();
    $del = new DB_conn();
    $news_select = new DB_conn();


    if(isset($_GET['del']) == "chk"){
            //! del in folder
?>
        <script>
            $(document).ready(function(){
                Swal.fire({
                            title: 'คุณแน่ใจที่จะลบหรือไม่?',
                            text: "คุณต้องการลบข่าวประชาสัมพันธ์ใช่หรือไม่!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'ไม่ต้องการ',
                            confirmButtonText: 'ต้องการ!'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                    window.location.href = 'manager.php?m=m2&statusDel=ok&del_id=<?php echo $_GET['del_id'];?>';
                            };
                    });
            });
            
        </script>
        
  
<?php
    } //! ปีกการับ isset GET chk
    

    if(isset($_GET['statusDel']) =="ok"){
        
                                            $idS = $_GET['del_id'];
                                            $path = "../image/news/";
                                            $resSFDinFol = $news_select->selNForEdit($idS);
                                            $numSFDinFol = mysqli_fetch_array($resSFDinFol);
                                            if($numSFDinFol){
                                                $nameold = $numSFDinFol['news_cover'];
                                                $file = $path.$nameold;

                                                $id = $_GET['del_id'];
                                                $delSucc = $del->delnews($id, $file);
                                            }
                                
        ?>
        <script>
            $(document).ready(function(){
                Swal.fire({
                            icon: 'success',
                            title: 'ลบข่าวประชาสัมพันธ์เรียบร้อยแล้ว',
                            showConfirmButton: false,
                            timer: 2500
                            }).then(function(){ 
                                window.location.href = 'manager.php?m=m2';
                            });
            });
        </script>
    <?php
    }
    ?>

<div class="d-flex justify-content-end mb-2"><a href="manager.php?m=m2_add" class = "btn btn-success">เพิ่มข่าวประชาสัมพันธ์ <i class="fas fa-plus-circle"></i></a></div>


<div class="card">
    <div class="card-header" id="bg_hd_card_m2">
        <h3 class="text-center"><b> <i class="fas fa-table"></i> ตรางจัดการข่าวประชาสัมพันธ์</b></h3>
    </div>
    <div class="card-body bg-light">

                 <table class="table table-striped w-100  pb-3" id="myTable">
                <thead>
                    <tr id="bg_hd_table_m">
                    <th scope="col">ลำดับ</th>
                    <th scope="col">รูปข่าวประชาสัมพันธ์</th>
                    <th scope="col">หัวข้อข่าว</th>
                    <th scope="col">สรุปหัวข้อข่าว</th>
                    <th scope="col">โพสต์โดย</th>
                    <th scope="col" class="text-center">จัดการข่าว</th>
                    </tr>
                </thead>
                <tbody>


                <?php
                $n=1;
                $res = $slN->slN_m2();
                while($num = mysqli_fetch_array($res))
                {
                ?>
                    <tr>
                    <th scope="row"><?php $num['id']; echo $n;?></th>
                    <td>
                        <div style="width:100px;">
                                    <img src="../image/news/<?php echo $num['news_cover']; ?>" class="card-img" title="รูปภาพข่าว">
                        </div>
                    </td>
                    <td><?php echo $num['news_title']; ?></td>
                    <td><?php echo $num['news_summary']; ?>.</td>
                    <td><?php echo $num['news_author']; ?></td>
                    <td class="text-center">

                    <a href="manager.php?m=m2_edit&edit_id=<?php echo $num['id']; ?>" class="btn btn-warning text-light">แก้ไข <i class="fas fa-edit"></i></a>
                    <a href="manager.php?m=m2&del=chk&del_id=<?php echo $num['id']; ?>" class="btn btn-danger text-light">ลบ <i class="fas fa-trash-alt"></i></a>

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
            $('#myTable').DataTable({
                
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



