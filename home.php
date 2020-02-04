<?php include 'components/authentication.php';     
 include 'controllers/base/head.php';

    //session_start();
    require '_database/database.php';
    if(isset($_SESSION['user_username'])){
    include 'controllers/navigation/first-navigation.php'; ?>
    <script type="text/javascript"> 
        ChangeIt();
    </script>
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
      <div class=" col-md-3 column">
            <a class="btn btn-default" href="add-new-notice-post.php">Add New Event</a>
        </div>
    </div>
</div>
<?php
        }
?>
<?php 
    //session_start();
    $current_user = $_SESSION['user_username'];
    $sql1 = "SELECT * FROM notice_topic ORDER BY notice_topic_time DESC";
    $result1 = mysqli_query($database,$sql1);
    while($rws1 = mysqli_fetch_array($result1)){
                    
        $temp_user_username = $rws1['notice_topic_created_by'];
        $notice_topic_id = $rws1['notice_topic_id'];
        $sql_search_username = "SELECT * FROM user WHERE user_username = '$temp_user_username'";
        $result_search_username = mysqli_query($database,$sql_search_username) or die(mysqli_error($database));
        $rws_search_username = mysqli_fetch_array($result_search_username);
?>
        <div class="container">
        
            <div class="panel panel-default col-md-8 col-md-offset-2">
                <div class="panel-body">/
                    
                    <br>
                    <div class="well">
                        <div class="row clearfix">
                            <div class="col-md-2 column">
                                <a href="profile.php?username=<?php echo $temp_user_username; ?>">  
                                <img src="userfiles/avatars/<?php echo $rws_search_username['user_avatar'];?>" class="img-responsive notice-topic-avatar" alt="<?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>">
                                <?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?></a>
                            </div>
                            <div class="col-md-10 column">
                            <ul class="nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                    <ul class="dropdown-menu">
                                    <?php
                                        if($_SESSION['user_username'] == "admin"){      
                                      ?>
                                      <li>
                                        <a href="components/delete-notice-post.php?notice_topic_id=<?php echo $notice_topic_id; ?>"><span class="fa fa-trash"></span> Delete</a>
                                      </li>
                                        <?php } ?>
                                       <li>
                                          <a href="" target="_blank"><span class="fa fa-warning"></span> Report</a>
                                       </li>
                                    </ul>
                                </li>	
                              </ul>  
                                <p class="margin-top50"><i><strong>Posted On:</strong> <?php echo $rws1['notice_topic_time']; ?></i></p>
                                <hr>
                                <strong><a href="notice-topic.php?notice_topic_id=<?php echo $rws1['notice_topic_id'];?>"> <?php echo $rws1['notice_topic_name'];?></a></strong>
                                <hr>
                                <?php
                                if($rws1['notice_topic_image']){
                                    ?>
                                    <a data-toggle="modal" href="#<?php echo $rws1['notice_topic_id']?>">
                                <img src="userfiles/uploads/<?php echo $rws1['notice_topic_image'];?>"  class="img-responsive thumbnail">
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
            <div class="col-md-3 column">
                <a class="btn btn-default " href="add-new-forum-post.php">Add New Post</a>
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
        $forum_topic_id = $rws['forum_topic_id'];
        $sql_search_username = "SELECT * FROM user WHERE user_username = '$temp_user_username'";
        $result_search_username = mysqli_query($database,$sql_search_username) or die(mysqli_error($database));
        $rws_search_username = mysqli_fetch_array($result_search_username);
?>
        <div class="container">
            <div class="panel panel-default col-md-8 col-md-offset-2">
                <div class="panel-body ">
                    
                    <br>
                    <div class="well">
                        <div class="row clearfix">
                            <div class="col-md-2 column">
                                <a href="profile.php?username=<?php echo $temp_user_username; ?>">
                                <img src="userfiles/avatars/<?php echo $rws_search_username['user_avatar'];?>" class="img-responsive forum-topic-avatar" alt="<?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>">
                                <?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?></a>
                            </div>
                            <div class="col-md-10 ">
                            <ul class="nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                    <ul class="dropdown-menu">
                                    <?php if(($temp_user_username==$current_user)or($_SESSION['user_username'] == "admin")){ ?>
                                      <li>
                                        <a href="components/delete-forum-post.php?forum_topic_id=<?php echo $forum_topic_id; ?>"><span class="fa fa-trash"></span> Delete</a>
                                      </li>
                                        <?php } ?>
                                       <li>
                                          <a href="" target="_blank"><span class="fa fa-warning"></span> Report</a>
                                       </li>
                                    </ul>
                                </li>	
                              </ul>  
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
    $sql1 = "SELECT * FROM notice_topic where notice_topic_id";
    $result1 = mysqli_query($database,$sql1);
    $rws_count1 = mysqli_num_rows($result1);
    while($rws1 = mysqli_fetch_array($result1)){
?>
<div class="portfolio-modal modal fade" id="<?php echo $rws1['notice_topic_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                <img src="userfiles/uploads/<?php echo $rws1['notice_topic_image'];?>" width = '520'>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <!-- <i class="fas fa-times"></i> -->
                  Close</button>
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
    $sql3 = "SELECT * FROM forum_topic where forum_topic_id";
    $result3 = mysqli_query($database,$sql3);
    $rws_count3 = mysqli_num_rows($result3);
    while($rws3 = mysqli_fetch_array($result3)){
?>
<div class="portfolio-modal modal fade" id="<?php echo $rws3['forum_topic_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                <img src="userfiles/uploads/<?php echo $rws3['forum_topic_image'];?>" width = '520'>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <!-- <i class="fas fa-times"></i> -->
                  Close</button>
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