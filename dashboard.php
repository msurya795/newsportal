
<?php



$uid=$_SESSION['uid'];
$role=$_SESSION['role'];
 $lid=$_SESSION['lid'];
$cid=$_SESSION['cid'];

$sqlh="select * from user_details
 INNER JOIN category ON user_details.cat_id=category.cat_id
 INNER JOIN location ON user_details.loc_id=location.loc_id
where uid='$uid'";
$result=mysqli_query($conn,$sqlh);
$arr=mysqli_fetch_array($result);
 if($role=='admin')
    {
        include "admin_header.php";
    }
    elseif($role=='editor')
        {
           include "editor_header.php"; 
        }
        elseif($role=='reporter')
        {
            include "reporter_header.php";
        }
        elseif($role=='member')
        {
            include "member_header.php";
        }
        

// total news
if($role=='admin')
{
    $sql = "select count(*) as total_news from news_table where is_delete=0";
    $result = mysqli_query($conn, $sql);
    $arr = mysqli_fetch_array($result);
    $total_news = $arr['total_news'];
}
elseif($role=='reporter')
{
   $sql = "select count(*) as total_news from news_table where reporter_id='$uid' and  is_delete=0";
    $result = mysqli_query($conn, $sql);
    $arr = mysqli_fetch_array($result);
    $total_news = $arr['total_news']; 
}
if($role=='editor')
{
    $sql = "select count(*) as total_news from news_table where published_by='$uid' and is_delete=0";
    $result = mysqli_query($conn, $sql);
    $arr = mysqli_fetch_array($result);
    $total_news = $arr['total_news'];
}



// published news
if($role=='admin')
{
    $sql1 = "select count(*) as published_news from news_table where is_delete=0 and is_publish=1";
    $result1 = mysqli_query($conn, $sql1);
    $arr1 = mysqli_fetch_array($result1);
    $published_news = $arr1['published_news'];
}
elseif($role=='editor')
{
   $sql1 = "select count(*) as published_news from news_table where published_by='$uid'and is_delete=0 and is_publish=1";
    $result1 = mysqli_query($conn, $sql1);
    $arr1 = mysqli_fetch_array($result1);
    $published_news = $arr1['published_news']; 
}
elseif($role=='reporter')
{
   $sql1 = "select count(*) as published_news from news_table where reporter_id='$uid'and is_delete=0 and is_publish=1";
    $result1 = mysqli_query($conn, $sql1);
    $arr1 = mysqli_fetch_array($result1);
    $published_news = $arr1['published_news']; 
}


// unpublished news
if($role=='admin')
{
    $sql2 = "select count(*) as pending_news from news_table where is_delete=0 and is_publish=0";
    $result2 = mysqli_query($conn, $sql2);
    $arr2 = mysqli_fetch_array($result2);
    $pending_news = $arr2['pending_news'];
}
elseif($role=='editor')
{
    $sql2 = "select count(*) as pending_news from news_table where n_category_id='$cid' and n_location_id='$lid' and is_delete=0 and is_publish=0";
    $result2 = mysqli_query($conn, $sql2);
    $arr2 = mysqli_fetch_array($result2);
    $pending_news = $arr2['pending_news'];
}
elseif($role=='reporter')
{
    $sql2 = "select count(*) as pending_news from news_table where n_category_id='$cid' and n_location_id='$lid' and is_delete=0 and reporter_id='$uid' and is_publish=0";
    $result2 = mysqli_query($conn, $sql2);
    $arr2 = mysqli_fetch_array($result2);
    $pending_news = $arr2['pending_news'];
}


// total users
$sql3 = "select count(*) as total_users from user_details where is_deleted=0";
$result3 = mysqli_query($conn, $sql3);
$arr3 = mysqli_fetch_array($result3);
$total_users = $arr3['total_users'];


