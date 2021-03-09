<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script><!--jquery-->
<script src="../sweetalert/sweetalert2.all.min.js"></script>

<?php
    require_once('../function.php');
    $condb = new DB_conn();
    $reg = new DB_conn();
   


    if(isset($_POST['submit'])){

    

        $path = "../image/upload/"; //! ที่อยู่
        $tmp = explode('.', $_FILES['profile_img']['name']); //!แยกชื่อกับนามสกุลไฟล์
        $randomnum = rand(1,2000);
        $newnamef = round(microtime(true)).$randomnum.".".$tmp[1]; //! เชื่อมชื่อใหม่กับนามสกุล

        $moved = move_uploaded_file($_FILES['profile_img']['tmp_name'], $path.$newnamef);

        if($moved){

            $username = $_POST['username'];
            $password = $_POST['password'];
            $title_name = $_POST['title_name'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $profile_img = $newnamef;


            $inserted = $reg->register_form($username, $password, $title_name, $first_name, $last_name, $email, $phone_number, $profile_img);

            if($inserted){

                ?>

                <script>
                    $(document).ready(function(){
                        
                            Swal.fire({
                            icon: 'success',
                            title: 'สมัครสมาชิกเรียบร้อยแล้วครับ',
                            text : 'โปรดรอการ อนุมัติ จากเจ้าหน้าที่',
                            showConfirmButton: false,
                            timer: 3500
                            }).then(function(){ 
                                window.location.href = '../index.php?p=home';
                            });
                        
                    });


                </script>

         <?php
            
            }



        }

     
    }
?>

