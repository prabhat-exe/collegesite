<?php
// session_start();
// echo $_SESSION['user'];
// if(!(isset($_SESSION['user']))){
//     // include ("index.php");
//     echo "yes";
//     echo $_SESSION['user'];
//     session_destroy();
//     header("Location: index.php");
//     exit();
// }
session_start();
if (!(isset($_SESSION['user']))) {

echo "<script>alert('Login first!!!');</script>";

    header("Location:admin_login.php");

    exit();
}


include("admin_header.php");
$con = mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
$sql = "SELECT * FROM gallery";
$res = mysqli_query($con, $sql);
?>

<div class="container py-5">
    <h2 class="text-center mb-4">College Gallery</h2>
    <div class="d-flex justify-content-between mb-3">
        <h4>Gallery List</h4>
        <a href="add_image.php" class="btn btn-success">Add Image</a> <!-- Add Button -->
    </div>
    
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>
                            <td><img src='../images/gallery/{$row["location"]}' class='img-thumbnail' width='100'></td>
                            <td>
                                <a href='delete_image.php?id={$row["id"]}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='text-center'>No Images Found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php 
include("admin_footer.php");
?>
