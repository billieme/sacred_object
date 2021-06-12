<div class="card">
<div class="card-header bg-primary text-light">
    <h3><i class="fas fa-users-cog"></i> กำหนดสิทธิ์ในการเข้าใช้งาน</h3>
</div>
<div class="card-body">
    <?php
        $slect4page = new connect_db();

        $sl_user = $slect4page->runQuery("SELECT * FROM user ORDER BY id DESC");
        $sl_user->execute();
        
        $i = 1;
        ?>
        <table class="min-vw-100 table table-striped pl-0 pr-0 pb-3 pt-0" id="myTable">
                <thead class="text-center text-nowrap">
                    <tr id="bg_hd_table_m">
                    <th scope="col">ลำดับ</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">จัดการสิทธิ์การใช้งาน</th>
                    </tr>
                </thead>
                <tbody class="text-center text-nowrap">


                <?php
                $n=1;
                while($num = $sl_user->fetch(PDO::FETCH_ASSOC))
                {
                    $pass = md5($num['password']);
                ?>
                    <tr class="">
                    <th scope="row"><?php $num['id']; echo $n;?></th>
                    <td><?php echo $num['username']; ?></td>
                    <td><?php echo $pass; ?></td>
                    <td><?php echo $num['first_name']; ?></td>
                    <td><?php echo $num['last_name']; ?></td>
                    <td><?php echo $num['email']; ?></td>
                    <td class="text-center">
                        <?php
                            if($num['register_status'] == "wait"){
                                ?>
                                
                            <a href="manager.php?m=m1&appv_pass_id=<?php echo $num['id']; ?>" class="btn btn-success w-100 ">อนุมัติ</a>
                            <?php
                            }
                            if($num['register_status'] == "pass" && $num['user_level'] == "sp_@" ){
                                ?>
                            <div  style="cursor:no-drop;"  class="btn btn-success w-100">ผู้ดูแลระบบ</div>
                                
                            <?php
                            }
                            if($num['register_status'] == "pass" && $num['user_level'] == "p" ){
                                ?>
                            <a href="super_admin.php?m=2&id=<?=$num['id']?>"  class="btn btn-warning w-100">ผู้ใช้งานทั่วไป</a>
                                
                            <?php
                            }
                            if($num['user_level'] == "a"){
                                ?>
                            <a href="super_admin.php?m=2&id=<?=$num['id']?>"  class="btn btn-primary w-100">เจ้าหน้าที่</a>
                                
                            <?php
                            }
                            if($num['user_level'] == "ma"){
                                ?>
                            <a href="super_admin.php?m=2&id=<?=$num['id']?>" class="btn btn-primary w-100">ผู้บริหาร</a>
                                
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