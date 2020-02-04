<?php include 'components/authentication.php';      
 include 'controllers/base/head.php'; 
    //session_start();
    require '_database/database.php';
    if(isset($_SESSION['user_username'])){
 include 'controllers/navigation/first-navigation.php' ?>
 <script type="text/javascript"> 
        ChangeIt();
    </script>
 <link rel="stylesheet" href="share.css" type="text/css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
    }
    else{
?>
<?php include 'controllers/navigation/index-before-login-navigation.php' ?>
<script type="text/javascript"> 
        ChangeIt();
    </script>
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
                                <a href="profile.php?username=<?php echo $temp_user_username; ?>">
                                <img src="userfiles/avatars/<?php echo $rws_search_username['user_avatar'];?>" class="img-responsive forum-topic-avatar" alt="<?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>">
                                <?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?></a>
                            </div>
                            <div class="col-md-11 column">
                            <ul class="nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                    <ul class="dropdown-menu">
                                      <?php if(($temp_user_username==$current_user)or($_SESSION['user_username'] == "admin")){ ?>
                                      <li>
                                        <a href="components/delete-forum-post.php?forum_topic_id=<?php echo $forum_topic_id ?>"><span class="fa fa-trash"></span> Delete</a>
                                      </li>
                                      <?php } ?>
                                      <?php if($temp_user_username==$current_user){ ?>
                                      <li>
                                          <a href="update-forum-post.php?topic_id=<?php echo $forum_topic_id?>" ><span class="fa fa-edit"></span>Edit</a>
                                       </li>
                                      <?php } ?>
                                      
                                
                                    </ul>
                                </li>	
                              </ul>  
                              <ul class="nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-share-alt-square"></i></a>
                                    <ul class="dropdown-menu">
                                      <li>
                                        <a href="http://www.facebook.com/sharer.php?u=https://dumetschool.com" target="_blank"><span class="fa fa-facebook-square"></span> facebook</a>
                                      </li>
                                       <li>
                                          <a href="https://twitter.com/share.php?u=https://dumetschool.com" target="_blank"><span class="fa fa-twitter-square"></span> twitter</a>
                                       </li>
                                       <li>
                                       <a href="https://plus.google.com/share?u=https://dumetschool.com" target="_blank"><span class="fa fa-google-plus-square"></span> google+</a>
                                      </li>
                                    </ul>
                                </li>	
                              </ul>
                                <p class="margin-top50"><i><strong>Posted On:</strong> <?php echo $rws['forum_topic_time']; ?></i></p>
                                <hr>
                                <div class="topic-user-name">
                                    <strong><?php echo $rws['forum_topic_name'];?></strong>    
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
                    <h2>Comment</h2>
<?php 
    $sql_reply = "SELECT * FROM forum_topic_reply where forum_topic_reply_topic_id = '$forum_topic_id'";
    $result_reply = mysqli_query($database,$sql_reply);
    $rws_reply_count = mysqli_num_rows($result_reply);
    while($rws_reply = mysqli_fetch_array($result_reply)){
        
        $temp_user_username_reply = $rws_reply['forum_topic_reply_created_by'];
        $forum_reply_id = $rws_reply['forum_topic_reply_id'];
        $sql_search_username_reply = "SELECT * FROM user WHERE user_username = '$temp_user_username_reply'";
        $result_search_username_reply = mysqli_query($database,$sql_search_username_reply);
        $rws_search_username_reply = mysqli_fetch_array($result_search_username_reply);
?>

<?php
        if($rws_reply_count > 0){
?>
                    <div class="well">
                        <div class="row clearfix">
                        <div class="col-md-2 column">
                                <a href="profile.php?username=<?php echo $temp_user_username; ?>">
                                <img src="userfiles/avatars/<?php echo $rws_search_username['user_avatar'];?>" class="img-responsive forum-topic-avatar" alt="<?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?>">
                                <?php echo $rws_search_username['user_firstname'];?> <?php echo $rws_search_username['user_lastname'];?></a>
                            </div>
                            <div class="col-md-11 column">
                                <div class="topic-user-name">
                                    
                                </div>
                                <ul class="nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                    <ul class="dropdown-menu">
                                      <?php if(($temp_user_username_reply==$current_user)or($_SESSION['user_username'] == "admin")){ ?>
                                      <li>
                                        <a href="components/delete-forum-reply.php?forum_topic_reply_id=<?php echo $forum_reply_id ?>&topic_id=<?php echo $forum_topic_id ?>"><span class="fa fa-trash"></span> Delete</a>
                                      </li>
                                      <?php } ?>
                                      <?php if($temp_user_username_reply==$current_user){ ?>
                                      <li>
                                          <a href="" data-toggle="modal" data-target="#c<?php echo $forum_reply_id ?>" target="_blank"><span class="fa fa-edit"></span>Edit</a>
                                       </li>
                                      <?php } ?>
                                      
                                    </ul>
                                </li>	
                              </ul>
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
                                <h2 class="text-center">You need to <a href="login.php">Log In</a> or <a href="register.php">Register</a> to post comments.</h2>
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
                <!-- <img class="img-fluid d-block mx-auto" src="userfiles/uploads" alt=""> -->
                <img src="userfiles/uploads/<?php echo $rws['forum_topic_image'];?>" width = '520'>
                <hr>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <!--<i class="fas fa-times"></i>-->
                  Close</button>
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
                <!-- <img class="img-fluid d-block mx-auto" src="userfiles/uploads" alt=""> -->
                <img src="userfiles/uploads/<?php echo $rws_reply2['forum_topic_reply_image'];?>" width = '520'>
                <hr>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <!--<i class="fas fa-times"></i>-->
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
 $sql_reply = "SELECT * FROM forum_topic_reply where forum_topic_reply_topic_id = '$forum_topic_id'";
 $result_reply = mysqli_query($database,$sql_reply);
 $rws_reply_count = mysqli_num_rows($result_reply);
 while($rws_reply = mysqli_fetch_array($result_reply)){

$temp_user_username_reply = $rws_reply['forum_topic_reply_created_by'];
        $forum_reply_id = $rws_reply['forum_topic_reply_id'];
?>
   <!-- Modal -->
   <div class="modal fade" id="c<?php echo $forum_reply_id ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Komentar</h4>
        </div>
        <div class="modal-body">
          <div class="topic-body">
          <form action= "edit-komentar.php" method = "post">
          <input type="hidden" name= "forum_topic_reply_id" value= "<?php echo $rws_reply['forum_topic_reply_id']?>">
          <div class= "form-group">
          <textarea type = "text" class="form-control" rows="8" name="forum_topic_reply_body"><?php echo $rws_reply['forum_topic_reply_body'];?></textarea>
          </div>
          </div>
        </div>
        <div class="modal-footer">
        <input type="submit" class="btn btn-default" name="edit_komentar" value="update">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>