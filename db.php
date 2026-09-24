<?php
$conn= mysqli_connect("localhost","root","","news");
$json=file_get_contents('php://input');
$data=json_decode($json,true);
session_start();
if(isset($data))    //its compulsory to do this otherwise it will keep warning you untill the page getting called
    {
        if($data['action']=="getcategory")
            {
                $sql="select * from category where cat_is_delete=0";
                $result=mysqli_query($conn,$sql);
                echo "<option value='7' selected>Select Cateogry</option>";
                foreach($result as $row)
                {
                    $cid=$row['cat_id'];
                    $cname=$row['category'];
                    echo "<option value='$cid'>$cname</option>";
                }
            }
            elseif($data['action']=="getlocation")
            {
                $sql="select * from location where loc_is_delete=0";
                $result=mysqli_query($conn,$sql);
                echo "<option value='1' selected>Select Location</option>";
                foreach($result as $row)
                {
                    $lid=$row['loc_id'];
                    $lname=$row['location'];
                    echo "<option value='$lid'>$lname</option>";
                }
            }
    }
elseif(isset($_POST['signup']))    //signup code start here
    {
        $n=$_POST['name'];
        $m=$_POST['mobile'];
        $e=$_POST['email'];
        $r=$_POST['role'];
        if($r=='editor' || $r=='reporter')
            {
                 $cat=$_POST['category'];
                 $loc=$_POST['location'];
               
            }
            else            //if a member is selected in radio button the default category should be 7
                {
                $cat=1;   
                $loc=1;
                }
       
        $psw=$_POST['password'];
    if(empty($n) || empty($m) || empty($e) || empty($r) || empty($psw))
        {
            header("Location:signup.php?msg=all fields are necessary");
                
        }
    else{
            //emailcheck
            $check="select * from user_details where email='$e'";
            $result=mysqli_query($conn,$check);
            $row=mysqli_num_rows($result);
            
            if($row>0)
                {
                    header("Location:signup.php?msg=email already exists!");
                    
                }
                else{
                
                    //password hashing
                    $hash=password_hash($psw,PASSWORD_DEFAULT);

                    //inserting the data
                    $sql1="insert into user_details (name,mobile,email,password,role,cat_id,loc_id) values('$n','$m','$e','$psw','$r','$cat','$loc')";
                    $run=mysqli_query($conn,$sql1);
                    if($run)
                    {
                        $sqlnew="select * from user_details order by uid desc limit 1";
                        $resulta=mysqli_query($conn,$sqlnew);
                        $arr=mysqli_fetch_array($resulta);
                        $uid=$arr['uid'];
                        $role=$arr['role'];
                        
                        $sql_ins="insert into activity_log(uid,role,action) values('$uid','$role','signed up')";
                            $result=mysqli_query($conn,$sql_ins);
                            
                        header("Location:signup.php?msg=You have signedup Succesfully!!");
                    }
                    else
                    {
                        header("Location:signup.php?msg=registration failed!!");

                    }
                }
                
            }
    }//signup code end
    

    //login code start
