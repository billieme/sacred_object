<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php
        require_once('../function.php');
        $connect_database = new DB_conn();
        $news_edit = new DB_conn();
        $news_select = new DB_conn();


        if(isset($_POST['submit'])){

            $newsT = $_POST['newsT'];
            $newsS = $_POST['newsS'];
            $newsD = $_POST['newsD'];
            $newsAT = $_SESSION['name']." ".$_SESSION['lname'];
            $idIns = $_GET['edit_id'];
    
            $path = "../image/news/";
            $fck = $_FILES['newsC']['name'];
            

        
        
            
            if($_FILES['newsC']['name'] == ""){
                $chk1 = $news_edit->edit_newsNoPic($newsT, $newsS, $newsD, $newsAT, $idIns);
                if($chk1){
                    echo"<script>";
                    echo "setTimeout(function () { 
                        swal({
                        title: 'บันทึกข้อมูลเรียบร้อย',
                        text: 'บันทึกข้อมูลข่าวประชาสัมพันธ์แบบไม่มีรูปภาพเรียบร้อย',
                        type: 'success',
                        confirmButtonText: 'OK'
                        },
                        function(isConfirm){
                        if (isConfirm) {
                            window.location.href = 'manager.php?m=m2';
                        }
                        }); }, 800);";
                    
                
                    echo"</script>";
                }

            }
            
            if($_FILES['newsC']['name'] != ""){  
            
            $idS = $_GET['edit_id']; //! del in folder
            $resSFDinFol =$news_select->selNForEdit($idS);
            $numSFDinFol = mysqli_fetch_array($resSFDinFol);
        
            $temp = explode(".", $_FILES['newsC']['name']);
            $randomN = rand(1, 100000);
            $newNF1 = round(microtime(true)).$randomN.".".$temp[1];
            $move_finish = move_uploaded_file($_FILES['newsC']['tmp_name'], $path.$newNF1);
            
            if($move_finish){
                
                if($numSFDinFol){
                    $nameold = $numSFDinFol['news_cover'];
                    $file = $path.$nameold;
                    $delPicInFol = unlink($file);
                }

                $chk2 = $news_edit->edit_news($newsT, $newsS, $newsD, $newsAT, $newNF1, $idIns);
                if($chk2){
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
                        }); }, 800);";
                    
                
                    echo"</script>";
                }else{
                    echo"no";
                }
            }else{
            echo"ไม่สามารถเคลื่อนย้ายไฟล์ได้";
            }
            
            }
            }
    
        




?>

<a href="manager.php?m=m2"><button class="btn btn-primary mb-2 "><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</button></a>

<div class="card">
    <div class="card-header text-center bg-warning">
        <h3> <b><i class="far fa-newspaper text-success"></i> แก้ไขข่าวประชาสัมพันธ์</b></h3>
    </div>
    <div class="card-body">

            <form action="manager.php?m=m2_edit&edit_id=<?php echo $_GET['edit_id']; ?>" method="post" enctype="multipart/form-data"> 

            <?php
                    $idS = $_GET['edit_id'];
                    $resS =$news_select->selNForEdit($idS);
                    $numS = mysqli_fetch_array($resS);

                    if($numS)
                    {
                        
                    
            ?>

            <div class="form-group">
                <label><b>หัวข้อข่าวเดิม :</b> </label>
                <input type="text" class="form-control border border-success w-50" name="newsT" value="<?php echo $numS['news_title']; ?>" required >
            </div>
            <div class="form-group">
                <label><b>สรุปหัวข้อข่าวเดิม :</b> </label>
                <input type="text" class="form-control border border-success" name="newsS" value="<?php echo $numS['news_summary']; ?>" required >
            </div>
            <div class="form-group">
                <label> <b>รายละเอียดข่าวประชาสัมพันธ์เดิม :</b> </label>
                <textarea class="form-control border border-success" name="newsD" rows="5" required><?php echo $numS['news_description']; ?></textarea>
            </div>
            <div class="form-group">
                <label> <b>รูปประกอบข่าวประชาสัมพันธ์เดิม :</b> </label><br>
                <img style="width:350px; border:2px solid green;" src="../image/news/<?php echo $numS['news_cover']; ?>" alt=""><br><br>
                <label class="d-inline"> <b>เลือกรูปภาพใหม่ :</b> </label>
                <div class="input-group mb-3">

                <input  type="file" class="d-inline form-control-file border border-success p-1 pr-1 pl-1rounded w-50" name="newsC">
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="reset" class="btn btn-warning text-light">ยกเลิก</button>
                <button type="submit" class="btn btn-success text-light ml-2" name="submit">บันทึก</button>
            </div>
        <?php    
        }
        ?>
            
            </form>
    </div>
</div>