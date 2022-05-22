<?php
    include('../Php/dbconnection.php');
    $payment_id = $_POST['text'];

    $payment = "SELECT * FROM registration WHERE `razorpay_payment_id` = '$payment_id'";
    $pay_result = $conn -> query($payment);

    if($pay_result -> num_rows > 0)
    {
        while($fetch = $pay_result -> fetch_assoc())
        {
?>
            <script>
                alert('Now You Fillup Your Information');
                window.location.href = "../user_reg.php";
            </script>
<?php
        }
    }
    else
    {
?>
        <script>
            alert('Please Enter A correct eazorpay payment id....... !!');
            window.location.href = "./verify.php";
        </script>
<?php
    }
?>