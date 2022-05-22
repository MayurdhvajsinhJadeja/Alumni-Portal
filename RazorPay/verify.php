<?php
    require('config.php');
    session_start();

    // $conn = mysqli_connect($host, $username, $password, $dbname);
    include('../Php/dbconnection.php');

    require('razorpay-php/Razorpay.php');
    use Razorpay\Api\Api;
    use Razorpay\Api\Errors\SignatureVerificationError;

    $success = true;

    $error = "Payment Failed";

    if (empty($_POST['razorpay_payment_id']) === false)
    {
        $api = new Api($keyId, $keySecret);

        try
        {
            // Please note that the razorpay order ID must
            // come from a trusted source (session here, but
            // could be database or something else)
            $attributes = array(
                'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                'razorpay_signature' => $_POST['razorpay_signature'],
                $_SESSION['razorpay_payment_id'] = $_POST['razorpay_payment_id']
            );

            $api->utility->verifyPaymentSignature($attributes);
        }
        catch(SignatureVerificationError $e)
        {
            $success = false;
            $error = 'Razorpay Error : ' . $e->getMessage();
        }
    }

    if ($success === true)
    {
        $enrollmentnumber = $_SESSION['enrollmentnumber'];
        $email = $_SESSION['email'];
        $phonenumber = $_SESSION['phonenumber'];
        $password = $_SESSION['password'];
        $razorpay_order_id = $_SESSION['razorpay_order_id'];
        $razorpay_payment_id = $_SESSION['razorpay_payment_id'];

        $sql = "INSERT INTO `registration` (`enrollment_no`, `email`, `phone_number`, `password`, `razorpay_order_id`,`razorpay_payment_id`,`payment_status`,`price`,`category`,`status`) 
                VALUES ('$enrollmentnumber','$email','$phonenumber','$password','$razorpay_order_id','$razorpay_payment_id','success','1000','user','0')";
        $result = $conn -> query($sql);
?>

        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

        <br><br><br><ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark"> 
            <div class="card-body" style="width: 80%; margin-left: 10%;">
                <div class="card-body">
                    <div class="card shadow mb-4" style="margin-top: -5%;"> 
                        <div class="card-header py-3">
                            <center><h6 class="m-0 font-weight-bold text-primary"> SUCCESSFULLY PAYMENT</h6></center>
                        </div>
                    
                        <div class="card-body">                      
                            <div class="row">    
                            
                                <div style="margin-left: 10%; display:flex"> 
                                    <p>
                                        -> &nbsp; <?php echo $enrollmentnumber; ?>                    
                                            Payment Successfull <br>
                                        -> &nbsp; Your Request will now be verified by admin <br>
                                        -> &nbsp; Contact : Prof. Kapil Shukla <br><br>
                                        -> &nbsp; Contact Number: +91 8347289289<br>
                                        -> &nbsp; Email address : kapil.shukla@marwadieducation.edu.in<br>
                                    </p>
                                
                                    <div>
                                        <img src="../Image/payment.png" style="width: 40%; margin-left: 40%;">
                                    </div>
                                </div>
   
                                <form action="./veridata.php" method="post">
                                    <input type="text" name="text" placeholder="Enter razorpay payment id" style="margin-left: 50%; width: 250%;"></input><br><br>
                                    <button style="margin-left: 50%; width: 100%;">Enter Your Details</button>
                                </form>
                            </div><br>
                        </div>
            
<?php
    }
    
    else
    {
?>
        <script> alert('Payment Transcation Failed..'); </script>
<?php
    }
?>