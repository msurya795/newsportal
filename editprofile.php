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

     <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
        <h4 class="mb-0">Edit Profile</h4>
    </div>

<div class="card-body p-4">

    <form action="db.php" method="POST">
    
         
    
         <div class="form-group mb-3">
             <label for="name">Name</label>
             <input type="text" class="form-control" id="name" name="name"
                 value="<?php echo $arr['name']; ?>">
         </div>
    
         <div class="form-group mb-3">
             <label for="mobile">Mobile</label>
             <input type="text" class="form-control" id="mobile" name="mobile"
                 value="<?php echo $arr['mobile']; ?>">
         </div>
    
         <div class="form-group mb-3">
             <label for="email">Email</label>
             <input type="email" class="form-control" id="email" name="email"
                 value="<?php echo $arr['email']; ?>">
         </div>
    
         <div class="form-group mb-3">
             <label for="password">Password</label>
             <input type="text" class="form-control" id="password" name="password"
                 value="<?php echo $arr['password']; ?>">
         </div>
    
         
    
         <div class="text-center">
             <input type="submit" name="updateprofile" value="Update Profile" class="btn btn-primary">
         </div>
    
     </form>
</div>

</div>
<?php include "footer.php" ?>