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
            while($post = $sl_list_success->fetch()){
        ?>
            <tr>
                <td>
                    <?php
                        $sl_user = $pdo4ThisP->runQuery('SELECT * from user where id=:id_user');
                        $sl_user->execute(['id_user' => $post->id_user]);
                        $post_user = $sl_user->fetch();
                        echo $post_user->title_name." ".$post_user->first_name." ".$post_user->last_name;
                    ?>
                </td>
                <td><?php echo $post->date_time;?></td>
                <td><?php echo $post->total_prod ;?></td>
                <td>
                    <a href="manager.php?m=m4_veiw_order_come&id4_save_basket=<?php echo $post->id_save_basket; ?>" class="btn btn-primary w-100"><i class="far fa-eye"></i> ดูรายละเอียด</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>
</div>