<?php
include "header.php";
$conn = mysqli_connect("localhost", "root", "", "news");
$sql = "select * from news_table
INNER JOIN category ON news_table.n_category_id=category.cat_id  where  is_breaking=1";   //where is_breaking=1
$result = mysqli_query($conn, $sql);

$sql1 = "select * from news_table
INNER JOIN category ON news_table.n_category_id=category.cat_id
INNER JOIN user_details ON news_table.reporter_id=user_details.uid
where n_category_id=2 and news_table.is_publish=1 and user_details.is_verified=1 ORDER BY news_table.nid DESC LIMIT 1";
$result1 = mysqli_query($conn, $sql1);

$sql2 = "select * from news_table
INNER JOIN category ON news_table.n_category_id=category.cat_id
INNER JOIN user_details ON news_table.reporter_id=user_details.uid
where n_category_id=3 and news_table.is_publish=1 and user_details.is_verified=1 ORDER BY news_table.nid DESC LIMIT 1";
$result2 = mysqli_query($conn, $sql2);

$sql3 = "select * from news_table
INNER JOIN category ON news_table.n_category_id=category.cat_id
INNER JOIN user_details ON news_table.reporter_id=user_details.uid
where n_category_id=4 and news_table.is_publish=1  and user_details.is_verified=1 ORDER BY news_table.nid DESC LIMIT 1";
$result3 = mysqli_query($conn, $sql3);

$sql4 = "select * from news_table
INNER JOIN category ON news_table.n_category_id=category.cat_id
INNER JOIN user_details ON news_table.reporter_id=user_details.uid
where n_category_id=5 and news_table.is_publish=1 and user_details.is_verified=1 ORDER BY news_table.nid DESC LIMIT 1";
$result4 = mysqli_query($conn, $sql4);

//query for latest news
// $sql5="select * from news_table INNER JOIN category ON news_table.n_category_id=category.cat_id
// INNER JOIN user_details ON news_table.n_category_id=user_details.cat_id order by category.cat_id desc limit 8";


 
//this query is for sidebar clicking only selected category


if(isset($_GET['locat']) ||isset($_GET['catcat']) || isset($_POST['keyword']))   // selecting only location in sidebar
{ if(!empty($_GET['locat'])&& empty($_GET['catcat']))
    {
        $locat=$_GET['locat'];
        if($locat=='all')
        {
           $sql6 = "SELECT *
            FROM news_table
            INNER JOIN category ON news_table.n_category_id = category.cat_id
            INNER JOIN user_details ON news_table.reporter_id = user_details.uid
            INNER JOIN location ON news_table.n_location_id=location.loc_id
            where is_publish=1 and is_delete=0 
            ORDER BY news_table.nid DESC
            LIMIT 8";
             $result5 = mysqli_query($conn, $sql6); 
        }
        else
        {
            $sql6 = "SELECT *
                FROM news_table
                INNER JOIN category ON news_table.n_category_id = category.cat_id
                INNER JOIN user_details ON news_table.reporter_id = user_details.uid
                INNER JOIN location ON news_table.n_location_id=location.loc_id
                where is_publish=1 and is_delete=0 and location.location='$locat'
                ORDER BY news_table.nid DESC
                LIMIT 8";
                 $result5 = mysqli_query($conn, $sql6);
        }
    }
    elseif(empty($_GET['locat'])&& !empty($_GET['catcat']))
    {
        $catcat=$_GET['catcat'];
        if($catcat=='all')
        {
           $sql6 = "SELECT *
            FROM news_table
            INNER JOIN category ON news_table.n_category_id = category.cat_id
            INNER JOIN user_details ON news_table.reporter_id = user_details.uid
            INNER JOIN location ON news_table.n_location_id=location.loc_id
            where is_publish=1 and is_delete=0 
            ORDER BY news_table.nid DESC
            LIMIT 8";
             $result5 = mysqli_query($conn, $sql6); 
        }
        else
        {
            $sql6 = "SELECT *
                FROM news_table
                INNER JOIN category ON news_table.n_category_id = category.cat_id
                INNER JOIN user_details ON news_table.reporter_id = user_details.uid
                INNER JOIN location ON news_table.n_location_id=location.loc_id
                where is_publish=1 and is_delete=0 and category.category='$catcat'
                ORDER BY news_table.nid DESC
                LIMIT 8";
                 $result5 = mysqli_query($conn, $sql6);
        }
    }
    elseif(!empty($_GET['locat'])&& !empty($_GET['catcat']))
    {
        $locat=$_GET['locat'];
        $catcat=$_GET['catcat'];
        $sql6 = "SELECT *
            FROM news_table
            INNER JOIN category ON news_table.n_category_id = category.cat_id
            INNER JOIN user_details ON news_table.reporter_id = user_details.uid
            INNER JOIN location ON news_table.n_location_id=location.loc_id
            where is_publish=1 and is_delete=0 and location.location='$locat' and category.category='$catcat'
            ORDER BY news_table.nid DESC
            LIMIT 8";
             $result5 = mysqli_query($conn, $sql6);
    }
    elseif(!empty($_POST['keyword']))
    {   
        $keyword=$_POST['keyword'];
       
        $sql6 = "SELECT *
            FROM news_table
            INNER JOIN category ON news_table.n_category_id = category.cat_id
            INNER JOIN user_details ON news_table.reporter_id = user_details.uid
            INNER JOIN location ON news_table.n_location_id=location.loc_id
            where is_publish=1 and is_delete=0 and news_table.description LIKE '%$keyword%' OR news_table.heading LIKE  '%$keyword%'
            ORDER BY news_table.nid DESC";
             $result5 = mysqli_query($conn, $sql6);
    }


}
else
{
   //query for latest news
 
    $sql5 = "SELECT *
FROM news_table
INNER JOIN category ON news_table.n_category_id = category.cat_id
INNER JOIN user_details ON news_table.reporter_id = user_details.uid
INNER JOIN location ON news_table.n_location_id=location.loc_id
where is_publish=1 and news_table.is_delete=0 and user_details.is_verified=1
ORDER BY news_table.nid DESC
LIMIT 8";
 $result5 = mysqli_query($conn, $sql5);
}

