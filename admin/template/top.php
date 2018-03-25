<header class="main-header">
   <?php
  include('template/js.php');
	$adid = $_SESSION['ad_id'];
	$a_u_name = $db->get_row("SELECT * FROM admin WHERE ad_id='$adid'");
  ?>
 

        <!-- Logo -->  
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>MIT ADMIN</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>MIT</b> Admin</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <!-- Tasks: style can be found in dropdown.less -->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $a_u_name->ad_name ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $a_u_name->ad_name ?>
                      <small>MIT POLYTECHNIC</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!--<li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>-->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!--<div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>-->
                    <div align=center>
						
                      <a href="<?php echo site_root; ?>admin/logout.php" class="btn btn-default btn-flat">Sign out</a>
						
					</div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!--<li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>-->
            </ul>
          </div>
        </nav>
      </header>