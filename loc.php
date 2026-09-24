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

$sql2="select * from location";
$result2=mysqli_query($conn,$sql2);
?>


<h1>Locations</h1>

<h5 class="text-primary">
    <?php if(isset($_GET['msg'])) echo $_GET['msg']; ?>
</h5>

<div class="d-flex justify-content-end">
    <button data-bs-toggle="modal" data-bs-target="#addlocation">
        add location
    </button>
</div>

<table class="table table-striped table-bordered">

    <thead>
        <tr>
            <th>Location_id</th>
            <th>Location_name</th>
            <th>Action</th>
        </tr>
    </thead>

    <?php foreach($result2 as $row) { ?>

    <tbody>

        <tr>

            <td scope="col">
                <?php echo $row['loc_id'] ?>
            </td>

            <td scope="col">
                <?php echo $row['location'] ?>
            </td>

            <td>

                <?php
                if($row['loc_is_delete']==0)
                {
                ?>

                    <a href="db.php?delloc=<?php echo $row['loc_id'] ?>" 
                       class="btn btn-danger">
                        delete
                    </a>

                <?php
                }
                else
                {
                ?>

                    <a href="db.php?actlocate=<?php echo $row['loc_id'] ?>" 
                       class="btn btn-success">
                        activate
                    </a>

                <?php
                }
                ?>

            </td>

        </tr>

    </tbody>

    <?php } ?>

</table>


<div class="modal fade" id="addlocation">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Add location
                </h5>

            </div>

            <div class="modal-body">

                <form action="db.php" method="POST">

                    <label for="" class="form-label">
                        Country Name
                    </label>

                    <input type="text" id="location" 
                           class="form-control" 
                           name="location">

                    <input type="submit" 
                           class="btn btn-primary" 
                           name="aloc">

                </form>

            </div>

        </div>

    </div>

</div>


<?php
include "footer.php";
?>