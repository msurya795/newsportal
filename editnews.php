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
       
        
?>



<div class="container col-sm-4">
    <form action="db.php" method="POST" enctype="multipart/form-data" class="card border-0 shadow-lg rounded-4 p-4 bg-white">

    <h3 class="text-center text-primary fw-bold mb-4">
        <i class="fas fa-edit me-2"></i>Edit News
    </h3>

    <p class="text-danger text-center fw-semibold mb-3">
        <?php if(isset($_GET['msg'])) echo $_GET['msg']; ?>
    </p>

    <?php foreach($result2 as $row) { ?>

    <div class="mb-4">
        <label for="" class="form-label fw-bold text-dark">
            News Title
        </label>
        <input type="text" name="title" id="" class="form-control form-control-lg shadow-sm rounded-3"
            value="<?php echo $row['heading'] ?>">
    </div>
    <div class="mb-4">
        <img src="<?php echo $row['news_image']; ?>" alt="" class="w-25">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold text-dark">
            <i class="fas fa-image text-success me-2"></i>Upload Image
        </label>
        <input type="file" name="nimg" id="" class="form-control form-control-lg shadow-sm rounded-3">
        <small class="text-muted">Leave this empty if you don't want to change the image.</small>
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold text-dark">
            <i class="fas fa-align-left text-info me-2"></i>Description
        </label>
        <textarea name="desc" id="desc" class="form-control shadow-sm rounded-3" rows="8"><?php echo $row['description'] ?></textarea>
    </div>

    <!-- hidden inputs for news id details -->
    <input type="hidden" name="nid" value="<?php echo $row['nid']; ?>">

    <div class="d-grid gap-2 mt-4">
        <input type="submit" name="enews" value="Update News"
            class="btn btn-danger btn-lg rounded-pill fw-bold shadow">
    </div>

    <?php } ?>

</form>
</div>

<?php include "footer.php"; ?>