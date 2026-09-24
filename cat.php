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
        $sql2="select * from category";
        $result2=mysqli_query($conn,$sql2);
?>

<h1>Locations</h1>
<h5 class="text-primary"><?php if(isset($_GET['msg'])) echo $_GET['msg']; ?></h5>
<div class="d-flex justify-content-end">
 <button data-bs-toggle="modal" data-bs-target="#addlocation">Add Category</button>
</div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="">Category_id</th>
            <th class="">Category_name</th>
            <th class="">Action</th>
        </tr>
    </thead>
    <?php foreach($result2 as $row) { ?>
    <tbody>
        <tr>
            <td scope="col"><?php echo $row['cat_id'] ?></td>
            <td scope="col"><?php echo $row['category'] ?></td>
            <td>
                <!-- <a href="db.php?delcat=<?php echo $row['cat_id'] ?>" class="btn btn-danger">delete</a> -->
                <?php
                if($row['cat_is_delete']==0)
                {
                ?>

                    <a href="db.php?delcat=<?php echo $row['cat_id'] ?>" 
                       class="btn btn-danger">
                        delete
                    </a>

                <?php
                }
                else
                {
                ?>

                    <a href="db.php?actcat=<?php echo $row['cat_id'] ?>" 
                       class="btn btn-success">
                        activate
                    </a>

                <?php
                }
                ?>
            
            
            </td>
        </tr>
    </tbody>
    <?php }?>
</table>

<div class="modal fade" id="addlocation" >
    <div class="modal-dialog">  //important class for modal to appear and disappear
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
            </div>
            <div class="modal-body">
                <form action="db.php" method="POST">
                <label for="" class="form-label">Category Name</label>
                <input type="text" id="category" class="form-control" name="category">
                <input type="submit" class="btn btn-primary" name="acat">
                </form>
            </div>
        </div>
    </div>
</div>




<?php
include "footer.php";
?>
