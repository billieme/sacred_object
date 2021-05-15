<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->
<!-- //! ------------------------------ สวัสดีชาวโลก ------------------------------ */ -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--jquery-->
<script src="../sweetalert/sweetalert2.all.min.js"></script>


<a href='manager.php?m=m4' class="btn btn-primary"><i class="fas fa-undo-alt"></i> ย้อนกลับ</a>

<hr>

<div class="alert alert-primary">
    <taxt class="d-flex align-items-center"><h3>ค้นหาวัตถุมงคล สำหรับเจ้าหน้าที่</h3>
    <text class="ml-2 font-weight-bold text-danger">*</text><text> เช่น ชื่อของวัตถุมงคล หรือ ชื่อชนิดของวัตถุมงคล</text></taxt>
    <input class="mt-1 w-100 form-control" type="text" name="" id="search" placeholder="พิมพ์ชื่อวัตถุมงคล หรือ ชนิดของวัตถุมงคลที่นี่">
</div>

<div class="text-center mb-3">
    <text id="st_0" class="font-weight-bold"></text>
</div>

<div id="div_td">

    <table class="table w-100 table-hover" hidden="true" id="tb">
        <thead class="text-nowrap alert-success">
            <tr>
                <th>ชื่อวัตถุมงคล</th>
                <th>คงเหลือ/จำนวน</th>
                <th>ราคา</th>
                <th>จำนวนที่ต้องการ</th>
                <th>เพิ่มลงรายการสินค้า</th>
            </tr>
        </thead>
        <tbody class="text-nowrap" id="t_body">
        </tbody>
    </table>
</div>

<div>
    <table id='myTable' class="table-hover w-100 table"> 
        <thead>
            
                <th>1</th>
                <th>2</th>
                <th>3</th>
            
        </thead>
        <tbody>
            <tr>
                <td>x</td>
                <td>x</td>
                <td>x</td>
            </tr>
        </tbody>
    </table>
</div>




<script>
$(document).ready(() => {
    $('#search').keyup(() => {
        let search = $('#search').val()
        if ($('#search').val() != "") {
            $.ajax({
                method: 'POST',
                url: 'include_for_m/api_search.php',
                data: {
                    value: search
                },
                dataType: 'json',
                success: (data) => {
                    if (data.status == 0) {
                        $('#st_0').text(data.msg)
                        $('#tb').attr('hidden', true)
                    } else {

      //! /* ---------------------------------- ตราง ---------------------------------- */

                        $('#st_0').text("")
                        $('#tb').attr('hidden', false)
                        console.log(data)

                        var trstring = ""

                        $.each(data, (key, value) => {
                            trstring += `
                                <tr>
                                    <td>${value.product_name}</td>
                                    <td>${value.product_qty}</td>
                                    <td>${value.product_price}</td>
                                    <td>
                                    <input style='width:100px;' id="qty" type="number" name="data4basket[qty]" value="1">
                                    </td>
                                    <td><button class="btn btn-primary">เพิ่ม <i class="fas fa-cart-plus"></i></button></td>
                                    
                                </tr>
                                `;
                        })
                        $('#t_body').html(trstring)


                    }

                }
            })
        } else {
            $('#st_0').text("")
            $('#tb').attr('hidden', true)
        }

    })
})
</script>