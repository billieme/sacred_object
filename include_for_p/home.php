<?php
    $slN = new DB_conn();

?>

<!-- รูปสไลด์ -->
<div class="container mt-4 mb-4">



    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/xcssdsdgs.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image/dfgfd.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>

<hr>

<!-- ส่วนของเนื้อหาข่าว -->
<div class="container justify-content-center">
    <div class="card mt-4 mb-4">

        <div class="card-header ">
            <a href="index.php?p=newsAll" class="text-decoration-none text-dark">
                <h3 class="mb-0"><i class="fa fa-newspaper-o text-success" aria-hidden="true"></i> ข่าวประชาสัมพันธ์
                </h3>
            </a>
        </div>
        <div class="card-body">


            <?php

                                $res = $slN->slN_index();
                                while($num = mysqli_fetch_array($res))
                                {
                                    $time = $num['date_create'];
                                ?>
            <div class="card mb-4 max-w-100">
                <div class="row no-gutters">
                    <div id="divImgNews" class="col-md-3 align-self-center">
                        <img id="imgNews" src="image/news/<?php echo $num['news_cover']; ?>" class="card-img w-100 "
                            title="รูปภาพข่าว">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div>
                                <h4 class="card-title"><?php echo $num['news_title']; ?></h4>
                            </div>

                            <div><span class="badge badge-danger text-warning d-inline">New </span>
                                <p class="d-inline text-secondary font-weight-light" style="font-size:0.9rem;">
                                    ผู้เขียนข่าวโดย คุณ, <?php echo $num['news_author']; ?> > โพสต์เมื่อ :
                                    <?php echo $slN->thai_date_and_time(strtotime($time)); ?></p>
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

<!-- ประวัติวัด-->


<div class="container justify-content-center">
    <div class="card mt-4 mb-4">

        <div class="card-header ">
            <h3 class="mb-0"><i class="fas fa-thumbtack text-danger"></i> วัดนครสวรรค์พระอารามหลวง </h3>
        </div>
        <div class="card-body">


            <p id="detailSacredObj" style="text-indent: 2.5em;">วัดนครสวรรค์ เดิมมีนามว่า “วัดหัวเมือง”
                เพราะตั้งอยู่ตอนต้นของตัวเมืองก่อนจะเข้าถึงตัวเมืองจะต้องผ่านวัดนี้ก่อน สร้างขึ้นในราว พ.ศ.๑๙๗๒
                โดยประมาณ เดิมหน้าวัดอยู่ทางริมแม่น้ำเจ้าพระยามีต้นโพธิ์และพระปรางค์มองเห็นเด่นชัดสำหรับผู้สัญจรทางน้ำ
                ต่อมาสายน้ำได้เปลี่ยนทิศทางห่างออกไปจากวัดประมาณ ๑๐๐ เมตร เป็นวัดที่ได้รับพระราชทานวิสุงคามสีมา
                มาแต่เดิม ประมาณ พ.ศ.๑๙๗๒</p>

            <p id="detailSacredObj" style="text-indent: 2.5em;">มีพระประธานในพระอุโบสถ ขนาดพระเพลากว้าง ๒.๕๐ เมตร
                สร้างด้วยทองเหลือง มีพระนามเรียกกันว่า “หลวงพ่อศรีสวรรค์” พระพุทธรูปใหญ่ ๒ องค์ในพระวิหาร เรียกว่า
                “พระผู้ให้อภัย” พระพุทธรูปอื่นอีก ๒ องค์ในพระวิหาร พระพุทธรูปเนื้อสำริดสมัยสุโขทัย ปางมารวิชัย
                อยู่ที่กุฏิเจ้าอาวาสจำนวน ๔ องค์ พระเจดีย์เก่าอยู่ด้านหน้าพระอุโบสถ ๓ องค์
                พระปรางค์ซึ่งปรักหักพังมีเพียงซากและรากฐานปรากฏอยู่</p>

            <p id="detailSacredObj" style="text-indent: 2.5em;">ทางราชการได้เคยใช้สถานที่วัดนี้ประกอบพิธีถือน้ำพิพัฒน์สัตยา
                (มีศิลาจารึกเป็นหลักฐาน) เป็นที่พำนักอยู่จำพรรษาของเจ้าคณะจังหวัด
                เป็นสถานที่ใช้สอบธรรมและบาลีสนามหลวงตลอดมา เมื่อ พ.ศ. ๒๒๐๓ ชาวบ้านได้พบช้างเผือก ๑ เชือก
                ที่เมืองนครสวรรค์ได้ประกอบพิธีทางศาสนาที่วัดนี้ แล้วนำถวายสมเด็จพระนารายณ์มหาราชที่เมืองลพบุรี
                ซึ่งได้พระราชทานนามว่า “เจ้าพระยาบรมคเชนทรฉัททันต์” จึงนับว่าเป็นวัดคู่บ้านคู่เมืองมาแต่โบราณกาล</p>

            <p id="detailSacredObj" style="text-indent: 2.5em;">ในปัจจุบันวัดนครสวรรค์พระอารามหลวงตั้งอยู่เลขที่ 702
                ถนนโกสีย์ ตำบลปากน้ำโพ อำเภอเมืองนครสวรรค์ จังหวัดนครสวรรค์ มีวัตถุมงคล
                และพระเครื่องให้ญาติโยมได้เช่าบูชาหลายรุ่นหลายแบบมาก
                โดยผู้คนที่มาทำบุญที่วัดสามารถเช่าบูชาได้ที่ซุ้มบูชาวัตถุมงคลของวัด ใน</p>
        </div>
    </div>
</div>