<?php

require('config.php');
session_start();
//db connection
$_SESSION['logged-in'] = 1;

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
            'razorpay_signature' => $_POST['razorpay_signature']
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
    $conn=mysqli_connect('localhost','root','','hotel_booking');
    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = 1;

    $price = $_SESSION['price'];
    // $sql = "INSERT INTO `orders` (`order_id`, `razorpay_payment_id`, `status`, `email`, `price`) VALUES ('$razorpay_order_id', '$razorpay_payment_id', 'success', '$email', '$price')";
    // if(mysqli_query($conn, $sql)){
    //     echo "payment details inserted to db";
    // }

    $html = "<p>Your payment was successful</p>
            $razorpay_order_id
             <p>Payment ID: {$razorpay_payment_id}</p>";
            
    
}
else
{
    $html = "<p>Your payment failed 1111</p>
             <p>{$error}</p>";
}

echo $html;
?>
<script>
    // Prevent automatic redirection
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>