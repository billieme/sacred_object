<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


<?php
    $user_select = new DB_conn();


    


    if(isset($_GET['appv_pass_id'])){
        $id1=$_GET['appv_pass_id'];
        $appvP = $user_select->appv_pass($id1);
        if($appvP){
            echo"<script>";
                echo "setTimeout(function () { 
                    swal({
                    title: 'อนุมัติการใช้งาน User เรียบร้อย',
                    type: 'success',
                    confirmButtonText: 'OK'
                    },
                    function(isConfirm){
                    if (isConfirm) {
                        window.location.href = 'manager.php?m=m1';
                    }
                    }); }, 0);";
                
            
                echo"</script>";
        }

    }
    if(isset($_GET['appv_wait_id'])){
        $id2=$_GET['appv_wait_id'];
        $appvW = $user_select->appv_wait($id2);
        if($appvW){
            echo"<script>";
                echo "setTimeout(function () { 
                    swal({
                    title: 'ระงับการใช้งาน User เรียบร้อย',
                    type: 'success',
                    confirmButtonText: 'OK'
                    },
                    function(isConfirm){
                    if (isConfirm) {
                        window.location.href = 'manager.php?m=m1';
                    }
                    }); }, 0);";
                
            
                echo"</script>";
        }

    }

    


?>



<div class="card">
    <div class="card-header" id="bg_hd_card_m1">
        <h3 class="text-center"><b> <i class="fas fa-user-check"></i> ตารางระงับ - อนุมัติการใช้งานสมาชิก</b></h3>
    </div>
    <div class="card-body bg-light">
                
                <table class="min-vw-100 table table-striped pl-0 pr-0 pb-3 pt-0" id="myTable">
                <thead class="text-center text-nowrap">
                    <tr id="bg_hd_table_m">
                    <th scope="col">ลำดับ</th>
                    <th scope="col">Username</th>
                    <th scope="col">Name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">จัดการแก้ไขสมาชิก</th>
                    </tr>
                </thead>
                <tbody class="text-center text-nowrap">


                <?php
                $n=1;
                $res = $user_select->slU_m1();
                while($num = mysqli_fetch_array($res))
                {
                ?>
                    <tr class="">
                    <th scope="row"><?php $num['id']; echo $n;?></th>
                    <td><?php echo $num['username']; ?></td>
                    <td><?php echo $num['first_name']; ?></td>
                    <td><?php echo $num['last_name']; ?></td>
                    <td><?php echo $num['email']; ?></td>
                    <td class="text-center">
                        <?php
                            if($num['register_status'] == "wait"){
                                ?>
                                
                            <a href="manager.php?m=m1&appv_pass_id=<?php echo $num['id']; ?>" class="btn btn-warning w-50 font-weight-bold" title="คลิกเพื่ออนุมัติการใช้งานสมาชิก">ลูกค้า (ถูกระงับการใช้งาน)</a>
                            <?php
                            }
                            if($num['register_status'] == "pass" && $num['user_level'] == "people" ){
                                ?>
                            <a href="manager.php?m=m1&appv_wait_id=<?php echo $num['id']; ?>" class="btn btn-success w-50 font-weight-bold" title="คลิกเพื่อระงับการใช้งาน">ลูกค้า</a>
                                
                            <?php
                            }
                            

                        ?>
                        
                        
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








