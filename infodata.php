<?php
    include('./Php/dbconnection.php');
?>

<html>
    <head>
        <title>Alumni_Portal</title>
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
        </nav><br><br><br>

        <div style="margin-left: 5%; margin-top: 10px;">
            <a href="./infoalumni.php" style="color: blue;"><input type="button" value="back"></a>
        </div>

        <script>
            $(document).ready(function(){
                ("#mydiv").hide();
            });
        </script>

        <div>
            <?php
                include('./Php/dbconnection.php');
                if(isset($_GET['char']))
                {
                    $char = $_GET['char'];
                    $select_char = "SELECT * FROM user_details WHERE `name` LIKE '$char%' AND `status` = '1' AND `batch` = '".$_GET['batch']."'";
                    $result_char = $conn -> query($select_char); 

                    if($result_char -> num_rows > 0) 
                    {
                        while($row_batch = $result_char ->fetch_assoc()) 
                        {
            ?>
                        <div class="flex" style="box-shadow: 5px 10px 20px #888888; width: 90%; height: 200px; margin-left: 5%;">
            <?php
                            $imageData =  $row_batch['image']; 
                            echo "<div class=align style='margin-left: 3%; margin-top: 2%;'>";
                            echo "<img src='./Image_database/$imageData' width=150px height=150px />";
                            echo "</div>";
            ?>
                            <div class="info flex" style="margin-top: 50px; margin-left: 8%; font-size: large;">
                                <div style="width: 450px; height: 125px;">  
                                    Name: <?php echo $row_batch['name']?><br>
                                    Email: <?php echo $row_batch['email']?><br>
                                    Batch: <?php echo $row_batch['batch']?><br>
                                </div>
                            </div>
                        </div>
            <?php    
                }
            }
        }
    
        ?><br>
        </div>

        <div style="margin-left: 13%;">
            <?php
                for($i='A'; $i<'Z'; $i++)
                {    
                    $batch = $_GET['batch'];
            ?>
                    <td>
                        <a href="?char=<?php echo $i ?>&batch=<?php echo $batch ?>">
                            <button name="btn_char" id="hide" style="height: 30px; border: 0.1px solid black;">
                                <?php echo $i ?>
                            </button> 
                        </a>&nbsp; 
                    </td>    
            <?php 
                }
            ?>
        </div><br>
        
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
        <script type="text/javascript" src="./jquery/hide.js"></script>
    </body>
</html>