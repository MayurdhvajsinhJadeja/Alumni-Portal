<?php
    session_start();
    include('../Php/dbconnection.php');
?>

<html>
    <head>
        <title>Insert</title>
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
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

                <li class="nav-item active">
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

            <form name="myform" method="POST" onsubmit="return validateform(this);" action="../job/insert_job_data.php">
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
                                            <input name="cname" id="cname" placeholder="&nbsp;&nbsp;Company Name" style="height: 30px; width: 180%;">
                                        </div>
                                    
                                        <div class="col-2 row-space" style="margin-left: 12%;">
                                            <input name ="toc" id="toc" placeholder="&nbsp;&nbsp;Type Of Company" style="height: 30px; width: 180%;">
                                        </div>
                            
                                        <div class="col-2 row_space_2" style="margin-left: 12%;">
                                            <input type="text" name="cdt" id="cdt" placeholder="&nbsp;&nbsp;Campous Date & Time" style="height: 30px; width: 180%;">
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-2" style="margin-left: 5%;">
                                            <input type="text" name="lrd" id="lrd" class="space" placeholder="&nbsp;&nbsp;Last Registration Date" style="height: 30px; width: 180%;">
                                        </div>
                            
                                        <div class="col-2 row-space" style="margin-left: 12%;">
                                            <input name="venue" id="venue" placeholder="&nbsp;&nbsp;Venue" class="space" style="height: 30px; width: 180%;">
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
                                            <input name="jprofile" id="jprofile" placeholder="&nbsp;&nbsp;Job Profile" class="space" style="height: 30px; width: 180%;">
                                        </div>
                                    
                                        <div class="col-2 row-space" style="margin-left: 12%;">
                                            <input name ="package" id="package" placeholder="&nbsp;&nbsp;Package" class="space" placeholder="Type Of Company" style="height: 30px; width: 180%;">
                                        </div>
                            
                                        <div class="col-2 row_space_2" style="margin-left: 12%;">
                                            <input name="workloc" id="workloc" placeholder="&nbsp;&nbsp;Work Location" class="space" style="height: 30px; width: 180%;">
                                        </div>
                                    </div><br>

                                    <div>
                                        <p><br><textarea style="margin-left: 5%; margin-top: -3%;" class="space" rows="3" cols="102%" name="jdesc" id="jdesc" placeholder="&nbsp;&nbsp;Job Description"></textarea></p>
                                        <p><br><textarea style="margin-left: 5%; margin-top: -3%;" class="space" rows="3" cols="102%"  name="sreq" id="sreq" placeholder="&nbsp;&nbsp;Skills Required"></textarea></p>
                                        <p><br><textarea style="margin-left: 5%; margin-top: -3%;" class="space" rows="3" cols="102%"  name="selpro" id="selpro" placeholder="&nbsp;&nbsp;Selection Process"></textarea></p>
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
                                            <input name="elcrit" id="elcrit" class="space" placeholder="&nbsp;&nbsp;Eligibility Criteria" style="height: 30px; width: 470%;">
                                            <p><br><textarea class="space" rows="3" cols="102%" name="edu" id="edu" placeholder="&nbsp;&nbsp;Education Qualification"></textarea></p>
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
                                    <div class="row">    
                                            <input name="rproc" id="rproc" class="space"  placeholder="&nbsp;&nbsp;Registration Process" style="height: 30px; width: 70%; margin-left: 5%;"><br><br>
                                            <input name="contactperson" id="contactperson" class="space"  placeholder="&nbsp;&nbsp;Placement Cell Contact Person" style="height: 30px; width: 70%; margin-left: 5%;">
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
                                    <p><textarea style="margin-left: 5%;" class="space"  rows="3" cols="102%"  name="oinfo" id="oinfo" placeholder="&nbsp;&nbsp;Other Information"></textarea></p>
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
                                    <p><textarea style="margin-left: 5%;" class="space" rows="3" cols="102%"  name="abcomp" id="abcomp" placeholder="&nbsp;&nbsp;About Company"></textarea></p>
                                </div>

                                <div>
                                    <center><input type="submit" name="btn" class="space" style="background-color: rgba(53,91,204,255); color: white; width: 20%; height: 40px; font-size: larger;" value="SUBMIT"></input></center><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <script>
            function validateform()
            {  
                console.log("Hello");
                var cname = document.getElementById('cname').value;
                var toc = document.getElementById('toc').value;  
                var lrd = document.getElementById('lrd').value;
                var cdt = document.getElementById('cdt').value;
                var venue = document.getElementById('venue').value;
                var jprofile = document.getElementById('jprofile').value;
                var package = document.getElementById('package').value;
                var workloc = document.getElementById('workloc').value;
                var jdesc = document.getElementById('jdesc').value;
                var sreq = document.getElementById('sreq').value;
                var selpro = document.getElementById('selpro').value;
                var elcrit = document.getElementById('elcrit').value;
                var edu = document.getElementById('edu').value;
                var rproc = document.getElementById('rproc').value;
                var contactperson = document.getElementById('contactperson').value;
                var oinfo = document.getElementById('oinfo').value;
                var abcomp = document.getElementById('abcomp').value;

                if (cname=="" || toc=="" || lrd=="" || cdt=="" || venue=="" || jprofile=="" || package=="" || workloc=="" || jdesc=="" || sreq=="" || selpro=="" || elcrit=="" || edu=="" || rproc=="" || contactperson=="" || oinfo=="" || abcomp==""){  
                    alert("field can't be blank");  
                    return false;  
                }
            }  
        </script>         
    </body>
</html>

<?php
    if(!isset($_SESSION['id_admin']))
    {
        header("Location: ../index.php");
    }
?>
