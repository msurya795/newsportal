<?php
    $nsb="";
    if(isset($_GET['er']))
    {
        $nsb=$_GET['er'];
    }
    include 'header.php';
?>
<div class="container col-sm-4">
    <h2 class="text-danger text-center">Signup</h2>
    <div class="card" style="width: 28rem;">
        <div class="card-body">
            <form action="db.php" method="POST">
                <p style="color:red"><?php echo $nsb;?></p>
                <div class="form-group">
                    <label for="Enter Your Name">Name</label>
                    <input type="text" name="name" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Enter Your Mobile">Mobile</label>
                    <input type="text" name="mobile" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Enter Your Email">Email</label>
                    <input type="text" name="email" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Enter Your Password">Password</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>
                <div class="text-center">
                    <input type="submit" name="signup" value="signup" class="btn btn-danger">
                </div>
            </form>
            <div class="text-center">
                <a href="signin.php">Already SignUp Click Here?</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
    include 'footer.php';
?>