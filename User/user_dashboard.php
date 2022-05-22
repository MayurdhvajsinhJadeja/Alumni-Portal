<?php
    include('../Php/dbconnection.php');
    session_start();
?>

<html>
    <head>
        <title>Alumni Portal</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/tooplate-little-fashion.css" rel="stylesheet">
    </head>

    <body>
        <!-- Header and Menu Bar -->
        <nav class="navbar navbar-expand-lg" style="width:100%; height: 80px;">
            <div class="container">
                <div>
                    <img src="../Image/mu_logo.png" style="width: 40%;">
                </div>
                
                <div class="collapse navbar-collapse" style="margin-left: -30%;">
                    <ul class="navbar-nav mx-auto">
                        <li><a class="nav-link" style="color:blue;" href="./user_dashboard.php">Home</a></li>
                        <li><a class="nav-link" href="infoalumni.php">Alumni Student</a></li>
                        <li><a class="nav-link" href="./job.php">Job</a></li>
                        <li><a class="nav-link" href="./profile.php">Profile</a></li>
                        <li><a class="nav-link" href="../logout.php">Logout</a></li>
                    </ul>                    
                </div>
            </div>
        </nav>

        <!-- Image -->
        <div class="slick-custom">
            <img src="../Image/img_01.jpg" style="width:100%; margin-top: 60px;">        
        </div>

        <!-- Data Print For Alumni Student -->
        <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="text-center">
                        <h5 class="mb-5">Alumni Student Information</h5>
                    </div> 

                    <?php
                        $SELECT = "SELECT * FROM user_details WHERE `status` = '1' LIMIT 3";
                        $result = $conn -> query($SELECT);
                    
                        if($result->num_rows > 0) 
                        {
                            while($row = $result->fetch_assoc())    
                            {            
                    ?>     
                                <div class="col-lg-4" style="box-shadow: 5px 10px 20px #888888;">
                                    <div class="product-thumb">
                                        <a href="product-detail.html">
                                        <?php
                                                $imageData =  $row['image']; 
                                                echo "<div align=center>"."<br>";
                                                echo "<img src='../Image_database/$imageData' width=180px height=180px;/>";
                                                echo "</div>";
                                        ?>    
                                        </a>
                                            <div class="product-info d-flex" style="margin-left: 10%;">
                                                <div style="font-size: small; width: 100%">  
                                                    Name: <?php echo $row['name']?><br>
                                                    Email: <?php echo $row['email']?><br>
                                                    Mobile No: <?php echo $row['mobile_No']?><br>
                                                    Batch: <?php echo $row['batch']?><br>
                                                    Company: <?php echo $row['company']?><br>
                                                    Current Job: <?php echo $row['current_job']?><br>
                                                    Package: <?php echo $row['package']?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                            }
                        }
                        ?>

                    <div class="col-12 text-center" style="margin-top: 5%"> 
                        <a href="infoalumni.php" class="view-all">View All Alumni Student Details</a>
                    </div>

                </div>
            </div>
        </section>

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

        <script src="./js/jquery.min.js"></script>
        <script src="./js/custom.js"></script>
    </body>
</html>

<style>
        .fa {
        padding: 20px;
        font-size: 30px;
        width: 30px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
        border-radius: 50%;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
        background: #3B5998;
        color: white;
        }

        .fa-twitter {
        background: #55ACEE;
        color: white;
        }

        .fa-linkedin {
        background: #007bb5;
        color: white;
        }
</style>