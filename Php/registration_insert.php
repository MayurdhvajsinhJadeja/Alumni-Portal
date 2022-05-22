<?php
    include('./dbconnection.php');
    if(isset($_POST['enrollmentnumber']) && isset($_POST['email']) && isset($_POST['phonenumber']) && isset($_POST['password']))
    {
        $enroll = $_POST['enrollmentnumber'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $password = $_POST['password'];

        $insert_r_data = "INSERT INTO registration (`enrollment_no`,`email`,`phone_number`,`password`,`status`) VALUES ('$enroll','$email','$phonenumber','$password','0')";
        if ($conn->query($insert_r_data) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $insert_r_data . "<br>" . $conn->error;
          }
    }
?>