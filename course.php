<?php
include ("header.php");
?>
<?php 
$con=mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
$mysql="select * from course";
$res=mysqli_query($con,$mysql);
?>

<div class="container py-5">
    <h2 class="text-center mb-4">Graduation Courses</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Course Name</th>
                    <th>Description</th>
                    <th>Fees</th>
                </tr>
            </thead>
            <tbody>
              <?php
                  if(mysqli_num_rows($res)!=0){
                
                    while($row =  mysqli_fetch_assoc($res)){
                    echo "<tr>
                        <td>".$row["cName"]."</td>
                        <td>".$row["discription"]."</td>
                        <td>".$row["fees"]."/-"."</td>
                    </tr>";
                    }
                  }
                  ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
include ("footer.php");
?>
