<?php include 'components/session-check-index.php';
 include 'controllers/base/head.php'; 
 include 'controllers/navigation/index-before-login-navigation.php'; ?>
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
          <h2 >Please <a href="login.php">Log In</a> or Register</h2>
                    <form class="form col-md-12 center-block" action="components/registration.php" method="post" autocomplete="off">
                        <div class="row">     
                            <div class="col-lg-6" style="z-index: 9;">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" placeholder="First Name" name="user_firstname" required>
                                </div>
                            </div>
                            <div class="col-lg-6" style="z-index: 9;">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" placeholder="Last Name" name="user_lastname" required>
                                </div>
                            </div>
                        </div>
                     <div class="row">     
                         <div class="col-lg-12">
                            <div class="form-group">
                                <input type="email" class="form-control input-lg" placeholder="Email Address" name="user_email" required>
                            </div>
                         </div>
                     </div>
                     <div class="row">   
                         <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"> Cek</span>
                                    <input type="username" class="form-control input-lg" placeholder="Username" name="user_username" id="user_username" required> 
                                    <span class="input-group-addon" id="status"></span>
                                </div>
                             </div>
                            </div>     
                        </div>
                        <div class="row">     
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="password" class="password-register form-control input-lg" placeholder="Password" name="user_password" id="passwordfield" required>
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  id="cek-password">
                                    <label class="form-check-label" for="defaultCheck1"> View Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" style="float:left;" name="signup_button">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
             </div>       
        </div>
    </div>
</div>
<!-- VIEW PASSWORD -->
<script type="text/javascript">
     $('#cek-password').click(function () {
        if($(this).is(':checked')) {
            $('.password-register').attr('type', 'text');
        } else {
            $('.password-register').attr('type', 'password');
        }

    });
    </script>