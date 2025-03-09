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

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM notices WHERE id = $id";
    $result = mysqli_query($con, $sql);
    $notice = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    $update_sql = "UPDATE notices SET title = '$title', discription = '$description' WHERE id = $id";

    if (mysqli_query($con, $update_sql)) {
        echo "<script>alert('Notice updated successfully!'); window.location.href = 'admin_notice.php';</script>";
    } else {
        echo "<script>alert('Error updating notice!');</script>";
    }
}

mysqli_close($con);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Notice</h2>
    <form action="editNotice.php" method="post">
        <input type="hidden" name="id" value="<?php echo $notice['id']; ?>">
        <div class="mb-3">
            <label for="title" class="form-label">Notice Title</label>
            <input type="text" class="form-control" name="title" id="title" value="<?php echo $notice['title']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" required><?php echo $notice['discription']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Notice</button>
        <a href="admin_notice.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include("admin_footer.php"); ?>
