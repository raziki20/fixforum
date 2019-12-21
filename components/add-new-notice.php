<?php
    ini_set("display_errors",1);
    session_start();
    $user_username=$_SESSION['user_username'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require '../_database/database.php'; 
        $notice_topic_name=$_REQUEST['notice_topic_name'];
        $notice_topic_body=$_REQUEST['notice_topic_body'];
        $notice_topic_kategori = implode(',', $_REQUEST['notice_topic_kategori']);
        
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
        
        $sql="INSERT INTO notice_topic(notice_topic_name, notice_topic_body, notice_topic_time, notice_topic_created_by, notice_topic_kategori, notice_topic_image) VALUES ('$notice_topic_name', '$notice_topic_body', CURRENT_TIMESTAMP, '$user_username' ,'$notice_topic_kategori', '$BackgroundNewImageName')";
        mysqli_query($database,$sql)or die(mysqli_error($database));
        header("location:../notice-topic.php?notice_topic_id=".mysqli_insert_id($database)."&request=add-new-notice-post&status=success");
    }    
?>