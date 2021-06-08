<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php
        require_once('../function.php');
        $connect_database = new DB_conn();
        $product_insert = new DB_conn();
        $pd_ED= new DB_conn();

        $p_edit = new DB_conn();
        $p_select = new DB_conn();


        if(isset($_POST['submit'])){

            $newsT = $_POST['proD1'];
            $newsS = $_POST['proD2'];
            $news3 = $_POST['proD3'];
            $news4 = $_POST['proD4'];
            $news5 = $_POST['proD5'];
            $newsAT = $_SESSION['name']." ".$_SESSION['lname'];
            $idIns = $_GET['edit_id'];
    
            $path = "../image/product/";
            $fck = $_FILES['proD6']['name'];
           
        
            if($_FILES['proD6']['name'][0] == ""){
                $chk1 = $pd_ED->edit_prod_np($newsT, $newsS, $news3, $news4, $news5, $idIns);
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
                            window.location.href = 'manager.php?m=m3';
                        }
                        }); }, 800);";
                    
                
                    echo"</script>";
                }

            }

            
            if($_FILES['proD6']['name'][0] != ""){  
            
            $idS = $_GET['edit_id']; //! del in folder
            $resSFDinFol = $p_edit->selPForED($idS);
            $numSFDinFol = mysqli_fetch_array($resSFDinFol);

            $count_mane = count($_FILES['proD6']['name']);
            $sum_img = array();
            for ($i=0; $i < $count_mane; $i++){
                $temp = explode(".", $_FILES['proD6']['name'][$i]);
                $countTemp = count($temp);
                $countTemp--;
                $randomN = rand(1, 999999999999);
                $newNF1 = round(microtime(true)).$randomN.".".$temp[$countTemp];
                array_push($sum_img, $newNF1);
                $move_finish = move_uploaded_file($_FILES['proD6']['tmp_name'][$i], $path.$newNF1);

            }
        
            
            if($move_finish){
                $data4save = implode(",", $sum_img);
                if($numSFDinFol){
                    $nameold = explode(',', $numSFDinFol['product_cover']);
                    $count_nameold = count($nameold);
                    for($fori = 0; $fori < $count_nameold; $fori++){
                        $file = $path.$nameold[$fori];
                        $delPicInFol = unlink($file);
                    }
                }

                $chk2 = $pd_ED->edit_prod($newsT, $newsS, $news3, $news4, $news5, $data4save, $idIns);
                if($chk2){
                    echo"<script>";
                    echo "setTimeout(function () { 
                        swal({
                        title: 'บันทึกข้อมูลเรียบร้อย',
                        type: 'success',
                        confirmButtonText: 'OK'
                        },
                        function(isConfirm){
                        if (isConfirm) {
                            window.location.href = 'manager.php?m=m3';
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
            
            

        
        
            
            
            
            
            
            }
            

    




?>

<a href="manager.php?m=m3"><button class="btn btn-primary mb-2 "><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</button></a>

<div class="card">
    <div class="card-header text-center" id="bg_hd_card_m3">
        <h3> <b><i class="fas fa-pallet"></i> ระบบเพิ่มข้อมูลวัตถุมงคลชนิดใหม่</b></h3>
    </div>
    <div class="card-body">


    <?php
         
                    $idS = $_GET['edit_id'];
                    $resS =$pd_ED->pdSlm4($idS);
                    $numS = mysqli_fetch_array($resS);

                    if($numS)
                    {
                       ?> 
                    
            

            <form action="manager.php?m=m3_edit&edit_id=<?php echo $_GET['edit_id']; ?>" method="post" enctype="multipart/form-data">
            
            <div class="form-group d-inline">
                <label><b>ชื่อวัตถุมงคล</b> </label>
                <input type="text" class="form-control border border-secondary w-50" name="proD1" value="<?php echo $numS['product_name'];?>" required >
            </div>
            <div class="form-group d-inline">
            <label for="exampleFormControlSelect1" class="mt-2 "><b>ชนิด</b></label>
                <select style="width:300px" class="form-control border border-secondary" id="exampleFormControlSelect1" name="proD2" required>
                    <option>พระเครื่อง</option>
                    <option>เครื่องรางของขลัง</option>
                
                </select>
            </div>
            <div class="form-group mt-3">
                <label><b>ราคา / บาท</b> </label>
                <input style="width:300px" type="number" class="form-control border border-secondary" name="proD4" value="<?php echo $numS['product_price'];?>" required >
            </div>
            <div class="form-group">
                <label><b>จำนวน / ชิ้น</b> </label>
                <input style="width:200px" type="number" class="form-control border border-secondary" name="proD5" value="<?php echo $numS['product_qty'];?>" required >
            </div>
            <div class="form-group">
                <label> <b>รายละเอียดของวัตถุมงคล</b> </label>
                <textarea class="form-control border border-secondary" name="proD3" rows="5" required ><?php echo $numS['product_des'];?></textarea>
            </div>
            <div class="form-group">
                <label> <b>รูปภาพวัตถุมงคลเดิม :</b> </label><br>

                <?php
                    $pic = explode(',', $numS['product_cover']) ;
                    $countPic = count($pic);
                    for ($i = 0 ; $i < $countPic ; $i++){
                        ?>
                        <img style="width:180px; border:2px solid green;" src="../image/product/<?php echo $pic[$i]; ?>" alt=""><br><br>
                        <?php
                    }
                    ?>
                
                <label> <b>รูปภาพวัตถุมงคล</b> </label>
                <input type="file" class="form-control-file w-50" name="proD6[]" >
                <div id="addinputpic" class="row"></div>
            </div>

            <div id="addpic" class="btn btn-primary p-3 mt-2">เพิ่มรูป +</div>

            <div class="form-group d-flex justify-content-end">
                <button type="reset" class="btn btn-warning text-light">ยกเลิก</button>
                <button type="submit" class="btn btn-success text-light ml-2" name="submit">บันทึก</button>
            </div>
            
            </form>

                <?php
                    }
                    ?>
    </div>
</div>

<script>
    $(document).ready(()=>{
        var i = 1
        $("#addpic").click(()=>{
            $('<div class="col-5"><input id="row'+i+'" type="file" class="form-control-file w-100 mt-3" name="proD6[]" required></div><div class="col-5 d-flex align-items-end"><div id="'+i+'" class="btn btn-danger remove_btn">ลบ</div></div>').appendTo("#addinputpic")

            i++
        })
        $(document).on('click', '.remove_btn', ()=>{
            var btn_id = $('.remove_btn').attr('id')
            $('#row'+btn_id+'').remove();
            $('#'+btn_id+'').remove();
            // console.log(btn_id)
            
        })
        
        
    })
</script>


