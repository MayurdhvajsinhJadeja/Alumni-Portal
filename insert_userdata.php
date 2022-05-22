<?php
    session_start();
    include('./Php/dbconnection.php');
    
    // if(isset($_POST["crop_image1"]) && isset($_POST['email']) && isset($_POST['mobile_no']) && isset($_POST['job']) && isset($_POST['package']) && isset($_POST['company']) && isset($_POST['batch']))
    // {
        $image = $_SESSION['imageName'];
        $enrollmentnumber = $_SESSION['enrollmentnumber'];
        $email = $_SESSION['email'];
        $phonenumber = $_SESSION['phonenumber'];

        $Name = $_POST['name'];          
        $current_job = $_POST['job'];
        $package = $_POST['package'];
        $company = $_POST['company'];
        $batch = $_POST['batch'];

        $INSERT = "INSERT INTO user_details (enrollment_Number, name, email, mobile_No, current_job,batch, company, package, category, status, image) 
                VALUES ('$enrollmentnumber', '$Name', '$email', '$phonenumber' , '$current_job' , '$batch' , '$company' , '$package' , 'user' , '1', '$image')";

        if ($conn->query($INSERT) === TRUE)
        {
?>
            <script> 
                alert('Registration Successful..');
                window.location.href = "./index.php";
            </script>
<?php
        }     
    else
    {
?>
    <script>
        alert("Ple Conform Your Details and check wheather any empty filed avalivable...");
        window.location.href = "./user_reg.php";
    </script>
<?php
    }
?>