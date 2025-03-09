<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_otp = $_POST['otp'];

    if ($entered_otp == $_SESSION['otp']) {
        echo "<script>alert('✅ OTP Verified Successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('❌ Invalid OTP! Try Again.'); window.location.href='otp_verification.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5 text-center">
        <h2>🔑 Enter OTP</h2>
        <form method="POST">
            <input type="text" name="otp" class="form-control w-50 mx-auto my-3" placeholder="Enter OTP" required>
            <button type="submit" class="btn btn-success">Verify OTP</button>
        </form>
    </div>
</body>
</html>
