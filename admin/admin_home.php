<?php
session_start();
if(isset($_SESSION['user'])){
    // echo "hello";
include("admin_header.php");
date_default_timezone_set("Asia/Kolkata"); // Set timezone

$hour = date("H");

if ($hour >= 5 && $hour < 12) {
    $greeting = "Good Morning";
} elseif ($hour >= 12 && $hour < 17) {
    $greeting = "Good Afternoon";
} elseif ($hour >= 17 && $hour < 21) {
    $greeting = "Good Evening";
} else {
    $greeting = "Good Night";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <h1 class="display-4"><?= $greeting ?>, Admin!</h1>
        <p class="lead">Welcome to the Admin Panel. Have a great session!</p>
    </div>
</div>



</body>
</html>
<?php 
include("admin_footer.php");
}else{
    header("location:admin_login.php");
}
?>