elseif(isset($_POST['login']))
    {
      if(!empty($_POST['email'] && !empty($_POST['password'])))
        {
            $e=$_POST['email'];
            $psw=$_POST['password'];

            $sql="select * from user_details where email='$e'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_num_rows($result);
            if($row>0)
                {
                    $sql="select * from user_details where email='$e' and password='$psw'";
                    $result=mysqli_query($conn,$sql);
                    $arr=mysqli_fetch_array($result);  //this is for verifing roel
                    $row=mysqli_num_rows($result);
                    if($row>0)
                        {   
                            $sql2="select * from user_details where email='$e' and password='$psw' and is_verified=1";
                            $result2=mysqli_query($conn,$sql2);
                            $arr=mysqli_fetch_array($result2);  //this is for verifing roel
                            $row2=mysqli_num_rows($result2);
                            if($row2>0)
                                {

                                    $_SESSION['uid']=$arr['uid'];    //getting session id
                                    $_SESSION['role']=$arr['role'];
                                    $_SESSION['lid']=$arr['loc_id'];    //getting session id
                                    $_SESSION['cid']=$arr['cat_id'];
        
                                    $uid=$_SESSION['uid'];
                                    $role=$_SESSION['role'];
                                    $sql_ins="insert into activity_log(uid,role,action) values('$uid','$role','logged in')";
                                    $result=mysqli_query($conn,$sql_ins);
        
        
                                       require 'profile.php';
                                }
                                else
                                {
                                    $msg="you are not yet authoriesd to login by the admin please return later";
                                    require "signin.php";
                                }
                            
                        }
                    else
                        {
                            header("Location:signin.php?msg=Your Password is Wrong , Please Check it !!");
                        }
                }
               else
                {
                  header("Location:signin.php?msg=Your Email is Wrong , Please Check it !!");
                }
        }
        else
            {
                header("Location:signin.php?msg=All fields are mandatory ");

            }
        


    }
    elseif(isset($_GET['logout']))
    {
         $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
         $sql_ins="insert into activity_log(uid,role,action) values('$uid','$role','logged out')";
        $result=mysqli_query($conn,$sql_ins);
        session_unset();
        session_destroy();
        require "index.php";        
    }

    //profile pic code start
    elseif(isset($_POST['pic']))
    {

        $uid = $_SESSION['uid'];
        $filename=$_FILES['img']['name'];
        $x=$_FILES['img']['tmp_name'];
        $sz=$_FILES['img']['size'];    //iimprotant
        $type=$_FILES['img']['type'];  //improtant
        $datetime = date("Y-m-d_H-i-s");
        $y="profilepics/".$datetime.$filename;
        if($type=='image/jpeg' || $type=='image/gif' ||$type=='image/png')
        {
            $imageinfo=getimagesize($x);  //important
            $w=$imageinfo[0];
            $h=$imageinfo[1];
            if($w>1000 && $h>1000)
            {
                echo "the uploaded image height should be less than 1000px and width should be less than 1000px";
            }
            else
            {
                if($sz<100000)
                {
                    
                    move_uploaded_file($x,$y);
                    $sql= "update user_details set photo='$y' where uid='$uid'";
                    $result= mysqli_query($conn,$sql);
                    if($result)
                        {
                            require "profile.php";

                        }
                        else{
                            echo "upload failed";
                        }
                }
                else
                {
                    echo "the profile pic size is more than 100kb upload a small image";
                }
            }
        }
        else
        {
            echo "image format should be jpg,jpeg or gif";
        }
    }
    //profile pic code end

    if(isset($_GET['editpro']))  //if person clicks edit button on editprofile
    {
        if(isset($_SESSION['uid']))
        {
            $uid=$_GET['editpro'];
            require "editprofile.php";

        }
        else
        {
            $msg="you are not logged in please login or signup to access the page";
            require "signin.php";
        }

    }
    if(isset($_POST['updateprofile'])) // updating the profile databasse 
    {
        if(isset($_SESSION['uid']))
        {

            $uid=$_SESSION['uid'];
            $role=$_SESSION['role'];
            $name=$_POST['name'];
            $mobile=$_POST['mobile'];
            $email=$_POST['email'];
            $password=$_POST['password'];
    
            $sql="UPDATE user_details SET name='$name', mobile='$mobile',email='$email' , password='$password' where uid='$uid' ";
            $result=mysqli_query($conn,$sql);
            if($result)
                {
                    $msg="update successful";
                $sql_ins="insert into activity_log(uid,role,action) values('$uid','$role','updated his details')";
                $result2=mysqli_query($conn,$sql_ins);
                require "profile.php";
                }
        }
        else
            {
                $msg="you are not logged in please login or signup to access the page";
                require "signin.php";
            }

    }
    
    elseif(isset($_GET['profile']))   //thiss is  for header function to work when clic profile or else it will show error
    {
        if(isset($_SESSION['uid']))
        {
            require "profile.php";

        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
        

    }
    
    elseif(isset($_GET['nvm']))   //thiss is  for header function to work when clic profile or else it will show error
    {
        if(isset($_SESSION['uid']))
        {
            $uid=$_SESSION['uid'];
            $role=$_SESSION['role'];
            require "nvm.php";

        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
        

    }
    elseif(isset($_GET['aprmember']))   //approve buton to approve member
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $mid=$_GET['aprmember'];
        $sql="update user_details set is_verified=1 where uid='$mid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','approved a member','$mid')";
            $result2=mysqli_query($conn,$sql_ins);
            require "nvm.php";
        }

    }
    elseif(isset($_GET['delmember']))   //delete buton to delete member
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $mid=$_GET['delmember'];
        $sql="update user_details set is_deleted=1 where uid='$mid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            require "nvm.php";
        }

    }
    elseif(isset($_GET['vm']))   //thiss is  for header function to work when clic profile or else it will show error
    {
        if(isset($_SESSION['uid']))
        {

            $uid=$_SESSION['uid'];
            $role=$_SESSION['role'];
            require "vm.php";
        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
    }
    elseif(isset($_GET['blockmember']))   //disaprove buton to disapprove person from verified members page
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $mid=$_GET['blockmember'];
        $sql="update user_details set is_verified=0 where uid='$mid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','disapproved a member','$mid')";
            $result2=mysqli_query($conn,$sql_ins);
            require "vm.php";
        }

    }
    elseif(isset($_GET['nvr']))   //this is for non verified reporters page
    {
        if(isset($_SESSION['uid']))
        {

            $uid=$_SESSION['uid'];
            $role=$_SESSION['role'];
            require "nvr.php";
        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
    }

    elseif(isset($_GET['aprreporter']))   //approve buton to approve reporter
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $mid=$_GET['aprreporter'];
        $sql="update user_details set is_verified=1 where uid='$mid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','approved a reporter','$mid')";
            $result2=mysqli_query($conn,$sql_ins);
            require "nvr.php";
        }
    }
    elseif(isset($_GET['delreporter']))   //delete buton to delete reporter from nvr
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $mid=$_GET['delreporter'];
        $sql="update user_details set is_deleted=1 where uid='$mid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','deleted non verified reporter','$mid')";
            $result2=mysqli_query($conn,$sql_ins);
            require "nvr.php";
        }

    }
    elseif(isset($_GET['vr']))   //this is for verified reporters page from menu nav bar
    {
        if(isset($_SESSION['uid']))
        {
            $uid=$_SESSION['uid'];
            $role=$_SESSION['role'];
            require "vr.php";

        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
    }
    elseif(isset($_GET['disreporter']))   //disaapprove buton to disapprove reporter from verified reporter page
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $mid=$_GET['disreporter'];
        $sql="update user_details set is_verified=0 where uid='$mid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','disapproved a reporter','$mid')";
            $result2=mysqli_query($conn,$sql_ins);
            require "vr.php";
        }
    }
    elseif(isset($_GET['delreporter2']))   //delete buton to delete reporter from verified reporter
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $mid=$_GET['delreporter2'];
        $sql="update user_details set is_deleted=1 where uid='$mid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','deleted verified reporter','$mid')";
            $result2=mysqli_query($conn,$sql_ins);
            require "vr.php";
        }

    }
     elseif(isset($_GET['nve']))   //this is for non verified editors page from menu nav bar
    {
        if(isset($_SESSION['uid']))
        {

            $uid=$_SESSION['uid'];
            $role=$_SESSION['role'];
            require "nve.php";
        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
    }
    elseif(isset($_GET['apreditor']))   //approve buton to approve editor for nonverified editor page
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $mid=$_GET['apreditor'];
        $sql="update user_details set is_verified=1 where uid='$mid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','approved an editor','$mid')";
            $result2=mysqli_query($conn,$sql_ins);
            require "nve.php";
        }
    }
    elseif(isset($_GET['deleditor']))   //delete buton to delete editor from non verified editor
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $mid=$_GET['deleditor'];
        $sql="update user_details set is_deleted=1 where uid='$mid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','deleted a verified editor','$mid')";
            $result2=mysqli_query($conn,$sql_ins);
            require "nve.php";
        }

    }
     elseif(isset($_GET['ve']))   //this is for verified editors page from menu nav bar
    {
        if(isset($_SESSION['uid']))
        {
            $uid=$_SESSION['uid'];
            $role=$_SESSION['role'];
            require "ve.php";

        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
    }
    elseif(isset($_GET['diseditor']))   //disapprove buton to disapprove editor for verified editor page
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $mid=$_GET['diseditor'];
        $sql="update user_details set is_verified=0 where uid='$mid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','disapproved an editor','$mid')";
            $result2=mysqli_query($conn,$sql_ins);
            require "ve.php";
        }
    }
    elseif(isset($_GET['deleditor2']))   //delete buton to delete editor from non verified editor
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $mid=$_GET['deleditor2'];
        $sql="update user_details set is_deleted=1 where uid='$mid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','deleted nonverified editor','$mid')";
            $result2=mysqli_query($conn,$sql_ins);
            require "ve.php";
        }

    }
    elseif(isset($_GET['vc']))   //thiss is  for comments header function to work when clic profile or else it will show error
    {
        if(isset($_SESSION['uid']))
        {

            $uid=$_SESSION['uid'];
            $role=$_SESSION['role'];
            if($role!='member')
            {
                require "vc.php";

            }
            else
            {
                require "mc.php";
            }
        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
    }
    elseif(isset($_GET['blockcmnt']))   //thiss is  for admin to disverify comment
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $comid=$_GET['blockcmnt'];
        $sql="update comment set is_verified=0 where com_id=$comid";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','disverified a comment ',' comment id is $comid')";
            $result2=mysqli_query($conn,$sql_ins);
            $msg="comment delted successfully";
            require "vc.php";
        }
        
    }
    elseif(isset($_GET['delcmnt']))   //thiss is  for admin to disverify comment
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $comid=$_GET['delcmnt'];
        $sql="update comment set is_delete=1 where com_id=$comid";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','deleted a comment ',' comment id is $comid')";
            $result2=mysqli_query($conn,$sql_ins);
            $msg="comment delted successfully";
            require "vc.php";
        }
        
    }
    elseif(isset($_GET['nvc']))   //thiss is  for nonverified comments header function to work when clic profile or else it will show error
    {
        if(isset($_SESSION['uid']))
        {
            $uid=$_SESSION['uid'];
            $role=$_SESSION['role'];
            require "nvc.php";

        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
    }
     elseif(isset($_GET['apprcmnt']))   //thiss is  for admin to approve comment
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $comid=$_GET['apprcmnt'];
        $sql="update comment set is_verified=1 where com_id=$comid";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','approved a comment ',' comment id is $comid')";
            $result2=mysqli_query($conn,$sql_ins);
            $msg="comment delted successfully";
            require "nvc.php";
        }
        
    }

    elseif(isset($_GET['loc']))   //this is for locations page in nav bar
    {
        if(isset($_SESSION['uid']))
        {

            $uid=$_SESSION['uid'];
            $role=$_SESSION['role'];
            require "loc.php";
        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
    }
    elseif(isset($_POST['aloc']))  //this is for adding location
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $loc=$_POST['location'];
        $sql="select * from location where location='$loc'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_num_rows($result);
        if($row>0)   //checkeing if the entered location already exists in database
        {
            echo "location already exists enter a new one";
        }
        else
        {
            $sql="insert into location(location) values('$loc')";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','added a location',' the location is $loc')";
                $result2=mysqli_query($conn,$sql_ins);
                require "loc.php";
            }
            else
            {
                echo "location insertion failed";
            }
        }
    }
    elseif(isset($_GET['delloc']))
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];  
        $lid=$_GET['delloc'];
        $sql="update  location set loc_is_delete=1 where loc_id='$lid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','deleted a location',' location id is $lid')";
            $result2=mysqli_query($conn,$sql_ins);
            require "loc.php";
        }
        else
        {
            echo "location deltion failed";
        }
    }
    //activating the location
    elseif(isset($_GET['actlocate']))
    {
        $lid=$_GET['actlocate'];

        $sql="update location set loc_is_delete=0 where loc_id='$lid'";
        mysqli_query($conn,$sql);

        $msg="Location activated";
        require "loc.php";
        
    }
    elseif(isset($_GET['cat']))   //this is for category page in nav bar
    {
        if(isset($_SESSION['uid']))
        {
            $uid=$_SESSION['uid'];
            $role=$_SESSION['role'];
            require "cat.php";

        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
    }

    elseif(isset($_POST['acat']))  //this is for adding category
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $cat=$_POST['category'];
        $sql="select * from category where category='$cat'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_num_rows($result);
        if($row>0)   //checkeing if the entered category already exists in database
        {
            
            echo "category already exists enter a new one";
        }
        else
        {
            $sql="insert into category(category) values('$cat')";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','added a new category','$cat')";
            $result2=mysqli_query($conn,$sql_ins);
                require "cat.php";
            }
            else
            {
                echo "category insertion failed";
            }
        }
    }
    elseif(isset($_GET['delcat']))
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];  
        $cid=$_GET['delcat'];
        $sql="update category set cat_is_delete=1 where cat_id='$cid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','deketed category','the catid is $cid')";
            $result2=mysqli_query($conn,$sql_ins);
            require "cat.php";
        }
        else
        {
            echo "category deltion failed";
        }
    }
    //activating the category
    elseif(isset($_GET['actcat']))
    {
        $cid=$_GET['actcat'];

        $sql="update category set cat_is_delete=0 where cat_id='$cid'";
        mysqli_query($conn,$sql);

        $msg="category activated";
        require "cat.php";
        
    }
    
