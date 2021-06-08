<div class="text-right mb-1">
<a href="executive.php?m=report_search" class="btn btn-info">ดูยอดขายราย วัน/เดือน/ปี</a>
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

            for (var key in data) { //! loop array เริ่มจาก 0 - ตัวสุดท้ายของข้อมูล เช่น ใน array ที่ได้รับมา มี 5 ก็จะนับ 0-4 ตัวแปร key ตัวแรกก็จะ = 0
                name_category.push(data[key].title) //! ผลักข้อมูลไปเก็บใน  line  29 .title คือ ตัวแปร json ที่ api_report_sell.php ส่งมา ดูได้จาก line 17 , 34 
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
                    data: datainchart
                })
        }
    }) //! ปิด ajax
})
</script>