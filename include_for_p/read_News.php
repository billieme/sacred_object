<?php
    $readN = new DB_conn();

?>


<?php

    if(isset($_GET['readN_page_id'])){
    
        $id = $_GET['readN_page_id'];

        $res = $readN->slrN_id($id);
        if($res){
            $num = mysqli_fetch_array($res);
        ?>
                <div class="container mt-4 mb-4">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="d-inline"><b>#หัวข้อข่าวเรื่อง : </b></h3> <h5 class="d-inline"><?php echo $num['news_title']; ?></h5>
                    </div>
                    <div class="card-body pt-1">
                        <div>
                        <p class="d-inline text-secondary font-weight-light" style="font-size:0.9rem;">ผู้เขียนข่าวโดย คุณ, <?php echo $num['news_author']; ?> > โพสต์เมื่อ : <?php echo $readN->thai_date_and_time(strtotime($time = $num['date_create'])); ?></p>
                        </div>

                        <div class="text-center mt-3 align-self-center">
                            <img src="image/news/<?php echo $num['news_cover']; ?>" alt="" style="width: 600px; border: 2px solid gray;">
                        </div>
                        <hr>
                        <div >
                            <h4 class = "mb-2"><b> รายละเอียดข่าว : </b></h4>
                            <p align="justify"><?php echo $num['news_description']; ?></p>
                        </div>

                    </div>
                </div>
                </div>
    <?php
        }else{
                echo"No Select";
            }

    }


        
?> 