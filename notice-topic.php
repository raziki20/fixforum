<?php include 'components/authentication.php' ?>     
<?php include 'controllers/base/head.php' ?>
<?php
    //session_start();
    require '_database/database.php';
    if(isset($_SESSION['user_username'])){
?>
<?php include 'controllers/navigation/first-navigation.php' ?>
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
    $notice_topic_id = mysqli_real_escape_string($database,$_REQUEST['notice_topic_id']);
    $sql = "SELECT * FROM notice_topic where notice_topic_id = '$notice_topic_id'";
    $result = mysqli_query($database,$sql);
    $rws = mysqli_fetch_array($result);
                    
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
                            <ul class="nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                    <ul class="dropdown-menu">
                                      <li>
                                        <a href="components/delete-notice-post.php?notice_topic_id=<?php echo $notice_topic_id; ?>"><span class="fa fa-trash"></span> Delete</a>
                                      </li>
                                       <li>
                                          <a href="" target="_blank"><span class="fa fa-warning"></span> Laporkan</a>
                                       </li>
                                    </ul>
                                </li>	
                              </ul>  
                                <p class="margin-top50"><i><strong>Posted On:</strong> <?php echo $rws['notice_topic_time']; ?></i></p>
                                <hr>
                                <div class="topic-user-name">
                                    <strong><?php echo $rws['notice_topic_name'];?></strong>
                                </div>
                                <hr>
                                <div class="topic-body">
                                    <i class="fa fa-book"></i> <?php echo $rws['notice_topic_body'];?>    
                                </div>
                                <hr>
                                <?php
                                        if($rws['notice_topic_image']){
                                    ?>
                                    <hr>
                                    <div class="col-md-3 column">
                                    <a data-toggle="modal" href="#portfolioModal1">
                                        <img src="userfiles/uploads/<?php echo $rws['notice_topic_image'];?>"  class="img-responsive thumbnail">
                                        </a>
                                    </div>
                                    <?php
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
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