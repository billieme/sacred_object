<div class="card">

    <div class="card-header bg-primary text-light">
        <h3><i class="fas fa-users-cog"></i> กำหนดสิทธิ์ในการเข้าใช้งาน</h3>
    </div>
    <div class="card-body">
        <div class="alert alert-success" id="edit_user_tb">
            <h4 class="font-weight-bold"><u>ข้อมูลผู้ใช้งาน</u></h4>
            <?php
        $slect4page = new connect_db();

        $sl_user = $slect4page->runQuery("SELECT * FROM user  where id=:id ");
        $sl_user->execute(["id" => $_GET['id']]);
        
        $i = 1;
        ?>
            <table class="w-100 table table-striped pl-0 pr-0 pb-3 pt-0">
                <thead class="text-center text-nowrap">
                    <tr id="bg_hd_table_m">
                        <th scope="col">ลำดับ</th>
                        <th scope="col">Username</th>
                        <th scope="col">Name</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">สิทธิ์การใช้งานปัจจุบัน</th>
                    </tr>
                </thead>
                <tbody class="text-center text-nowrap">


                    <?php
                $n=1;
                while($num = $sl_user->fetch(PDO::FETCH_ASSOC))
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

                            <div class="btn btn-success w-100 ">อนุมัติ</div>
                            <?php
                            }
                            if($num['register_status'] == "pass" && $num['user_level'] == "super@dmin" ){
                                ?>
                            <div class="btn btn-success w-100">ผู้ดูแลระบบ</div>

                            <?php
                            }
                            if($num['register_status'] == "pass" && $num['user_level'] == "people" ){
                                ?>
                            <div class="btn btn-warning w-100">ผู้ใช้งานทั่วไป</div>

                            <?php
                            }
                            if($num['user_level'] == "admin"){
                                ?>
                            <div class="btn btn-primary w-100">เจ้าหน้าที่</div>

                            <?php
                            }
                            if($num['user_level'] == "manager"){
                                ?>
                            <div class="btn btn-primary w-100">ผู้บริหาร</div>

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

        </div><!-- alert succ -->

        <div class="alert alert-info">
            <h4 class="font-weight-bold"><u>กำหนดสิทธิ์ในการเข้าใช้งานใหม่</u></h4>
            <form action="super_admin.php?m=2&id=<?=$_GET['id'];?>" method="post">

                <div class="row">
                    <div class="col-md-5 mb-2">
                        <select class="form-control" name="x" id="">
                            <option selected value="empty">
                                <--- โปรดเลือกสิทธิ์ในการเข้าใช้งาน --->
                            </option>
                            <option value="admin">เจ้าหน้าที่</option>
                            <option value="manager">ผู้บริหาร</option>
                            <option value="people">ผู้ใช้งานทั่วไป</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <button type="submit" name="submit" class="btn btn-success ">บันทึก</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>

<?php
    if(isset($_POST['submit'])){
   
        if($_POST['x'] =="empty"){
            ?>
<script>
Swal.fire({
    icon: 'error',
    text: 'โปรดเลือกสิทธิ์ในการเข้าใช้งาน',
    timer: 3000,
    showConfirmButton: false,
    timerProgressBar: true

})
</script>
<?php
        }else{
            $upd_user = $slect4page->runQuery("UPDATE user set `user_level`=:user_level where `id`=:id ");
            $parame= array(
                "user_level" => $_POST['x'],
                "id" => $_GET['id']
            );
            $upd_user->execute($parame);

            if($upd_user){
                ?>
<script>
Swal.fire({
    icon: 'success',
    text: 'กำหนดสิทธิ์ในการเข้าใช้งานใหม่เรียบร้อยแล้ว',
    timer: 3000,
    showConfirmButton: false,
    timerProgressBar: true
}).then(()=>{
    window.location.href='super_admin.php?m=1'
})
</script>
<?php
            }
        }
    }
?>