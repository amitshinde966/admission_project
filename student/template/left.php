<?php
$sid=$_SESSION['s_id'];
$sub = $db->get_row("SELECT * FROM submit WHERE status = '1' AND s_id = '$sid' ");
$p = $db->get_row("SELECT * FROM personal_details WHERE s_id='$sid'"); 
//print_r($p);
?> 
 <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
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
            </div>
            <div class="pull-left info">
              <p> <?php echo $s_u_name->s_fname ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php
			if($sub!=TRUE)
			{
			?>
            <li><a href="index.php?folder=form&file=fill_form"><i class="fa fa-users"></i> <span>Admission Form</span></a></li>
            <?php
			}
			else
			{
			?>
			<li><a href="index.php?folder=form&file=view_form&id=<?php echo $p->pd_id;?>"><i class="fa fa-users"></i> <span>View Admission Form</span></a></li>
			<?php
			}
			?>
			<!--<li><a href="index.php?folder=student&file=view"><i class="fa fa-user"></i> <span>Students</span></a></li>-->
			
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
