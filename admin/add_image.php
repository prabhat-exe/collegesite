<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Login first!!!'); window.location.href = 'admin_login.php';</script>";
    exit();
}

include("admin_header.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image']) && isset($_POST['section'])) {
    $con = mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    
    $target_dir = "../images/gallery/";
    $file_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $file_name;
    $section = mysqli_real_escape_string($con, $_POST['section']);
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO gallery (location, section) VALUES ('$file_name', '$section')";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Image uploaded successfully!'); window.location.href = 'admin_gallery.php';</script>";
        } else {
            echo "<script>alert('Database error!');</script>";
        }
    } else {
        echo "<script>alert('Error uploading image!');</script>";
    }
    
    mysqli_close($con);
}
?>

<div class="container py-5">
    <h2 class="text-center mb-4">Add Image</h2>
    <form action="add_image.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="image" class="form-label">Select Image:</label>
            <input type="file" class="form-control" name="image" id="image" required>
        </div>
        <div class="mb-3">
            <label for="section" class="form-label">Select Section:</label>
            <select class="form-control" name="section" id="section" required>
                <option value="Sports">Sports</option>
                <option value="Lab">Lab</option>
                <option value="Library">Library</option>
                <option value="Events">Events</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
        <a href="gallery.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include("admin_footer.php"); ?>
