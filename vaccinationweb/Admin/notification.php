<?php
include('../db.php');
// $sql1 = "SELECT c.cname,c.cnic,c.pfkid,d.vsid,h.hname,v.name FROM vaccination_status d INNER JOIN childs c ON d.cfkid=c.id INNER JOIN hospital h ON d.chfkid=h.hid INNER JOIN vaccination v ON d.vfkid=v.id";
// $res1 = mysqli_query($conn, $sql1);
session_start();
$id = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
</head>

<body>
    <style>
        section {
            height: 90vh;
        }

        .nav {
            background-color: #3B5249;
        }
    </style>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav nav sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center">
                    <div class="sidebar-brand-icon ">
                        <i class="fas fa-user-md" aria-hidden="true"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Get Vaccinated</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">


                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Users
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="details.php">
                        <span>Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../child/addchild.php">
                        <span>New Form Submit</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notification.php">
                        <span>Notification</span></a>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->

                <li class="nav-item">
                    <a class="nav-link" href="logout/logout.php">
                        <i class="fas fa-user"></i>
                        <span>Logout</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>



            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <br><br>
                <h1 style="margin:auto;">Notification</h1>
                <br><br>
                <!-- Main Content -->
                <div id="content">
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <section>
                            <?php
                                    $sql1 = "SELECT * from `notification` where mid=$id";
                                    $res1 = mysqli_query($conn, $sql1);
                                    if (mysqli_num_rows($res1)) {
                                        while ($row = mysqli_fetch_assoc($res1)) {
                                            ?>
                                            <div class="card shadow mb-4">
                                                <div class="card-body" >
                                                <h4 style="color:black;"><?php echo $row['message']?></h4>
                                                </div>
                                                </div>
                                            <?php
                                        }
                                    }
                                    ?>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>