<?php
    include 'header.php';
    if(isset($_GET['msg']))
    {
        $msg=$_GET['msg'];
    }
?>
<div class="container col-sm-4">
    <h2 class="text-danger text-center">Login</h2>
    <div class="card" style="width: 28rem;">
        <div class="card-body">
            <form action="db.php" method="POST">
               <p style="color:red"><?php if(!empty($msg)){ echo $msg ;} ?></p>
                <div class="form-group">
                    <label for="Enter Your Email">Email</label>
                    <input type="text" name="email" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Enter Your Password">Password</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>
               
                <div class="text-center">
                    <input type="submit" name="login" value="Login" class="btn btn-danger">
                </div>
            </form>
            <div class="text-center">
                <a href="signup.php">Dont Have Account click here?</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
    include 'footer.php';
?>