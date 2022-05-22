<?php session_start(); ?>
<html>
    <head>
        <title>Insert</title>
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <!-- <link href="./Admin/css/insert_form.css" rel="stylesheet"> -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    </head>

    <body>
        <br><br><br><ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark"> 
            <div class="card-body" style="width: 80%; margin-left: 10%;">
                <div class="card-body">
                    <div class="card shadow mb-4" style="margin-top: -5%;"> 
                        <div class="card-header py-3">
                            <center><h6 class="m-0 font-weight-bold text-primary">Registration For Information</h6></center>
                        </div>
                    
                        <div class="card-body">        
                        <form method="POST" action="./insert_userdata.php">
                                        
                                <div class="row">    
                                    <div class="col-2" style="margin-left: 10%;"> 
                                        <input type="text" name="enrollment_no" id="enrollment_no" disabled="disabled" value="<?php echo $_SESSION['enrollmentnumber'];?>" style="height: 30px; width: 180%;">
                                    </div>
                                 
                                    <div class="col-2 row-space" style="margin-left: 10%;">
                                        <input type="text" name ="name" id="name" placeholder="Name" style="height: 30px; width: 180%;">
                                    </div>
                        
                                    <div class="col-2 row_space_2" style="margin-left: 10%;">
                                        <input type="text" name="email" id="email" disabled="disabled" value="<?php echo $_SESSION['email'];?>" style="height: 30px; width: 180%;">
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-2" style="margin-left: 10%;">
                                        <input type="text" name="mobile_no" id="mobile_no" disabled="disabled" value="<?php echo $_SESSION['phonenumber'];?>" style="height: 30px; width: 180%;">
                                    </div>
                        
                                    <div class="col-2 row-space" style="margin-left: 10%;">
                                        <input type="text" name="job" id="job" placeholder="Current Job Title" style="height: 30px; width: 180%;">
                                    </div>

                                    <div class="col-2 row_space_2" style="margin-left: 10%;">
                                        <input type="text" name="package" id="package" placeholder="Package" style="height: 30px; width: 180%;">
                                    </div>
                                </div><br>
                                
                                <div class="row">
                                    <div class="col-2" style="margin-left: 10%;">
                                        <input type="text" name="company" id="company" placeholder="Company" style="height: 30px; width: 180%;">
                                    </div>
                                
                                    <div class="col-2 row-space" style="margin-left: 10%;">
                                        <input type="text" name="batch" id="batch" placeholder="Batch (Ex. 2020-2024)" style="height: 30px; width: 180%;">
                                    </div>
                                </div><br>

                                <div class="container">
                                    <div class="panel panel-default">
                                        <div class="panel-body" style="margin-left: 10%;">
                                            <input type="file" name="upload_image" id="upload_image" style="margin-left: -1%;"/>
                                        <br/>
                                        <div id="uploaded_image"></div>
                                        </div>
                                    </div>
                                </div><br>

                                <div>
                                    <center><button class="btn btn-success" name="crop_image1" type="submit" style="width: 10%; padding: 5px; background-color: blue; border: none;">Submit</button></center>
                                </div>
                            </form>
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
        url:"cropimage.php",
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
    include('./Php/dbconnection.php');
?>
