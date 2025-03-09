<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Login first!!!'); window.location.href = 'admin_login.php';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $con = mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    
    $id = intval($_GET['id']); // Sanitize input
    $sql = "SELECT location FROM gallery WHERE id = $id";
    $res = mysqli_query($con, $sql);
    
    if ($row = mysqli_fetch_assoc($res)) {
        $image_path = "../images/gallery/" . $row['location'];
        
        // Delete the image file if it exists
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        
        // Delete record from database
        $delete_sql = "DELETE FROM gallery WHERE id = $id";
        if (mysqli_query($con, $delete_sql)) {
            echo "<script>alert('Image deleted successfully!'); window.location.href = 'admin_gallery.php';</script>";
        } else {
            echo "<script>alert('Error deleting image!'); window.location.href = 'admin_gallery.php';</script>";
        }
    } else {
        echo "<script>alert('Image not found!'); window.location.href = 'admin_gallery.php';</script>";
    }
    
    mysqli_close($con);
} else {
    echo "<script>alert('Invalid request!'); window.location.href = 'admin_gallery.php';</script>";
}
?>
