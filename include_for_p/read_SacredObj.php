<div class="container mt-4 mb-4">
    <div class="card min-vh-100">
        <div class="card-body">
            <?php 
                $readSacredObj = new shopSacredObj();
                $id4readSacredObj = $_GET['id4readSacredObj'];
                
                $sql = readSacredObj->runQuery("SELECT * FROM product WHERE id_product");        

                ?>
            
            <div class="row">
                <div class="col-md-7">
                    <div class="card w-100 p-3">
                        <img src="https://cdn.pixabay.com/photo/2016/11/03/04/02/boys-1793421_960_720.jpg" alt="">
                    </div>
                </div>
                <div class="col-md">
                    <div class="w-100 p-0 pl-2 ">
                        <strong>
                            <h1 class="pt-3">
                                ชื่อสินค้า
                            </h1>
                        </strong>
                        <p class="m-0">
                            ประเภทสินค้า
                        </p>
                        <div class="m-0 d-flex d-inline ">
                            ราคา <p class="m-0 mr-2 ml-2 text-danger font-weight-bold"><b>500</b> </p>บาท
                        </div>
                        <div class="d-flex d-inline">
                            <p class="font-weight-bold mr-2">คงเหลือ</p> 9 ชิ้น
                        </div>
                        <div>
                            <p id="detailSacredObj">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam
                                nobis, a voluptate nemo eius eos? Et dolores provident rem ullam dolorem. Consectetur
                                ipsum corrupti perferendis fugit dolores adipisci, ad sed temporibus. Cum, vero placeat
                                eos exercitationem voluptate autem molestias velit nostrum facilis expedita porro error
                                sint possimus quos necessitatibus accusamus!</p>
                        </div>

                        <div class="d-flex d-inline justify-content-between align-items-center">
                            <div class="d-flex">
                                <div class="">จำนวน</div>
                                <input id="qty" type="number" value="1">
                                <div for="">ชิ้น</div>
                            </div>
                            <div class="text-right">
                            <button class="btn btn-success">
                            <i class="fas fa-cart-arrow-down"></i> เพิ่มลงตะกร้าสินค้า
                            </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <hr>







        </div>
    </div>
</div>