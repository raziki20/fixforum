<?php
    $current_user = $_SESSION['user_username'];
    $sql = "SELECT * FROM user WHERE user_username='$current_user'";
    $result = mysqli_query($database,$sql);
    while($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
?>
    <!-- Navbar1 -->
	    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
	      <div class="fluid-container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
                <a class="navbar-brand" href="index.php"><b><i class="fa fa-home"></i> Home</b></a>	        
            </div>
	        <div class="navbar-collapse collapse" id="navbar-collapse1">
                <form class="navbar-form navbar-left" role="search" method="post" autocomplete="off" action="search-result.php">
                    <div class="form-group">
                        <input type="text" class="search form-control" id="searchbox" placeholder="Search " name="search-form"/><br />
                        <div id="display"></div>
				    </div> 
				</form>
                <ul class="nav navbar-nav">
                    <li><a href="forum.php"><i class="fa fa-globe"></i> Forum</a></li>
                    <li><a href="notice.php"><i class="fa fa-calendar"></i> Event</a></li>
	            </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $row['user_firstname'];?> <?php echo $row['user_lastname'];?><strong class="caret"></strong></a>                  
                        <ul class="dropdown-menu">
                        <?php
                            if($_SESSION['user_username'] == "admin"){      
                        ?>
                            <li>
                                <a href="admin.php"><i class="fa fa-users"></i>Menu Admin</a>
                            </li>
                        <?php
                            }
                            ?>
                            <li>
                                <a href="my-profile.php"><i class="fa fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="edit-profile.php"><i class="fa fa-edit"></i> Edit Profile</a>
                            </li>
                            <li>
                                <a href="components/logout.php"><i class="fa fa-mail-reply"></i> Logout</a>
                            </li>
                        </ul>
                    </li>	
                </ul>    
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
      <!-- ./Navbar1 -->
<?php
    }
?>