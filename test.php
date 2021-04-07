<div class="container mt-4 mb-4">
    <div class="card min-vh-100">
        <div class="card-header bg-success">
            <h3>ทดสอบ</h3>
        </div>
        <div class="card-body">


            <div class="row mb-2">
                <div class="col">
                    <div class="d-flex d-inline align-items-center">
                        เลือกจำนวนการประเมิน :
                        <div class="col-md-2 d-flex align-items-center">
                            <select class="form-control" name="" id="selectQty">
                                <?php
                                $i=1;
                                while($i <= 10){
                            ?>
                                <option value="<?php echo $i ; ?>"><?php echo $i ; ?></option>
                                <?php
                                $i++;
                                }
                                ?>
                            </select>
                            <input id="qtyAlert" class="form-control alert alert-success p-0 m-0" type="text" readOnly hidden>
                            <button id="btnAlert" class="btn btn-primary ml-2" hidden>Reset</button>
                        </div>
                    </div>
                </div>
            </div>


            <div id="addRow">
                <text class="row " id="row4inp">
                    <div class="col-5">
                        <input class="form-control" type="text">
                    </div>
                    <div class="col d-flex align-items-center">
                        ผ่าน :
                        <input class="ml-2 mr-2" type="radio" name="row">
                        ไม่ผ่าน :
                        <input class="ml-2" type="radio" name="row">
                    </div>
                </text>
            </div>



        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<!--jquery-->

<script>
$(document).ready(function() {
    $("#selectQty").change(function() {
        var n = 1
        var i = $(this).val();
        while (n < i) {
            $("#addRow").append("<text class='row mt-3 mb-3'><div class='col-5'><input class='form-control' type='text'></div><div class='col d-flex align-items-center'>ผ่าน :<input class='ml-2 mr-2' type='radio' name='row"+n+"'>ไม่ผ่าน :<input class='ml-2' type='radio' name='row"+n+"'></div></text>")
            n++
        }
        $(this).attr('hidden', true)
        $("#qtyAlert").val(n)
        $("#qtyAlert").addClass('text-center')
        $("#qtyAlert").attr('hidden', false)
        $("#btnAlert").attr('hidden', false)

    })

    $("#btnAlert").click(function(){
        location.reload()
    })
});
</script>