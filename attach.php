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
        
        <img src="<?php if(isset($file)){echo $file; }?>" alt="">

    </div>
    
<?php
include "footer.php";
?>