<?php
require_once('../function.php');
$slUser = new DB_conn();

if(isset($_POST['statusDATA']) == "ok"){
    $user = $_POST['chkUser1'];
    $sql = $slUser->slUserReg($user);
    // echo"sddddd";
    if($sql){
        $row = mysqli_num_rows($sql);
        echo $row;
    }else{
        echo"Can't SQL";
    }
}
?>