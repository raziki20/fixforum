<?php
    ini_set("display_errors",1);
    session_start();
    include '../_database/database.php';
    if(isset($_POST['submit_button'])){
        $forum_topic_id=$_POST['forum_topic_id'];
        var_dump($forum_topic_id);
        $forum_topic_name=$_POST['forum_topic_name'];
        $forum_topic_body=$_POST['forum_topic_body'];
        $forum_topic_kategori = implode(',', $_POST['forum_topic_kategori']);
        $sql1="UPDATE forum_topic SET forum_topic_name='$forum_topic_name', forum_topic_body='$forum_topic_body', forum_topic_kategori='$forum_topic_kategori'  WHERE forum_topic_id = '$forum_topic_id'";
        $result1=mysqli_query($database,$sql1)or die(mysqli_error($database));
        //header("location:../forum-topic.php?forum_topic_id=$forum_topic_id&request=update-forum-post&status=success");
        
        $Destination = '../userfiles/uploads';
        if(!isset($_FILES['BackgroundImageFile']) || !is_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'])){
            $BackgroundNewImageName= '';
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        else{
            $RandomNum = rand(0, 999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['BackgroundImageFile']['name']));
            $ImageType = $_FILES['BackgroundImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $BackgroundNewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        $sql2="UPDATE forum_topic SET forum_topic_image='$BackgroundNewImageName' WHERE forum_topic_id = $forum_topic_id";
        $sql3="INSERT INTO forum_topic(forum_topic_image) VALUES ('$BackgroundNewImageName') WHERE forum_topic_id = $forum_topic_id";
        $result2 = mysqli_query($database,"SELECT * FROM forum_topic WHERE forum_topic_id = $forum_topic_id");
        if( mysqli_num_rows($result2) > 0) {
            if(!empty($_FILES['BackgroundImageFile']['name'])){
                $mysql1 = mysqli_query($database,$sql1)or die(mysqli_error($database));
                mysqli_query($database,$sql2)or die(mysqli_error($database));
                var_dump($_FILES['BackgroundImageFile']);
                var_dump($mysql1);
                var_dump($result2);
                header("location:../forum-topic.php?forum_topic_id=$forum_topic_id");
            }
        } 
        else {
            mysqli_query($database,$sql2)or die(mysqli_error($database));
            var_dump($_FILES['BackgroundImageFile']);
                var_dump($mysql1);
                var_dump($result2);
           header("location:../forum-topic.php?forum_topic_id=$forum_topic_id");
        }
    }    
?>



        
