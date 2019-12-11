<?php
    session_start();
    require '_database/database.php';
    if(isset($_SESSION['user_username'])){
    $user_username=$_SESSION['user_username'];
    }
?>