// total comments
if($role=='admin')
{
    $sql4 = "select count(*) as total_comments from comment where is_delete=0";
    $result4 = mysqli_query($conn, $sql4);
    $arr4 = mysqli_fetch_array($result4);
    $total_comments = $arr4['total_comments'];
   
}
elseif($role=='editor')
{
  $sql4 = "select count(*) as total_comments from comment
  INNER JOIN news_table on comment.news_id=news_table.nid where comment.is_delete=0 and news_table.published_by='$uid'";
    $result4 = mysqli_query($conn, $sql4);
    $arr4 = mysqli_fetch_array($result4);
    $total_comments = $arr4['total_comments'];  
}
elseif($role=='reporter')
{
  $sql4 = "select count(*) as total_comments from comment
  INNER JOIN news_table on comment.news_id=news_table.nid where comment.is_delete=0 and news_table.reporter_id='$uid'";
    $result4 = mysqli_query($conn, $sql4);
    $arr4 = mysqli_fetch_array($result4);
    $total_comments = $arr4['total_comments'];  
}


// unread activities
if($role=='admin')
{

    $sql5 = "select count(*) as total_activity from activity_log where is_open=0";
    $result5 = mysqli_query($conn, $sql5);
    $arr5 = mysqli_fetch_array($result5);
    $total_activity = $arr5['total_activity'];
}
else
{
    $total_activity=0;
}


// unread messages for admin
$uid=$_SESSION['uid'];

$sql6 = "select count(*) as total_message from chat where to_id=$uid and is_read=0 and is_delete=0";
$result6 = mysqli_query($conn, $sql6);
$arr6 = mysqli_fetch_array($result6);
$total_message = $arr6['total_message'];


// users by role
$sql7 = "select role,count(*) as total from user_details where is_deleted=0 group by role";
$result7 = mysqli_query($conn, $sql7);


// latest news
if($role=='admin')
{
    $sql8 = "select news_table.*,category.category,user_details.name
    from news_table
    INNER JOIN category ON news_table.n_category_id=category.cat_id
    INNER JOIN user_details ON news_table.reporter_id=user_details.uid
    where news_table.is_delete=0
    order by news_table.nid desc
    limit 5";
    $result8 = mysqli_query($conn, $sql8);

}
elseif($role=='editor')
{
    $sql8 = "select news_table.*,category.category,user_details.name
    from news_table
    INNER JOIN category ON news_table.n_category_id=category.cat_id
    INNER JOIN user_details ON news_table.reporter_id=user_details.uid
    where news_table.is_delete=0 and news_table.published_by='$uid'
    order by news_table.nid desc
    limit 5";
    $result8 = mysqli_query($conn, $sql8);
}
elseif($role=='reporter')
{
    $sql8 = "select news_table.*,category.category,user_details.name
    from news_table
    INNER JOIN category ON news_table.n_category_id=category.cat_id
    INNER JOIN user_details ON news_table.reporter_id=user_details.uid
    where news_table.is_delete=0 and news_table.reporter_id='$uid'
    order by news_table.nid desc
    limit 5";
    $result8 = mysqli_query($conn, $sql8);
}
elseif($role=='member')
{
    $sql8 = "select news_table.*,category.category,user_details.name
    from news_table
    INNER JOIN category ON news_table.n_category_id=category.cat_id
    INNER JOIN user_details ON news_table.reporter_id=user_details.uid
    where news_table.is_delete=0 and news_table.is_publish=1
    order by news_table.nid desc
    limit 5";
    $result8 = mysqli_query($conn, $sql8);  
}


// recent activity
if($role=='admin')
{

    $sql9 = "select activity_log.*,user_details.name
    from activity_log
    LEFT JOIN user_details ON activity_log.uid=user_details.uid
    order by activity_log.log_id desc
    limit 6";
    $result9 = mysqli_query($conn, $sql9);
}

elseif($role=='member' || $role=='reporter' || $role=='editor')
{
    $sql9 = "select activity_log.*,user_details.name
    from activity_log
    LEFT JOIN user_details ON activity_log.uid=user_details.uid where activity_log.uid='$uid'
    order by activity_log.log_id desc
    limit 6";
    $result9 = mysqli_query($conn, $sql9);
}


