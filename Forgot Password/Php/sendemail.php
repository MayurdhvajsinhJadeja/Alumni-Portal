<?php
    session_start();

    include('./Php/dbconnection.php');

    require_once("./include/PHPMailer.php");    
    require_once("./include/SMTP.php");

    $mail = new PHPMailer(true);
    try {
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
        $mail->addAddress($_SESSION["emailid"]);
    
        // Setting the email content
        $mail->IsHTML(true);
        $mail->Subject = "Reset Password?";
        $mail->Body="<p>Kindly click the below link to reset your password</p> http://localhost/Alumni%20Portal/Forgot%20Password/newenterpass.php?email='".$_SESSION['emailid']."'";

        if($mail->send())
        {
?>
        <script>
            window.location.replace("../infoemail.php");
        </script>
<?php
        }
    }
    catch (Exception $e) 
    {
         echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
    }
?>

// {
                            //     ?>
                            //         <script>
                            //             alert("<?php echo "Register Failed, Invalid Email "?>");
                            //         </script>
                            //     <?php
                            // }
                            // else{
                            //     ?>
                            //     <script>
                            //         alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                            //         window.location.replace('verification.php');
                            //     </script>
                            //     <?php
                            // }