<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Login first!!!'); window.location.href = 'admin_login.php';</script>";
    exit();
}

include("admin_header.php");
$con = mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $date = date('Y-m-d');

    $sql = "INSERT INTO notices (title, discription, date) VALUES ('$title', '$description', '$date')";
    
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Notice added successfully!'); window.location.href = 'admin_notice.php';</script>";
    } else {
        echo "<script>alert('Error adding notice!');</script>";
    }
}

mysqli_close($con);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Add New Notice</h2>
    <form action="addNotice.php" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Notice Title</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Notice</button>
        <a href="admin_notice.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include("admin_footer.php"); ?>
