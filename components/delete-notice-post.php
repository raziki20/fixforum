<?php
    include '../_database/database.php';
    if(isset($_GET['notice_topic_id'])){
        $notice_topic_id=$_GET['notice_topic_id'];
        var_dump($notice_topic_id);

        
                $result = mysqli_query($database, "DELETE FROM notice_topic WHERE notice_topic_id=$notice_topic_id");

                if($result){
                    header("location:../home.php");
                }else{
                    echo "gagal";
                }
         
    }
    ?>