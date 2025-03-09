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
    $cName = mysqli_real_escape_string($con, $_POST['cName']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $fees = floatval($_POST['fees']);
    
    $insert_sql = "INSERT INTO course (cName, discription, date, fees) VALUES ('$cName', '$description', '$date', $fees)";
    
    if (mysqli_query($con, $insert_sql)) {
        echo "<script>alert('Course added successfully!'); window.location.href = 'admin_feeStructure.php';</script>";
    } else {
        echo "<script>alert('Error adding course!');</script>";
    }
}

mysqli_close($con);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Add New Course</h2>
    <form action="addCourse.php" method="post">
        <div class="mb-3">
            <label for="cName" class="form-label">Course Name</label>
            <input type="text" class="form-control" name="cName" id="cName" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" id="date" required>
        </div>
        <div class="mb-3">
            <label for="fees" class="form-label">Fees (₹)</label>
            <input type="number" class="form-control" name="fees" id="fees" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Course</button>
        <a href="admin_fee_structure.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include("admin_footer.php"); ?>
