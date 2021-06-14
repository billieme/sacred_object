<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jquery-->
<script src="../sweetalert/sweetalert2.all.min.js"></script>


<?php
    session_start();
    require_once('../function.php');
    $condb = new DB_conn();
    $login_f = new DB_conn();

    if(!isset($_POST['submit'])){
        header("Location: ../index.php?p=home");
    }else{
        $user = $_POST['username'];
        $pasw = $_POST['password'];

        $passMD5 = md5($pasw);
        
        $res = $login_f->login_form($user, $passMD5); 
        $num = mysqli_fetch_array($res);


        if($num > 0){
            $_SESSION['id'] = $num['id'];
            $_SESSION['tname'] = $num['title_name'];
            $_SESSION['name'] = $num['first_name'];
            $_SESSION['lname'] = $num['last_name'];
            $_SESSION['pnumber'] = $num['phone_number'];
            $_SESSION['email'] = $num['email'];
            $_SESSION['user_level'] = $num['user_level'];
            $_SESSION['r_s'] = $num['register_status'];
            

            if(isset($_POST['savePass'])){
                setcookie("saveUser", $user, time() + (2592000 * 12), "/");
                setcookie("savePass", $pasw, time() + (2592000 * 12), "/");
            }elseif(!isset($_POST['savePass'])){
                setcookie("savePass", "", time() - (2592000 * 12), "/");
                setcookie("saveUser", "", time() - (2592000 * 12), "/");
            }

            if($_SESSION['r_s'] == "pass"){
                
                if($_SESSION['user_level']=="people"){
                    ?>
<script>
$(document).ready(function() {

    Swal.fire({
        icon: 'success',
        title: 'รหัสผ่านถูกต้อง',
        showConfirmButton: false,
        timer: 2500
    }).then(function() {
        window.location.href='../index.php';
    });

});
</script>

<?php
                }
                if($_SESSION['user_level']=="super@dmin"){
                    ?>
<script>
$(document).ready(function() {

    Swal.fire({
        icon: 'success',
        title: 'รหัสผ่านถูกต้อง',
        text: 'ยินดีต้อนรับคุณ (ผู้ดูแลระบบ)',
        showConfirmButton: false,
        timer: 2500
    }).then(function() {
        window.location.href = '../back_house_system/super_admin.php?m=1';
    });

});
</script>

<?php
                }
                
                if($_SESSION['user_level']=="admin"){
                    ?>
<script>
$(document).ready(function() {

    Swal.fire({
        icon: 'success',
        title: 'รหัสผ่านถูกต้อง',
        text: 'ยินดีต้อนรับคุณ (เจ้าหน้าที่)',
        showConfirmButton: false,
        timer: 2500
    }).then(function() {
        window.location.href = '../back_house_system/manager.php?m=m1';
    });

});
</script>

<?php
                }
                if($_SESSION['user_level']=="manager"){
                    ?>
<script>
$(document).ready(function() {

    Swal.fire({
        icon: 'success',
        title: 'รหัสผ่านถูกต้อง',
        text: 'ยินดีต้อนรับคุณ (ผู้บริหาร)',
        showConfirmButton: false,
        timer: 2500
    }).then(function() {
        window.location.href = '../back_house_system/executive.php?m=report_prod';
    });

});
</script>

<?php
                }



            }//TODO: ของถ้ายังไม่ผ่านออนุมัติ Reg
            
            if($_SESSION['r_s'] == "wait"){
                ?>
<script>
$(document).ready(function() {

    Swal.fire({
        icon: 'success',
        title: 'รหัสผ่านของท่านยังใช้งานไม่ได้',
        text: 'โปรดรอการอนนุมัติการสมัครสมาชิก',
        showConfirmButton: false,
        timer: 3500
    }).then(function() {

        window.location.href = 'chk_logout.php?logout=wait';

    });

});
</script>

<?php   
            }

            }else{
                ?>
<script>
$(document).ready(function() {

    Swal.fire({
        icon: 'error',
        title: 'โปรดลองอีกครั้ง !',
        text: 'Username หรือ Password ไม่ถูกต้อง',
        showConfirmButton: false,
        timer: 2500
    }).then(function() {
        window.location.href = '../index.php?p=home';
    });

});
</script>

<?php   
            }

        
        

    } //! ของ num > 0

?>