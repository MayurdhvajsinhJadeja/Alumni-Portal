<?php
    session_start();
    include('../Php/dbconnection.php');
    
    if(isset($_POST["crop_image1"]) && isset($_POST['enrollment_no']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['mobile_no']) && isset($_POST['job']) && isset($_POST['package']) && isset($_POST['company']) && isset($_POST['batch']) && isset($_POST['category']) && isset($_POST['status']))
    {
        $image = $_SESSION['imageName'];
        $enrollment_Number = $_POST['enrollment_no'];
        $Name = $_POST['name'];
        $email = $_POST['email'];	
        $password = $_POST['password'];
        $mobile_no = $_POST['mobile_no'];            
        $current_job = $_POST['job'];
        $package = $_POST['package'];
        $company = $_POST['company'];
        $batch = $_POST['batch'];
        $category = $_POST['category'];                    
        $status = $_POST['status'];

        $INSERT = "INSERT INTO project (enrollment_Number, name, email, password, mobile_No, current_job,batch, company, package, category, status, image) 
                VALUES ('$enrollment_Number', '$Name', '$email', '$password' , '$mobile_no' , '$current_job' , '$batch' , '$company' , '$package' , '$category' , '$status', '$image')";
    
        if ($conn->query($INSERT) === TRUE)
        {
            header('Location: ./admin_dashboard.php');
        }     
    }
    else
    {
        echo "error";
    }
?>