<div class="card">
    <div class="card-header bg-success text-light">
    <h3 class="text-center"><i class="fas fa-clipboard-list"></i> อนุมัติการสั่งซื้อวัตถุมงคล</h3>
    </div>
    <div class="card-body">
                <table class="w-100 table table-striped pb-3" id="myTable">
                        <thead class="text-nowrap">
                    
                                <th>ชื่อ-นามสุกล</th>
                                <th>วันที่สั่ง</th>
                                <th>ยอดรวม</th>
                                <th>ข้อมูล</th>

            
                        </thead>
                        <tbody class="text-nowrap">
                        <?php
                            $pdo = new connect_db();
                            $sql = $pdo->runQuery('SELECT * FROM save_basket WHERE status_pay=:wait Order by id_save_basket ');
                            $sql->execute(['wait' =>'wait_process']);
                            while($post1 = $sql->fetch()){
                            
                        ?>
                            <tr>
                                <td>
                                    <?php
                                         if($post1){
                                            $sql_user = $pdo->runQuery('SELECT * FROM user WHERE id=:id_user ');
                                            $sql_user->execute(['id_user' => $post1->id_user]);
                                            $post_user = $sql_user->fetch();
                                            echo $post_user->title_name." ".$post_user->first_name." ".$post_user->last_name;
                                            
                                        }
                                    ?>
                                </td>
                                <td><?php echo $post1->date_time ?></td>
                                <td><?php echo number_format($post1->total_prod);  ?></td>
                                
                                <td>
                                        <a href="manager.php?m=m4_veiw_order_come&id4_save_basket=<?php echo $post1->id_save_basket ?>" class="btn btn-primary w-100"><i class="far fa-eye"></i> ดูข้อมูล</button>
                                </td>
                                        
                                
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                </table>
    </div>

    
</div> 