<html>
    <head>
        <title>Update</title>
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link href="./css/insert_form.css" rel="stylesheet">
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

                <li class="nav-item">
                    <a class="nav-link collapsed" href="./insert.php">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Insert</span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="./table.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Tables</span>
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
                </div>
                
                <div class="card-body">
                    <div class="card-body">
                        <div class="card shadow mb-4" style="margin-top: -5%;"> 
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">update</h6>
                            </div>
                
                            <div class="card-body">        
                                        
                                <?php
                                    $SELECT = "SELECT * FROM project WHERE `id`=".$_GET['id'];
                                    $result = mysqli_query($conn, $SELECT); 
                                ?>

                                    <form method="POST">
                                <?php
                                    if($result->num_rows > 0) 
                                    {
                                        while($row = $result->fetch_assoc()) 
                                        {            
                                ?>     
                                    <div class="row">    
                                        <div class="col-2"> 
                                            <input type="text" name="enrollment_no" value=<?php echo $row['enrollment_Number']?>>   
                                        </div>
                                  
                                        <div class="col-2 row-space">
                                            <input type="text" name ="name" value=<?php echo $row['name']?>>
                                        </div>
                            
                                        <div class="col-2 row_space_2">
                                            <input type="text" name="email" value=<?php echo $row['email']?>>
                                        </div>
                                    </div><br>
                                  
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="password" name="password" value=<?php echo $row['password']?>>  
                                        </div>
                                  
                                        <div class="col-2 row-space">
                                            <input type="text" name="mobile_no" value=<?php echo $row['mobile_No']?>>
                                        </div>
                          
                                        <div class="col-2 row_space_2">
                                            <input type="text" name="job" value=<?php echo $row['current_job']?>>
                                        </div>
                                    </div><br>
                                  
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="text" name="package" value=<?php echo $row['package']?>>
                                        </div>
                                  
                                        <div class="col-2 row-space">
                                            <input type="text" name="company" value=<?php echo $row['company']?>>
                                        </div>
                                  
                                        <div class="col-2 row_space_2">
                                            <input type="text" name="batch" value=<?php echo $row['batch']?>>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-2">
                                            <input type="text" name="category" value=<?php echo $row['category']?>>
                                        </div>
                                  
                                        <div class="col-2 row-space">
                                            <input type="text" name="status" value=<?php echo $row['status']?>>
                                        </div>
                                  
                                        <div class="col-2 row_space_2">
                                        </div>
                                    </div><br>
                                                                            
                                    <div class="row">
                                        <div class="row_space_1">      
                                            <input type="file" name="image" style="width: 55%; margin-left: 12px;">   
                                        </div>
                                    </div><br>
                                                                    
                                    <div>
                                        <button class="btn btn--radius-2 btn--blue" type="submit" style="width: 20%; padding: 5px;" name="submit">Update</button>
                                    </div>
                                <?php
                                    }
                                }
                                ?>
                                </form>
                            </div>       
                        </div>
                    </div>
                </div>

                <?php
                    $enrollment_Number = $_POST['enrollment_no'];
                    $Name = $_POST['name'];
                    $email = $_POST['email'];	
                    $password = $_POST['password'];
                    $mobile_no = $_POST['mobile_no'];
                    $current_job = $_POST['job'];
                    $package = $_POST['package'];
                    $image = $_POST['image'];
                    $category = $_POST['category'];
                    $status = $_POST['status'];

                    $update = "UPDATE project set enrollment_Number='$enrollment_Number', name='$Name', email='$email', password='$password', 
                               mobile_No='$mobile_no', current_job='$current_job', package='$package', image='$image', category='$category', 
                               status='$status' WHERE `id` = '" .$_GET["id"] . "' ";
                    
                    if ($conn->query($update) === TRUE)
                    {
                        header("refresh: 1;");
                    }
                             
                ?>
            </div>
        </div>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>
    </body>
</html>

<?php
    session_start();
    if(!isset($_SESSION['id_admin']))
    {
        header("Location: ../index.php");
    }
    include('../Php/dbconnection.php');
?>
