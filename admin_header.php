<?php
//this is for activity

$sql = "SELECT COUNT(*) AS total
        FROM activity_log
        WHERE is_open = 0";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// this is for message notification

$uid=$_SESSION['uid'];
$sql_msg = "SELECT COUNT(*) AS total
            FROM chat
            WHERE to_id='$uid'
            AND is_delete=0
            AND is_read=0";

$result_msg = mysqli_query($conn, $sql_msg);
$row_msg = mysqli_fetch_assoc($result_msg);

if(!isset($_SESSION['uid']))
{
    header("Location: signin.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BizNews - Free News Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

   <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 <!-- this is fontawesome thing -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

</head>

<body>
    <!-- Topbar Start -->
   
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="index.html" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-primary">welcome<span class="text-secondary font-weight-normal">admin</span></h1>
                </a>
                <h1></h1>
            </div>
            <div class="col-lg-8 text-center text-lg-end">
                <a href="https://htmlcodex.com/downloading/?item=1541"><img class="img-fluid" src="img/ads-728x90.png" alt=""></a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
  <!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-lg-4 py-2 py-lg-0">

        <a href="index.html" class="navbar-brand d-lg-none">
            <h1 class="m-0 display-6 text-uppercase text-primary">
                Biz<span class="text-white fw-normal">News</span>
            </h1>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- ONLY THIS LINE IS CHANGED -->
            <div class="navbar-nav align-items-center w-100">

                <a href="db.php?memindex" class="nav-link active px-1 text-nowrap small">Home</a>

                <a href="db.php?profile" class="nav-link px-1 text-nowrap small">Profile</a>
                <a href="db.php?dash" class="nav-link px-1 text-nowrap small">Dashboard</a>

                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-1 text-nowrap small"
                       href="#"
                       data-bs-toggle="dropdown">
                        Editors
                    </a>
                    <div class="dropdown-menu rounded-0">
                        <a href="db.php?ve" class="dropdown-item">Verified Editors</a>
                        <a href="db.php?nve" class="dropdown-item">Non Verified Editors</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-1 text-nowrap small"
                       href="#"
                       data-bs-toggle="dropdown">
                        Reporters
                    </a>
                    <div class="dropdown-menu rounded-0">
                        <a href="db.php?vr" class="dropdown-item">Verified Reporters</a>
                        <a href="db.php?nvr" class="dropdown-item">Non Verified Reporters</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-1 text-nowrap small"
                       href="#"
                       data-bs-toggle="dropdown">
                         Members
                    </a>
                    <div class="dropdown-menu rounded-0">
                        <a href="db.php?vm" class="dropdown-item">Verified Members</a>
                        <a href="db.php?nvm" class="dropdown-item">Non Verified Members</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-1 text-nowrap small"
                       href="#"
                       data-bs-toggle="dropdown">
                        News
                    </a>
                    <div class="dropdown-menu rounded-0">
                        <a href="db.php?adpnews" class="dropdown-item">Published</a>
                        <a href="db.php?adupnews" class="dropdown-item">Unpublished</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-1 text-nowrap small"
                       href="#"
                       data-bs-toggle="dropdown">
                        Comments
                    </a>
                    <div class="dropdown-menu rounded-0">
                        <a href="db.php?vc" class="dropdown-item">Verified</a>
                        <a href="db.php?nvc" class="dropdown-item">Non Verified</a>
                    </div>
                </div>

                <a href="db.php?loc" class="nav-link px-1 text-nowrap small">Locations</a>

                <a href="db.php?cat" class="nav-link px-1 text-nowrap small">Category</a>
                
                <a href="db.php?message" class="nav-link px-1 text-nowrap small position-relative">

                    <i class="fas fa-envelope me-1 m-1"></i> MSG

                    <?php if($row_msg['total'] > 0){ ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php echo $row_msg['total']; ?>
                        </span>
                    <?php } ?>

                </a>

               <a href="db.php?act" class="nav-link px-1 text-nowrap small position-relative m-3">

                    <i class="fas fa-bell me-1"></i>

                    <?php if($row['total'] > 0){ ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php echo $row['total']; ?>
                        </span>
                    <?php } ?>

                </a>

                <a href="db.php?logout" class="nav-link px-1 text-nowrap small">Logout</a>

                <!-- <div class="ms-auto d-none d-xl-flex">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control border-0" placeholder="Keyword">
                        <button class="btn btn-primary text-dark" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div> -->

            </div>

        </div>

    </nav>
</div>
<!-- Navbar End -->