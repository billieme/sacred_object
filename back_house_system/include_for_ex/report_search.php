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
                <h3 class="text-center font-weight-bold"><text id="name_cat1"></text><br><text>~ </text><text id="sum1"></text>
                    <text>บาท</text></h3>
            </div>
            <div id="sumS2" class="col-md-5 alert-warning p-5" hidden>
                <h3 class="text-center font-weight-bold"><text id="name_cat2"></text><br><text>~ </text><text id="sum2"></text>
                    <text>บาท</text></h3>
            </div>
        </div>
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
                    // console.log(name_category+" "+number_value)

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