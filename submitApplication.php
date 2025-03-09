<?php
$con = mysqli_connect("localhost", "root", "", "practicewebsite", 3306);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = mysqli_real_escape_string($con, $_POST['fullName']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $fatherName = mysqli_real_escape_string($con, $_POST['fatherName']);
    $motherName = mysqli_real_escape_string($con, $_POST['motherName']);
    $marks = mysqli_real_escape_string($con, $_POST['marks']);

    //making of enrollment number
    $str1="CFF";
    $str2=substr($fullName,0,2);
    $str3=substr($motherName,0,2);
    $str4=substr($dob,5,2);
    $str5=rand(10,99);
    $enroll=strtoupper($str1.$str2.$str3.$str4.$str5);







    // Handling file upload
    $documentName = $_FILES['documents']['name'];
    $documentTmp = $_FILES['documents']['tmp_name'];
    $documentPath = "images/Documents/" . basename($documentName);

    if (move_uploaded_file($documentTmp, $documentPath)) {
        $sql = "INSERT INTO applications (fullName, dob, email, phone, course, address, fatherName, motherName, marks, document,enrollment_number)
                VALUES ('$fullName', '$dob', '$email', '$phone', '$course', '$address', '$fatherName', '$motherName', '$marks', '$documentPath','$enroll')";

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Application submitted successfully! Note Enrollment number:::.{$enroll}.'); window.location.href='apply.php';</script>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Failed to upload document.";
    }
}

mysqli_close($con);
?>
