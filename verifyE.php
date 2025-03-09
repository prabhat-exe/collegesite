<?php
include("header.php");
session_start();
$con = mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enrollment = mysqli_real_escape_string($con, $_POST['enrollment']);

    // Check enrollment in the database
    $query = "SELECT * FROM applications WHERE enrollment_number = '$enrollment'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Check if marks are greater than 10
        if ($row['marks'] > 65) {
            echo "<div class='container my-5 text-center'>
                    <h3 class='text-success'>✅ Eligible for Admission</h3>
                    <p><strong>Name:</strong> {$row['fullName']}</p>
                    <p><strong>Course:</strong> {$row['course']}</p>
                    <a href='check_eligiblity.php' class='btn btn-primary'>Check Another</a>
                  </div>";
        } else {
            echo "<div class='container my-5 text-center'>
                    <h3 class='text-danger'>❌ Not Eligible for Admission</h3>
                    <p>Marks: <strong>{$row['marks']}</strong></p>
                    <a href='check_eligiblity.php' class='btn btn-primary'>Try Again</a>
                  </div>";
        }
    } else {
        echo "<script>alert('Apply first for Admission!!!'); window.location.href = 'check_eligiblity.php';</script>";
        exit();
    }
}

include("footer.php");
?>
