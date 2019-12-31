<?php 
    include 'components/authentication.php';
    include 'controllers/base/head.php';

    
    require '_database/database.php';
    if(isset($_SESSION['user_username'])){

    include 'controllers/navigation/first-navigation.php'; ?>
    <script type="text/javascript"> 
        ChangeIt();
    </script>
    <div class="container top">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <a class="btn btn-default" href="add-new-forum-post.php">Add New Post</a>
            </div>
        </div>
    </div>
    <?php
    }
    else{

    include 'controllers/navigation/index-before-login-navigation.php'; ?>
<script type="text/javascript"> 
        ChangeIt();
    </script>
    <?php
    }
?>
<?php include 'controllers/table/forum-table.php'; ?>