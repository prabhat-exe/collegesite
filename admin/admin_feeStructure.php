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

$sql = "SELECT * FROM course";
$res = mysqli_query($con, $sql);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Manage Fee Structure</h2>
    <a href="addCourse.php" class="btn btn-success mb-3">Add New Course</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Course Name</th>
                <th>Fees</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $tuition=$row['fees'];
                   ?>
                    <tr>
                        <td><?php echo $row['cName']; ?></td>
                        <td>₹<?php echo $tuition; ?></td>
                         <td>   <a href="editCourse.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="deleteCourse.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php include("admin_footer.php"); ?>
