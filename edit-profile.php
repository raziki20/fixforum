<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'controllers/navigation/first-navigation.php' ?>
<script type="text/javascript"> 
        ChangeIt();
    </script>          
    <div class="container">
	   <div class="no-gutter row"> 
           <div class="col-md-12">
               <div class="panel panel-default" id="sidebar">
                   <div class="panel-body">                
<?php
    
    $user_username = $_SESSION['user_username'];          
    $sql = "SELECT * FROM user where user_username='$user_username'";
    $result = mysqli_query($database,$sql) or die(mysqli_error($database)); 
    $rws = mysqli_fetch_array($result);
?>             
<?php include 'controllers/form/edit-profile-form.php' ?>
                   </div>
               </div>
           </div>
        </div>
    </div>