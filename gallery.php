<?php
include ("header.php");
$con=mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
$sql="select * from gallery";
$res=mysqli_query($con,$sql);
?>
    <div class="container py-5">
        <h2 class="text-center mb-4">College Gallery</h2>
        <div class="row g-4">
            <?php
            if(mysqli_num_rows($res)!=0){
                
                while($row =  mysqli_fetch_assoc($res)){
                  
                    echo "<div class='col-md-4'>
                    <img src='images/gallery/". $row["location"] . "' class='img-fluid rounded' data-bs-toggle='modal' data-bs-target='#imageModal1'>
                  </div>";
            
                }
            } 
            ?>
            
        </div>
    </div>

    
<?php 
include ("footer.php");
?>