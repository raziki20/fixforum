<?php
    include '../_database/database.php';
    if(isset($_GET['forum_topic_reply_id'])){
        $forum_topic_reply_id=$_GET['forum_topic_reply_id'];
        $forum_topic_id=$_GET['topic_id'];
        var_dump($forum_topic_reply_id);

        
                
                $result= mysqli_query($database, "DELETE FROM forum_topic_reply WHERE forum_topic_reply_id=$forum_topic_reply_id");

                if($result){
                    header("location:../forum-topic.php?forum_topic_id=$forum_topic_id");
                }else{
                    echo "gagal";
                }
         
    }
    ?>