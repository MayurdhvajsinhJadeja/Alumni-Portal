<?php
    session_start();
    include('../Php/dbconnection.php');

    $CompanyName = $_POST['cname'];
    $TypeOfCompany = $_POST['toc'];
    $CampusDateTime = $_POST['cdt'];	
    $LastRegistrationDate = $_POST['lrd'];
    $Venue = $_POST['venue'];            
    $JobProfile = $_POST['jprofile'];
    $Package = $_POST['package'];
    $WorkLocation = $_POST['workloc'];
    $JobDescription = $_POST['jdesc'];
    $SkillsRequired = $_POST['sreq'];                    
    $SelectionProcess = $_POST['selpro'];
    $EligibilityCriteria = $_POST['elcrit'];
    $EducationQualification = $_POST["edu"];
    $RegistrationProcess =  $_POST["rproc"];	
	$PlacementCellContactPerson = $_POST["contactperson"];
    $OtherInformation = $_POST["oinfo"];
    $AboutCompany = $_POST["abcomp"];

    $INSERT = "INSERT INTO job (CompanyName, TypeOfCompany, CampusDateTime, LastRegistrationDate, Venue, JobProfile, Package, WorkLocation, JobDescription, SkillsRequired, SelectionProcess, EligibilityCriteria, EducationQualification, RegistrationProcess, PlacementCellContactPerson, OtherInformation, AboutCompany, Status) 
               VALUES ('$CompanyName', '$TypeOfCompany', '$CampusDateTime', '$LastRegistrationDate', '$Venue' , '$JobProfile' , '$Package' , '$WorkLocation'  , '$JobDescription', '$SkillsRequired' , '$SelectionProcess' , '$EligibilityCriteria', '$EducationQualification', '$RegistrationProcess', '$PlacementCellContactPerson' , '$OtherInformation', '$AboutCompany', '1')";
                    
    if ($conn->query($INSERT) === TRUE)
    {
?>
        <script> 
            alert('Job Successfully Created...') ;
            window.location.href = "../Admin/job.php";
        </script>
<?php
        require_once('../Admin/include/PHPMailer.php');   
        require_once("../Admin/include/SMTP.php");
    
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

            $mail->setFrom('ictmualumniportal@gmail.com', 'Alumni Portal');

            $select_mail = "SELECT * FROM registration WHERE `status` = 1";
            $result = $conn -> query($select_mail);
            if($result -> num_rows > 0)
            {
                while($row = $result -> fetch_array())
                {
                    // $mail->addAddress($row['email']);
                    $mail->addBCC($row['email']);
                }
                $mail->IsHTML(true);
                $mail->Subject = "Payment Verficaction....";
                $mail->Body="Done Send a all";
                if($mail -> send())
                {
?>
                    <script> 
                        alert('Mail Send For All Members');
                    </script>
<?php
                }
                else
                {
?>
                    <script> 
                        alert('Error : In Mail Send');
                    </script>
<?php
                }
            } 
        }
        catch (Exception $e) 
        {
            echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    else
    {
?>
    <script> 
        alert('Error in Creation of Job..') ;
        window.location.href = "../Admin/job.php";
    </script>
<?php
}

