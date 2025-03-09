<img src="images/home.jpg" alt="Home Image" class="img-fluid w-100" style="height: 300px; object-fit: cover;">

<div class="container my-5">
    <div class="row text-center">

        <div class="col-md-4 col-sm-6 mb-4">
            <h3>Established in</h3>
            <p class="fs-4 fw-bold">1998</p>
            <p>26 Years of Academic Excellence</p>
        </div>

        <div class="col-md-4 col-sm-6 mb-4">
            <h3>Produced</h3>
            <p class="fs-4 fw-bold">15000+</p>
            <p>Industry Ready Graduates</p>
        </div>

        <div class="col-md-4 col-sm-6 mb-4">
            <h3>Total Faculty</h3>
            <p class="fs-4 fw-bold">250+</p>
            <p>Experienced Faculty</p>
        </div>

        <div class="col-md-4 col-sm-6 mb-4">
            <h3>Published</h3>
            <p class="fs-4 fw-bold">3000+</p>
            <p>Journal/Conference Papers</p>
        </div>

        <div class="col-md-4 col-sm-6 mb-4">
            <h3>NAAC 'A++' Grade</h3>
            <p class="fs-4 fw-bold">3.58 / 4</p>
            <p>NAAC Cycle - III</p>
        </div>

        <div class="col-md-4 col-sm-6 mb-4">
            <h3>Placements</h3>
            <p class="fs-4 fw-bold">1735+</p>
            <p>Institute to Industry this year</p>
        </div>

        <div class="col-md-4 col-sm-6 mb-4">
            <h3>Faculty with PhD</h3>
            <p class="fs-4 fw-bold">50+</p>
            <p>Research Experience</p>
        </div>

        <div class="col-md-4 col-sm-6 mb-4">
            <h3>Published</h3>
            <p class="fs-4 fw-bold">100+</p>
            <p>Patents Filed, Published</p>
        </div>

        <div class="col-md-4 col-sm-6 mb-4">
            <h3>Established</h3>
            <p class="fs-4 fw-bold">50+</p>
            <p>MOUs and Collaborations</p>
        </div>

    </div>
</div>

<?php // Ensure this file contains the DB connection
$con=mysqli_connect("localhost","root","","practicewebsite", 3306);
$query = "SELECT id, title, discription, DATE_FORMAT(date, '%b %d, %Y') AS formatted_date FROM notices WHERE id in (1,2,3)";
$result = mysqli_query($con, $query);
?>

<div class="container my-5">
    <h2 class="text-center mb-4">📢 College Notice Board</h2>
    <div class="notice-board">

    <?php
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <div class='card notice-card p-3'>
            <h5 class='card-title'>{$row['title']}</h5>
            <small class='text-muted'>{$row['formatted_date']}</small>
            <p class='card-text'>{$row['discription']}</p>
        </div>";
                }
            } else {
                echo "<div>No notices available</div>";
            }
            ?>
       </div>
       </div>




<!-- Cards Section -->
<div>
    <div class="row text-center mt-4">
        <div class="col-md-4 col-sm-12 mb-5">
            <div class="card">
                <img src="images/ASSOCHAM.png" class="card-img-top" alt="ASSOCHAM"
                    style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">ASSOCHAM Recognition</h5>
                    <p class="card-text">Recognized by ASSOCHAM for excellence in education and research.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-12 mb-5">
            <div class="card">
                <img src="images/NAAC-A.png" class="card-img-top" alt="NAAC A++"
                    style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">NAAC 'A++' Accreditation</h5>
                    <p class="card-text">Received NAAC 'A++' accreditation with a 3.58/4 rating.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-12 mb-5">
            <div class="card">
                <img src="images/niti-aayog.png" class="card-img-top" alt="NITI Aayog"
                    style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">NITI Aayog Recognition</h5>
                    <p class="card-text">Acknowledged by NITI Aayog for its research and innovation initiatives.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 m-3 ">
    <a href="check_eligiblity.php" class="btn btn-primary btn-lg shadow-lg">
        Check Admission Eligibility
    </a>
</div>

<style>
    .animate-glow {
        transition: all 0.3s ease-in-out;
        border-left: 5px solid #007bff;
    }

    .animate-glow:hover {
        box-shadow: 0px 0px 20px rgba(0, 123, 255, 0.6);
        transform: scale(1.05);
    }
</style>