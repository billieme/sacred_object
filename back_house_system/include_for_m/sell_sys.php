<?php
    $pdo4ThisP = new connect_db();
    
?>
<div class="card">
    <div class="card-header bg-primary text-light">
        <h3 class="text-center"><i class="fas fa-list-alt"></i> รายการการเช่าวัตถุมงคลทั้งหมด</h3>
    </div>

    <div class="card-body">
        <table class="w-100 table table-hover" id="myTable">
            <thead class="text-nowrap alert-primary">
                <tr>

                    <th>#</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>วันที่/เวลาดำเนินการ</th>
                    <th>ราคารวม</th>
                    <th class="text-center">ข้อมูล</th>
                </tr>
            </thead>

            <tbody class="text-nowrap">
                <?php
            $sl_list_success = $pdo4ThisP->runQuery('SELECT * from save_basket Where status_pay=:s1 order by id_save_basket DESC');
            $sl_list_success->execute(['s1' => 'approved']);
            $i = 1;
            while($post = $sl_list_success->fetch()){
        ?>
                <tr>
                    <td><?=$i;?></td>
                    <td>
                        <?php
            
                        
                            $sl_user = $pdo4ThisP->runQuery('SELECT * from user where id=:id_user');
                            $sl_user->execute(['id_user' => $post->id_user]);
                            $post_user = $sl_user->fetch();
                            if($post_user->user_level == "a"){
                                ?>
                        <div class="badge badge-success">เช่าบูชาที่ซุ้มพระ</div>
    </div>
    <?php
                                    echo $post->name_cus;
                            }else{
                                ?>
    <div class="badge badge-warning">เช่าบูชาออนไลน์</div>
</div>
<?php
                                echo $post_user->title_name." ".$post_user->first_name." ".$post_user->last_name;
                            }
                            
                        
                    ?>
</td>
<td><?php echo $post->date_time;?></td>
<td><?php echo $post->total_prod ;?></td>
<td>
    <a href="manager.php?m=m4_veiw_order_come&id4_save_basket=<?php echo $post->id_save_basket; ?>"
        class="btn btn-primary"><i class="far fa-eye"></i> ดูรายละเอียด</a>
    <a href="manager.php?m=m4_sell_sys&chkswal&id=<?php echo $post->id_save_basket; ?>"
        class="btn btn-warning">ยกเลิก</a>
</td>
</tr>
<?php
            $i++;
            }
            ?>
</tbody>
</table>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="../sweetalert/sweetalert2.all.min.js"></script>


<Script>
$(document).ready(() => {
    <?php
                if (isset($_GET['chkswal'])) {
                    ?>
    Swal.fire({
        title: 'ต้องการยกเลิกหรือไม่?',
        text: "คุณต้องการยกเลิกการทำรายการหรือไม่!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ต้องการ!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href='../chk_all/chk_cancel_order.php?id_cancel=<?=$_GET['id']; ?>&cancel=go&admin';
        }else{
            window.location.href='manager.php?m=m4_sell_sys';
        }
    })
    <?php
                }
            ?>
})
</Script>
