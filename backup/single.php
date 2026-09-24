<?php 
include 'header.php';

?>

<body>
    <!-- Breaking News Start -->
    <?php
        $con=mysqli_connect('localhost','root','','news_portal');
        $sql="SELECT * FROM news WHERE is_verified='1' && nid='$id'";
        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($res);
        $nh=$row['newsheading'];
        $img=$row['img'];
        $pd=$row['postdate'];
        $bd=$row['description'];
        $sc=$row['subcategory'];
        
        
    ?>
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="section-title border-right-0 mb-0" style="width: 180px;">
                            <h4 class="m-0 text-uppercase font-weight-bold">Trending</h4>
                        </div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0"
                            style="width: calc(100% - 180px); padding-right: 100px;">
                            <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="">Latest News Today: Breaking news on Politics, Business, Sports, Bollywood, Education, Science</a></div>
                            <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="">Latest News Today: Breaking news on Politics, Business, Sports, Bollywood, Education, Science</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="<?php echo $img;?>" style="object-fit: cover;">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                               <!-- <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="">Busines</a> -->
                                <a class="text-body"><?php echo $pd;?></a>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold"><?php echo $sc;?></h1>
                            <p><?php echo $bd;?></p>
                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">

                            <?php
                                $sql="SELECT user.img,user.name,news.view,comment.comment FROM news 
                                INNER JOIN user INNER JOIN comment ON user.uid=news.uid WHERE news.nid='$id'";
                                $res=mysqli_query($con,$sql);
                                $row=mysqli_fetch_array($res);

                                $img=$row['img'];
                                $name=$row['name'];
                                $view=$row['view'];
                                
                            ?>

                            <div class="d-flex align-items-center">
                                <img class="rounded-circle mr-2" src="<?php echo $img;?>" width="25" height="25" alt="">
                                <span><?php echo $name;?></span>
                            </div>



                            <div class="d-flex align-items-center">
                                <span class="ml-3"><i class="far fa-eye mr-2"></i><?php echo $view;?></span>

                                    <?php
                                        $sql="SELECT * FROM comment WHERE nid='$id'";
                                        $res=mysqli_query($con,$sql);
                                        $row=mysqli_fetch_array($res);

                                        $cm=$row['comment'];
                                    ?>

                                <span class="ml-3"><i class="far fa-comment mr-2"></i><?php echo $cm;?></span>
                            </div>

                        
                        </div>
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->


                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            <form action="db.php?newsid=<?php echo $id;?>" method="POST">
                                <div class="form-group">
                                    <label for="comment">Comment!</label>
                                    <textarea id="" cols="30" name="comment" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <input type="submit" value="Leave a comment" name="comnt"
                                        class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="mb-3">
                        
                        
                        
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold text-danger"> Comments!</h4>
                        </div>

                        <?php
                            $sql="SELECT user.img, user.name,comment.comment,comment.date FROM user 
                            INNER JOIN comment ON user.uid=comment.uid 
                            INNER JOIN news ON news.nid=comment.nid WHERE news.nid='$id' ORDER BY date DESC";
                            $res=mysqli_query($con,$sql);
                            
                            foreach($res as $row)
                            {
                                
                                $cm=$row['comment'];
                                $img=$row['img'];
                                $na=$row['name'];
                                $dt=$row['date'];
                                

                            
                        ?>

                        <div class="bg-white border border-top-0 p-4">
                            <div class="media mb-4">
                                <img src="<?php echo $img;?>" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6><a class="text-secondary font-weight-bold" href=""><?php echo $na;?></a> <small><i><?php echo $dt;?></i></small></h6>
                                    <p><?php echo $cm;?></p>
                                    <!-- <button class="btn btn-sm btn-outline-secondary">Reply</button> -->
                                </div>
                            </div>

                            <div class="media">
                                <!-- <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;"> -->
                                <div class="media-body">
                                    <!-- <h6><a class="text-secondary font-weight-bold" href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                    <p>.</p>
                                    <button class="btn btn-sm btn-outline-secondary">Reply</button> -->
                                    <div class="media mt-4">
                                        <!-- <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                            style="width: 45px;"> -->
                                        <!-- <div class="media-body">
                                            <h6><a class="text-secondary font-weight-bold" href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                            <p>.</p>
                                            <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php }?>

                    </div>
                    <!-- Comment List End -->
                    
                    <!-- Comment Form End -->
                </div>

                <div class="col-lg-4">
                    <!-- Social Follow Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                                <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Fans</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;">
                                <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0185AE;">
                                <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Connects</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;">
                                <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                                <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Subscribers</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none" style="background: #055570;">
                                <i class="fab fa-vimeo-v text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

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

                    <?php
                        $sql="SELECT * FROM news ORDER BY view DESC LIMIT 6";
                        $res=mysqli_query($con,$sql); 
                    ?>

                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Trending News</h4>
                        </div>
                        <?php
                            foreach($res as $row)
                            {
                                $img=$row['img'];
                                $ps=$row['postdate'];
                                $sc=$row['subcategory'];
                                $id=$row['nid'];
                            
                        ?>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="<?php echo $img;?>" alt="" style="height:110px; width:110px;">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="db.php?readmore=<?php echo $id;?>">View More</a>
                                        <h6 class="text-body" href=""><small><?php echo $ps;?></small></h6>
                                    </div>
                                    <h6 class="h6 m-0 text-secondary text-uppercase font-weight-bold" href=""><?php echo $sc;?></h6>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                            <div class="input-group mb-2" style="width: 100%;">
                                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                                </div>
                            </div>
                            <small>Lorem ipsum dolor sit amet elit</small>
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex flex-wrap m-n1">
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


    <!-- Footer Start -->
    <?php
     include 'footer.php'; 
    ?>
    <!-- Footer End -->
</body>
</html>