<?php
session_start();
include("header.php");

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$con = mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enrollment = mysqli_real_escape_string($con, $_POST['enrollment']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // Check if enrollment exists
    $checkQuery = "SELECT * FROM applications WHERE enrollment_number = '$enrollment' AND email = '$email'";
    $result = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id']; 

        // Check if already registered
        if ($row['register_flag'] == 1) {
            echo "<script>alert('User already registered! Please log in.'); window.location.href='login.php';</script>";
            exit();
        }

        // Generate OTP
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;
        $_SESSION['enrollment'] = $enrollment;

        // Send OTP via Email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'prabhumaurya880898@gmail.com'; // Replace with your email
            $mail->Password = 'igof crgc yfum hfdf'; // Use App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('prabhumaurya880898@gmail.com', 'College');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = "Your OTP Code for Verification";
            $mail->Body = "<h3>Your OTP for verification is: <b>$otp</b></h3>";

            $mail->send();
            
            echo "<script>alert('OTP sent to $email. Please check your email.'); window.location.href='otp_verification.php';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Email not sent. Error: {$mail->ErrorInfo}'); window.location.href='signup.php';</script>";
        }
    } else {
        echo "<script>alert('Enrollment number or email is incorrect!'); window.location.href='signup.php';</script>";
    }
}
?>
