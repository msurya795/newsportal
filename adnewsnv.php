<?php
$uid = $_SESSION['uid'];
$eid = $_SESSION['uid'];
$lid = $_SESSION['lid'];
$cid = $_SESSION['cid'];
$role = $_SESSION['role'];
$sql = "select * from user_details where uid='$uid'";
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_array($result);
if ($arr['role'] == 'admin') {
    include "admin_header.php";
} elseif ($arr['role'] == 'editor') {
    include "editor_header.php";
} elseif ($arr['role'] == 'reporter') {
    include "reporter_header.php";
} elseif ($arr['role'] == 'member') {
    include "member_header.php";
}
$sql2 = "select * from news_table 
        INNER JOIN location ON news_table.n_location_id=location.loc_id
        INNER JOIN category ON news_table.n_category_id=category.cat_id
        where  news_table.is_delete=0 and news_table.is_publish=0";
$result2 = mysqli_query($conn, $sql2);

?>

<h1>Unpublished News</h1>
<h5 class="text-primary"><?php if (isset($_GET['msg'])) echo $_GET['msg']; ?></h5>
<div class="table-responsive shadow-lg rounded-4">


    <table class="table table-striped table-bordered">
        <thead class="table-dark text-center align-middle">
            <tr>
                <th class="text-uppercase">Title</th>
                <th class="text-uppercase">Image</th>
                <th class="text-uppercase">Category</th>
                <th class="text-uppercase">Location</th>
                <th class="text-uppercase">Description</th>
                <th class="text-uppercase">Date</th>
                <th class="text-uppercase">Status</th>
                <th class="text-uppercase">Action</th>
            </tr>
        </thead>

        <?php foreach ($result2 as $row) { ?>

            <?php
            $stat = $row['is_publish'];
            if ($stat == 0) {
                $status = "not published";
            } elseif ($stat == 1) {
                $status = "published";
            }
            ?>

            <tbody class="align-middle">
                <tr class="text-center">
                    <td scope="col" class="fw-semibold text-start">
                        <?php echo $row['heading'] ?>
                    </td>

                    <td scope="col">
                        <img src="<?php echo $row['news_image'] ?>" class="img-thumbnail rounded shadow-sm" style="width:90px;height:70px;object-fit:cover;">
                    </td>

                    <td scope="col">
                        <span class="badge bg-primary px-3 py-2">
                            <?php echo $row['category'] ?>
                        </span>
                    </td>

                    <td scope="col">
                        <span class="badge bg-info text-dark px-3 py-2">
                            <?php echo $row['location'] ?>
                        </span>
                    </td>

                    <!-- lengthy description so using button to create another page -->
                    <td scope="col">
                        <button data-bs-toggle="modal"
                            data-bs-target="#description<?php echo $row['nid']; ?>"
                            class="btn btn-outline-primary btn-sm rounded-pill px-3">
                            <i class="fas fa-eye me-1"></i> View
                        </button>
                    </td>

                    <td scope="col" class="text-nowrap">
                        <?php echo $row['posted_date'] ?>
                    </td>

                    <td scope="col">
                        <?php if ($stat == 1) { ?>
                            <span class="badge bg-success px-3 py-2">
                                <?php echo $status ?>
                            </span>
                        <?php } else { ?>
                            <span class="badge bg-warning text-dark px-3 py-2">
                                <?php echo $status ?>
                            </span>
                        <?php } ?>
                    </td>

                    <td scope="col" class="text-nowrap">
                        <a href="db.php?delnews=<?php echo $row['nid'] ?>" class="btn btn-danger btn-sm rounded-pill me-2">
                            <i class="fas fa-trash-alt me-1"></i> Delete
                        </a>

                        <a href="db.php?publish=<?php echo $row['nid'] ?>" class="btn btn-primary btn-sm rounded-pill">
                            <i class="fas fa-bullhorn me-1"></i> Publish
                        </a>
                        <a href="db.php?editnews=<?php echo $row['nid'] ?>" class="btn btn-secondary btn-sm rounded-pill">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                    </td>
                </tr>
            </tbody>

            <div class="modal fade" id="description<?php echo $row['nid']; ?>">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">
                                <?php echo $row['heading']; ?>
                            </h5>

                            <button type="button" class="btn-close"
                                data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <?php echo $row['description']; ?>
                        </div>

                    </div>
                </div>
            </div>


            
        <?php } ?>
    </table>
</div>




<?php
include "footer.php";
?>