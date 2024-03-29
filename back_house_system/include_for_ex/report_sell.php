<div class="text-right mb-1">
    <a href="executive.php?m=report_search" class="btn btn-info p-2"><h5 class="m-0"><i class="fas fa-search-plus"></i> ดูยอดขายราย วัน/เดือน/ปี</h5></a>
</div>

<div class="card">
    <div class="card-header bg-primary">
        <h3 class="text-light"><i class="fas fa-file-invoice-dollar"></i> รายงานยอดขายวัตถุมงคลทั้งหมด</h3>
    </div>
    <div class="card-body">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <canvas id="myChart" class=""></canvas>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(() => {
    $.ajax({ //!เริ่ม ajax
        method: 'POST', //! ส่งแบบ post
        url: 'include_for_ex/api_report_sell.php', //! url ที่จะส่งข้อมูลไปและรับข้อมูลกลับมา
        dataType: 'json', //! ชนิดข้อมูลที่รับด้วย json
        data: {
            sell: 'ok' //! sell คือชื่อตัวแปร ok คือ value ของ มัน ส่งไปในรูปแบบ post อ้างจากบรรทัดที่ 21
        },
        success: (data) => { //!  เมื่อส่งข้อมูลกลับมา เก็บไว้ใน data
            console.log(data)
            var name_category = [] //! ตัวแบบ array
            var number_value = [] //! ตัวแบบ array

            for (var key in
                    data) { //! loop array เริ่มจาก 0 - ตัวสุดท้ายของข้อมูล เช่น ใน array ที่ได้รับมา มี 5 ก็จะนับ 0-4 ตัวแปร key ตัวแรกก็จะ = 0
                name_category.push(data[key]
                        .title
                        ) //! ผลักข้อมูลไปเก็บใน  line  29 .title คือ ตัวแปร json ที่ api_report_sell.php ส่งมา ดูได้จาก line 17 , 34 
                number_value.push(data[key].sum) //! ผลักข้อมูลไปเก็บใน  line  30
            }
            // console.log(name_category+" "+number_value)
            var datainchart = {
                labels: name_category, //! ข้อมูลจาก line 29
                datasets: [{
                    label: 'ยอดขายวัตถุมงคล (บาท)',
                    data: number_value, //! ข้อมูลจาก line 230
                    backgroundColor: [
                        'rgb(255, 0, 102, 0.2)',
                        'rgb(102, 0, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 0, 102)',
                        'rgb(102, 0, 255)'
                    ],
                    borderWidth: 2,
                    borderRadius: 10,

                }]
            };
            var graphTarget = $("#myChart")
            var berGraph = new Chart(graphTarget, {
                type: "bar",
                data: datainchart,
                options: {
                    indexAxis: 'x',
                    plugins: {
                        legend: {
                            labels: {
                                // This more specific font property overrides the global property
                                font: {
                                    size: 25
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                font: {
                                    size: 20,
                                }
                            }
                        },
                        y: {
                            ticks: {
                                font: {
                                    size: 15,
                                }
                            }
                        }
                    }

                }
            })
        }
    }) //! ปิด ajax
})
</script>


<div class="card mt-4">
    <div class="card-header bg-primary">
        <h3 class="text-light"><i class="fas fa-search-dollar"></i> รายงานผลลำดับสินค้าขายดี</h3>
    </div>
    <div class="card-body">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <canvas id="myChart2" class=""></canvas>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(() => {
    ajax_pull();
})

function ajax_pull() {

    $.ajax({
        method: 'post',
        url: 'include_for_ex/api_report_sellgood.php',
        dataType: 'json',
        data: {
            product: 'ok'
        },
        success: (data) => {
            console.log(data)
            let name_prod = []
            let qty_prod = []

            for (let key in data) {
                name_prod.push(data[key].name_prod)
                qty_prod.push(data[key].qty_sell)
            }

            var datainchart = {
                labels: name_prod,
                datasets: [{
                    label: 'สินค้าขายดี',
                    data: qty_prod,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2,


                }]
            };
            var graphTarget = $("#myChart2")
            var berGraph = new Chart(graphTarget, {
                type: "bar",
                data: datainchart,
                options: {
                    indexAxis: 'y',
                    plugins: {
                        legend: {
                            labels: {
                                // This more specific font property overrides the global property
                                font: {
                                    size: 25
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                font: {
                                    size: 15,
                                }
                            }
                        },
                        y: {
                            ticks: {
                                font: {
                                    size: 20,
                                }
                            }
                        }
                    }

                }
            })

        }
    })

}
</script>

<div class="card mt-4">
    <div class="card-header bg-primary">
        <h3 class="text-light"><i class="fas fa-file-invoice-dollar"></i> ตารางรายงานยอดขายวัตถุมงคลทั้งหมด</h3>
    </div>
    <div class="card-body">

        <?php
                $pdo4ThisP = new connect_db();
                $timeTH = new DB_conn();
            
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
            $sl_list_success = $pdo4ThisP->runQuery('SELECT * from save_basket Where status_pay=:s1 order by id_save_basket DESC');
            $sl_list_success->execute(['s1' => 'approved']);
            $i = 1;
            while($post = $sl_list_success->fetch()){
                $time = $post->date_time;
        ?>
                <tr>
                    <td><?=$i;?></td>
                    <td>
                        <?php
            
                        
                            $sl_user = $pdo4ThisP->runQuery('SELECT * from user where id=:id_user');
                            $sl_user->execute(['id_user' => $post->id_user]);
                            $post_user = $sl_user->fetch();
                            if($post_user->user_level == "admin"){
                                ?>
                        <div class="badge badge-success">เช่าบูชาที่ซุ้มพระ</div>
    </div>
    <?php
                                    echo $post->name_cus;
                            }else{
                                ?>
    <div class="badge badge-warning">เช่าบูชาออนไลน์</div>
</div>
<?php
                                echo $post_user->title_name." ".$post_user->first_name." ".$post_user->last_name;
                            }
                            
                        
                    ?>
</td>
<td><?php echo $timeTH->thai_date_and_time(strtotime($time));?></td>
<td><?php echo number_format($post->total_prod );?></td>
<td>
    <a href="executive.php?m=m4_veiw_order_come&id4_save_basket=<?php echo $post->id_save_basket; ?>"
        class="btn btn-primary w-100"><i class="far fa-eye"></i> ดูรายละเอียด</a>
</td>
</tr>
<?php
            $i++;
            }
            ?>
</tbody>
</table>

</div>
</div>