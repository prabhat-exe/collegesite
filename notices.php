<?php
include("header.php");
?>
<?php // Ensure this file contains the DB connection
$con=mysqli_connect("localhost","root","","practicewebsite", 3306);
$query = "SELECT id, title, discription, DATE_FORMAT(date, '%b %d, %Y') AS formatted_date FROM notices ORDER BY date DESC";
$result = mysqli_query($con, $query);
?>

<div class="container my-5">
    <h2 class="text-center mb-4">📢 College Notice Board</h2>
    
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                
                <th>Title</th>
                <th>Description</th>
                <th>Published Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['title']}</td>
                        <td>{$row['discription']}</td>
                        <td>{$row['formatted_date']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No notices available</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include("footer.php");
?>
