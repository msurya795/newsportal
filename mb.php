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
        $sql2="select * from bookmark
        LEFT JOIN user_details ON bookmark.user_id=user_details.uid
        LEFT JOIN news_table ON bookmark.news_id=news_table.nid where role='member' and bookmark.user_id='$uid'";
        $result2=mysqli_query($conn,$sql2);

?>

<h1> My Bookmarks</h1>
<h5 class="text-primary"><?php if(isset($_GET['msg'])) echo $_GET['msg']; ?></h5>
<div class="table-responsive shadow-lg rounded-4">
<table class="table table-hover table-bordered align-middle text-center mb-0">

    <thead class="table-dark">
        <tr>
            <th class="fw-bold text-uppercase">News ID</th>
            <th class="fw-bold text-uppercase">User Id</th>
            <th class="fw-bold text-uppercase">Heading</th>
        </tr>
    </thead>

    <?php foreach($result2 as $row) { ?>

    <tbody>
        <tr>

            <td scope="col" class="text-start ps-3">
                <i class="fas fa-id-card text-primary me-2"></i>
                <?php echo  $row['news_id'] ?>
            </td>
            <td scope="col" class="fw-semibold">
                <i class="fas fa-user text-secondary me-2"></i>
                <?php echo $row['uid'] ?>
            </td>

            <td scope="col" class="fw-semibold">
                <i class="fas fa-text text-secondary me-2"></i>
               <a  href="db.php?singlenews2=<?php echo $row['nid'] ?>"> <?php echo substr($row['heading'] ,0,50) ?></a>
            </td>

        </tr>
    </tbody>

    <?php }?>

</table>
</div>

<?php
include "footer.php";
?>