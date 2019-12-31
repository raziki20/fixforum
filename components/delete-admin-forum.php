<?php
    include '../_database/database.php';
    if(isset($_GET['forum_topic_id'])){
        $forum_topic_id=$_GET['forum_topic_id'];
        var_dump($forum_topic_id);

        
                $result = mysqli_query($database, "DELETE FROM forum_topic WHERE forum_topic_id=$forum_topic_id");
                $result2= mysqli_query($database, "DELETE FROM forum_topic_reply WHERE forum_topic_reply_topic_id=$forum_topic_id");

                if($result){
                    header("location:../admin-topics.php");
                }else{
                    echo "gagal";
                }
         
    }
    ?>