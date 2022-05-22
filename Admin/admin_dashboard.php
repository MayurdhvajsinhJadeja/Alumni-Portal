<?php 
    session_start();
    include('../Php/dbconnection.php'); 
?>

<html>
    <head>
        <title>Admin</title>
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    </head>

    <body>
        <div id="wrapper">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark">
                <a class="sidebar-brand justify-content-center" href="./admin_dashboard.php">
                    <div><img src="./img/logo_mu.png" width="80%"></div>
                </a>

                <hr class="sidebar-divider my-0">

                <li class="nav-item active">
                    <a class="nav-link" href="./admin_dashboard.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link collapsed" href="./insert.php">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Insert</span>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link" href="./table.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Table</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./job.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Job</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./verification.php">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <span>Verification</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <span>Logout</span>
                    </a>
                </li>

                <hr class="sidebar-divider d-none d-md-block">
            </ul>
          
            <div id="content-wrapper">
                <div>
                    <nav class="navbar navbar-expand bg-white topbar mb-4">
                        <!-- Search -->
                        <form class="d-sm-inline-block ml-md-3 my-md-0 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <ul class="navbar-nav ml-auto">
                            <!-- Comment -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link" href="#" id="messagesDropdown" role="button" data-toggle="dropdown">
                                    <i class="fas fa-envelope fa-fw"></i>
                                </a>

                                <!-- Messages Show-->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                    <h6 class="dropdown-header"> Message </h6>
                                    <a class="dropdown-item d-flex align-items-center">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_1.svg">
                                        </div>
                                        
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">Name</div>
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Logo -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                                    <span class="mr-2 text-gray-600 small"><?php echo $_SESSION['name_admin']; ?></span>
                                    <?php
                                        $result = mysqli_query($conn, "SELECT * FROM user_details WHERE `enrollment_Number` = '".$_SESSION['enrollment_admin']."' ");
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            $imageData =  $row['image']; 
                                            echo "<img src='../Image_database/$imageData' width=40px height=40px/>";
                                        }
                                    ?>
                                </a>

                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user mr-2"></i>Profile
                                    </a>

                                    <a class="dropdown-item" href="../logout.php">
                                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </nav>
                  
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Welcome</h1>
                            <a href="../Report/reterive.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                        </div>

                        <div class="row">
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Count - User Details</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        $count = "SELECT COUNT(*) as id FROM user_details";
                                                        $count_data = mysqli_query($conn, $count);  
                                                        $row_count = $count_data->fetch_assoc();
                                                        echo  $row_count['id'];
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Count - Registration Details</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        $count = "SELECT COUNT(*) as id FROM registration";
                                                        $count_data = mysqli_query($conn, $count);  
                                                        $row_count = $count_data->fetch_assoc();
                                                        echo  $row_count['id'];
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Count - Job Details</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        $count = "SELECT COUNT(*) as id FROM job";
                                                        $count_data = mysqli_query($conn, $count);  
                                                        $row_count = $count_data->fetch_assoc();
                                                        echo  $row_count['id'];
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="./js/jquery.min.js"></script>
        <script src="./js/bootstrap.bundle.min.js"></script>
    </body>
</html>

<?php
    if(!isset($_SESSION['id_admin']))
    {
        header("Location: ../index.php");
    }
?>
