<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('❌ Access Denied! Please login first.'); window.location.href='login.php';</script>";
    exit();
}

include("header.php");

$con = mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch student details
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM applications WHERE id = '$user_id'";
$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "<script>alert('User not found!'); window.location.href='login.php';</script>";
    exit();
}

$row = mysqli_fetch_assoc($result);
?>

<div class="container my-5">
    <h2 class="text-center">🎓 Student Dashboard</h2>
    <div class="card shadow-lg p-4">
        <h4 class="text-center text-primary">Welcome, <?php echo htmlspecialchars($row['fullName']); ?> 👋</h4>
        <table class="table table-bordered mt-3">
            <tr>
                <th>Enrollment Number</th>
                <td><?php echo htmlspecialchars($row['enrollment_number']); ?></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><?php echo htmlspecialchars($row['dob']); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
            </tr>
            <tr>
                <th>Course</th>
                <td><?php echo htmlspecialchars($row['course']); ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo htmlspecialchars($row['address']); ?></td>
            </tr>
            <tr>
                <th>Father's Name</th>
                <td><?php echo htmlspecialchars($row['fatherName']); ?></td>
            </tr>
            <tr>
                <th>Mother's Name</th>
                <td><?php echo htmlspecialchars($row['motherName']); ?></td>
            </tr>
            <tr>
                <th>Marks</th>
                <td><?php echo htmlspecialchars($row['marks']); ?></td>
            </tr>
            <tr>
                <th>Applied At</th>
                <td><?php echo htmlspecialchars($row['applied_at']); ?></td>
            </tr>
            <tr>
                <th>Registration Status</th>
                <td>
                    <?php echo ($row['register_flag'] == 1) ? "<span class='badge bg-success'>Registered</span>" : "<span class='badge bg-danger'>Not Registered</span>"; ?>
                </td>
            </tr>
        </table>
        <div class="text-center">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
