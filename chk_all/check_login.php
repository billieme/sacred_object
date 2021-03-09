<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script><!--jquery-->
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
        
        $res = $login_f->login_form($user, $pasw); 
        $num = mysqli_fetch_array($res);


        if($num > 0){
            $_SESSION['id'] = $num['id'];
            $_SESSION['name'] = $num['first_name'];
            $_SESSION['lname'] = $num['last_name'];
            $_SESSION['user_level'] = $num['user_level'];
            $_SESSION['r_s'] = $num['register_status'];
            
            if($_SESSION['r_s'] == "pass"){
                
                if($_SESSION['user_level']=="p"){
                    ?>
                        <script>
                    $(document).ready(function(){
                        
                            Swal.fire({
                            icon: 'success',
                            title: 'รหัสผ่านถูกต้อง',
                            showConfirmButton: false,
                            timer: 2500
                            }).then(function(){ 
                                window.location.href = '../index.php?p=home';
                            });
                        
                    });


                </script>

                <?php
                }
                
                if($_SESSION['user_level']=="a"){
                    ?>
                    <script>
                    $(document).ready(function(){
                        
                            Swal.fire({
                            icon: 'success',
                            title: 'รหัสผ่านถูกต้อง',
                            text: 'ยินดีต้อนรับคุณ (เจ้าหน้าที่)',
                            showConfirmButton: false,
                            timer: 2500
                            }).then(function(){ 
                                window.location.href = '../back_house_system/manager.php?m=m1';
                            });
                        
                    });
                </script>

                <?php
                }
                if($_SESSION['user_level']=="ma"){
                    ?>
                    <script>
                    $(document).ready(function(){
                        
                            Swal.fire({
                            icon: 'success',
                            title: 'รหัสผ่านถูกต้อง',
                            text: 'ยินดีต้อนรับคุณ (ผู้บริหาร)',
                            showConfirmButton: false,
                            timer: 2500
                            }).then(function(){ 
                                window.location.href = '../back_house_system/executive.php';
                            });
                        
                    });
                </script>

                <?php
                }



            }//TODO: ของถ้ายังไม่ผ่านออนุมัติ Reg
            
            if($_SESSION['r_s'] == "wait"){
                ?>
                <script>
                $(document).ready(function(){
                    
                        Swal.fire({
                        icon: 'success',
                        title: 'รหัสผ่านของท่านยังใช้งานไม่ได้',
                        text: 'โปรดรอการอนนุมัติการสมัครสมาชิก',
                        showConfirmButton: false,
                        timer: 3500
                        }).then(function(){ 
                            window.location.href = '../index.php?p=home';
                        });
                    
                });
            </script>

            <?php   
            }

            }else{
                ?>
                <script>
                $(document).ready(function(){
                    
                        Swal.fire({
                        icon: 'error',
                        title: 'โปรดลองอีกครั้ง !',
                        text: 'Username หรือ Password ไม่ถูกต้อง',
                        showConfirmButton: false,
                        timer: 2500
                        }).then(function(){ 
                            window.location.href = '../index.php?p=home';
                        });
                    
                });
            </script>

            <?php   
            }

        
        

    } //! ของ num > 0

?>
