<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jquery-->
<script src="../../sweetalert/sweetalert2.all.min.js"></script>



<?php

require_once('../../func4pdo/connect.php');

if(isset($_POST['subInsert'])){
        $pdo_ins = new connect_db();

        $name_bank = $_POST['name_bank'];
        $name_account = $_POST['name_account'];
        $number_bank = $_POST['number_bank'];
        
        $parame = array(
            "name_bank" => $name_bank,
            "name_account" => $name_account,
            "number_bank" => $number_bank
        );

        $sql_ins = $pdo_ins->runQuery("INSERT into `transfer`(`name_bank`, `name_account`, `number_bank`) value (:name_bank, :name_account, :number_bank) ");
        $sql_ins->execute($parame);

        if($sql_ins){
            ?>
<script>
$(document).ready(() => {

    Swal.fire({
        icon: 'success',
        text: 'บันทึกข้อมูลเรียบร้อยแล้ว',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    }).then(() => {
        window.location.href = '../manager.php?m=transfer';
    })
})
</script>
<?php
        }
        
        
    }
    if(isset($_POST['subEdit'])){
        $pdo_edit = new connect_db();

        $name_bank = $_POST['name_bank'];
        $name_account = $_POST['name_account'];
        $number_bank = $_POST['number_bank'];
        $id4edit = $_POST['id4edit'];
        
        $parame = array(
            "name_bank" => $name_bank,
            "name_account" => $name_account,
            "number_bank" => $number_bank,
            "id4edit" => $id4edit
        );
        
        $sql_edit = $pdo_edit->runQuery("UPDATE `transfer` set `name_bank`=:name_bank, `name_account`=:name_account, `number_bank`=:number_bank where `id`=:id4edit ");
        $sql_edit->execute($parame);

        if($sql_edit){
            ?>
<script>
$(document).ready(() => {

    Swal.fire({
        icon: 'success',
        text: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    }).then(() => {
        window.location.href = '../manager.php?m=transfer';
    })
})
</script>
<?php
        }
    }
    if(isset($_GET['id4del'])){
        $pdo_del = new connect_db();
        $id4del = $_GET['id4del'];
        
        $parame = array(
            "id4del" => $id4del
        );
        
        $sql_del = $pdo_del->runQuery("DELETE from `transfer` where id=:id4del ");
        $sql_del->execute($parame);
        
        if($sql_del){
            ?>
<script>
$(document).ready(() => {

    Swal.fire({
        icon: 'success',
        text: 'ลบข้อมูลเรียบร้อยแล้ว',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    }).then(() => {
        window.location.href = '../manager.php?m=transfer';
    })
})
</script>
<?php
        }
    }
?>