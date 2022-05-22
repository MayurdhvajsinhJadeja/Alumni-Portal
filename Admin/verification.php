<?php
    include('../Php/dbconnection.php');
    session_start();
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

                <li class="nav-item active">
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
                                    <h6 class="m-0 font-weight-bold text-primary">Verification</h6>
                                </div>
                    
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <tr>
                                                <th>Verfied</th>
                                                <th>Enrollment_Number</th>
                                                <th>Email</th>
                                                <th>Mobile_no</th> 
                                                <th>pazorpay order id</th>  
                                                <th>Pazorpay payment id</th>  
                                                <th>Payment status</th>  
                                                <th>Payment price</th>  
                                            </tr>
                                                          
                                            <?php
                                                $count = "SELECT COUNT(*) as id FROM registration WHERE status='0'";
                                                $count_data = mysqli_query($conn, $count);  
                                                $row_count = $count_data->fetch_assoc();
                                                echo  "Total Rows: " .$row_count['id'];
                                        
                                                $size=3;
                                                $start=0;
                                                $totalpage = ceil($row_count['id']/$size);
                                                if(isset($_POST['paging']))
                                                {
                                                    $start = (($_POST['paging'])-1) *$size;
                                                }
                                                
                                                $SELECT = "SELECT * FROM registration WHERE status='0' LIMIT $start,$size";
                                                $result = mysqli_query($conn, $SELECT);
                                                                  
                                                if($result->num_rows > 0) 
                                                {
                                                    while($row = $result->fetch_assoc()) 
                                                    {   
                                                        echo "<tr>";
                                                        echo "<td> <form method='POST' action='update_id.php?id=$row[id]&email=$row[email]&enroll=$row[enrollment_no]&phone=$row[phone_number]&pass=$row[password]'> 
                                                              <button style=border:none width: 20%; padding: 15px;> Verified </button> </form> </td>";

                                                        echo "<td>" . $row["enrollment_no"] . "</td>";
                                                        echo "<td>" . $row["email"] . "</td>";
                                                        echo "<td>" . $row["phone_number"] . "</td>";
                                                        echo "<td>".  $row["razorpay_order_id"] . "</td>";
                                                        echo "<td>" . $row["razorpay_payment_id"] . "</td>";
                                                        echo "<td>" . $row["payment_status"] . "</td>";
                                                        echo "<td>" . $row["price"] . "</td>";
 
                                                    }
                                                }   
                                                echo "<table><tr>";
                                                for ($i=1; $i <= $totalpage ; $i=$i+1) 
                                                { 
                                                    echo "<td>
                                                    <form method='post' action='./verification.php'>
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
    if(!isset($_SESSION['enrollment_admin']))
    {
?>
        <script> window.location.href = "../index.php"; </script>
<?php
    }
?>