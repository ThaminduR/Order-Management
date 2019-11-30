<?php
include("../lib/dbconnection.php");
session_start();
$errors = [];
$user_id = "";
// connect to database
$db = DBConnection::connectDB();

/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['reset-password'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    // ensure that the user exists on our system
    $query = "SELECT cus_email FROM tbl_customer WHERE cus_email='$email'";
    $results = mysqli_query($db, $query);

    if (empty($email)) {
        array_push($errors, "Your email is required");
    } else if (mysqli_num_rows($results) <= 0) {
        array_push($errors, "Sorry, no user exists on our system with that email");
    }
    // generate a unique random token of length 100
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

    if (count($errors) == 0) {
        // store token in the password-reset database table against the user's email
        $sql = "INSERT INTO password_reset(email, token) VALUES ('$email', '$token')";
        $results = mysqli_query($db, $sql);

        // Send email to user with the token in a link they can click on
        $to = $email;
        $subject = "Reset your password on examplesite.com";

        $msg = "Hi there, click on this 
        localhost/website/passwordRecovery/new_password.php?token=" . $token . " to reset your password on our site";

        $msg = wordwrap($msg, 70);
        $headers = "From: info@stylish.com";
        $headers .= "Content-Type: text/html; charset=UTF-8\n";
        mail($to, $subject, $msg, $headers);
        header('location: pending.php?email=' . $email);
    }
}

// ENTER A NEW PASSWORD
if (isset($_POST['new_password'])) {
    $token = $_POST['token'];
    $new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
    $new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);

    // Grab to token that came from the email link

    if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
    if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
    if (count($errors) == 0) {
        // select email address of user from the password_reset table 
        $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
        $results = mysqli_query($db, $sql);
        $row = $results->fetch_assoc();
        $email = $row['email'];

        if ($email) {
            $new_pass = md5($new_pass);
            $sql = "UPDATE tbl_customer SET password='$new_pass' WHERE cus_email='$email'";
            $results = mysqli_query($db, $sql);
            header('location: ../index.php');
        }
    }
}