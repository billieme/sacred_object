<?php
    session_start();
    require_once('function.php');
    $connect_database = new DB_conn();
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo title_web; ?></title>
    <link rel="stylesheet" href="css/myself.css?version=<?php echo filemtime('css/myself.css'); ?>">
    <!--CSS หน้าแรก-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- font awesome5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- font awesome4 -->
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <!--bootstrap-->


    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <!-- animation css Swal -->

  <link rel="stylesheet" href="css/image-zoom.css">
  <!-- Zoom Image -->
  


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <!--CSS Data Table-->



</head>

<body>
    <section class="min-vh-100" id="bg_sec">
        <?php
        //! ส่วนหัว ////////////////
        ?>

        <div class="container-fluid m-0" id="bg_hder">
            <div class="row p-2">

                <?php
                //! Logo ////////////////<<<<<
                ?>

                <div class="col-sm-1 col-xs d-flex align-items-center">
                    <img src="image/logo.png" class="w-100 d-none d-md-block">
                </div>

                <?php
                //! ชื่อโครงการ ////////////////<<<<<
                ?>

                <div class="col-sm">
                    <h2>วัตถุมงคล วัดนครสวรรค์พระอารามหลวง</h2>
                    <p><b>เว็บแอปพลิเคชันเพื่อการจัดการการเช่าบูชาวัตถุมงคลของวัดนครสวรรค์พระอารามหลวง</b></p>
                </div>

                <?php
                //! Login ////////////////<<<<<
                ?>
                <?php
                    if (!isset($_SESSION['id'])) {
                        
                            //! ถ้าไม่มี Session 
                            ?>
                <div class="col-xl d-flex align-items-center justify-content-end">
                    <div class="row">
                        <div class="col-sm d-flex justify-content-end">
                            <form action="chk_all/check_login.php" method="post">
                                <div class="row d-flex justify-content-end">
                                    <div class="col-md p-0 mb-2 mr-1">
                                        <input type="text" class="form-control" name="username" placeholder="Username"
                                            required="sdgsdg">
                                    </div>
                                    <div class="col-md p-0 mr-1">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password" required>
                                    </div>
                                </div>

                                <div class="row justify-content-end mt-2 pr-1 form-inline">
                                    <div class="form-group">
                                        <a class="mr-2 text-decoration-none" href="index.php?p=reg">สมัครสมาชิก</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-warning text-light mr-1"
                                            name="submit">เข้าสู่ระบบ <i class="fa fa-sign-in"
                                                aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                        }


                        
                            //! ถ้ามี Session 
                        if(isset($_SESSION['id'])){
                            if ($_SESSION['r_s'] == "pass"){
                            ?>
                <div class="col-xl d-flex align-items-center justify-content-end">
                    <div class="row">
                        <div class="col-sm d-flex justify-content-end">
                            <form action="chk_all/chk_logout.php" method="post">
                                <div class="row justify-content-end mt-2 pr-1 form-inline">
                                    <?php
                                                        echo "เข้าสู่ระบบสำเร็จ, ";
                                                        echo "สวัสดี คุณ : ". $_SESSION['name']." ".$_SESSION['lname']; 
                                                    ?>


                                </div>

                                <div class="row justify-content-end mt-2 pr-1 form-inline">
                                    <button class="form-control btn btn-danger text-light ml-2" type="submit"
                                        name="submit">ออกจากระบบ <i class="fa fa-sign-out"
                                            aria-hidden="true"></i></button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                <?php
                            }
                            if ($_SESSION['r_s'] == "wait"){
                                ?>
                <div class="col-xl d-flex align-items-center justify-content-end">
                    <div class="row">
                        <div class="col-sm d-flex justify-content-end">
                            <form action="chk_all/check_login.php" method="post">
                                <div class="row form-inline ">
                                    <div class="form-group mr-2 ">
                                        <input type="text" class="form-control" name="username" placeholder="Username"
                                            required="sdgsdg">
                                    </div>
                                    <div class="form-group mr-2 ">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password" required>
                                    </div>
                                </div>

                                <div class="row justify-content-end mt-2 pr-1 form-inline">
                                    <div class="form-group">
                                        <a class="mr-2 text-decoration-none" href="index.php?p=reg">สมัครสมาชิก</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-warning text-light mr-1"
                                            name="submit">เข้าสู่ระบบ <i class="fa fa-sign-in"
                                                aria-hidden="true"></i></button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                        ?>





            </div>
        </div>

        <?php
        //! เมนู ////////////////<<<<<
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark" id="bg_teamSOM">

            <button class="navbar-toggler p-2" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto row ml-2">
                    <li class="nav-item active mr-2">
                        <a class="btn btn-light mr-2 col-md font-weight-bold" href="index.php?p=home"><i
                                class="fa fa-home text-primary" aria-hidden="true"></i> หน้าแรก<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="btn btn-light mr-2 col-md font-weight-bold" href="index.php?p=sacredOb"><i
                                class="fa fa-archive text-warning" aria-hidden="true"></i> วัตถุมงคล</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="btn btn-light mr-2 col-md font-weight-bold" href="index.php?p=newsAll"><i
                                class="fa fa-newspaper-o text-success" aria-hidden="true"></i> ข่าวประชาสัมพันธ์</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="btn btn-light mr-2 col-md font-weight-bold" href="index.php?p=aboutus"><i
                                class="fa fa-location-arrow text-danger" aria-hidden="true"></i> เกี่ยวกับเรา</a>
                    </li>
                    <?php 
                                    if(!isset($_SESSION['id'])){
                                    }
                                    if(isset($_SESSION['id'])){
                                        ?>
                    <li class="nav-item mr-2">
                        <a class="btn btn-primary mr-2 col-md font-weight-bold" href="index.php?p=basket"><i class="fas fa-shopping-basket text-warning"></i> ตะกร้าของฉัน</a>
                    </li>
                    <?php
                                    }
                                    ?>
                    <!--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>-->
                </ul>
                <form action="index.php?p=sacredOb" method="post" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="ค้นหาวัตถุมงคล" aria-label="Search"
                        name="search" autocomplete="off" required>
                    <button class="btn btn-outline-success btn-success text-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Search
                    </button>
                </form>
            </div>
        </nav>






        <?php
        //! Content Get Page ////////////////<<<<<
        ?>


        <?php
            if(isset($_GET['p'])){
                switch ($_GET['p']){
                    case "home":
                        include_once('include_for_p/home.php');
                    break;
                    case "reg":
                        include_once('include_for_p/register.php');
                    break;
                    case "newsAll":
                        include_once('include_for_p/newsall.php');
                    break;
                    case "aboutus":
                        include_once('include_for_p/aboutus.php');
                    break;
                    case "readN":
                        include_once('include_for_p/read_News.php');
                    break;
                    case "sacredOb":
                        include_once('include_for_p/sacred_object.php');
                    break;
                    case "readSacredObj":
                        include_once('include_for_p/read_SacredObj.php');
                    break;
                    case "basket":
                        include_once('include_for_p/basket.php');
                    break;
                



                    default:
                        include_once('include_for_p/home.php');
                    break;
                }

            }else if(!isset($_GET['p'])){
                ?>
                    <script>
                        window.location.href='index.php?p=home';
                    </script>
                <?php
            }
        
        ?>

        <?php
        //! ส่วนล่าง footer ////////////////<<<<<
        ?>

        <div class="container-fluid">
            <div class="row">
                <!-- ส่วนล่าง footer Logo -->
                <div class="col-sm-12 text-center pb-2" id="bg_ft">
                    <img src="image/logo_nsru.png" style="width:75px; ">
                    <img src="image/logo_footer.png" style="width:150px; ">
                    <br>
                    <b> ©2020 กลุ่มวิจัยด้านเทคโนโลยีสารสนเทศเพื่อการพัฒนาชุมชน (IT4CD) <br>
                        มหาวิทยาลัยราชภัฏนครสวรรค์ </b><br>
                    <a class="text-decoration-none text-light " href="https://web.facebook.com/q3.hahaha"> ติดต่อ :
                        jirapat.m@nsru.ac.th </a>


                </div>
            </div>
        </div>


    </section>

    <div class="col-sm-12"></div>




    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <!--jquery-->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <!--JS Data Table-->
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>

    <script src="js/image-zoom.min.js?version=<?php echo filemtime('js/image-zoom.min.js'); ?>"></script>
    <!-- Zoom image -->
    





    <script>
    $(document).ready(function() {
        bsCustomFileInput.init()
    })
    </script>
    <!-- function Data table-->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>

</body>

</html>