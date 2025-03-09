<?php
include("header.php");
$con = mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

<div class="container my-5">
    <h2 class="text-center mb-4">📝 Student Signup</h2>

    <form action="register.php" method="POST" class="w-50 mx-auto p-4 border rounded bg-light">
        <div class="mb-3">
            <label for="enrollment" class="form-label">Enrollment Number:</label>
            <input type="text" name="enrollment" id="enrollment" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Signup</button>
    </form>
</div>

<?php include("footer.php"); ?>
