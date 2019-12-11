<?php include 'components/session-check-index.php' ?>
<?php require '_database/database.php'; ?>
<?php include 'controllers/base/head.php' ?>
<body>	
    <script type="text/javascript"> 
        ChangeIt();
    </script>
<?php include 'controllers/navigation/index-before-login-navigation.php' ?>
    <section id="home" name="home"></section>
    <h1 class="text-center">Latest Event</h1>
<?php 
    // session_start();
    
    $sql = "SELECT * FROM notice_topic ORDER BY notice_topic_time DESC";
    $result = mysqli_query($database,$sql);
    while($rws = mysqli_fetch_array($result)){
                    
        $temp_user_username = $rws['notice_topic_created_by'];
        $sql_search_username = "SELECT * FROM user WHERE user_username = '$temp_user_username'";
        $result_search_username = mysqli_query($database,$sql_search_username) or die(mysqli_error($database));
        $rws_search_username = mysqli_fetch_array($result_search_username);
?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <br>
                    <div class="well">
                        <div class="row clearfix">
                            <div class="col-md-1 column">
                                <img src="userfiles/avatars/<?php echo $rws_search_username['user_avatar'];?>" class="img-responsive notice-topic-avatar" alt="<?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>">
                                <?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>
                            </div>
                            <div class="col-md-11 column">
                                <p class="margin-top50"><i><strong>Posted On:</strong> <?php echo $rws['notice_topic_time']; ?></i></p>
                                <hr>
                                <strong><a href="notice-topic.php?notice_topic_id=<?php echo $rws['notice_topic_id'];?>"> <?php echo $rws['notice_topic_name'];?></a></strong>
                                <hr>
                                <?php 
                                if($rws['notice_topic_image']){
                                    ?>
                                <img src="userfiles/uploads/<?php echo $rws['notice_topic_image'];?>"  class="img-responsivethumbnail">
                                <?php
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
?>
        <h1 class="text-center">Latest Forum Topics</h1>
        <div class="container ">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <a class="btn btn-default" href="add-new-forum-post.php">Add New Post</a>
            </div>
        </div>
    </div>
<?php 
    //session_start();
    
    $sql = "SELECT * FROM forum_topic ORDER BY forum_topic_time DESC";
    $result = mysqli_query($database,$sql);
    while($rws = mysqli_fetch_array($result)){
                    
        $temp_user_username = $rws['forum_topic_created_by'];
        $sql_search_username = "SELECT * FROM user WHERE user_username = '$temp_user_username'";
        $result_search_username = mysqli_query($database,$sql_search_username) or die(mysqli_error($database));
        $rws_search_username = mysqli_fetch_array($result_search_username);
?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    <br>
                    <div class="well">
                        <div class="row clearfix">
                            <div class="col-md-1 column">
                                <img src="userfiles/avatars/<?php echo $rws_search_username['user_avatar'];?>" class="img-responsive forum-topic-avatar" alt="<?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>">
                                <?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>
                            </div>
                            <div class="col-md-11 column">
                                <p class="margin-top50"><i><strong>Posted On:</strong> <?php echo $rws['forum_topic_time']; ?></i></p>
                                <hr>
                                <strong><a href="forum-topic.php?forum_topic_id=<?php echo $rws['forum_topic_id'];?>"> <?php echo $rws['forum_topic_name'];?></a></strong>
                                <hr>
                                <?php 
                                if($rws['forum_topic_image']){
                                    ?>
                                <img src="userfiles/uploads/<?php echo $rws['forum_topic_image'];?>"  class="img-responsive thumbnail">
                                <?php
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
?> 
</body>    