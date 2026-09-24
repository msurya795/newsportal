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
        $sql2="select * from user_details where role='member' and is_verified=1 and is_deleted=0";
        $result2=mysqli_query($conn,$sql2);

?>

<h1> Verified Memebers</h1>
<h5 class="text-primary"><?php if(isset($_GET['msg'])) echo $_GET['msg']; ?></h5>
<div class="table-responsive shadow-lg rounded-4">
<table class="table table-hover table-bordered align-middle text-center mb-0">

    <thead class="table-dark">
        <tr>
            <th class="fw-bold text-uppercase">Member Name</th>
            <th class="fw-bold text-uppercase">Email</th>
            <th class="fw-bold text-uppercase">Mobile</th>
            <th class="fw-bold text-uppercase">Action</th>
        </tr>
    </thead>

    <?php foreach($result2 as $row) { ?>

    <tbody>
        <tr>

            <td scope="col" class="fw-semibold text-start ps-3">
                <i class="fas fa-user text-primary me-2"></i>
                <?php echo $row['name'] ?>
            </td>
            <td scope="col" class="fw-semibold text-start ps-3">
                <i class="fas fa-user text-primary me-2"></i>
                <?php echo $row['email'] ?>
            </td>
            <td scope="col" class="fw-semibold text-start ps-3">
                <i class="fas fa-user text-primary me-2"></i>
                <?php echo $row['mobile'] ?>
            </td>

            <td scope="col" class="text-nowrap">

                <a href="db.php?blockmember=<?php echo $row['uid'] ?>" class="btn btn-warning btn-sm rounded-pill me-2 mb-1">
                    <i class="fas fa-user-slash me-1"></i>
                    Block
                </a>

                <a href="db.php?delmember=<?php echo $row['uid'] ?>" class="btn btn-danger btn-sm rounded-pill mb-1">
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