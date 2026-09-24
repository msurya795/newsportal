<h1>Verified reporters</h1>
<h5 class="text-primary"><?php if(isset($_GET['msg'])) echo $_GET['msg']; ?></h5>
<table class="table table-striped table-bordered table-hover align-middle shadow-sm">
    <thead class="table-dark">
        <tr>
            <th class="text-uppercase">Editor_Name</th>
            <th class="text-uppercase">Editor_Category</th>
            <th class="text-uppercase">Editor_location</th>
            <th class="text-uppercase text-center">Action</th>
        </tr>
    </thead>
    <?php foreach($rows as $row) { ?>
    <tbody>
        <tr>
            <td scope="col" class="ps-3"><?php echo $row['name'] ?></td>
            <td scope="col" class="ps-3"><?php echo $row['category_name'] ?></td>
            <td scope="col" class="ps-3"><?php echo $row['location_name'] ?></td>
            <td scope="col" class="text-center">
                <a href="db.php?diseditor=<?php echo $row['uid'] ?>" class="btn btn-primary btn-sm">disapprove Editor</a> &nbsp 
                <a href="db.php?deleditor2=<?php echo $row['uid'] ?>" class="btn btn-danger btn-sm">delete</a>
            </td>
        </tr>
    </tbody>
    <?php }?>
</table>