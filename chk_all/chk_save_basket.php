<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jquery-->
<script src="../sweetalert/sweetalert2.all.min.js"></script>

<?php
    session_start();
    include_once('../function.php');
    $selectBasket = new shopSacredObj();

?>
<?php
    if(isset($_POST['submit'])){
        $id4basket = implode(", ",$_POST['id4basket']); //! data
        $sql4SLBasket = $selectBasket->runQuery("SELECT id_product FROM basket WHERE id_basket IN($id4basket)");
        $id_product['id_prod']=[];
        while($fetch4insert = mysqli_fetch_array($sql4SLBasket)){
            array_push($id_product['id_prod'], $fetch4insert['id_product']);
        }
        $newData_id_prod = implode(", ", $id_product['id_prod']); //!data
        $p_number = $_POST['p_number']; //!data
        $address4send = $_POST['address4send']; //!data

        $sqlInsert = $selectBasket->runQuery("INSERT INTO save_basket(`id_user`, `id_basket`, `id_product`, `phone_number`, `address_for_send`) VALUE (
            '$_SESSION[id]',
            '$id4basket',
            '$newData_id_prod',
            '$p_number',
            '$address4send'
        )");
        
        if($sqlInsert){
            $clearBasket = $selectBasket->runQuery("UPDATE basket SET status_basket='order' WHERE id_basket IN($id4basket) ");
            if($clearBasket){
                ?>
<script>
            $(document).ready(function() {

                Swal.fire({
                    icon: 'success',
                    title: 'Order Success',
                    text: 'สั่งเช่าวัตถุมงคลเรียบร้อยแล้ว โปรดดำเนินการโอนเงินและแจ้งสลิป',
                    showConfirmButton: false,
                    timer: 3500
                }).then(function() {
                    window.location.href='../index.php?p=basket';
                });

            });
</script>
<?php
            }
        }else{
            echo"Can't SQL";
            
        }
    }else{
        header("Location: ../index.php");
    }
?>