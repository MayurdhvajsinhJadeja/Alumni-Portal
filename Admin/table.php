<?php
    session_start();
    include('../Php/dbconnection.php');
?>

<html>
    <head>
        <title>Table</title>
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

                <li class="nav-item">
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

                <li class="nav-item active">
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
                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Logo -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                                    <img class="img-profile" src="../Image/login_page_logo.png"/>
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
                  
                    <div class="card-body">
                        <div class="card-body">
                            <div class="card shadow mb-4" style="margin-top: -5%;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data For User</h6>
                                </div>
                    
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <tr>
                                                <th>Enrollment_Number</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile_no</th>  
                                                <th>Current_Job</th>  
                                                <th>Batch</th>    
                                                <th>Company</th>  
                                                <th>Package</th>     
                                                <th>Category</th>     
                                                <th>Status</th>
                                                <th>Update</th>
                                            </tr>
                                                          
                                            <?php
                                                $count = "SELECT COUNT(*) as enrollment_Number FROM user_details ORDER BY enrollment_Number ASC";
                                                $count_data = mysqli_query($conn, $count);  
                                                $row_count = $count_data->fetch_assoc();
                                                echo  "Total Rows: " .$row_count['enrollment_Number'];
                                        
                                                $size=3;
                                                $start=0;
                                                $totalpage = ceil($row_count['enrollment_Number']/$size);
                                                if(isset($_POST['paging']))
                                                {
                                                    $start = (($_POST['paging'])-1) *$size;
                                                }
                                                
                                                $SELECT = "SELECT * FROM user_details LIMIT $start,$size";
                                                $result = mysqli_query($conn, $SELECT);
                                                                  
                                                if($result->num_rows > 0) 
                                                {
                                                    while($row = $result->fetch_assoc()) 
                                                    {   
                                                        echo "<tr>";
                                                        $_SESSION['opeation_id'] = $row["id"];
                                                        echo "<td>" . $row["enrollment_Number"] . "</td>";
                                                        echo "<td>" . $row["name"] . "</td>";
                                                        echo "<td>" . $row["email"] . "</td>";
                                                        echo "<td>" . $row["mobile_No"] . "</td>";
                                                        echo "<td>".  $row["current_job"] . "</td>";
                                                        echo "<td>".  $row["batch"] . "</td>";
                                                        echo "<td>".  $row["company"] . "</td>";
                                                        echo "<td>" . $row["package"] . "</td>";
                                                        echo "<td>" . $row["category"] . "</td>";
                                                        echo "<td>" . $row["status"] . "</td>";
                                                                              
                                                        echo "<td> <form method='POST' action='update.php?id=$row[id]'> <button style=border:none width: 20%; padding: 15px;> UPDATE </button> </form> </td>";
                                                    }
                                                }   
                                                echo "<table><tr>";
                                                for ($i=1; $i <= $totalpage ; $i=$i+1) 
                                                { 
                                                    echo "<td>
                                                    <form method='post' action='./table.php'>
                                                    <input type='hidden' name='paging' value='$i'></input>
                                                    <button type='submit' value='$i' style='background-color: lightblue; border: 0.1px solid black;'>$i</button>
                                                    </form></td>";
                                                }
                                                echo "</tr></table>";
                                          ?>
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