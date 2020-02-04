<?php  
    ini_set("display_errors",1);
    session_start();
    require '_database/database.php';

        $forum_topic_reply_id = $_POST['forum_topic_reply_id'];
        $forum_topic_reply_body = $_POST['forum_topic_reply_body'];
        mysqli_query($database , "UPDATE forum_topic_reply set forum_topic_reply_body='$forum_topic_reply_body' where forum_topic_reply_id='$forum_topic_reply_id'"); 
        $mysqli=mysqli_query($database, "SELECT * FROM forum_topic_reply where forum_topic_reply_topic_id='$forum_topic_reply_id'");
        // echo "<script>windows.location='forum-topic.php?forum_topic_id=$mysqli'</script>";
        echo "<script>window.location='javascript:history.go(-1)'</script>";
    
?>


