<?php
include("header.php"); // Include the header file
session_start(); // Start the session to access session variables

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Check if the form was submitted via POST method
    $user_id = $_SESSION['user_id'] ?? null; // Retrieve user_id from session, or set to null if not set
    $password = $_POST['password']; // Get the password from form input
    $cpassword = $_POST['cpassword']; // Get the confirmation password from form input

    if (!$user_id) { // Check if user is logged in
        echo "User not logged in.";
        exit; // Stop execution if user is not logged in
    }

    if ($password !== $cpassword) { // Check if passwords match
        echo "Passwords do not match.";
        exit; // Stop execution if passwords do not match
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password securely before storing in the database

    $conn = new mysqli("localhost", "root", "", "practicewebsite"); // Create a new database connection

    if ($conn->connect_error) { // Check for connection errors
        die("Connection failed: " . $conn->connect_error); // Display error message and stop execution if connection fails
    }

    $stmt = $conn->prepare("UPDATE applications SET passwords = ? WHERE id = ?"); // Prepare SQL statement to update password
    $stmt->bind_param("si", $hashed_password, $user_id); // Bind parameters (hashed password as string, user_id as integer)

    if ($stmt->execute()) { // Execute the statement and check if successful
        echo "Password updated successfully.";
        session_destroy(); // Destroy session after successful password change
        echo "<script> window.location.href='login.php';</script>"; // Redirect user to login page after password update
    } else {
        echo "Error updating password."; // Display error message if password update fails
    }

    $stmt->close(); // Close the prepared statement
    $conn->close(); // Close the database connection
}
?>
 
<div class="container d-flex justify-content-center align-items-center flex-grow-1 m-5 ">
      <div class="card shadow-lg p-4" style="width: 350px; border-radius: 10px;">
        <h3 class="text-center mb-3">Set Password</h3>
        <form action="Setpass.php" method="post"> <!-- Form submission to Setpass.php using POST method -->
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required> <!-- Password input field -->
          </div>
          <div class="mb-3">
            <label for="cpassword" class="form-label">Re-Enter Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Re-Enter password" required> <!-- Confirm password input field -->
          </div>
          <button type="submit" class="btn btn-primary w-100">Set Password</button> <!-- Submit button to set password -->
        </form>
      </div>
    </div>
<?php
include("footer.php"); // Include the footer file
?>