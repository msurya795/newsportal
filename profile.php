<?php
$uid=$_SESSION['uid'];
$role=$_SESSION['role'];
$sql="select * from user_details
 INNER JOIN category ON user_details.cat_id=category.cat_id
 INNER JOIN location ON user_details.loc_id=location.loc_id
where uid='$uid'";
$result=mysqli_query($conn,$sql);
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
        

        
?>



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card w-100 h-100">
                    <p class="text-danger"> <?php if(!empty($msg)){ echo $msg; } ?></p>
                    <div class="card-body text-center">
                        <h2 class="card-title text-danger"> profile</h2>
                        <h5 class="card-title text-primary"></h5>
                        
                        <p class="card-text">ID:<?php echo $arr['uid'];?> </p>
                        <p class="card-text">NAME: <?php echo $arr['name'];?> </p>
                        <p class="card-text">MOBILE: <?php echo $arr['mobile'];?></p>
                        <p class="card-text">EMAIL:<?php echo $arr['email'];?></p>
                        <p class="card-text">Category:<?php echo $arr['category'];?></p>
                        <p class="card-text">Location:<?php echo $arr['location'];?></p>
                        <a href="db.php?editpro=<?php echo $arr['uid']?>" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            
            </div>
            <div class="col-4">
                <div class="card w-100 h-100">
                    <div class="card-body text-center">
                       <img src="<?php echo $arr['photo']?>"  class="rounded-circle h-50 w-50" alt="">
                        <form action="db.php" method="post" enctype="multipart/form-data">
                                <input class="form-control" type="file" name="img">
                                <input type="submit" value="upload" name="pic" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
    
<?php
include "footer.php";
?>