<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jquery-->
<script src="../sweetalert/sweetalert2.all.min.js"></script>

<div class="card">
    <div class="card-header" id="bg_hd_card_m2">
        <h3 class="font-weight-bold text-center"><i class="fas fa-comments-dollar"></i> จัดการช่องทางการโอนเงิน</h3>
    </div>
    <div class="card-body">
        <?php
            if(!isset($_GET['id4edit'])){
        ?>
        <form action="include_for_m/api_transfer.php" method="post">

            <div class="row">
                <div class="col-md mb-3">
                    <label for="i1">ชื่อธนาคาร :</label>
                    <input class="form-control" type="text" name="name_bank" id="i1" placeholder="กรอกชื่อธนาคาร"
                        required>
                </div>
                <div class="col-md mb-3">
                    <label for="i2">ชื่อบัญชี :</label>
                    <input class="form-control" type="text" name="name_account" id="i2" placeholder="กรอกชื่อบัญชี"
                        required>
                </div>
                <div class="col-md mb-3">
                    <label for="i3">เลขที่บัญชี :</label>
                    <input class="form-control" type="text" name="number_bank" id="i3" placeholder="กรอกเลขที่บัญชี"
                        required>
                </div>

            </div>

            <div class="text-right">
                <button class="btn btn-success" id="subInsert" type="submit" name="subInsert">บันทึก</button>
            </div>

        </form>
        <?php
            // ! EDIT
            // ! EDIT
            // ! EDIT
            // ! EDIT
            }elseif(isset($_GET['id4edit'])){
                    $pdo_sl_edit = new connect_db();
                    $parame =array(
                        "id4edit" => $_GET['id4edit']
                    );
                    $sql_sl_edit = $pdo_sl_edit->runQuery("SELECT * from `transfer` where id = :id4edit ");
                    $sql_sl_edit->execute($parame);
                    $fetch_sl_edit = $sql_sl_edit->fetch();
                    
                ?>
        <a href="manager.php?m=transfer" class="btn btn-primary mb-3"><i data-feather="chevrons-left"></i> ย้อนกลับ</a>
        <form class="alert alert-warning" action="include_for_m/api_transfer.php" method="post">

            <div class="row">
                <div class="col-md mb-3">
                    <label for="i1">ชื่อธนาคาร :</label>
                    <input class="form-control" type="text" name="name_bank" id="i1" placeholder="กรอกชื่อธนาคาร"
                        required value="<?=$fetch_sl_edit->name_bank;?>">
                </div>
                <div class="col-md mb-3">
                    <label for="i2">ชื่อบัญชี :</label>
                    <input class="form-control" type="text" name="name_account" id="i2" placeholder="กรอกชื่อบัญชี"
                        required value="<?=$fetch_sl_edit->name_account;?>">
                </div>
                <div class="col-md mb-3">
                    <label for="i3">เลขที่บัญชี :</label>
                    <input class="form-control" type="text" name="number_bank" id="i3" placeholder="กรอกเลขที่บัญชี"
                        required value="<?=$fetch_sl_edit->number_bank;?>">
                </div>

            </div>

            <input type="text" name="id4edit" id="" value="<?=$fetch_sl_edit->id;?>" hidden="true">

            <div class="text-right">
                <button class="btn btn-warning" id="subInsert" type="submit"
                    name="subEdit">บันทึกการแก้ไขข้อมูล</button>
            </div>

        </form>
        <?php
            }
            ?>
    </div> <!-- close body -->
</div>

<div class="card mt-4">
    <div class="card-header alert-success">
        <h4>📒 บัญชีธนาคารทั้งหมด</้3>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover w-100" id="myTable">
            <thead class="text-nowrap">
                <tr>
                    <th>#</th>
                    <th>ชื่อธนาคาร</th>
                    <th>ชื่อบัญชี</th>
                    <th>เลขที่บัญชี</th>
                    <th>จัดการข้อมูล</th>
                </tr>
            </thead>
            <tbody class="text-nowrap">
                <?php
                    $i = 1;
                    $pdo_sl = new connect_db();
                    $sql_sl = $pdo_sl->runQuery("SELECT * from `transfer` order by id ");
                    $sql_sl->execute();
                    while($fetch_tb = $sql_sl->fetch()){

                        ?>
                <tr>
                    <td><?=$i;?></td>
                    <td><?=$fetch_tb->name_bank;?></td>
                    <td><?=$fetch_tb->name_account;?></td>
                    <td><?=$fetch_tb->number_bank;?></td>
                    <td>
                        <a href="manager.php?m=transfer&id4edit=<?=$fetch_tb->id;?>" class="btn btn-warning"><i
                                class="far fa-edit"></i> แก้ไข</button>
                            <a href="manager.php?m=transfer&chkdel&id4del=<?=$fetch_tb->id;?>" class="btn btn-danger ml-2"><i
                                    class="fas fa-trash-alt"></i> ลบ</a>
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

<?php
    if(isset($_GET['chkdel'])){
        ?>
<script>
$(document).ready(() => {
    Swal.fire({
        title: 'ต้องการลบหรือไม่?',
        text: "คุณต้องการลบข้อมูลหรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่ ต้องการลบ!',
        cancelButtonText: 'ไม่ต้องการ'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href='include_for_m/api_transfer.php?id4del=<?=$_GET['id4del'];?>';
        }else{
            window.location.href='manager.php?m=transfer';
        }
    })
})
</script>
<?php
    }
?>