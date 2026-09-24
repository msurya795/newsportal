<?php include 'header.php'; ?>
<div class="container col-sm-4">
    <h2 class="text-danger text-center">Signup</h2>
    <div class="card" style="width: 28rem;">
        <div class="card-body">
            <form action="db.php" method="POST">
                <p style="color:red"><?php if(isset($_GET['msg']) ) echo $_GET['msg']; ?></p>

                <div class="form-group">
                    <label for="Enter Your role">Signup As - </label>
                        <div class="form-check-inline">
                            <label for="" >Editor </label>
                            <input class="form-check-input mx-1" type="radio" name="role" id="editor" value="editor" >
                        </div>
                        <div class="form-check-inline">
                            <label for="" >Reporter </label>
                            <input class="form-check-input mx-1" type="radio" name="role" id="reporter" value="reporter" >
                        </div>
                        <div class="form-check-inline">
                            <label for="" >Member </label>
                            <input class="form-check-input mx-1" type="radio" name="role" id="member" value="member" >
                        </div>
                </div>

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

                <div>
                <div class="form-group">
                    <label for="enter category"> Category</label>
                    <select class="form-control"  id="category" name="category">
                             <option value='1' selected>Select Cateogry</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="enter category"> Location</label>
                    <select class="form-control"  id="location" name="location">
                            
                    </select>
                </div>

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
                <a href="signin.php">Already Registered Click Here?</a>
            </div>
        </div>
    </div>
</div>
</body>
<script>
document.querySelectorAll('input[name="role"]').forEach(function(radio) {

        radio.addEventListener('change', function() {

            if (this.value == "member") 
                {
                

                    document.getElementById("category").disabled= true;
                    document.getElementById("location").disabled = true;
                 
                }
                 else 
                {
                    document.getElementById("category").disabled = false;
                    document.getElementById("location").disabled = false;
                }

        });

    });

    $(document).ready(function() 
    {
        loadcategory();
        loadlocation()
    });

    function loadcategory()
    {
        const data={action:"getcategory"}
        fetch('db.php',
               {
                method:"POST",
                headers:{"Content-Type":"application/json"},
                body:JSON.stringify(data)
               }
        ).then(res=>res.text()).then(htmlstring=>{
            const catlist=document.getElementById("category");
            catlist.innerHTML=htmlstring;
            
          })
    }
    function loadlocation()
    {
        const data={action:"getlocation"}
        fetch('db.php',
               {
                method:"POST",
                headers:{"Content-Type":"application/json"},
                body:JSON.stringify(data)
               }
        ).then(res=>res.text()).then(htmlstring=>{
            const catlist=document.getElementById("location");
            catlist.innerHTML=htmlstring;
            
           
          })
          
    }


   
</script>
</html>
<?php include 'footer.php'; ?>