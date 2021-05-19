<?php
    session_start();
    require_once('../function.php');
    require_once('../func4pdo/connect.php');
    
    $connect_database = new DB_conn();
?>

<?php
if($_SESSION['user_level'] == "a"){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo title_web_m; ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/manag1.css?version=<?php echo filemtime('css/manag1.css'); ?>" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- font awesome5 -->

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <!-- Datatable -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <!--CSS Data Table-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <!--CSS Data Table-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <!--Sweet Alert-->

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <!-- animate css -->


</head>

<body class="sb-nav-fixed">

    <!-- Navbar-->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-center pr-0">
        <p class="navbar-brand text-light">เจ้าหน้าที่ </p>
        <div class="w-100 text-right">
            <button class="btn btn-link btn-sm order-1 order-lg-0 text-decoration-none bg-success text-light"
                id="sidebarToggle" href="#"><i class="fas fa-bars"></i> ย่อและขยายแถบเมนู</button>
        </div>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="container">

                            <div class="text-light mt-3">
                                <p class="text-center m-0 p-0"><i class="fas fa-circle text-success"></i> ยินดีต้อนรับ,
                                    คุณ : </p>
                                <p class="text-center  m-0 mb-2 p-0">[
                                    <?php echo $_SESSION['name']." ".$_SESSION['lname']; ?> ]</p>
                                <a href="../chk_all/chk_logout.php?logout=m"><button
                                        class="btn btn-danger w-100 border border-light">ออกจากระบบ <i
                                            class="fas fa-door-open"></i></button></a>
                            </div>

                            <hr>

                            <ul id="ul_m">
                                <a href="manager.php?m=m1" class="text-light">
                                    <li>
                                        <div class="row d-flex align-items-center">

                                            <div class="col-1 mr-1">
                                                <i class="fas fa-address-book" id="m_m1"></i>
                                            </div>
                                            <div class="col">
                                                <p class="mb-0" id="t_m_m1">อนุมัติรายชื่อผู้สมัครสมาชิก</p>
                                            </div>


                                        </div>
                                    </li>
                                </a>
                                <a href="manager.php?m=m2" class="text-light">
                                    <li>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-1 mr-1">
                                                <i class="far fa-newspaper" id="m_m2"></i>
                                            </div>
                                            <div class="col">
                                                <p class=" mb-0" id="t_m_m2">จัดการข่าว</p>
                                            </div>


                                        </div>

                                    </li>
                                </a>
                                <a href="manager.php?m=m3" class="text-light">
                                    <li>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-1 mr-1">
                                                <i class="fas fa-box-open" id="m_m3"></i>
                                            </div>
                                            <div class="col">
                                                <p class=" mb-0" id="t_m_m3">จัดการสินค้า</p>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                                <a href="manager.php?m=m4" class="text-light">
                                    <li>
                                        <div class="row d-flex align-items-center">

                                            <div class="col-1 mr-1">
                                                <i class="fas fa-hand-holding-usd" id="m_m4"></i>
                                            </div>
                                            <div class="col">
                                                <p class=" mb-0" id="t_m_m4">จัดการทำรายการสินค้า</p>
                                            </div>

                                        </div>
                                    </li>
                                </a>
                            </ul>

                        </div>
                    </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid min-vh-100" id="bg_dash">
                    <br>


                    <?php
                switch ($_GET['m']){
                    case "m1":
                        include_once('include_for_m/approve_sys.php');
                    break;

                    case "m2":
                        include_once('include_for_m/news_sys.php');
                    break;

                    case "m2_add":
                        include_once('include_for_m/get_news/add.php');
                    break;
                    
                    case "m3_add":
                        include_once('include_for_m/get_product/add.php');
                    break;

                    case "m2_edit":
                        include_once('include_for_m/get_news/edit.php');
                    break;
                    case "m3_edit":
                        include_once('include_for_m/get_product/edit.php');
                    break;
                    case "m3":
                        include_once('include_for_m/product_sys.php');
                    break;
                    case "m4":
                        include_once('include_for_m/page_4.php');
                    break;
                    case "m4_order_come":
                        include_once('include_for_m/order_come.php');
                    break;
                    case "m4_veiw_order_come":
                        include_once('include_for_m/veiw_order_come.php');
                    break;
                    case "m4_sell_sys":
                        include_once('include_for_m/sell_sys.php');
                    break;
                    case "m4_sell_sacred_obj":
                        include_once('include_for_m/sell_sacred_obj.php');
                    break;
                    case "m4_save_basket":
                        include_once('include_for_m/save_basket.php');
                    break;

                    default:
                        include_once('include_ for_m/approve_sys.php');
                    break;
                }
        
        ?>






                    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                    <!-- Sweet alert-->
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"
                        crossorigin="anonymous"></script>
                    <script src="js/scripts.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
                        crossorigin="anonymous"></script>
                    <script src="assets/demo/chart-area-demo.js"></script>
                    <script src="assets/demo/chart-bar-demo.js"></script>
                    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
                        crossorigin="anonymous"></script>
                    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
                        crossorigin="anonymous"></script>
                    <script src="assets/demo/datatables-demo.js"></script>

                    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
                    <!-- JS Data Table -->
                    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
                    <!-- JS Data Table -->


                    <script>
                    $(document).ready(function() {
                        <?php
                    if($_GET['m'] =="m1"){
                        ?>
                        $("#t_m_m1").addClass('hoverMenuManager');
                        <?php
                    }
                    if($_GET['m'] =="m2"){
                        ?>
                        $("#t_m_m2").addClass('hoverMenuManager');
                        <?php
                    }
                    if($_GET['m'] =="m3"){
                        ?>
                        $("#t_m_m3").addClass('hoverMenuManager');
                        <?php
                    }
                    if($_GET['m'] =="m4"){
                        ?>
                        $("#t_m_m4").addClass('hoverMenuManager');
                        <?php
                    }
                    
               ?>

                    });
                    </script>
                    <!-- function Data tab le-->
                    <script type="text/javascript" charset="utf-8">
                    $(document).ready(function() {
                        $('#myTable').DataTable({

                            "oLanguage": {
                                "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                                "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                                "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                                "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                                "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                                "sSearch": "ค้นหา :",
                                "aaSorting": [
                                    [0, 'desc']
                                ],
                                "oPaginate": {
                                    "sFirst": "หน้าแรก",
                                    "sPrevious": "ก่อนหน้า",
                                    "sNext": "ถัดไป",
                                    "sLast": "หน้าสุดท้าย"
                                },
                            },
                            "scrollX": true

                        });
                    });
                    </script>


</body>

</html>
<?php
}else{
    header("Location: ../index.php?p=home");
}