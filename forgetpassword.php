<?php

session_start();

function getToken()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < 20; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

$token = getToken();

$to_email = $_SESSION['cus_email'];
$subject = "Stylish: Password Reset";
$body = "Link to reset password : localhost/website/lib/passwordreset.php?cus_id='$cus_id'?token='$token'";
$headers = "From: Stylish";

if (mail($to_email, $subject, $body, $headers)) {
    echo ("Email successfully sent to Delivery Person");
} else {
    echo ("Email sending failed ");
}
