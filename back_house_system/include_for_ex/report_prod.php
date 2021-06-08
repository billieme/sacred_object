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
                    indexAxis: 'y'
                }
            })

        }
    })

}
</script>