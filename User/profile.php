<?php
    session_start();
    include('../Php/dbconnection.php');
?>

<html>
    <head>
        <title>Profile</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
        <link href="./css/main.css" rel="stylesheet">
    </head>

    <body>
        <!-- Header and Menu Bar -->
        <nav class="navbar navbar-expand-lg" style="height: 80px; background: white;">
            <div class="container">
                <div>
                    <img src="../Image/mu_logo.png" style="width: 40%;">
                </div>

                <div class="collapse navbar-collapse" style="margin-left: -30%;">
                    <ul class="navbar-nav mx-auto">
                        <li><a class="nav-link" href="./user_dashboard.php">Home</a></li>
                        <li><a class="nav-link" href="infoalumni.php">Alumni Student</a></li>
                        <li><a class="nav-link" href="./job.php">Job</a></li>
                        <li><a class="nav-link" style="color: blue;" href="./profile.php">Profile</a></li>
                        <li><a class="nav-link" href="../logout.php">Logout</a></li>
                    </ul>

                </div>
            </div>
        </nav>

        <div class="profile">
            <div class="container_rounded" style="margin-top: 8%;">
                <div class="row" style="box-shadow: 5px 10px 20px #888888; margin-top: 50px; width: 80%; margin-left: 10%;">
                    <div class="col-md-4 border-right" style="margin-top: -3%";>
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <?php
                            $result = mysqli_query($conn, "SELECT * FROM user_details WHERE `id` = '".$_SESSION['id_user']."' ");
                            while($row = mysqli_fetch_array($result))
                            {
                                $imageData =  $row['image']; 
                                echo "<img class=rounded-circle mt-5 src='../Image_database/$imageData' width=200 height=200 style='margin-top: 70px;'/>";
                            }
                        ?>
                            <!-- <img class="rounded-circle mt-5" src="../Image/logo_user.jpg" width="250"> -->
                            <br><span><?php echo $_SESSION['name_user']?></span></div>
                    </div>
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">    
                        </div>
                        
                        <?php
                            $SELECT = "SELECT * FROM user_details WHERE `id`= $_SESSION[id_user];";
                            $result = mysqli_query($conn, $SELECT); 
                        ?>

                        <form method="POST">
                        <?php
                            if($result->num_rows > 0) 
                            {
                                while($row = $result->fetch_assoc()) 
                                {            
                        ?>    

                        <div class="row mt-2">
                            <div class="col-md-6"><label>Enrollment Number</label><input type="text" name="enrollment_Number" class="form-control" value=<?php echo $row['enrollment_Number']?>></div>
                            <div class="col-md-6"><label>Name</label><input type="text" name="name" class="form-control" value=<?php echo $row['name']?>></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label>Email No</label><input type="text" name="email" class="form-control" value=<?php echo $row['email']?>></div>
                            <div class="col-md-6"><label>Mobile Number</label><input type="text" name="mobile_No" class="form-control" value=<?php echo $row['mobile_No']?>></div>                
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label>Batch</label><input type="text" name="batch" class="form-control" value=<?php echo $row['batch']?>></div>
                            <div class="col-md-6"><label>Company</label><input type="text" name="company" class="form-control" value=<?php echo $row['company']?>></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label>Package</label><input type="text" name="package" class="form-control" value=<?php echo $row['package']?>></div>
                            <div class="col-md-6"><label>Current Job</label><input type="text" name="job" class="form-control" value=<?php echo $row['current_job']?>></div>                
                        </div>
                        <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                        <?PHP
                                }
                            }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
        </div><br><br>

        <!-- Footer -->
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <h5 class="text-white mb-3">Sitemap</h5>
                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item">
                                <a href="./user_dashboard.php" class="footer-menu-link">Home</a><br>
                                <a href="./infoalumni.php" class="footer-menu-link">Alumni Student</a><br>
                                <a href="./job.php" class="footer-menu-link">Job</a><br>
                                <a href="./profile.php" class="footer-menu-link">profile</a><br>
                                <a href="../logout.php" class="footer-menu-link">Logout</a><br>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h5 class="text-white mb-3">Social</h5>
                </div>
            </div>
        </footer>

        <script src="js/jquery.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>

<?php
    if(!isset($_SESSION['id_user']))
    {
        header("Location: ../index.php");
    }
?>