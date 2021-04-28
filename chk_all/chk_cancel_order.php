

<?php
include_once('../function.php');
if(isset($_GET['cancel'])=="go"){
    $sql4thispage = new shopSacredObj();
    $cancel_order = $sql4thispage->runQuery("UPDATE save_basket SET status_pay='cancel_order' WHERE id_save_basket='$_GET[id_cancel]' ");
                            if($cancel_order){
                                ?>
                                    <script>
                                        window.location.href='../index.php?p=basket';
                                    </script>
                                <?php
                            }
}

?>