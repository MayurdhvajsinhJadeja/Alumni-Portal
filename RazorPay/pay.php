<?php
session_start();

require('config.php');
require('razorpay-php/Razorpay.php');

?>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />

 <br><br><br><ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark"> 
    <div class="card-body" style="width: 80%; margin-left: 10%;">
        <div class="card-body">
            <div class="card shadow mb-4" style="margin-top: -5%;"> 
                <div class="card-header py-3">
                    <center><h6 class="m-0 font-weight-bold text-primary"> PAY FOR ENROLLMENT</h6></center>
                </div>
            
                <div class="card-body">                      
                  <div class="row">    
                      
                      <div class="" style="margin-left: 10%;"> 
                        <p>
                            -> &nbsp; For Registration You Need To Pay ₹1000 <br>
                            -> &nbsp; You Can Pay It Through RazorPay <br>
                            -> &nbsp; You May Use UPI, Net Banking, Debit/Credit Card, Wallet, etc. <br><br>
                            -> &nbsp; Reference Contact Person: Prof. Kapil Shukla<br>
                            -> &nbsp; Reference Contact Number: +91 8347289289<br>
                            -> &nbsp; Reference Email address : kapil.shukla@marwadieducation.edu.in<br>
                        </p>
                      </div>
                  </div><br>    
                </div>
            </div>

<?php
  use Razorpay\Api\Api;
  $api = new Api($keyId, $keySecret);

  $enrollment =  $_SESSION['enrollmentnumber'];
  $email =  $_SESSION['email'];
  $phonenumber =  $_SESSION['phonenumber'];
  $password = $_SESSION['password'];


  $orderData = [
      'receipt'         => 3456,
      'amount'          => 1000 * 100,
      'currency'        => 'INR',
      'payment_capture' => 1
  ];

  $razorpayOrder = $api->order->create($orderData);

  $razorpayOrderId = $razorpayOrder['id'];
  $_SESSION['razorpay_order_id'] = $razorpayOrderId;

  $displayAmount = $amount = $orderData['amount'];

  if ($displayCurrency !== 'INR')
  {
      $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
      $exchange = json_decode(file_get_contents($url), true);

      $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
  }

  $data = [
      "key"               => $keyId,
      "amount"            => $amount,
      "name"              => "Alumni Portal",
      "description"       => "Fess Pay for Alumni Student",
      "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
      "prefill"           => [
      "name"              => $enrollment,
      "email"             => $email,
      "contact"           => $phonenumber,
      ],
      "notes"             => [
      "address"           => "Rajkot, Gujarat, India",
      "merchant_order_id" => "12312321",
      ],
      "theme"             => [
      "color"             => "#F37254"
      ],
      "order_id"          => $razorpayOrderId,
  ];

  if ($displayCurrency !== 'INR')
  {
      $data['display_currency']  = $displayCurrency;
      $data['display_amount']    = $displayAmount;
  }

  $json = json_encode($data);
  ?>

  <form action="verify.php" method="POST">
    <script
      src="https://checkout.razorpay.com/v1/checkout.js"
      data-key="<?php echo $data['key']?>"
      data-amount="<?php echo $data['amount']?>"
      data-currency="INR"
      data-name="<?php echo $data['name']?>"
      data-image="<?php echo $data['image']?>"
      data-description="<?php echo $data['description']?>"
      data-prefill.name="<?php echo $data['prefill']['name']?>"
      data-prefill.email="<?php echo $data['prefill']['email']?>"
      data-prefill.contact="<?php echo $data['prefill']['contact']?>"
      data-notes.shopping_order_id="3456"
      data-order_id="<?php echo $data['order_id']?>"
      <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
      <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
    >
    </script>

    <input type="hidden" name="shopping_order_id" value="3456">
</form>
</div></center>