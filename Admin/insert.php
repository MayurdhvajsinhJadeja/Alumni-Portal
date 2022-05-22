<html>
    <head>
        <title>Insert</title>
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link href="./css/insert_form.css" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
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

                <!-- <li class="nav-item active">
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
                                <h6 class="m-0 font-weight-bold text-primary">Insert</h6>
                            </div>
                        
                            <div class="card-body">        
                            <form method="POST" action="./insert_data.php">
                                            
                                    <div class="row">    
                                        <div class="col-2"> 
                                            <input type="text" name="enrollment_no" placeholder="Enrollment No">   
                                        </div>
                                  
                                        <div class="col-2 row-space">
                                            <input type="text" name ="name" placeholder="Name">
                                        </div>
                            
                                        <div class="col-2 row_space_2">
                                            <input type="text" name="email" placeholder="Email">
                                        </div>
                                    </div><br>
                                  
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="password" name="password" placeholder="Password">  
                                        </div>
                                  
                                        <div class="col-2 row-space">
                                            <input type="text" name="mobile_no" placeholder="Mobile No">
                                        </div>
                          
                                        <div class="col-2 row_space_2">
                                            <input type="text" name="job" placeholder="Current Job Title">
                                        </div>
                                    </div><br>
                                  
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="text" name="package" placeholder="Package">
                                        </div>
                                  
                                        <div class="col-2 row-space">
                                            <input type="text" name="company" placeholder="Company">
                                        </div>
                                  
                                        <div class="col-2 row_space_2">
                                            <input type="text" name="batch" placeholder="Batch">
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-2">
                                            <input type="text" name="category" placeholder="Category">
                                        </div>
                                  
                                        <div class="col-2 row-space">
                                            <input type="text" name="status" placeholder="Status">
                                        </div>
                                  
                                        <div class="col-2 row_space_2">
                                            
                                        </div>
                                    </div><br>
    
                                    <div class="container">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <!-- <form action="./upload.php" method="post"> -->
                                                    <input type="file" name="upload_image" id="upload_image"/>
                                                    <!-- <button class="btn btn-success" style="background-color: blue;" name="crop_image1">SELECT</button> -->
                                               
                                            <br/>
                                            <div id="uploaded_image"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                    
                                        <button class="btn btn-success" name="crop_image1" type="submit" style="width: 10%; padding: 5px; background-color: blue; border: none;">Submit</button>
                                    </form>
                                    </div>
                                    <!-- </form>  -->

                                <!-- </form> -->
                            </div>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div id="uploadimageModal" class="modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 text-center">
                                <div id="image_demo" style="width:350px; margin-top:30px"></div>
                            </div>
                    
                            <div class="col-md-4" style="padding-top:30px;"><br><br><br>
                            
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button class="btn btn-success" style="background-color: blue;" id="crop_image">Crop</button>
                    <button type="button" class="btn btn-success" style="background-color: blue;" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </body>
</html>
  
<script>  
$(document).ready(function(){

 $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width: 250,
      height: 250,
      type:'circle' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function(event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('#crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function (response){
      $.ajax({
        url:"press.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
        }
      });
    });
  });

});  
</script>

<?php
    session_start();
    if(!isset($_SESSION['id_admin']))
    {
        header("Location: ../index.php");
    }
    include('../Php/dbconnection.php');
?>
