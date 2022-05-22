<?php
    include('../Php/dbconnection.php');
    session_start();
?>

<html>
    <head>
        <title>Alumni_Portal</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/tooplate-little-fashion.css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" /> -->
        <!-- <style>
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
        </style> -->
    </head>

    <body>
        <!-- Header and Menu Bar -->
        <nav class="navbar navbar-expand-lg" style="width:100%; height: 80px; background-color: white;">
            <div class="container">
                <div>
                    <img src="../Image/mu_logo.png" style="width: 40%;">
                </div>
                
                <div class="collapse navbar-collapse" style="margin-left: -30%;">
                    <ul class="navbar-nav mx-auto">
                        <li><a class="nav-link" href="./user_dashboard.php">Home</a></li>
                        <li><a class="nav-link" href="./infoalumni.php">Alumni Student</a></li>
                        <li><a class="nav-link" style="color: blue;" href="./job.php">Job</a></li>
                        <li><a class="nav-link" href="./profile.php">Profile</a></li>
                        <li><a class="nav-link" href="../logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div style="margin-left: 5%; margin-top: 10px;">
            <a href="./infoalumni.php" style="color: blue;"><input type="button" value="back"></a>
        </div>

        <div>
            <?php
                if(isset($_GET['company']))
                {
                    $company = $_GET['company'];
  
                    $select_job = "SELECT * FROM job WHERE `status` = '1' AND `CompanyName` = '$company'";
                    $result_job = $conn -> query($select_job); 

                    if($result_job -> num_rows > 0) 
                    {
                        while($row_job = $result_job ->fetch_assoc()) 
                        {
            ?>
                            <div class="flex" style="box-shadow: 5px 10px 20px #888888; width: 90%; margin-left: 5%; margin-top: 5%; margin-bottom: 5%;">
                                <!-- <div class="info flex" style="margin-top: 50px; margin-left: 8%; font-size: large;">
                                    <div style="width: 450px;">   -->
                                    <form name="myform" method="POST" >
                                        <div id="content-wrapper"> 
                                            <br><br><div class="card-body" style="width: 100%;">
                                                <div class="card-body">
                                                    <div class="card shadow mb-4" style="margin-top: -5%;"> 
                                                        <div class="card-header py-3">
                                                            <center><h6 class="m-0 font-weight-bold text-primary">CAMPUS DRIVE DETAILS</h6></center>
                                                        </div>
                                                    
                                                        <div class="card-body">                
                                                            <div class="row">    
                                                                <div class="col-2" style="margin-left: 5%;"> 
                                                                    Company Name<br><input name="cname" id="cname" placeholder="<?php echo $row_job['CompanyName']?>" disabled style="height: 30px; width: 180%;">
                                                                </div>
                                                            
                                                                <div class="col-2 row-space" style="margin-left: 12%;">
                                                                    Type Of Company<br><input name ="toc" id="toc" placeholder="<?php echo $row_job['TypeOfCompany']?>" disabled style="height: 30px; width: 180%;">
                                                                </div>
                                                    
                                                                <div class="col-2 row_space_2" style="margin-left: 12%;">
                                                                    Campus Date & Time<br><input type="text" name="cdt" id="cdt" placeholder="<?php echo $row_job['CampusDateTime']?>" disabled style="height: 30px; width: 180%;">
                                                                </div>
                                                            </div><br>

                                                            <div class="row">
                                                                <div class="col-2" style="margin-left: 5%;">
                                                                    Last Registration Date<br><input type="text" name="lrd" id="lrd" class="space" placeholder="<?php echo $row_job['LastRegistrationDate']?>" disabled style="height: 30px; width: 180%;">
                                                                </div>
                                                    
                                                                <div class="col-2 row-space" style="margin-left: 12%;">
                                                                    Venue<br><input name="venue" id="venue" placeholder="<?php echo $row_job['Venue']?>" disabled class="space" style="height: 30px; width: 180%;">
                                                                </div>
                                                            </div>       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body" style="width: 100%;">
                                                <div class="card-body">
                                                    <div class="card shadow mb-4" style="margin-top: -8%;"> 
                                                        <div class="card-header py-3">
                                                            <center><h6 class="m-0 font-weight-bold text-primary">JOB DESCRIPTION</h6></center>
                                                        </div>
                                                    
                                                        <div class="card-body">                
                                                            <div class="row">    
                                                                <div class="col-2" style="margin-left: 5%;"> 
                                                                    Job Profile<br><input name="jprofile" id="jprofile" placeholder="<?php echo $row_job['JobProfile']?>" disabled class="space" style="height: 30px; width: 180%;">
                                                                </div>
                                                            
                                                                <div class="col-2 row-space" style="margin-left: 12%;">
                                                                    Package<br><input name ="package" id="package" placeholder="<?php echo $row_job['Package']?>" disabled class="space" placeholder="Type Of Company" style="height: 30px; width: 180%;">
                                                                </div>
                                                    
                                                                <div class="col-2 row_space_2" style="margin-left: 12%;">
                                                                    Worl Location<br><input name="workloc" id="workloc" placeholder="<?php echo $row_job['WorkLocation']?>" disabled class="space" style="height: 30px; width: 180%;">
                                                                </div>
                                                            </div><br>

                                                            <div>
                                                                <label style="margin-left: 5%;">Job Description</label><br><p><br><textarea style="margin-left: 5%; margin-top: -3%;" class="space" rows="3" cols="102%" name="jdesc" id="jdesc" placeholder="<?php echo $row_job['JobDescription']?>" disabled></textarea></p>
                                                                <label style="margin-left: 5%;">Skills Required</label><br><p><br><textarea style="margin-left: 5%; margin-top: -3%;" class="space" rows="3" cols="102%"  name="sreq" id="sreq" placeholder="<?php echo $row_job['SkillsRequired']?>" disabled></textarea></p>
                                                                <label style="margin-left: 5%;">Selection Process</label><br><p><br><textarea style="margin-left: 5%; margin-top: -3%;" class="space" rows="3" cols="102%"  name="selpro" id="selpro" placeholder="<?php echo $row_job['SelectionProcess']?>" disabled></textarea></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body" style="width: 100%;">
                                                <div class="card-body">
                                                    <div class="card shadow mb-4" style="margin-top: -8%;"> 
                                                        <div class="card-header py-3">
                                                            <center><h6 class="m-0 font-weight-bold text-primary">ELIGIBILTY PARAMETERS</h6></center>
                                                        </div>
                                                    
                                                        <div class="card-body">                
                                                            <div class="row">    
                                                                <div class="col-2" style="margin-left: 5%;"> 
                                                                    Eligibility Criteria<br><input name="elcrit" id="elcrit" class="space" placeholder="<?php echo $row_job['EligibilityCriteria']?>" disabled style="height: 30px; width: 470%;">
                                                                </div>
                                                                <div style="margin-left: 5%;">
                                                                <label><br>Education Qualification</label><br><p><textarea class="space" rows="3" cols="102%" name="edu" id="edu" placeholder="<?php echo $row_job['EducationQualification']?>" disabled></textarea></p>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body" style="width: 104%; margin-left: -2%;">
                                                <div class="card-body">
                                                    <div class="card shadow mb-4" style="margin-top: -6%;"> 
                                                        <div class="card-header py-3">
                                                            <center><h6 class="m-0 font-weight-bold text-primary space">TO PARTICIPATE</h6></center>
                                                        </div>
                                                    
                                                        <div class="card-body">                
                                                            <div >    
                                                                <label style="margin-left: 5%;">Registration Process</label><br><input name="rproc" id="rproc" class="space"  placeholder="<?php echo $row_job['RegistrationProcess']?>" disabled style="height: 30px; width: 70%; margin-left: 5%;"><br>
                                                                <br><label style="margin-left: 5%;">Placement Cell Contact Person</label><br><input name="contactperson" id="contactperson" class="space"  placeholder="<?php echo $row_job['PlacementCellContactPerson']?>" disabled style="height: 30px; width: 70%; margin-left: 5%;">
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </div>
                                            </div>  

                                            <div class="card-body" style="width: 104%; margin-left: -2%;">
                                                <div class="card-body">
                                                    <div class="card shadow mb-4" style="margin-top: -8%;"> 
                                                        <div class="card-header py-3">
                                                            <center><h6 class="m-0 font-weight-bold text-primary space">OTHER INFORMATION</h6></center>
                                                        </div>
                                                    
                                                        <div class="card-body">                
                                                        <label style="margin-left: 5%;">Other Information</label><br><p><textarea style="margin-left: 5%;" class="space"  rows="3" cols="102%"  name="oinfo" id="oinfo" placeholder="<?php echo $row_job['OtherInformation']?>" disabled></textarea></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body" style="width: 104%; margin-left: -2%;">
                                                <div class="card-body">
                                                    <div class="card shadow mb-4" style="margin-top: -8%;"> 
                                                        <div class="card-header py-3">
                                                            <center><h6 class="m-0 font-weight-bold text-primary space">ABOUT COMPANY</h6></center>
                                                        </div>
                                                    
                                                        <div class="card-body">                
                                                        <label style="margin-left: 5%;">About Company</label><br><p><textarea style="margin-left: 5%;" class="space" rows="3" cols="102%"  name="abcomp" id="abcomp" placeholder="<?php echo $row_job['AboutCompany']?>" disabled></textarea></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- </div>

                                    <div style="margin-left: 0%"></div>
                                </div> -->
                            </div>
            <?php    
                }
            }              
        }
    
        ?><br>
        </div>
        
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
        <script type="text/javascript" src="./jquery/hide.js"></script>
    </body>
</html>