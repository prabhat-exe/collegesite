<?php include('header.php'); ?>

<?php 
$con = mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
$mysql = "SELECT * FROM course";
$res = mysqli_query($con, $mysql);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Fee Structure</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Course Name</th>
                <th>Tuition Fees (₹)</th>
                <th>Hostel Fees (₹)</th>
                <th>Mess Fees (₹)</th>
                <th>Security Deposit (₹)</th>
                <th>GST (18%) (₹)</th>
                <th>Total Fees (₹)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $tuition = $row['fees'];
                    $hostel = 30000; // Fixed hostel fee
                    $mess = 18000;   // Fixed mess fee
                    $security = 5000; // Security deposit (one-time, refundable)
                    $gst = ($tuition + $hostel + $mess) * 0.18;
                    $total = $tuition + $hostel + $mess + $security + $gst;
            ?>
                    <tr>
                        <td><?php echo $row['cName']; ?></td>
                        <td>₹<?php echo $tuition; ?></td>
                        <td>₹<?php echo $hostel; ?></td>
                        <td>₹<?php echo $mess; ?></td>
                        <td>₹<?php echo $security; ?></td>
                        <td>₹<?php echo number_format($gst, 2); ?></td>
                        <td>₹<?php echo number_format($total, 2); ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('footer.php'); ?>
