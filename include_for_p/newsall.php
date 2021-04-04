<?php
    $newsAll = new DB_conn();

?>



<div class="container mt-4 mb-4">
    <div class="card">
        <div class="card-header ">
            <h3 class="text-center"><b><i class="fas fa-newspaper text-success"></i> ข่าวประชาสัมพันธ์ทั้งหมด</b></h3>
        </div>
        <div class="card-body pt-4">

            <?php

                                $res = $newsAll->newsAll();
                                while($num = mysqli_fetch_array($res))
                                {
                                ?>

            <div class="card mb-4 max-w-100">
                <div class="row no-gutters">
                    <div class="col-md-3 align-self-center">
                        <img src="image/news/<?php echo $num['news_cover']; ?>" class="card-img w-100"
                            title="รูปภาพข่าว">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div>
                                <h4 class="card-title"><?php echo $num['news_title']; ?></h4>
                            </div>

                            <div>
                                <p class="d-inline text-secondary font-weight-light" style="font-size:0.9rem;">
                                    ผู้เขียนข่าวโดย คุณ, <?php echo $num['news_author']; ?> > โพสต์เมื่อ :
                                    <?php echo $newsAll->thai_date_and_time(strtotime($time = $num['date_create'])); ?>
                                </p>
                            </div>

                            <div class="mt-3">
                                <p><?php echo $num['news_summary']; ?></p>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="index.php?p=readN&readN_page_id=<?php echo $num['id']; ?>"
                                        class="btn btn-primary w-100">อ่านต่อ <i class="fas fa-book-reader"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
                ?>
        </div>
    </div>
</div>