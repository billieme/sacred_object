<?php
    $newsAll = new DB_conn();

?>



                <div class="container mt-4 mb-4">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="text-center"><b><i class="fa fa-archive text-warning" aria-hidden="true"></i> วัตถุมงคลทั้งหมด</h3>
                    </div>
                    <div class="card-body pt-4">

                                <?php

                                $res = $newsAll->pdSlm3_();
                                while($num = mysqli_fetch_array($res))
                                {
                                ?>
                                
                                
                <?php
                }
                ?>              
                    </div>
                </div>
                </div>



                