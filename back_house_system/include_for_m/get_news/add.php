<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php
        require_once('../function.php');
        $connect_database = new DB_conn();
        $news_insert = new DB_conn();


    if(isset($_POST['submit'])){
        //echo"<pre>";  
        //print_r( $_FILES['newsC']['name']);
        //echo"</pre>";


        $newsT = $_POST['newsT'];
        $newsS = $_POST['newsS'];
        $newsD = $_POST['newsD1'];
        $newsAT = $_SESSION['name']." ".$_SESSION['lname'];

        $path = "../image/news/";
    
        $temp = explode(".", $_FILES['newsC']['name']);
        $randomN = rand(1, 100000);
        $newNF1 = round(microtime(true)).$randomN.".".$temp[1];
        $move_finish = move_uploaded_file($_FILES['newsC']['tmp_name'], $path.$newNF1);
        
        if($move_finish){
            $chk = $news_insert->inst_news($newsT, $newsS, $newsD, $newsAT, $newNF1);

            if($chk){
                echo"<script>";
                echo "setTimeout(function () { 
                    swal({
                    title: 'บันทึกข้อมูลเรียบร้อย',
                    text: 'บันทึกข้อมูลข่าวประชาสัมพันธ์เรียบร้อย',
                    type: 'success',
                    confirmButtonText: 'OK'
                    },
                    function(isConfirm){
                    if (isConfirm) {
                        window.location.href = 'manager.php?m=m2';
                    }
                    }); }, 0);";
                
            
                echo"</script>";
            }else{
                echo"no";
            }
        }else{
        echo"ไม่สามารถเคลื่อนย้ายไฟล์ได้";
        }
        

    }




?>

<a href="manager.php?m=m2"><button class="btn btn-success mb-2 "><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</button></a>

<div class="card">
    <div class="card-header text-center" id="bg_hd_card_m2">
        <h3> <b><i class="far fa-newspaper"></i> เพิ่มข่าวประชาสัมพันธ์</b></h3>
    </div>
    <div class="card-body">
            <form action="manager.php?m=m2_add" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label><b>หัวข้อข่าว</b> </label>
                <input type="text" class="form-control border border-secondary w-50" name="newsT" placeholder="กรอกข้อมูลชื่อหัวข้อข่าวประชาสัมพันธ์" required >
            </div>
            <div class="form-group">
                <label><b>สรุปหัวข้อข่าว</b> </label>
                <input type="text" class="form-control border border-secondary" name="newsS" placeholder="กรอกข้อมูลสรุปหัวข้อข่าวประชาสัมพันธ์" required >
            </div>
            <div class="form-group">
                <label> <b>รายละเอียดข่าวประชาสัมพันธ์</b> </label>
                <textarea class="form-control border border-secondary" name="newsD1" rows="5" required ></textarea>
            </div>
            <div class="form-group">
                <label> <b>รูปประกอบข่าวประชาสัมพันธ์</b> </label>
                <input type="file" class="form-control-file w-50" name="newsC" required>
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="reset" class="btn btn-warning text-light">ยกเลิก</button>
                <button type="submit" class="btn btn-success text-light ml-2" name="submit">บันทึก</button>
            </div>
            
            </form>
    </div>
</div>


