<div class="card">

    <div class="card-header bg-danger text-light">
        <h3 class="text-center"><i class="fas fa-file-invoice-dollar"></i> ออร์เดอร์ลูกค้าที่ยังไม่ชำระเงิน</h3>
    </div>

    <div class="card-body">
        <table class="w-100 table table-striped pb-3" id="myTable">
            <thead class="text-nowrap">
                <th>#</th>
                <th>ชื่อ-นามสุกล</th>
                <th>วันเวลาที่สั่ง</th>
                <th>ยอดรวม/บาท</th>
                <th class="">ข้อมูล</th>
            </thead>

            <tbody class="text-nowrap">
                <?php
                    $pdo4thisP = new newpdo();
                    $timeTH = new DB_conn();
                    $sql_sl4savebasket = $pdo4thisP->runQuery("SELECT * from save_basket where status_pay!=:status_pay order by id_save_basket");
                    $sql_sl4savebasket->execute(['status_pay'=>"approved"]);
                    $x=1;
                   while($post_sl4savebasket = $sql_sl4savebasket->fetch(PDO::FETCH_ASSOC)) {
                       $time = $post_sl4savebasket['date_time'];
                       ?>
                <tr>
                    <td><?php echo $x;?></td>
                    <td>
                        <?php
                        $sql_user = $pdo4thisP->runQuery("SELECT * from user where id=:id");
                        $sql_user->execute(['id'=>$post_sl4savebasket['id_user']]);
                        $post_user = $sql_user->fetch(PDO::FETCH_ASSOC);
                    ?>
                        <?php echo $post_user['first_name']." ".$post_user['last_name']; ?>
                    </td>
                    <td>
                        <?php
                            echo $timeTH->thai_date_and_time(strtotime($time));
                        ?>
                    </td>
                    <td>
                        <?php
                            echo number_format($post_sl4savebasket['total_prod']) ;
                        ?>
                    </td>
                    <td>
                        <a href="manager.php?m=m4_order_notpay_veiw&id4_save_basket=<?php echo $post_sl4savebasket['id_save_basket']; ?>"
                            class="btn btn-primary"><i class="far fa-eye"></i> ดูข้อมูล</button>
                            <a href="manager.php?m=m4_order_notpay&id=<?php echo $post_sl4savebasket['id_save_basket']; ?>&del=request"
                                class="btn btn-danger ml-2"><i class="fas fa-trash-alt"></i> ลบคำสั่งซื้อ</button>
                    </td>
                </tr>
                <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>

</div>


<!-- //! PROCESS -->
<!-- //! PROCESS -->
<!-- //! PROCESS -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

                    if(isset($_GET['del'])){
                        if($_GET['del'] == "request"){
                            ?>
<script>
$(document).ready(() => {
    Swal.fire({
        title: 'ต้องการลบคำสั่งซื้อหรือไม่?',
        text: "คุณต้องการลบคำสั่งซื้อนี้หรือไม่!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ต้องการลบ!',
        cancelButtonText: 'ไม่ต้องการ'
    }).then((result) => {
        if (result.isConfirmed) {

            window.location.href = "manager.php?m=m4_order_notpay&id=<?php echo $_GET['id']; ?>&del=ok";
        } else {
            window.location.href = "manager.php?m=m4_order_notpay";
        }
    })
})
</script>

<?php
                        }
                        if($_GET['del'] == "ok"){
                            $pdo4thisP = new newpdo();
                            $sql_del4savebasket = $pdo4thisP->runQuery("DELETE from save_basket where id_save_basket=:id_s_b");
                            $sql_del4savebasket->execute(['id_s_b' => $_GET['id']]);
                            
                            if($sql_del4savebasket){
                                ?>
<script>
$(document).ready(() => {
    Swal.fire({
        icon: 'success',
        title: 'ลบคำสั่งซื้อเรียบร้อยแล้ว',
        showConfirmButton: false,
        timer: 1500
    }).then(()=>{
        window.location.href = "manager.php?m=m4_order_notpay";
    })
})
</script>
<?php
                            }
                        }
                    }

?>