// news by category
if($role=='admin')
{
    $sql10 = "select category.category,count(news_table.nid) as total
    from category
    LEFT JOIN news_table ON news_table.n_category_id=category.cat_id
    and news_table.is_delete=0
    group by category.cat_id";
    $result10 = mysqli_query($conn, $sql10);
}
elseif($role=='editor')
{
    $sql10 = "select category.category,count(news_table.nid) as total
    from category
    LEFT JOIN news_table ON news_table.n_category_id=category.cat_id
    and news_table.is_delete=0 and news_table.published_by='$uid'
    group by category.cat_id";
    $result10 = mysqli_query($conn, $sql10);
}
elseif($role=='reporter')
{
    $sql10 = "select category.category,count(news_table.nid) as total
    from category
    LEFT JOIN news_table ON news_table.n_category_id=category.cat_id
    and news_table.is_delete=0 and news_table.reporter_id='$uid'
    group by category.cat_id";
    $result10 = mysqli_query($conn, $sql10);
}

?>


<!-- Dashboard Start -->

<div class="container-fluid">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="section-title">

                    <h4 class="m-0 text-uppercase font-weight-bold">
                        <?php 
                        if($role=='admin')
                        {
                            echo "Admin Dashboard";
                        } 
                        elseif($role=='editor')
                        {
                            echo "Editor Dashboard";
                        } 
                        elseif($role=='reporter')
                        {
                            echo "Reporter Dashboard";
                        }
                        elseif($role=='member')
                        {
                            echo "Member Dashboard";
                        }  
                            
                            ?>
                    </h4>

                </div>

            </div>

        </div>


        <!-- Dashboard Cards -->
        <?php if($role!='member') { ?>
        <div class="row">


            <!-- Total News -->

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="bg-primary text-white p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-uppercase font-weight-bold">
                                Total News
                            </h6>

                            <h2 class="m-0">
                                <?php echo $total_news; ?>
                            </h2>

                        </div>

                        <div>

                            <i class="fas fa-newspaper fa-3x"></i>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Published News -->

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="bg-success text-white p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-uppercase font-weight-bold">
                                Published
                            </h6>

                            <h2 class="m-0">
                                <?php echo $published_news; ?>
                            </h2>

                        </div>

                        <div>

                            <i class="fas fa-check-circle fa-3x"></i>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Pending News -->

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="bg-warning text-white p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-uppercase font-weight-bold">
                                Pending News
                            </h6>

                            <h2 class="m-0">
                                <?php echo $pending_news; ?>
                            </h2>

                        </div>

                        <div>

                            <i class="fas fa-clock fa-3x"></i>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Users -->

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="bg-info text-white p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-uppercase font-weight-bold">
                                Users
                            </h6>

                            <h2 class="m-0">
                                <?php echo $total_users; ?>
                            </h2>

                        </div>

                        <div>

                            <i class="fas fa-users fa-3x"></i>

                        </div>

                    </div>

                </div>

            </div>


        </div>
       


        <!-- Second Row Cards -->

        <div class="row">


            <!-- Comments -->

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="bg-secondary text-white p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-uppercase font-weight-bold">
                                Comments
                            </h6>

                            <h2 class="m-0 text-white">
                                <?php echo $total_comments; ?>
                            </h2>

                        </div>

                        <div>

                            <i class="fas fa-comments fa-3x"></i>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Activities -->

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="bg-dark text-white p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-uppercase font-weight-bold">
                                New Activities
                            </h6>

                            <h2 class="m-0">
                                <?php echo $total_activity; ?>
                            </h2>

                        </div>

                        <div>

                            <i class="fas fa-bell fa-3x"></i>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Messages -->

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="bg-danger text-white p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-uppercase font-weight-bold">
                                New Messages
                            </h6>

                            <h2 class="m-0">
                                <?php echo $total_message; ?>
                            </h2>

                        </div>

                        <div>

                            <i class="fas fa-envelope fa-3x"></i>

                        </div>

                    </div>

                </div>

            </div>


        </div>


        <!-- Users and Category -->

        <div class="row">


            <!-- Users By Role -->

            <div class="col-lg-4 mb-4">

                <div class="section-title mb-3">

                    <h5 class="m-0 text-uppercase font-weight-bold">
                        Users By Role
                    </h5>

                </div>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead class="table-dark">

                            <tr>

                                <th>Role</th>

                                <th>Total</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach($result7 as $row) { ?>

                            <tr>

                                <td class="text-uppercase">
                                    <?php echo $row['role']; ?>
                                </td>

                                <td>
                                    <?php echo $row['total']; ?>
                                </td>

                            </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- News By Category -->

            <div class="col-lg-8 mb-4">

                <div class="section-title mb-3">

                    <h5 class="m-0 text-uppercase font-weight-bold">
                        News By Category
                    </h5>

                </div>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead class="table-dark">

                            <tr>

                                <th>Category</th>

                                <th>Total News</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach($result10 as $row) { ?>

                            <tr>

                                <td class="text-uppercase">
                                    <?php echo $row['category']; ?>
                                </td>

                                <td>
                                    <?php echo $row['total']; ?>
                                </td>

                            </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>


        </div>
 <?php } ?>

        <!-- Latest News -->

        <div class="row">

            <div class="col-12">

                <div class="section-title">

                    <h5 class="m-0 text-uppercase font-weight-bold">
                        Latest News
                    </h5>

                </div>

            </div>


            <div class="col-12 mb-4">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead class="table-dark">

                            <tr>

                                <th>NID</th>

                                <th>Heading</th>

                                <th>Category</th>

                                <th>Reporter</th>

                                <th>Date</th>

                                <th>Views</th>

                                <th>Status</th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php foreach($result8 as $row) { ?>

                            <tr>

                                <td>
                                    <?php echo $row['nid']; ?>
                                </td>

                                <td>
                                    <?php echo substr($row['heading'],0,30); ?>
                                </td>

                                <td>
                                    <?php echo $row['category']; ?>
                                </td>

                                <td>
                                    <?php echo $row['name']; ?>
                                </td>

                                <td>
                                    <?php echo $row['posted_date']; ?>
                                </td>

                                <td>
                                    <?php echo $row['views']; ?>
                                </td>

                                <td>

                                    <?php
                                    if($row['is_publish']==1)
                                    {
                                    ?>

                                        <span class="badge badge-success">
                                            Published
                                        </span>

                                    <?php
                                    }
                                    else
                                    {
                                    ?>

                                        <span class="badge badge-warning">
                                            Pending
                                        </span>

                                    <?php
                                    }
                                    ?>

                                </td>

                            </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        <!-- Recent Activity -->

        <div class="row">

            <div class="col-12">

                <div class="section-title">

                    <h5 class="m-0 text-uppercase font-weight-bold">
                        Recent Activity
                    </h5>

                </div>

            </div>


            <div class="col-12 mb-4">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead class="table-dark">

                            <tr>

                                <th>User</th>
                                <th>Role</th>
                                <th>Action</th>

                                <th>Affected</th>

                                <th>Time</th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php foreach($result9 as $row) { ?>

                            <tr>

                                <td>

                                    <?php
                                    if(!empty($row['name']))
                                    {
                                        echo $row['name'];
                                    }
                                    else
                                    {
                                        echo "Unknown";
                                    }
                                    ?>

                                </td>
                                <td>
                                    <?php echo $row['role']; ?>
                                </td>
                                <td>
                                    <?php echo $row['action']; ?>
                                </td>

                                <td>
                                    <?php echo $row['affected']; ?>
                                </td>

                                <td>
                                    <?php echo $row['time']; ?>
                                </td>

                            </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


    </div>

</div>

<!-- Dashboard End -->
```

<?php include "footer.php" ?>
