<?php
    require_once('../function.php');
    $logout_f = new DB_conn();


    if (isset($_GET['logout'])=="m") {
        $logout_f->logout_form();
        header("Location: ../index.php?p=home");
    }else{
        header("Location: ../index.php?p=home");
    }


    if (isset($_POST['submit'])) {
        $logout_f->logout_form();
        header("Location: ../index.php?p=home");
    }else{
        header("Location: ../index.php?p=home");
    }

?>