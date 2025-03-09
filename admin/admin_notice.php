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

$sql = "SELECT * FROM notices ORDER BY date DESC";
$res = mysqli_query($con, $sql);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">📢 Manage Notices</h2>
    <a href="addNotice.php" class="btn btn-success mb-3">Add New Notice</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Published Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>
                        <td>{$row['title']}</td>
                        <td>{$row['discription']}</td>
                        <td>{$row['date']}</td>
                        <td>
                            <a href='editNotice.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='deleteNotice.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this notice?\")'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No notices available</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include("admin_footer.php"); ?>
