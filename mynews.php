<?php
$uid=$_SESSION['uid'];
 $eid=$_SESSION['uid'];
 $lid=$_SESSION['lid'];
 $cid=$_SESSION['cid'];
$role=$_SESSION['role'];
$sql="select * from user_details where uid='$uid'";
$result=mysqli_query($conn,$sql);
$arr=mysqli_fetch_array($result);
 if($arr['role']=='admin')
    {
        include "admin_header.php";
    }
    elseif($arr['role']=='editor')
        {
           include "editor_header.php"; 
        }
        elseif($arr['role']=='reporter')
        {
            include "reporter_header.php";
        }
        elseif($arr['role']=='member')
        {
            include "member_header.php";
        }
        $sql2="select * from news_table 
        INNER JOIN location ON news_table.n_location_id=location.loc_id
        INNER JOIN category ON news_table.n_category_id=category.cat_id
        where news_table.n_category_id='$cid' and news_table.n_location_id='$lid'and is_delete=0 ";
        $result2=mysqli_query($conn,$sql2);
        
?>

<h5 class="text-primary fw-bold text-center mb-4"><?php if(isset($_GET['msg'])) echo $_GET['msg']; ?></h5>

<div class="table-responsive shadow-lg rounded">
<table class="table table-hover table-striped table-bordered align-middle text-center mb-0">
    <thead class="table-dark">
        <tr>
            <th class="text-uppercase">Title</th>
            <th class="text-uppercase">Image</th>
            <th class="text-uppercase">Category</th>
            <th class="text-uppercase">Location</th>
            <th class="text-uppercase">Description</th>
            <th class="text-uppercase">Date</th>
            <th class="text-uppercase">Status</th>
            <th class="text-uppercase">Action</th>
        </tr>
    </thead>

    <?php foreach($result2 as $row) {?>

    <?php 
    $stat=$row['is_publish'];
        if($stat==0)
        {
        $status="not published";}
        elseif($stat==1)
        {
          $status="published";  }
    ?>

    <tbody>
        <tr>
            <td scope="col" class="fw-semibold text-start"><?php echo $row['heading'] ?></td>

            <td scope="col">
                <img src="<?php echo $row['news_image'] ?>" class="img-thumbnail rounded shadow-sm" style="width:90px;height:70px;object-fit:cover;">
            </td>

            <td scope="col">
                <span class="badge bg-primary px-3 py-2"><?php echo $row['category'] ?></span>
            </td>

            <td scope="col">
                <span class="badge bg-info text-dark px-3 py-2"><?php echo $row['location'] ?></span>
            </td>

            <td scope="col">
                <a href="db.php?vnid=<?php echo $row['nid'] ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                    <i class="fas fa-eye me-1"></i> View
                </a>
            </td>

            <td scope="col" class="text-nowrap">
                <?php echo $row['posted_date'] ?>
            </td>

            <td scope="col">
                <?php if($stat==1){ ?>
                    <span class="badge bg-success px-3 py-2"><?php echo $status ?></span>
                <?php } else { ?>
                    <span class="badge bg-warning text-dark px-3 py-2"><?php echo $status ?></span>
                <?php } ?>
            </td>

            <td scope="col">
                <a href="db.php?delnews=<?php echo $row['nid'] ?>" class="btn btn-danger btn-sm me-2 rounded-pill">
                    <i class="fas fa-trash-alt me-1"></i> Delete
                </a>

                <a href="db.php?editnews=<?php echo $row['nid'] ?>" class="btn btn-secondary btn-sm rounded-pill">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
            </td>
        </tr>
    </tbody>

    <?php }?>
</table>
</div>



<?php
include "footer.php";
?>