//when reporter clicks upload news in navbar this code starts
    if(isset($_GET['unews']))  
    {
        if(isset($_SESSION['uid']))
        {

            require "unews.php"; 
        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
      
    }          //end of the upload news page

    //uploading news in database code start here by reporter

    if(isset($_POST['snews']))
    {
        $uid=$_SESSION['uid'];    //here its reporter in usertable but using uid to avoid confusion
        $role=$_SESSION['role'];
        $lid=$_SESSION['lid'];
        $cid=$_SESSION['cid'];
        // $title=$_POST['title'];
        $title= mysqli_real_escape_string($conn,$_POST['title']);
        $desc= mysqli_real_escape_string($conn,$_POST['desc']);
        // $desc=$_POST['desc'];
        $filename="newspic/".$_FILES['nimg']['name'];
        move_uploaded_file($_FILES['nimg']['tmp_name'],$filename);
        if(isset($_POST['breaking']))
        {
            $breaking=1;
        }
        else
        {
            $breaking=0;
        }
        $sql="insert into news_table(heading,n_category_id,n_location_id,description,news_image,reporter_id,is_breaking) values('$title','$cid','$lid','$desc','$filename','$uid','$breaking')";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','uploaded news','$title')";
            $result2=mysqli_query($conn,$sql_ins);
            $msg="news uploaded successfully";
            require "unews.php";
        }
        else
        {
            $msg="news upload failed";
            require "unews.php";
        }

    }

    if(isset($_GET['myn'])) //display news for reporter
    {
        if(isset($_SESSION['uid']))
        {

            require "mynews.php";
        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
    }
  if(isset($_GET['editnews'])) // if reporter clicks edit news button
    {

        $nid = $_GET['editnews'];

         $sql2 = "SELECT * FROM news_table
             INNER JOIN category ON news_table.n_category_id = category.cat_id
             INNER JOIN location ON news_table.n_location_id = location.loc_id
             WHERE nid='$nid' and category.cat_is_delete=0 and location.loc_is_delete=0";

    $result2 = mysqli_query($conn, $sql2);

    require "editnews.php";
    }
    if(isset($_GET['delnews'])) //if reporter click delte button on table in frontend
    {   
        $nid=$_GET['delnews'];
        $sql="update news_table set is_delete=1 where nid='$nid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {   $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','deleted news','news id is $nid')";
            $result2=mysqli_query($conn,$sql_ins);
            $msg="news deleted successfully";
            require "mynews.php";
        }
    }
    if(isset($_GET['edit'])) //edit news for reporter
    {
       $nid=$_GET['edit']; 
       require "editnews.php";
    }
    //this is updating the edit news
    if(isset($_POST['enews']))  
    {
        $nid=$_POST['nid'];
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $filename="newspic/".$_FILES['nimg']['name'];
        
        if(!empty($_FILES['nimg']['name']))
        {
              move_uploaded_file($_FILES['nimg']['tmp_name'],$filename);
              $sql="UPDATE news_table SET heading='$title', description='$desc',news_image='$filename' , is_publish=0, published_by=0 where nid='$nid' ";
              $result=mysqli_query($conn,$sql);
              if($result)
                {
                    $uid=$_SESSION['uid'];
                    $role=$_SESSION['role'];
                    $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','edited news this changes need approval from admin or editor',' news id:$nid')";
                    $result2=mysqli_query($conn,$sql_ins);
                    $msg="update successful";
                    require "newsv.php";
                }
                else
                {
                    $msg="update failed";
                    require "newsv.php";
                }
        }
        //this else is updation without image being uploaded

        else
        {
            $sql="UPDATE news_table SET heading='$title', description='$desc', is_publish=0 ,published_by=0 where nid='$nid' ";
              $result=mysqli_query($conn,$sql);
              if($result)
                {
                   $uid=$_SESSION['uid'];
                    $role=$_SESSION['role'];
                    $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','edited news needs approval from editor or admin',' news id:$nid')";
                    $result2=mysqli_query($conn,$sql_ins);
                    $msg="update successful";
                    require "newsv.php";
                }
                else
                {
                    $msg="update failed";
                        require "newsv.php";                
                }
        }

    }
    if(isset($_GET['editor']))  //if editor clicks on his profile
    {
        $eid=$_SESSION['uid'];
        $lid=$_SESSION['lid'];
        $cid=$_SESSION['cid'];
        require "profile.php";

    }
    if(isset($_GET['upnews'])) //if editor clicks unpublished news in navbar
    {
        if(isset($_SESSION['uid']))
        {

            require "newsnv.php";
        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
    }
    if(isset($_GET['publish'])) //if editor click publish button on table in frontend
    {   $uid=$_SESSION['uid'];
        $nid=$_GET['publish'];
        $sql="update news_table set is_publish=1 , published_by='$uid' where nid='$nid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {   $uid=$_SESSION['uid'];
            $role=$_SESSION['role'];
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','published news','newsid: $nid')";
            $result2=mysqli_query($conn,$sql_ins);
            $msg="news published successfully";
            if($uid==1)
            {
                require "adnewsnv.php";
            }
            else
            {
                require "newsnv.php";

            }
        }
    }
    if(isset($_GET['pnews'])) //if editor clicks unpublished news in navbar
    {
        if(isset($_SESSION['uid']))
        {
            require "newsv.php";

        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
    }
    if(isset($_GET['unpublish'])) //if editor click unpublish button on table in frontend
    {   
        $nid=$_GET['unpublish'];
        $sql="update news_table set is_publish=0 where nid='$nid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $msg="news unpublished successfully";
            require "newsv.php";
        }
    }
    elseif(isset($_GET['vnid'])) //if editor clicks to view descriptio button it redirects to a new page
    {
        $nid=$_GET['vnid'];
        require "viewnews.php";
    }
    elseif(isset($_GET['envr']))   //this is for non verified reporters page
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        require "envr.php";
    }
    elseif(isset($_GET['eaprreporter']))   //approve buton for editor to approve reporter
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $mid=$_GET['eaprreporter'];
        $sql="update user_details set is_verified=1 where uid='$mid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','approved a reporter','reporter id :$mid')";
            $result2=mysqli_query($conn,$sql_ins);
            require "envr.php";
        }
    }
     elseif(isset($_GET['evr']))   //this is for non verified reporters page
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        require "evr.php";
    }
    elseif(isset($_GET['edisaprreporter']))   //disapprove buton for editor to disapprove reporter
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $mid=$_GET['edisaprreporter'];
        $sql="update user_details set is_verified=0 where uid='$mid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','disapproved a reporter',' reporter id :$mid')";
            $result2=mysqli_query($conn,$sql_ins);
            require "evr.php";
        }
    }
    if(isset($_GET['adpnews'])) //if admin clicks published news in navbar
    {
        if(isset($_SESSION['uid']))
        {
            
            require "adnewsv.php";
        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
    }
    if(isset($_GET['adupnews'])) //if admin clicks unpublished news in navbar
    {
        if(isset($_SESSION['uid']))
        {

            require "adnewsnv.php";
        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
    }
    if(isset($_GET['singlenews'])) //from index anyone clicks on the latest news
    {
        $nid=$_GET['singlenews'];
        $query="update news_table set views= views+1 where nid='$nid'";
        $qresult=mysqli_query($conn,$query);
         require "single.php";
    }

    if(isset($_GET['memindex']))
        {
            if(isset($_SESSION['uid']))
            {
                $mid=$_SESSION['uid'];     //this mid is member id necessary for comment insertions
            }
            
            require "index.php";
        }

    if(isset($_GET['singlenews2'])) //from index member clicks on the latest news
    {
        if(isset($_SESSION['uid'])){
        $mid=$_SESSION['uid'];     //this mid is member id necessary for comment insertions
        }
        $nid=$_GET['singlenews2'];
        $query="update news_table set views= views+1 where nid='$nid'";
        $qresult=mysqli_query($conn,$query);
        if(isset($_SESSION['uid']))
        {

            require "single2.php";
        }
        else
        {
            require "single.php";
        }
    }

    //comments insertion code start some repairs needs to be done to this code
    if (isset($_GET['newsid']) && isset($_GET['mid'])&& isset($_POST['comment'])) 
    {
        if(!empty($_GET['mid']))
        {
            if(!empty($_POST['comment']))
            {    
                $nid = $_GET['newsid'];
                $uid    = $_GET['mid'];         //this uid should be member id not reporter id once check
                
                $role=$_SESSION['role'];
                $comment=$_POST['comment'];
                $sql="insert into comment(news_id,user_id,comments) values('$nid','$uid','$comment') ";
                $result=mysqli_query($conn,$sql);
               //activity log
                $sql_ins="insert into activity_log(uid,role,action,affected) values('$uid','$role','commented on news','newsid:$nid')";
                $result2=mysqli_query($conn,$sql_ins);
                require "single2.php";
            }
            else
            {
                require "single.php";
            }

        }
        else
        {
            
            $msg="please log in to comment";
            require "signin.php";
        }

    }
    elseif(empty($_GET['mid'])&&isset($_POST['comment']))
    {
        $msg="please login to comment";
        require "signin.php";
    }
    
    
    //comment insertion code end
    
    //trending news click on view more button
    if(isset($_GET['readmore']))
    {
        $nid=$_GET['readmore'];
        require "single.php";
    }
    
    //comment reply code start
    if (isset($_GET['newsid2']) && isset($_GET['mid2'])&& isset($_POST['reply']))
    {
        if(!empty($_GET['mid2']))
        {
            if(!empty($_POST['reply']))
            {    
                $nid = $_GET['newsid2'];
                $uid    = $_GET['mid2'];         //this uid should be member id not reporter id once check
                $cmid=$_GET['cmid'];
                
                $reply=$_POST['reply'];
               $sql="insert into comment(news_id,user_id,comments,replied_on) values('$nid','$uid','$reply',) ";
                $result=mysqli_query($conn,$sql);
                
                require "single2.php";
            }
            else
            {
                require "single.php";
            }

        }
        else
        {
            $msg="please log in to comment";
            require "single.php";
        }

    }
    if(isset($_GET['like']))
    {
        if(isset($_SESSION['uid']))
        {

            $nid=$_GET['like'];
            $uid=$_SESSION['uid'];
            $role=$_SESSION['role'];
            if($role=='member')
            {
                $sql="select * from likes where user_id='$uid' and news_id='$nid'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_num_rows($result);
                if ($row>0)
                {
                    $class="disabled";
                    require "single2.php";
                }
                else
                {
                    $sql="insert into likes(user_id,news_id) values('$uid','$nid')";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $sql_ins="insert into activity_log(uid,role,action) values('$uid','$role','liked an article')";
                                $result=mysqli_query($conn,$sql_ins);
                        require "single2.php";
                    }
                }
    
            }
            else
            {
                $msg="please signin to like comment on news";
                require "signin.php";
            }
        }
        else
        {
             $msg="please signin to like comment on news";
                require "signin.php";
        }
    }
    if(isset($_GET['mylikes']))
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        require "mylike.php";
    }
    if(isset($_GET['act']))
    {
        if(isset($_SESSION['uid']))
        {
            $uid = $_SESSION['uid'];
            
            //  all notifications as opened here so updating it
            $sql = "UPDATE activity_log
                    SET is_open = 1
                    WHERE is_open = 0";
    
            mysqli_query($conn, $sql);
    
            require "activity.php";

        }
        else
        {
            $msg="you are not logged in please login or signup to access the page";
            
        }
    }

    //messages inbox

    if(isset($_GET['message']))
    { 
        if(isset($_SESSION['uid']))
        {
            $uid=$_SESSION['uid'];
            $role=$_SESSION['role'];
    
            $uid = $_SESSION['uid'];
    
        $sql = "UPDATE chat
                SET is_read = 1
                WHERE to_id='$uid'
                AND is_read=0";
    
        mysqli_query($conn, $sql);
    
            require "message.php";

        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }  
    }
    //sending mail to others clicking send
    if(isset($_POST['sendmail']))
    {
        $from=$_SESSION['uid'];
        $to=$_POST['emailto'];
        $message=$_POST['message'];
        if(!empty($_FILES['emfile']['name']))
        {
            $atchname=$_FILES['emfile']['name'];
            $tmp=$_FILES['emfile']['tmp_name'];
            $final="messages/".$atchname;
            move_uploaded_file($tmp,$final);

        $sql_msg="insert into chat(message,attachment,to_id,from_id) values('$message','$final','$to','$from')";
        }
        else
        {
            $sql_msg="insert into chat(message,to_id,from_id) values('$message','$to','$from')";
        }
        $result=mysqli_query($conn,$sql_msg);
        if($result)
        {
            $msg="email sent succesfully ";
            require "message.php";
        }
        else
        {
            $msg="email was not sent ";
            require "message.php";
        }
       
    }
    if(isset($_GET['delmsg']))
    {
        $msid=$_GET['delmsg'];
        $sql="UPDATE chat set is_delete=1 where msg_id='$msid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $msg="message deleted successfully";
            require "message.php";
        }
    }
     if(isset($_GET['delsent']))
    {
        $msid=$_GET['delsent'];
        echo $msid;
        
        $sql="UPDATE chat set sent_delete=1 where msg_id='$msid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $msg="message deleted successfully";
            require "message.php";
        }
    }
    if(isset($_GET['attach']))
    {
        $file=$_GET['attach'];
        $uid=$_SESSION['uid'];
        require "attach.php";

    }

    //dashboard code
    if(isset($_GET['dash']))
    {
        if(isset($_SESSION['uid']))
        {
            $uid=$_SESSION['uid'];
            require "dashboard.php";

        }
        else
        {
            $msg="you are not logged in please signup or login ";
            require "signin.php";
        }
    }


    //bookmark

     if(isset($_GET['book']))
    {
        $nid=$_GET['book'];
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        
        

        if($role=='member')
        {
            $sql="insert into bookmark (user_id,news_id) values('$uid','$nid')";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
               $sql_ins="insert into activity_log(uid,role,action) values('$uid','$role','bookmarked an article')";
                $result=mysqli_query($conn,$sql_ins); 
            }
            require "single2.php";

        }
        else
        {
            $msg="only member can bookmark the articles";
            require "single2.php";
        }

    }
    //my bookmarks
    if(isset($_GET['mb']))
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        require "mb.php";
    }

    //view all latest news
    if(isset($_GET['viewall']))
    {
        if(isset($_SESSION['uid']))
        {
            $uid=$_SESSION['uid'];
            $role=$_SESSION['role'];

        }
        require "viewall.php" ;
        
    }

?>