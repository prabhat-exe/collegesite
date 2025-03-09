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
    $sql = "SELECT * FROM course WHERE id = $id";
    $result = mysqli_query($con, $sql);
    $course = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $cName = mysqli_real_escape_string($con, $_POST['cName']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $fees = floatval($_POST['fees']);
    
    $update_sql = "UPDATE course SET cName = '$cName', discription = '$description', date = '$date', fees = $fees WHERE id = $id";
    
    if (mysqli_query($con, $update_sql)) {
        echo "<script>alert('Course updated successfully!'); window.location.href = 'admin_feeStructure.php';</script>";
    } else {
        echo "<script>alert('Error updating course!');</script>";
    }
}

mysqli_close($con);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Course</h2>
    <form action="editCourse.php" method="post">
        <input type="hidden" name="id" value="<?php echo $course['id']; ?>">
        <div class="mb-3">
            <label for="cName" class="form-label">Course Name</label>
            <input type="text" class="form-control" name="cName" id="cName" value="<?php echo $course['cName']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" required><?php echo $course['discription']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" id="date" value="<?php echo $course['date']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="fees" class="form-label">Fees (₹)</label>
            <input type="number" class="form-control" name="fees" id="fees" value="<?php echo $course['fees']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="admin_fee_structure.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include("admin_footer.php"); ?>
