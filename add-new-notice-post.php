<?php include 'components/authentication.php' ?>     
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'controllers/navigation/first-navigation.php' ?>
<script type="text/javascript"> 
        ChangeIt();
    </script>
<div class="container top">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">New Event</h2>
        </div>
        <div class="panel-body">
            <?php include 'controllers/form/add-new-notice-form.php' ?>
        </div>
    </div>
</div>
