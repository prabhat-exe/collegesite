<?php include('header.php'); ?>

<?php
$con=mysqli_connect("localhost","root","","practicewebsite",3306);
$mysql="select * from course";
$res=mysqli_query($con,$mysql);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Apply Now</h2>
    <form action="submitApplication.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="course" class="form-label">Select Course</label>
                <select class="form-control" id="course" name="course" required>
                    <option value="">-- Select Course --</option>
                    <?php 
                    if($res>0){
                        while($row=mysqli_fetch_assoc($res)){
                        echo "<option value=\"{$row['cName']}\">{$row['cName']}</option>";
                        }
                    }
                    ?>
                    <!-- <option value="BTech">BTech</option>
                    <option value="BBA">BBA</option>
                    <option value="BSc">BSc</option>
                    <option value="BA">BA</option> -->
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="2" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="fatherName" class="form-label">Father's Name</label>
                <input type="text" class="form-control" id="fatherName" name="fatherName" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="motherName" class="form-label">Mother's Name</label>
                <input type="text" class="form-control" id="motherName" name="motherName" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="marks" class="form-label">Percentage in Last Exam (%)</label>
                <input type="number" class="form-control" id="marks" name="marks" min="0" max="100" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="documents" class="form-label">Upload Documents (PDF, JPG, PNG)</label>
                <input type="file" class="form-control" id="documents" name="documents" accept=".pdf,.jpg,.png" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit Application</button>
    </form>
</div>

<?php include('footer.php'); ?>
