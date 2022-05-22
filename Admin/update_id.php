<?php
    session_start();
    include('../Php/dbconnection.php');
    $id = $_GET['id'];
    $email = $_GET['email'];
    $enrollment_no = $_GET['enroll'];
    $phone_number = $_GET['phone'];
    $password = $_GET['pass'];

    require_once("./include/PHPMailer.php");    
    require_once("./include/SMTP.php");

    $mail = new PHPMailer(true);
    try 
    {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username = 'ictmualumniportal@gmail.com';
        $mail->Password = '@ictmu2020';

        // Sender and recipient settings
        //$email_id = $_POST['email'];
        $mail->setFrom('ictmualumniportal@gmail.com', 'Alumni Portal');
        $mail->addAddress($email);
    
        // Setting the email content
        $mail->IsHTML(true);
        $mail->Subject = "Payment Verficaction....";
        $mail->Body="<br>" . "Enrollment No: " . $enrollment_no . "<br>" . "Email: " . $email . "<br>" . "Phone Number: " . $phone_number . "<br>" . "Password: " . $password;

        if($mail->send())
        {   
            $update = "UPDATE registration SET `status` = '1' WHERE `id` = '$id'";
            $conn->query($update) === TRUE;

            $insert_login = "INSERT INTO `login` (`enrollment_no`,`password`,`category`,`status`) VALUES ('$enrollment_no','$password','user','1')";
            $conn->query($insert_login) === TRUE;

?>
            <script>
                alert('Mail Send');
                window.location.href = "./verification.php";
            </script>
<?php
        }
        else
        {
?>
            <script>
                alert('Mail Not Send');
                window.location.href = "./verification.php";
            </script>
<?php
        }   
    }
    catch (Exception $e) 
    {
        echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
    }
    
?>