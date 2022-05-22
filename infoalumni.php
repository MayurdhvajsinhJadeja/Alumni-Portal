<?php
    include('./Php/dbconnection.php');
    session_start();
?>

<html>
    <head>
        <title>Alumni Portal</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/tooplate-little-fashion.css" rel="stylesheet">
        <style>
            .flex{
                display: flex;
                margin-top: 2%;
            }

            .align{
                margin-left: 2%;
                margin-top: 2%;
            }

            .info{
                font-size: medium; 
                width: 100%; 
                margin-left: 10%;
                margin-top: 2%;
            }
        </style>
    </head>

    <body>
        <!-- Header and Menu Bar -->
        <nav class="navbar navbar-expand-lg" style="width:100%; height: 80px; background-color: white;">
            <div class="container">
                <div>
                    <img src="./Image/mu_logo.png" style="width: 40%;">
                </div>
                
                <div class="collapse navbar-collapse" style="margin-left: -30%;">
                    <ul class="navbar-nav mx-auto">
                        <li><a class="nav-link" href="./index.php">Home</a></li>
                        <li><a class="nav-link" style="color: blue;" href="./infoalumni.php">Alumni Student</a></li>
                        <li><a class="nav-link" href="./login/login.php">Login</a></li>
                        <li><a class="nav-link" href="./login/register.php">Registration</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Data Print For Alumni Student -->
        <section class="section-padding">
            <div class="container">
                <div class="row">

                    <?php
                        $SELECT = "SELECT DISTINCT batch FROM user_details WHERE `status` = '1' ORDER BY batch ASC";
                        $result = $conn -> query($SELECT);

                        if($result -> num_rows > 0) 
                        {
                            while($row = $result->fetch_assoc()) 
                            {            
                    ?>            
                                <div style="display: flex; width: 30%; height: 200px;">
                                    <a href="./infodata.php?char=A&batch=<?php echo $row['batch']?>">
                                        <input type="button" name="btn" value="<?php echo $row['batch'] ?>" style="height: 150px; width: 300px; font-size: larger; border: none; box-shadow: 5px 10px 20px #888888;">
                                    </a>
                                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                            }
                        }
                    ?><br>
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
                                <a href="./index.php" class="footer-menu-link">Home</a><br>
                                <a href="./infoalumni.php" class="footer-menu-link">Alumni Student</a><br>
                                <a href="./login/login.php" class="footer-menu-link">Login</a><br>
                                <a href="./login/register.php" class="footer-menu-link">Registration</a><br>
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