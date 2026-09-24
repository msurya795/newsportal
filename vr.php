<?php
$uid=$_SESSION['uid'];
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
        $sql2="select u.uid,u.name,u.email,u.mobile,u.cat_id,u.loc_id,c.category AS category_name,l.location AS location_name from user_details u 
        LEFT JOIN category c ON u.cat_id=c.cat_id
        LEFT JOIN location l ON u.loc_id=l.loc_id
        where u.role='reporter' and u.is_verified=1 and u.is_deleted=0";
        $result2=mysqli_query($conn,$sql2);
        $rows = mysqli_fetch_all($result2, MYSQLI_ASSOC);
?>

<h1> Verified reporters</h1>
<h5 class="text-primary"><?php if(isset($_GET['msg'])) echo $_GET['msg']; ?></h5>
<div class="table-responsive shadow-lg rounded-4">
<table class="table table-hover table-bordered align-middle text-center mb-0">

    <thead class="table-dark">
        <tr>
            <th class="fw-bold text-uppercase">Reporter Name</th>
            <th class="fw-bold text-uppercase">Email</th>
            <th class="fw-bold text-uppercase">Mobile</th>
            <th class="fw-bold text-uppercase">Reporter Category</th>
            <th class="fw-bold text-uppercase">Reporter Location</th>
            <th class="fw-bold text-uppercase">Action</th>
        </tr>
    </thead>

    <?php foreach($rows as $row) { ?>

    <tbody>
        <tr>

            <td scope="col" class="fw-semibold text-start ps-3">
                <i class="fas fa-user-tie text-primary me-2"></i>
                <?php echo $row['name'] ?>
            </td>
            <td scope="col" class="fw-semibold text-start ps-3">
                <i class="fas fa-user-tie text-primary me-2"></i>
                <?php echo $row['email'] ?>
            </td>
            <td scope="col" class="fw-semibold text-start ps-3">
                <i class="fas fa-user-tie text-primary me-2"></i>
                <?php echo $row['mobile'] ?>
            </td>

            <td scope="col">
                <span class="badge bg-primary rounded-pill px-3 py-2">
                    <?php echo $row['category_name'] ?>
                </span>
            </td>

            <td scope="col">
                <span class="badge bg-info text-dark rounded-pill px-3 py-2">
                    <i class="fas fa-map-marker-alt me-1"></i>
                    <?php echo $row['location_name'] ?>
                </span>
            </td>

            <td scope="col" class="text-nowrap">

                <a href="db.php?disreporter=<?php echo $row['uid'] ?>" class="btn btn-warning btn-sm rounded-pill me-2 mb-1">
                    <i class="fas fa-user-slash me-1"></i>
                    Disapprove
                </a>

                <a href="db.php?delreporter2=<?php echo $row['uid'] ?>" class="btn btn-danger btn-sm rounded-pill mb-1">
                    <i class="fas fa-trash-alt me-1"></i>
                    Delete
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