$sqlc = "select * from category";
$resultc = mysqli_query($conn, $sqlc);

$sqll = "select * from location";
$resultl = mysqli_query($conn, $sqll);


?>




<!-- Main News Slider Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 px-0">
            <div class="owl-carousel main-carousel position-relative">
                <?php foreach ($result as $row) { ?>
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="<?php echo $row['news_image']; ?>" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href=""><?php echo $row['category']; ?></a>
                                <a class="text-white" href=""><?php echo $row['posted_date']; ?></a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="db.php?singlenews2=<?php echo $row['nid'] ?>"><?php echo $row['heading']; ?></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>


        <div class="col-lg-5 px-0">
            <div class="row mx-0">
                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <?php foreach ($result1 as $row1) { ?>
                            <img class="img-fluid w-100 h-100" src="<?php echo $row1['news_image']; ?>" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href=""><?php echo $row1['category']; ?></a>
                                    <a class="text-white" href=""><small><?php echo $row1['posted_date']; ?></small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="db.php?singlenews2=<?php echo $row1['nid'] ?>"><?php echo $row1['heading']; ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <?php foreach ($result2 as $row1) { ?>
                            <img class="img-fluid w-100 h-100" src="<?php echo $row1['news_image']; ?>" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href=""><?php echo $row1['category']; ?></a>
                                    <a class="text-white" href=""><small><?php echo $row1['posted_date']; ?></small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="db.php?singlenews2=<?php echo $row1['nid'] ?>"><?php echo $row1['heading']; ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <?php foreach ($result3 as $row1) { ?>

                            <img class="img-fluid w-100 h-100" src="<?php echo $row1['news_image']; ?>" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href=""><?php echo $row1['category']; ?></a>
                                    <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="db.php?singlenews2=<?php echo $row1['nid'] ?>"><?php echo $row1['heading']; ?></a>
                            </div>
                        <?php } ?>

                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <?php foreach ($result4 as $row1) { ?>

                            <img class="img-fluid w-100 h-100" src="<?php echo $row1['news_image']; ?>" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href=""><?php echo $row1['category']; ?></a>
                                    <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="db.php?singlenews2=<?php echo $row1['nid'] ?>"><?php echo $row1['heading']; ?></a>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="db.php?viewall">View All</a>
                        </div>
                    </div>
                    

                    

                    <?php foreach ($result5 as $row) { ?>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">

                                <img class="img-fluid w-100" src="<?php echo $row['news_image'] ?>" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href=""><?php echo $row['category'] ?>
                                        </a>
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href=""><?php echo $row['location'] ?>
                                        </a>

                                        <a class="text-body" href=""><small><?php echo $row['posted_date'] ?></small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="db.php?singlenews2=<?php echo $row['nid'] ?>"><?php echo substr($row['heading'], 0, 20) ?></a>
                                    <p class="m-0"><?php echo substr($row['description'], 0, 80) . "..." ?></p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="<?php echo $row['photo']; ?>" width="25" height="25" alt="">
                                        <small><?php echo $row['name'] ?></small>
                                    </div>
                                    <?php 
                                            $sql6 = "SELECT COUNT(distinct com_id) AS comment_count 
                                                    FROM comment 
                                                    WHERE news_id = " . $row['nid'] . "   "; 
                                            $result6=mysqli_query($conn,$sql6);
                                            $arr=mysqli_fetch_array($result6);
                                    ?>

                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i> <?php echo $row['views'] ?></small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i><?php echo $arr['comment_count']  ?></small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>

                    



                </div>
            </div>

            <div class="col-lg-4">
              <?php include "sidebar.php" ?>

                <!-- Popular News Start -->

                 <?php
                        $sql="SELECT * FROM news_table
                        INNER JOIN user_details ON news_table.reporter_id=user_details.uid
                        WHERE user_details.is_verified=1
                         ORDER BY views DESC LIMIT 6";
                        $res=mysqli_query($conn,$sql); 
                    ?>
                         <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Trending News</h4>
                        </div>
                        <?php
                            foreach($res as $row)
                            {
                                $img=$row['news_image'];
                                $ps=$row['posted_date'];
                                $sc=substr($row['heading'],0,20);
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




            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->

<?php
include "footer.php";
?>