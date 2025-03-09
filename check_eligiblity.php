<?php
include("header.php");
$con = mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

<div class="container my-5">
    <h2 class="text-center mb-4">🎓 Check Admission Eligibility</h2>

    <form action="verifyE.php" method="POST" class="w-50 mx-auto p-4 border rounded bg-light">
        <div class="mb-3">
            <label for="enrollment" class="form-label">Enter Enrollment Number:</label>
            <input type="text" name="enrollment" id="enrollment" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Check Eligibility</button>
    </form>
</div>

<?php include("footer.php"); ?>
