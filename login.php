<?php
session_start();
include("header.php");

$con = mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Check if the email exists
    $query = "SELECT * FROM applications WHERE email = '$email'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Verify the password
        if (password_verify($password, $row['passwords'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];

            echo "<script>window.location.href='dashboard.php';</script>";
        } else {
            echo "<script>alert('❌ Incorrect password!'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('❌ Email not found!'); window.location.href='login.php';</script>";
    }
}
?>

<div class="container d-flex justify-content-center align-items-center flex-grow-1 m-5">
    <div class="card shadow-lg p-4" style="width: 350px; border-radius: 10px;">
        <h3 class="text-center mb-3">Login</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <div class="text-center mt-3">
            <a href="forgot_password.php">Forgot password?</a>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
