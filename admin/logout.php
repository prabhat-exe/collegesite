<?php
    session_start();
if(isset($_SESSION['user'])){
    // echo $_SESSION['user'];
    $_SESSION['user']=null;
    session_destroy();
    header("location:admin_login.php");
}
?>