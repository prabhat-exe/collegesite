<?php 
if(isset($_SESSION['user'])){
    header("location:admin_home.php");
}else{
    header("location:admin_login.php");
}



?>