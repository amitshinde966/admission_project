<?php
 $sid = $_SESSION['s_id'];
 $s_u_name = $db->get_row("SELECT * FROM sell_form WHERE s_id='$sid'");
 $p_u_name = $db->get_row("SELECT * FROM personal_details WHERE s_id='$sid'");
 if(isset($p_u_name))
 {
 $editid = $p_u_name->pd_id;
 $file1=$_SERVER['DOCUMENT_ROOT'].'/mit-pro/student/photos/'.$editid.'.jpg';
if(is_file($file1))
{
$name=$editid.'.jpg';
}
else
{
$file1=$_SERVER['DOCUMENT_ROOT'].'/mit-pro/student/photos/'.$editid.'.png';
if(is_file($file1))
{
$name=$editid.'.png';
}
}
}
?>
   <?php
  include('template/js.php');
  ?>
<header class="main-header">
   

        <!-- Logo -->  
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>MIT</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>MIT</b> POLYTECHNIC</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php
					if(isset($name))
					{
					?>
					<img src="photos/<?php echo $name ?>" class="user-image" alt="User Image">
					<?php
					}
					else
					{
					?>
				  <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
					<?php
					}
					?>
				  <span class="hidden-xs"><?php echo $s_u_name->s_fname ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?php
					if(isset($name))
					{
					?>
					<img src="photos/<?php echo $name ?>" class="img-circle" alt="User Image">
					<?php
					}
					else
					{
					?>
				  <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
					<?php
					}
					?>
                    <p> 	
                      <?php echo $s_u_name->s_fname ?>
                      <small>MIT PLOYTECHNIC</small>
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
                    <div align=center>
                      <a href="<?php echo site_root; ?>student/logout.php" class="btn btn-default btn-flat">Sign out</a>
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