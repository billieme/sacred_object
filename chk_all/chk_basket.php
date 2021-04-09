<?php
                $forBasket = new shopSacredObj();
                                                        

                if(isset($_POST['data4basket'])){
                    
                                
                                $qty = $_POST['data4basket']['qty'];
                                $id = $_POST['data4basket']['id'];
                                $sql = $forBasket->runQuery("SELECT * FROM product WHERE id_product='$id' ");
                                if($sql){
                                    if($qty <= 0 ){
                                        ?>
                <script>
                window.location.href = 'index.php?p=readSacredObj&id4readSacredObj=<?php echo $id ?>&alert=noqty';
                </script>

                <?php
                                    }else{
                                        //! Do work 
                                        $fetch = mysqli_fetch_array($sql);
                                    }
                                }else{
                                    //! if can have SQL
                                }
                }else{
                    //! check if don't have data4basket
                    ?>
                        <script>
                            window.location.href='index.php';
                        </script>
                    <?php
                }
?>

