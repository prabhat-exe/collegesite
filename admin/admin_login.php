<?php
session_start();
if(isset($_SESSION['user'])){
    session_destroy();
}
include("admin_header.php");
if(isset($_REQUEST['Uname'])){
    // echo "hello";
    $con = mysqli_connect("localhost", "root", "", "practicewebsite", 3306);
    $sql = "SELECT * FROM admins";
    $res = mysqli_query($con, $sql);
    while($rows=mysqli_fetch_assoc($res)){
        // echo "hello";
        if($rows['user']==$_REQUEST['Uname']&&$rows['password']==$_REQUEST['password']){
            $_SESSION['user']=$_REQUEST['Uname'];
             header("location:admin_home.php");
             break;
        }else{
          echo  '<div class="alert alert-danger" role="alert">
                     Check username or password!
                </div>';
        }
    }

}
?>


<div class="container d-flex justify-content-center align-items-center flex-grow-1">
      <div class="card shadow-lg p-4" style="width: 350px; border-radius: 10px;">
        <h3 class="text-center mb-3">Admin Login</h3>
        <form action="admin_login.php" method="post">
          <div class="mb-3">
            <label for="text" class="form-label">Username</label>
            <input type="text" class="form-control" id="Uname" name="Uname" placeholder="Enter Username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <div class="text-center mt-3">
          <a href="#">Forgot password?</a>
        </div>
      </div>
    </div>
<?php
include("admin_footer.php");
?>    

