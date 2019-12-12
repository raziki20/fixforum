<?php include 'components/authentication.php';      
 include 'controllers/base/head.php'; 

    //session_start();
    require '_database/database.php';
    if(isset($_SESSION['user_username'])){
 include 'controllers/navigation/first-navigation.php' ?>
<?php
    }
    else{
?>
<?php include 'controllers/navigation/index-before-login-navigation.php' ?>
<?php
    }
?>
<?php 
    //session_start();
    if(isset($_SESSION['user_username'])){
    $current_user = $_SESSION['user_username'];
    }
    $forum_topic_id = mysqli_real_escape_string($database,$_REQUEST['forum_topic_id']);
    $sql = "SELECT * FROM forum_topic where forum_topic_id = '$forum_topic_id'";
    $result = mysqli_query($database,$sql);
    $rws = mysqli_fetch_array($result);
                    
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
                                <div class="topic-user-name">
                                    <h3><?php echo $rws['forum_topic_name'];?></h3>    
                                </div>
                                <hr>
                                <div class="topic-body">
                                    <i class="fa fa-align-justify"></i> <?php echo $rws['forum_topic_body'];?>
                                </div>
                                <div class="forum-attachment">
                                    <?php
                                        if($rws['forum_topic_image']){
                                    ?>
                                    <hr>
                                    <div class="col-md-3 column">
                                    <a data-toggle="modal" href="#portfolioModal1">
                                        <img src="userfiles/uploads/<?php echo $rws['forum_topic_image'];?>"  class="img-responsive thumbnail">
                                    </a>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Comment</h3>
<?php 
    $sql_reply = "SELECT * FROM forum_topic_reply where forum_topic_reply_topic_id = '$forum_topic_id'";
    $result_reply = mysqli_query($database,$sql_reply);
    $rws_reply_count = mysqli_num_rows($result_reply);
    while($rws_reply = mysqli_fetch_array($result_reply)){
        
        $temp_user_username_reply = $rws_reply['forum_topic_reply_created_by'];
        $sql_search_username_reply = "SELECT * FROM user WHERE user_username = '$temp_user_username_reply'";
        $result_search_username_reply = mysqli_query($database,$sql_search_username_reply);
        $rws_search_username_reply = mysqli_fetch_array($result_search_username_reply);
?>

<?php
        if($rws_reply_count > 0){
?>
                    <div class="well">
                        <div class="row clearfix">
                            <div class="col-md-1 column">
                                <img src="userfiles/avatars/<?php echo $rws_search_username_reply['user_avatar'];?>" class="img-responsive forum-topic-avatar" alt="<?php echo $rws_search_username_reply_reply['user_firstname'];?> <?php echo $rws_search_username_reply['user_lastname'];?>">
                                <?php echo $rws_search_username_reply['user_firstname'];?> <?php echo $rws_search_username_reply['user_lastname'];?>
                            </div>
                            <div class="col-md-11 column">
                                <div class="topic-user-name">
                                    
                                </div>
                                <p class="margin-top50"><i><strong>Posted On:</strong> <?php echo $rws_reply['forum_topic_reply_time']; ?></i></p>
                                <hr>
                                <div class="topic-body">
                                    <i class="fa fa-question-circle"></i> <?php echo $rws_reply['forum_topic_reply_body'];?>
                                </div>
                                <div class="forum-attachment">
                                    <?php
                                        if($rws_reply['forum_topic_reply_image']){
                                    ?>
                                    <hr>
                                    <div class="col-md-3 column">
                                        <a data-toggle="modal" href="#<?php echo $rws_reply['forum_topic_reply_id']?>">
                                            <img src="userfiles/uploads/<?php echo $rws_reply['forum_topic_reply_image'];?>"  class="img-responsive thumbnail">
                                        </a>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
<?php    
        }
    }
?>                  
<?php
    //session_start();
    require '_database/database.php';
    if(isset($_SESSION['user_username'])){
?>
                    <br>
                    <div class="container">
                        <div class="row clearfix">
<?php include 'controllers/form/forum-topic-reply-form.php' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
    else{
?>
                    <div class="well">
                        <div class="row clearfix">
                            <div class="col-md-12 column">
                                <h3 class="text-center">You need to <a href="login.php">Log In</a> or <a href="register.php">Register</a> to post comments.</h3>
                            </div>
                        </div>
                    </div>
<?php
    }
?>

<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
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
                <img src="userfiles/uploads/<?php echo $rws['forum_topic_image'];?>" width = '520'>
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
    $sql_reply2 = "SELECT * FROM forum_topic_reply where forum_topic_reply_topic_id = '$forum_topic_id'";
    $result_reply2 = mysqli_query($database,$sql_reply2);
    $rws_reply_count = mysqli_num_rows($result_reply2);
    while($rws_reply2 = mysqli_fetch_array($result_reply2)){
?>
<div class="portfolio-modal modal fade" id="<?php echo $rws_reply2['forum_topic_reply_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                <img src="userfiles/uploads/<?php echo $rws_reply2['forum_topic_reply_image'];?>" width = '520'>
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