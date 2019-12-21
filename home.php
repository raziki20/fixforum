<?php include 'components/authentication.php';     
 include 'controllers/base/head.php';

    //session_start();
    require '_database/database.php';
    if(isset($_SESSION['user_username'])){
    include 'controllers/navigation/first-navigation.php'; ?>
<?php
    }
    else{
?>
<?php include 'controllers/navigation/index-before-login-navigation.php' ?>
<?php
    }
?>
        <h1 class="text-center">Latest Event</h1>
        <?php
        if($_SESSION['user_username'] == "admin"){      
?>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <a class="btn btn-default" href="add-new-notice-post.php">Add New Post</a>
        </div>
    </div>
</div>
<?php
        }
?>
<?php 
    //session_start();
    $current_user = $_SESSION['user_username'];
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
                                <a href="profile.php?username=<?php echo $temp_user_username; ?>">  
                                <img src="userfiles/avatars/<?php echo $rws_search_username['user_avatar'];?>" class="img-responsive notice-topic-avatar" alt="<?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>">
                                <?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?></a>
                            </div>
                            <div class="col-md-11 column">
                                <p class="margin-top50"><i><strong>Posted On:</strong> <?php echo $rws['notice_topic_time']; ?></i></p>
                                <hr>
                                <strong><a href="notice-topic.php?notice_topic_id=<?php echo $rws['notice_topic_id'];?>"> <?php echo $rws['notice_topic_name'];?></a></strong>
                                <hr>
                                <?php
                                if($rws['notice_topic_image']){
                                    ?>
                                    <a data-toggle="modal" href="#<?php echo $rws['notice_topic_id']?>">
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
    $current_user = $_SESSION['user_username'];
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
                                <a href="profile.php?username=<?php echo $temp_user_username; ?>">
                                <img src="userfiles/avatars/<?php echo $rws_search_username['user_avatar'];?>" class="img-responsive forum-topic-avatar" alt="<?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>">
                                <?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?></a>
                            </div>
                            <div class="col-md-11 column">
                                <p class="margin-top50"><i><strong>Posted On:</strong> <?php echo $rws['forum_topic_time']; ?></i></p>  <hr>
                                <strong><a href="forum-topic.php?forum_topic_id=<?php echo $rws['forum_topic_id'];?>"> <?php echo $rws['forum_topic_name'];?></a></strong>
                                <hr>
                                <?php 
                                if($rws['forum_topic_image']){
                                    ?>
                                    <a data-toggle="modal" href="#<?php echo $rws['forum_topic_id']?>">
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
        </div>
<?php
    }
?> 
<?php  
    $sql2 = "SELECT * FROM notice_topic where notice_topic_id";
    $result2 = mysqli_query($database,$sql2);
    $rws_count = mysqli_num_rows($result2);
    while($rws2 = mysqli_fetch_array($result2)){
?>
<div class="portfolio-modal modal fade" id="<?php echo $rws2['notice_topic_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <img class="img-fluid d-block mx-auto" src="userfiles/uploads" alt="">
                <img src="userfiles/uploads/<?php echo $rws2['notice_topic_image'];?>" width = '520'>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
    }
  ?>
  <?php  
    $sql2 = "SELECT * FROM forum_topic where forum_topic_id";
    $result2 = mysqli_query($database,$sql2);
    $rws_count = mysqli_num_rows($result2);
    while($rws2 = mysqli_fetch_array($result2)){
?>
<div class="portfolio-modal modal fade" id="<?php echo $rws2['forum_topic_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <img class="img-fluid d-block mx-auto" src="userfiles/uploads" alt="">
                <img src="userfiles/uploads/<?php echo $rws2['forum_topic_image'];?>" width = '520'>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
    }
  ?>