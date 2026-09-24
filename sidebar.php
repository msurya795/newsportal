<?php 
$sqlc = "select * from category where cat_is_delete=0";
$resultc = mysqli_query($conn, $sqlc);

$sqll = "select * from location where loc_is_delete=0";
$resultl = mysqli_query($conn, $sqll);
?>



                <!--Location start -->
                <div class="mb-3">
                    <div class="section-title mb-0">   
                        <h4 class="m-0 text-uppercase font-weight-bold">LO00CATION</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                            <?php foreach ($resultl as $row) { ?>
                            <a href="index.php?locat=<?php echo $row['location'] ?>" class="d-block w-100 text-white text-decoration-none mb-3">
                                <span class="font-weight-medium badge badge-pill badge-info mr-2" style="color:black"><?php echo $row['location'] ?></span>
                           </a> <?php } ?> 
                    </div>
                </div>
                <!-- location End -->
                <!--Category start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Category</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <?php foreach ($resultc as $row) { ?>
                        <a href="index.php?catcat=<?php echo $row['category'] ?>" class="d-block w-100 text-white text-decoration-none mb-3">
                                <span class="font-weight-medium badge badge-pill badge-info mr-2" style="color:black"><?php echo $row['category'] ?></span>
                            </a>
                            <?php } ?>
                    </div>
                </div>
                <!-- Category End -->
                <!-- Ads Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                    </div>
                    <div class="bg-white text-center border border-top-0 p-3">
                        <a href=""><img class="img-fluid" src="img/news-800x500-2.jpg" alt=""></a>
                    </div>
                </div>
                <!-- Ads End -->

                <!-- Popular News Start -->
                <!--  -->
                <!-- Popular News End -->




           