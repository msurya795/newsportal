<?php include "reporter_header.php"; ?>

<div class="container col-sm-4">
    <h2 class="text-danger text-center">Upload News</h2>
    <div class="card" style="width: 28rem;">
        <div class="card-body">
            <form action="db.php" method="POST" enctype="multipart/form-data">
               <p style="color:red"><?php if(isset($_GET['msg'])) echo $_GET['msg'];  ?></p>
               <div class="form-check d-flex justify-content-end">
                   <input  name="breaking" id="" class=" form-check-input " type="checkbox">
                    <label class="form-check-label mr-3">Is_Breaking</label>
                </div>
                <div class="form-group">
                    <label for="">News Title</label>
                    <input type="text" name="title" id="" class="form-control">
                </div>

                <div class="form-group">
                    <label >Upload image</label>
                    <input type="file" name="nimg" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label >Description</label>
                    <textarea name="desc" id="desc" class="form-control" rows="6" placeholder="Enter news passage description here..."></textarea>
                </div>
                <!-- hidden inputs for user details -->
                    
                <div class="text-center">
                    <input type="submit" name="snews" value="submit news" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>