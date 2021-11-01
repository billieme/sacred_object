<div class="card">
    <div class="card-header bg-success">
        <h3 class="text-light"><i class="fas fa-chart-line"></i> รายงานยอดวัตถุมงคลคงเหลือ</h3>
    </div>
    <div class="card-body">

        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <canvas id="myChart"></canvas>
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
        url: 'include_for_ex/api_report_prod.php',
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
                qty_prod.push(data[key].qty_prod)
            }

            var datainchart = {
                labels: name_prod,
                datasets: [{
                    label: 'วัตถุมงคลคงเหลือ',
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
            var graphTarget = $("#myChart")
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
    <div class="card-header bg-success">
        <h3 class="text-light"><i class="fas fa-chart-line"></i> ตารางรายงานยอดวัตถุมงคลคงเหลือ</h3>
    </div>
    <div class="card-body">
        <?php
        $connect_database = new DB_conn();
        $pd_sl = new DB_conn();
        $pd_slD = new DB_conn();
        $del = new DB_conn();
        $timeTH = new DB_conn();

        ?>
       <table class="min-vw-100 table table-striped pb-3" id="myTable">
                <thead class="min-vw-100 text-nowrap">
                    <tr class="text-center" id="bg_hd_table_m">
                    <th scope="col">ลำดับ</th>
                    <th scope="col">รูปวัตถุมงคล</th>
                    <th scope="col">ชื่อวัตถุมงคล</th>
                    <th scope="col">ชนิดของวัตถุมงคล</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">คงเหลือ</th>
                    <th scope="col">วันที่เพิ่มสินค้า</th>
                    
                    </tr>
                </thead>

                <tbody class="text-nowrap">

                <?php
                        $res1 = $pd_sl->pdSlm3();
                        
                        $n=1;
                        while($num1 = mysqli_fetch_array($res1))
                           
                            
                        {
                            $time = $num1['date_create'];

                        

                ?>

                
                    <tr class="text-center">
                    <th scope="row"><?php $num1['id_product']; echo $n;  ?></th>
                    <td>
                        <?php
                            $pic1 = explode(',', $num1['product_cover']);
                        ?>
                        <div class="divImageProduct">
                            <img src="../image/product/<?php echo $pic1[0];?>" alt="">
                        </div>
                        
                    </td>
                    <td><?php echo $num1['product_name'];?></td>
                    <td><?php echo $num1['product_type'];?></td>
                    <td><?php echo number_format($num1['product_price']) ;?></td>
                    <td><?php echo number_format($num1['product_qty']) ;?></td>
                    <td><?php echo $timeTH->thai_date_and_time(strtotime($time));?></td>
                    
                    </tr>
                    <?php
                    $n++;
                    }
                    ?>
                
                
                    
                </tbody>
                </table>

    </div>
</div>