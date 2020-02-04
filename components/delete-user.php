<?php
    include '../_database/database.php';
    if(isset($_GET['user_id'])){
        $user_id=$_GET['user_id'];
        var_dump($user_id);

        
                $result = mysqli_query($database, "DELETE FROM user WHERE user_id=$user_id");
                
                if($result){
                    header("location:../admin-users.php");
                }else{
                    echo "gagal";
                }
         
    }
    ?>