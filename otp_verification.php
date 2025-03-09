<?php
session_start();
include("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_otp = $_POST['otp'];

    if ($entered_otp == $_SESSION['otp']) {
        if (isset($_SESSION['user_id'])) {
            $con = mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
            if (!$con) {
                die("Database connection failed: " . mysqli_connect_error());
            }

            // Update register_flag in database
            $query = "UPDATE applications SET register_flag = '1' WHERE id = {$_SESSION['user_id']}";
            if (mysqli_query($con, $query)) {
                // $_SESSION['user_id'] = '';
                echo "<script>alert('✅ OTP Verified Successfully!'); window.location.href='Setpass.php';</script>";
            } else {
                echo "<script>alert('Database update failed!'); window.location.href='otp_verification.php';</script>";
            }
        }
    } else {
        echo "<script>alert('❌ Invalid OTP! Try Again.'); window.location.href='otp_verification.php';</script>";
    }
}
?>

<div class="container my-5 text-center">
    <h2>🔑 Enter OTP</h2>
    <form method="POST" class="w-50 mx-auto p-4 border rounded bg-light shadow">
        <input type="text" name="otp" class="form-control w-100 mb-3" placeholder="Enter OTP" required>
        <button type="submit" class="btn btn-primary w-100">Verify OTP</button>
    </form>
</div>

<?php include("footer.php"); ?>