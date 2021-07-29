<div class="text-light mb-1">
    <a href="executive.php?m=report_sell" class="btn btn-warning"><i class="fas fa-undo-alt"></i> ย้อนกลับ</a>
</div>

<div class="card">
    <div class="card-header bg-info">
        <h3 class="text-light"><i class="fas fa-file-invoice-dollar"></i> รายงานยอดขายราย วัน/เดือน/ปี</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col">
                <label class="alert alert-success w-100" for="ip1"><small>ตัวอย่างการค้นหา รายวัน พิมพ์
                        ปี-เดือน-วันที่ต้องการ เช่น 2010-10-01 จะได้ข้อมูลของวันที่ 1 เดือน 10 ปี 2010</small>
                    <br><small>ตัวอย่างการค้นหาราย เดือน พิมพ์ ปี-เดือนที่ต้องการ เช่น 2010-10 จะได้ข้อมูลของเดือนที่ 10
                        ปี 2010</small><br> <small>ตัวอย่างการค้นหา รายปี พิมพ์ ปีที่ต้องการ เช่น 2010 จะได้ข้อมูลของปี
                        2010</small></label>
                <input style="height:3rem; border:2px solid gray" id="ip1" type="text" class="form-control"
                    placeholder="พิมพ์ ปี - เดือน - วัน ที่ต้องการค้นหาที่นี่">
            </div>
        </div>

        <div class="row d-flex justify-content-center mt-4 mb-4">
            <div id="sumS1" class="col-md-5 alert-primary p-5 mr-2" hidden>
                <h3 class="text-center font-weight-bold"><text id="name_cat1"></text><br><text>~ </text><text
                        id="sum1"></text>
                    <text>บาท</text>
                </h3>
            </div>
            <div id="sumS2" class="col-md-5 alert-warning p-5" hidden>
                <h3 class="text-center font-weight-bold"><text id="name_cat2"></text><br><text>~ </text><text
                        id="sum2"></text>
                    <text>บาท</text>
                </h3>
            </div>
        </div>

    </div>
</div>

<div class="card mt-3">
    <div class="card-header bg-info">
        <h3 class="text-light"><i class="fas fa-file-invoice-dollar"></i> รายงานยอดขายตามช่วงเวลาที่ต้องการ</h3>
    </div>
    <div class="card-body">
        <form action="executive.php?m=report_search" method="post">
            <div class="row">
                <div class="col-md-2 mt-2">

                    <input class="form-control" type="datetime-local" name="d_sta" required>

                </div>

                <div class="col-md-1 mt-2 d-flex justify-content-center align-items-center">
                    <strong>ถึง</strong>
                </div>

                <div class="col-md-2 mt-2">

                    <input class="form-control" type="datetime-local" name="d_sto" required>

                </div>

                <div class="col-md-2 mt-2">

                    <button type="submit" class="btn btn-success" name="btn_date">ดูยอดขาย</button>

                </div>

        </form>

    </div>


    <?php
        if(isset($_POST['btn_date'])){
            ?>
    <div class="mt-3">
        <?php
                    $d_sta = date("Y-m-d H:i:s", strtotime($_POST['d_sta']));
                    $d_sto = date("Y-m-d H:i:s", strtotime($_POST['d_sto']));

                    $sql4thisP = new shopSacredObj();
                    $pdo4ThisP = new connect_db();
                    $sql_select_between = $sql4thisP->runQuery("SELECT * from save_basket where `status_pay`='approved' and `date_time` between '$d_sta' and '$d_sto' ");
                    $fet_rows = mysqli_num_rows($sql_select_between);
                    if($fet_rows == 0){
                        ?>
                            <div class="alert alert-danger text-center font-weight-bold">
                            ไม่พบข้อมูล...
                            </div>
                        <?php
                    }else{
                        // echo "มี";
                        ?>
        <table class="w-100 table table-hover" id="myTable">
            <thead class="text-nowrap alert-primary">
                <tr>

                    <th>#</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>วันที่/เวลาดำเนินการ</th>
                    <th>ราคารวม</th>
                    <th class="text-center">ข้อมูล</th>
                </tr>
            </thead>

            <tbody class="text-nowrap">
                <?php
                $i=1;
            while($fet_arr_bt = mysqli_fetch_array($sql_select_between)){
        ?>
                <tr>
                    <td><?=$i;?></td>
                    <td>
                        <?php
            
                        
                            $sl_user = $sql4thisP->runQuery("SELECT * from user where id='$fet_arr_bt[id_user]' ");
                            $post_user = mysqli_fetch_array($sl_user);
                            if($post_user['user_level'] == "admin"){
                                ?>
                        <div class="badge badge-success">เช่าบูชาที่ซุ้มพระ</div>
    </div>
    <?php
                                    echo $fet_arr_bt['name_cus'];
                            }else{
                                ?>
    <div class="badge badge-warning">เช่าบูชาออนไลน์</div>
</div>
<?php
                                echo $post_user['title_name']." ".$post_user['first_name']." ".$post_user['last_name'];
                            }
                            
                        
                    ?>
</td>
<td><?php echo $fet_arr_bt['date_time'];?></td>
<td><?php echo $fet_arr_bt['total_prod'] ;?></td>
<td>
    <a href="executive.php?m=m4_veiw_order_come&id4_save_basket=<?php echo $fet_arr_bt['id_save_basket']; ?>&comefrom=report_search"
        class="btn btn-primary w-100"><i class="far fa-eye"></i> ดูรายละเอียด</a>
</td>
</tr>
<?php
            $i++;
            }
            ?>
</tbody>
</table>
<?php
                        
                    }
                    // var_dump($_POST);

                ?>
</div>
<?php
        }

        ?>

</div>
</div>

<script>
$(document).ready(() => {
    $("#ip1").keyup(() => {
        if ($("#ip1").val() == "") {
            $("#sumS1").prop('hidden', true)
            $("#sumS2").prop('hidden', true)
        } else {

            //! animate 

            $("#sumS1").addClass('animate__animated animate__backInLeft animate__fast')
            $("#sumS2").addClass('animate__animated animate__backInLeft')

            // !---------

            $("#sumS1").prop('hidden', false)
            $("#sumS2").prop('hidden', false)

            var ip1 = $("#ip1").val()
            $.ajax({
                method: 'POST',
                url: 'include_for_ex/api_report_search.php',
                dataType: 'json',
                data: {
                    value_ip: ip1
                },
                success: (data) => {
                    console.log(data)
                    var name_category = []
                    var number_value = []

                    for (var key in data) {
                        name_category.push(data[key].title)
                        number_value.push(data[key].sum)
                    }
                    console.log(name_category + " " + number_value)

                    $("#sum1").text(number_value[0])
                    $("#sum2").text(number_value[1])
                    $("#name_cat1").text(name_category[0])
                    $("#name_cat2").text(name_category[1])

                    if (data[0].sum != 0 && data[1].sum != 0) {


                    } else {
                        console.log("empty 2");


                    }

                }

            })
        }

    })
})
</script>