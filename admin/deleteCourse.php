<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Login first!!!'); window.location.href = 'admin_login.php';</script>";
    exit();
}

$con = mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM course WHERE id = $id";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Course deleted successfully!'); window.location.href = 'admin_feeStructure.php';</script>";
    } else {
        echo "<script>alert('Error deleting course!'); window.location.href = 'admin_feeStructure.php';</script>";
    }
}

mysqli_close($con);
?>
