<?php
$uid=$_SESSION['uid'];
$role=$_SESSION['role'];
$sql="select * from user_details where uid='$uid' ";
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
        $sql2="select * from activity_log order by log_id desc ";
        $result2=mysqli_query($conn,$sql2);
?>

<h1 class="display-6 fw-bold text-primary text-center mb-4">Activity log</h1>
<h5 class="text-success fw-semibold mb-3">
    <?php if(isset($_GET['msg'])) echo $_GET['msg']; ?>
</h5>

<div class="container">
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover table-bordered align-middle text-center mb-0">
            <thead class="bg-dark text-white">
                <tr>
                    <th class="py-3">Uid</th>
                    <th class="py-3">Role</th>
                    <th class="py-3">Action</th>
                    <th class="py-3">Affected</th>
                    <th class="py-3">Time</th>
                </tr>
            </thead>
    
            <?php foreach($result2 as $row) { ?>
            <tbody>
                <tr>
                    <td class="fw-semibold"><?php echo $row['uid'] ?></td>
                    <td class="text-capitalize"><?php echo $row['role'] ?></td>
                    <td><?php echo $row['action'] ?></td>
                    <td><?php echo $row['affected'] ?></td>
                    <td class="text-nowrap"><?php echo $row['time'] ?></td>
                </tr>
            </tbody>
            <?php } ?>
    
        </table>
    </div>

</div>

<?php
include "footer.php";
?>
