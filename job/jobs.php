<?php
    session_start();
    // if(!isset($_SESSION['id_admin']))
    // {
    //     header("Location: ../index.php");
    // }
    include('../Php/dbconnection.php');
?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<!-- <link href="./css/job.css" rel="stylesheet"> -->

<body>
<form  id="regform" method="POST" action="./insert_job_data.php" enctype="multipart/form-data">
<!-- <form id="regForm" action="/action_page.php"> -->
  <h1>Job Details</h1>
  <div>
    <div><div style="height: 25px; background-color: #044caa; color: #ffffff; text-align: center;">Campus Drive Details</div>
      <div><p><input name="cname" placeholder="Company Name"></p></div>
      <div ><p><input name="toc" placeholder="Type of Company"></p></div>
      <p><input type="text" id="cdt" name="cdt" placeholder="Campus Date & Time">
      <p><input type="text" id="lrd" name="lrd" placeholder="Last Registration Date">
      <p><input name="venue" placeholder="Venue"></p>
    </div>
    <div><div style="height: 25px; background-color: #044caa; color: #ffffff; text-align: center;">Job Description</div>
      <p><input  name="jprofile" placeholder="Job Profile"></p>
      <p><input  name="package" placeholder="Package"></p>
      <p><input  name="workloc" placeholder="Work Location"></p>
      <p><br><textarea rows="10" cols="95%" name="jdesc" placeholder="Job Description"></textarea></p>
      <p><br><textarea rows="10" cols="95%"  name="sreq" placeholder="Skills Required"></textarea></p>
      <p><br><textarea rows="10" cols="95%"  name="selpro" placeholder="Selection Process"></textarea></p>
    </div>
    <div><div style="height: 25px; background-color: #044caa; color: #ffffff; text-align: center;">Eligibility Parameters</div>
      <p><input  name="elcrit" placeholder="Eligibility Criteria"></p>
      <p><br><textarea rows="10" cols="95%"  name="edu" placeholder="Education Qualification"></textarea></p>
    </div><br>
    <div><div style="height: 25px; background-color: #044caa; color: #ffffff; text-align: center;">To Participate</div>
      <p><input  name="rproc" placeholder="Registration Process"></p>
      <p><input  name="contactperson" placeholder="Placement Cell Contact Person"></p>
    </div>
    <div><div style="height: 25px; background-color: #044caa; color: #ffffff; text-align: center;">Other Information</div>
      <p><textarea rows="10" cols="95%"  name="oinfo" placeholder="Other Information"></textarea></p>
    </div>
    <div><div style="height: 25px; background-color: #044caa; color: #ffffff; text-align: center;">About Company</div>
      <p><textarea rows="10" cols="95%"  name="abcomp" placeholder="About Company"></textarea></p>
    </div>
      <button>Submit</button>
  </div>
  

</form>

</body>
</html>
