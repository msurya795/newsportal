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
        
$sql2 = "SELECT uid, email FROM user_details WHERE uid <> '$uid' ";   //why not equal to sign not working
$result2 = mysqli_query($conn, $sql2);

        
?>
<div class="container mt-4">
<p class="text-danger"><?php if(isset($msg)){echo $msg ;} ?> </p>
    <!-- Tabs -->
    <ul class="nav nav-pills mb-3" id="mailTab" role="tablist">

        <li class="nav-item">
            <button class="nav-link active"
                    data-bs-toggle="pill"
                    data-bs-target="#compose">
                <i class="bi bi-pencil-square"></i> Compose
            </button>
        </li>

        <li class="nav-item ms-2">
            <button class="nav-link"
                    data-bs-toggle="pill"
                    data-bs-target="#inbox">
                <i class="bi bi-inbox-fill"></i> Inbox
            </button>
        </li>

        <li class="nav-item ms-2">
            <button class="nav-link"
                    data-bs-toggle="pill"
                    data-bs-target="#sent">
                <i class="bi bi-send-fill"></i> Sent
            </button>
        </li>

    </ul>

    <div class="tab-content">

        <!-- ================= Compose ================= -->

        <div class="tab-pane fade show active" id="compose">

            <button class="btn btn-primary mb-3"
                    data-bs-toggle="collapse"
                    data-bs-target="#composeMail">
                <i class="bi bi-envelope-plus"></i> Compose Email
            </button>

            <div class="collapse show" id="composeMail">

                <div class="card">

                    <div class="card-header">
                        Compose Email
                    </div>

                    <div class="card-body">
                <form action="db.php" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Email</label>
                    <select name="emailto" class="form-select">
                        <option value="">-- Select Email --</option>
                        <!-- Iterate options here later -->
                         <?php foreach($result2 as $row){ ?>
                        <option value="<?php echo $row['uid']; ?>"><?php echo $row['email']; ?></option>
                        
                        <?php }?>
                </select>
            </div>

                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control"
                                      rows="6"
                                      placeholder="Write your message" name='message'></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Attachment</label>
                            <input type="file" class="form-control" name="emfile">
                        </div>

                        <button class="btn btn-success" name="sendmail">
                            <i class="bi bi-send-fill"></i> Send
                        </button>
                    </form>
                    </div>

                </div>

            </div>

        </div>

        <!-- ================= Inbox ================= -->

        <div class="tab-pane fade" id="inbox">

            <div class="card">

                <div class="card-header">
                    Inbox
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-bordered table-hover align-middle">
                        <?php 
                        $sql_ib="select * from chat 
                        INNER JOIN user_details ON chat.from_id=user_details.uid
                        where to_id='$uid' and chat.is_delete=0";
                        $result_ib=mysqli_query($conn,$sql_ib);
                        ?>

                        <thead class="table-dark">

                        <tr>
                            
                            <th>Email</th>
                            <th>Attachment</th>
                            <th>Message</th>
                            <th width="80">Action</th>
                        </tr>

                        </thead>

                        <tbody>
                            <?php foreach($result_ib as $row2){ ?>
                        <tr>
                            <td><?php echo $row2['email']; ?></td>
                            <td>
                                <a href="db.php?attach=<?php echo $row3['attachment']; ?>" 
                                download="<?php echo $row2['attachment']; ?>">
                                    <i class="bi bi-paperclip"></i> <?php echo $row2['attachment']; ?>
                                </a>
                            </td>
                            <td><?php echo $row2['message']; ?></td>
                            <td class="text-center">

                                    <button type="button"
                                            class="btn btn-sm btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#viewmsg"
                                            data-message="<?php echo $row2['message']; ?>">
                                        <i class="bi bi-eye-fill"></i> view
                                    </button>

                                    <a href="db.php?delmsg=<?php echo $row2['msg_id'] ?>" class="btn btn-sm btn-danger">
                                        delete
                                    </a>

                            </td>
                        </tr>
                        <?php }?>

                        

                        <!-- <tr>
                            <td>Support</td>
                            <td>support@gmail.com</td>
                            <td>No File</td>
                            <td>Your ticket has been resolved.</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                            </td>
                        </tr> -->

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <!-- ================= Sent ================= -->

        <div class="tab-pane fade" id="sent">

            <div class="card">

                <div class="card-header">
                    Sent Mail
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-bordered table-hover align-middle">
                    <?php 
                        $sql_s="select * from chat 
                        INNER JOIN user_details ON chat.to_id=user_details.uid
                        where from_id='$uid' and chat.sent_delete=0";                //this is only for sent messages to delete
                        $result_s=mysqli_query($conn,$sql_s);
                    ?>
                        <thead class="table-success">

                        <tr>
                            <th>Email</th>
                            <th>Attachment</th>
                            <th>Message</th>
                            <th width="80">Action</th>
                        </tr>

                        </thead>

                        <tbody>
                        <?php foreach($result_s as $row3) { ?>
                        <tr>
                            <td><?php echo $row3['email'] ?></td>
                            <td>
                                <a href="db.php?attach=<?php echo $row3['attachment']; ?>" 
                                download="<?php echo $row3['attachment']; ?>">
                                    <i class="bi bi-paperclip"></i> <?php echo $row3['attachment']; ?>
                                </a>
                            </td>
                            <td><?php echo $row3['message']; ?></td>
                            <td class="text-center">
                                <button type="button"
                                            class="btn btn-sm btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#viewmsg"
                                            data-message="<?php echo $row3['message']; ?>">
                                        <i class="bi bi-eye-fill"></i> view
                                    </button>
                                <a href="db.php?delsent=<?php echo $row3['msg_id'] ?>" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye-fill"> delete</i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                        

                        <!-- <tr>
                            <td>103</td>
                            <td>manager@office.com</td>
                            <td>
                                <a href="#">
                                    <i class="bi bi-paperclip"></i> Budget.xlsx
                                </a>
                            </td>
                            <td>Budget details for review.</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                            </td>
                        </tr> -->

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

        

<div class="modal fade" id="viewmsg" >
    <div class="modal-dialog">  //important class for modal to appear and disappear
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">message</h5>
            </div>
            <div class="modal-body">
                <p id="viewmessage"></p>
            </div>
        </div>
    </div>
</div>
<script>

                var viewmsg = document.getElementById('viewmsg');

                viewmsg.addEventListener('show.bs.modal', function (event) {

                    var button = event.relatedTarget;

                    var message = button.getAttribute('data-message');

                    document.getElementById('viewmessage').innerText = message;

                });

        </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include "footer.php"?>