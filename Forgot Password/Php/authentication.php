<?php
    session_start();
    include('./Php/dbconnection.php');  
    $email = $_POST['email'];  

    $sql = "SELECT * FROM project WHERE email = '".$email."'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();
        $_SESSION["emailid"] =  $row['email'];  
        header("Location: ./sendemail.php");
    } 
    else 
    {
        echo $email . " " ."User Does Not Exist";
    }
    $conn->close();
?>  