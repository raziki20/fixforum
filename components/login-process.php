<?php
    session_start();
    if(isset($_REQUEST['login_button'])||$_REQUEST['auto']==1){
        require '../_database/database.php';
        $errmsg_arr = array();
        $errflag = false;
        $username=  mysqli_real_escape_string($database,$_REQUEST['username']);
        $email=  mysqli_real_escape_string($database,$_REQUEST['email']);
        $password=  mysqli_real_escape_string($database,$_REQUEST['password']);
        if($username == '') {
            $errmsg_arr[] = 'Username missing';
            $errflag = true;
        }
        if($email == '') {
            $errmsg_arr[] = 'Email missing';
            $errflag = true;
        }
        if($password == '') {
            $errmsg_arr[] = 'Password missing';
            $errflag = true;
        }
        if($errflag) {
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
            header("location: authentication-check.php");
            exit();
        }
        $sql="SELECT user_username,user_email,user_password FROM user WHERE (user_username='$username'AND user_password='$password') OR (user_email='$email'AND user_password='$password')";
        $result=  mysqli_query($database,$sql) or die(mysqli_errno());
        $trws= mysqli_num_rows($result);
        if($trws==1){
            $rws=  mysqli_fetch_array($result);
            $_SESSION['user_username']=$rws['user_username'];
            $_SESSION['user_email']=$rws['user_email'];
            $_SESSION['user_password']=$rws['user_password'];
            header("location:../home.php?user_username=$username&request=login&status=success");    
        }
        else {
            $errmsg_arr[] = 'username and password not found';
            $errflag = true;
            if($errflag) {
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                session_write_close();
                header("location: ../components/authentication-check.php");
                exit();
            }
        }
    }
?>