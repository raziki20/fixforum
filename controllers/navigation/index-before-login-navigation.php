    <!-- Before Login Navigation -->
	    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
                <a class="navbar-brand" href="index.php"><b><i class="fa fa-home"></i> Home</b></a>	        
	        </div>
			<form class="navbar-form navbar-left" role="search" method="post" autocomplete="off" action="search-result.php">
                    <div class="form-group">
                        <input type="text" class="search form-control" id="searchbox" placeholder="Search " name="search-form"/><br />
                        <div id="display"></div>
				    </div> 
				</form>
	        <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav back">
                    <li><a href="forum.php"><i class="fa fa-globe"></i> Forum</a></li>
                    <li><a href="notice.php"><i class="fa fa-calendar"></i> Event</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="register.php"><i class="fa fa-plus"></i> Register</a></li>
                    <li><a href="login.php"><i class="fa fa-user"></i> Login</a></li>
                </ul> 
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
    <!-- ./Before Login Navigation -->