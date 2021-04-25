<?php 

        define('DB_server', 'localhost');
        define('DB_user', 'root');
        define('DB_password', '');
        define('DB_name', 'sacred_object');

        define('title_web', 'เว็บแอปพลิเคชันเพื่อการจัดการการเช่าบูชาวัตถุมงคลของวัดนครสวรรค์พระอารามหลวง');
        define('title_web_m', 'เจ้าหน้าที่');
        define('title_web_e', 'ผู้บริหาร');

        class DB_conn{
            //? ฟังก์ชั่นเชื่อมต่อฐานข้อมูล
            function __construct(){
                $conn = mysqli_connect(DB_server, DB_user, DB_password, DB_name);
                $this->dbcon = $conn;
                mysqli_set_charset($this->dbcon, "utf8"); // ! Set ตัวหนังสือ เป็น UTF8
                date_default_timezone_set("Asia/Bangkok");

                if (mysqli_connect_errno()) {
                    echo"เชื่อมต่อ Database ไม่สำเร็จ!";
                }else{
                    //echo"เชื่อมต่อ Database สำเร็จแล้ว";
                }

            }    
            
            // Todo: ทำเวลาเป็นภาษาไทย
            function thai_date_and_time($time){
                $dayTH = ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'];
                $monthThai = [null,'มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'];

                    global $dayTH,$monthTH;   
                    $thai_date_return = date("j",$time);   
                    $thai_date_return.=" ".$monthThai[date("n",$time)];   
                    $thai_date_return.= " ".(date("Y",$time)+543);   
                    $thai_date_return.= " เวลา ".date("H:i:s",$time)." น.";

                return $thai_date_return;   
            }
            

            //? ฟังก์ชั่น Login
            public function login_form($user, $pasw){
                $re = mysqli_query($this->dbcon, "SELECT * FROM user WHERE username ='$user' AND password = '$pasw'");
                return $re;
            }
            //? ฟังก์ชั่น เช็ค User ซ้ำ สมัครสมาชิก
            public function slUserReg($user){
                $re = mysqli_query($this->dbcon, "SELECT * FROM user WHERE username ='$user'");
                return $re;
            }

            //? ฟังก์ชั่น Logout
            public function logout_form(){
                session_start();
                session_destroy();
                header("Location: index.php");

            }
            public function logout(){
                session_start();
                $reS = session_destroy();
                return $reS;

            }
            
            //? ฟังก์ชั่น เพิ่มข่าวจากเจ้าหน้าที่
            public function inst_news($newsT, $newsS, $newsD, $newsAT, $newNF1){
                $result = mysqli_query($this->dbcon, "INSERT INTO news(
                    news_title,
                    news_summary,
                    news_description,
                    news_author,	
                    news_cover)
                    VALUE('$newsT',
                    '$newsS',
                    '$newsD',
                    '$newsAT',
                    '$newNF1')
                    ");

                return $result;

            }

            //? ฟังก์ชั่น แก้ไขข่าว
            public function edit_news($newsT, $newsS, $newsD, $newsAT, $newNF1, $idIns){
                $result = mysqli_query($this->dbcon, "UPDATE news SET
                    news_title='$newsT',
                    news_summary='$newsS',
                    news_description='$newsD',
                    news_author='$newsAT',	
                    news_cover='$newNF1' WHERE id='$idIns'");

                return $result;

            }
            public function edit_newsNoPic($newsT, $newsS, $newsD, $newsAT,$idIns){
                $result = mysqli_query($this->dbcon, "UPDATE news SET
                    news_title='$newsT',
                    news_summary='$newsS',
                    news_description='$newsD',
                    news_author='$newsAT' WHERE id='$idIns'");

                return $result;

            }
            //? ฟังก์ชั่น แก้ไขสินค้า
            public function edit_prod_np($newsT, $newsS, $news3, $news4, $news5, $idIns){
                $result = mysqli_query($this->dbcon, "UPDATE product SET
                    product_name='$newsT',
                    product_type='$newsS',
                    product_des='$news3',
                    product_price='$news4',	
                    product_qty='$news5' WHERE id_product='$idIns'");

                return $result;

            }
            public function edit_prod($newsT, $newsS, $news3, $news4, $news5, $newNF1, $idIns){
                $result = mysqli_query($this->dbcon, "UPDATE product SET
                    product_name='$newsT',
                    product_type='$newsS',
                    product_des='$news3',
                    product_price='$news4',	
                    product_qty='$news5',
                    product_cover='$newNF1' WHERE id_product='$idIns'");

                return $result;

            }
            
        
            //? ฟังก์ชั่น สมัครสมาชิก
            public function register_form($username, $password, $title_name, $first_name, $last_name, $email, $phone_number, $profile_img){

                    $result = mysqli_query($this->dbcon, "INSERT INTO user(
                        username,
                        password,
                        title_name,
                        first_name,
                        last_name,
                        email,
                        phone_number,
                        profile_img,
                        register_status,
                        user_level)
                        VALUE('$username',
                        '$password',
                        '$title_name',
                        '$first_name',
                        '$last_name',
                        '$email',
                        '$phone_number',
                        '$profile_img',
                        'wait',
                        'p')
                        ");

            return $result;
                    } 
            //? ฟังก์ชั่น เพิ่มสินค้า
            public function inst_proD($pd1, $pd2, $pd3, $pd4, $pd5, $newNF1){

                    $result = mysqli_query($this->dbcon, "INSERT INTO product(
                        	product_name,
                            product_type,	
                            product_des,	
                            product_price,	
                            product_qty,	
                            product_cover)
                        VALUE('$pd1',
                        '$pd2',
                        '$pd3',
                        '$pd4',
                        '$pd5',
                        '$newNF1')
                        ");

            return $result;
                    } 
                    
            //? ฟังก์ชั่น อนุมัติการใช้งานผู้ใช้ PASS
            public function appv_pass($id1){
                $re = mysqli_query($this->dbcon, "UPDATE user SET register_status='pass' WHERE id='$id1'");
                return $re;
            }
            //? ฟังก์ชั่น อนุมัติการใช้งานผู้ใช้ wait
            public function appv_wait($id2){
                $re = mysqli_query($this->dbcon, "UPDATE user SET register_status='wait' WHERE id='$id2'");
                return $re;
            }
            //? ฟังก์ชั่น ดึงข่าวหน้าแรก
            public function slN_index(){
                $re = mysqli_query($this->dbcon, "SELECT * FROM news ORDER BY id DESC LIMIT 3");
                return $re;
            }
            //? ฟังก์ชั่น ดึงข่าว ทั้งหมด
            public function newsAll(){
                $re = mysqli_query($this->dbcon, "SELECT * FROM news ORDER BY id DESC");
                return $re;
            }
            //? ฟังก์ชั่น ดึงข่าวหน้า m2
            public function slN_m2(){
                $re = mysqli_query($this->dbcon, "SELECT * FROM news");
                return $re;
            }
            //? ฟังก์ชั่น ดึงข้อมูลผู้ใช้ หน้าอนุมัติ
            public function slU_m1(){
                $re = mysqli_query($this->dbcon, "SELECT * FROM user ORDER BY id DESC");
                return $re;
            }
            //? ฟังก์ชั่น ดึงข่าวหน้า มาโชว์หน้า EDIT News
            public function selNForEdit($idS){
                $re = mysqli_query($this->dbcon, "SELECT * FROM news WHERE id='$idS'");
                return $re;
            }
            public function selPForED($idS){
                $re = mysqli_query($this->dbcon, "SELECT * FROM product WHERE id_product='$idS'");
                return $re;
            }
            //? ฟังก์ชั่น อ่านข่าว id
            public function slrN_id($id){
                $re = mysqli_query($this->dbcon, "SELECT * FROM news WHERE id='$id'");
                return $re;
            }
            //? ฟังก์ชั่น ดึงข้อมูล Product ด้วย id
            public function pdSlm4($idS){
                $re = mysqli_query($this->dbcon, "SELECT * FROM product ORDER BY id_product='$idS' DESC");
                return $re;
            }
            //? ฟังก์ชั่น ดึงข้อมูล Product
            public function pdSlm3(){
                $re = mysqli_query($this->dbcon, "SELECT * FROM product ORDER BY id_product DESC");
                return $re;
            }
            public function pdSlm3_(){
                $re = mysqli_query($this->dbcon, "SELECT * FROM product ");
                return $re;
            }
            //? ฟังก์ชั่น ดึงข้อมูล Product for Del
            public function pdSlm3_d($idS){
                $re = mysqli_query($this->dbcon, "SELECT * FROM product WHERE id_product='$idS'");
                return $re;
            }


            //? ฟังก์ชั่น del ข่าว
            public function delnews($id, $file){
                
                $re = mysqli_query($this->dbcon, "DELETE FROM news WHERE id='$id'");
                unlink($file);
               

                if($re){
                    // echo"<script>";
                    //     echo "setTimeout(function () { 
                    //         swal({
                    //         title: 'ลบข้อมูลเรียบร้อยแล้ว',
                    //         text: 'ลบข้อมูลข่าวประชาสัมพันธ์เรียบร้อยแล้ว',
                    //         type: 'success',
                    //         confirmButtonText: 'OK'
                    //         },
                    //         function(isConfirm){
                    //         if (isConfirm) {
                    //             window.location.href = 'manager.php?m=m2';
                    //         }
                    //         }); }, 800);";
                
            
                    // echo"</script>";
                }
                return $re;
            }
            //? ฟังก์ชั่น del วัตถุ
            public function delPd($id, $file){
                
                $re = mysqli_query($this->dbcon, "DELETE FROM product WHERE id_product='$id'");
                unlink($file);
               

                if($re){
                    // echo"<script>";
                    //     echo "setTimeout(function () { 
                    //         swal({
                    //         title: 'ลบข้อมูลเรียบร้อยแล้ว',
                    //         type: 'success',
                    //         confirmButtonText: 'OK'
                    //         },
                    //         function(isConfirm){
                    //         if (isConfirm) {
                    //             window.location.href = 'manager.php?m=m3';
                    //         }
                    //         }); }, 800);";
                
            
                    // echo"</script>";
                }
                return $re;
            }


                } //ปีกกาของคลาส


                //
                // ──────────────────────────────────────── I ──────────
                // !  :::::: : :  :   :    :     :        :          :  Class for ร้านค้าหน้าบ้าน
                // ──────────────────────────────────────────────────
                //

                class shopSacredObj extends DB_conn{
                    public function runQuery($query){
                        $reS = mysqli_query($this->dbcon, $query); 
                        return $reS;
                    }
                }//ปีกกาของคลาส
    
    

?>