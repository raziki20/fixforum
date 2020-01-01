<?php include 'components/session-check-index.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'controllers/navigation/index-before-login-navigation.php' ?>
<script type="text/javascript"> 
        ChangeIt();
    </script>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="panel-body col-md-6 col-md-offset-3">
    <div class="row">
        <div class="main">
          <h2 >Please Log In or <a href="register.php">Register</a></h2>
          <form role="form" action="components/login-process.php" method="post" name="login">
              <div class="form-group">
                  <label for="inputUsernameEmail">Username or email</label>
                  <input type="text" class="form-control" id="inputUsernameEmail" name="username" placeholder="Username">
              </div>
              <div class="form-group">
                  <label for="inputPassword">Password</label>
                  <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
              </div>
              <button type="submit" class="btn btn btn-primary ladda-button" data-style="zoom-in" value="Sign In" name="login_button">
                  Log In  
              </button>
          </form>
        </div>
    </div>
    </div>
</div>