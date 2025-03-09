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

$sql = "SELECT * FROM applications";
$res = mysqli_query($con, $sql);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Student Details</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Full Name</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Course</th>
                    <th>Address</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Marks (%)</th>
                    <th>Eligibility</th>
                    <th>Documents</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<tr>
                                <td>{$row['fullName']}</td>
                                <td>{$row['dob']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['course']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['fatherName']}</td>
                                <td>{$row['motherName']}</td>
                                <td>{$row['marks']}%</td>";
                                if($row['marks']>75){
                                    echo '<td><button type="button" class="btn btn-success">Eligible</button></td>';
                                }else{
                                    echo '<td><button type="button" class="btn btn-danger">Not Eligible</button></td>';
                                }
                        echo    "<td><a href='../images/Documents/{$row['document']}' target='_blank'>View</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11' class='text-center'>No Students Found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("admin_footer.php"); ?>
