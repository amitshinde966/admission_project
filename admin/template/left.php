
 <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $a_u_name->ad_name; ?></p>
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
			if($a_u_name->ad_type== 1)
			{
			?>
            
            <li><a href="index.php?folder=admin&file=view"><i class="fa fa-users"></i> <span>Admin</span></a></li>
            <?php
			}
			?>
			<!--<li><a href="index.php?folder=student&file=view"><i class="fa fa-user"></i> <span>Students</span></a></li>-->
			<li class="treeview active">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Sell Form</span>
                                <i class="fa pull-right fa-angle-down"></i>
                            </a>
                            <ul class="treeview-menu" style="display: block;">
								<li><a href="index.php?folder=student&amp;file=add" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>Sell Form</a></li>
                                <li><a href="index.php?folder=student&amp;file=view" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>View Sell Form</a></li>
                                <li><a href="index.php?folder=student&amp;file=view_a" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>View Admission Forms</a></li>
                                <li><a href="index.php?folder=student&amp;file=view_merit" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>View Merit List</a></li>
								<!--<li><a href="index.php?folder=student&amp;file=view" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>Merit List</a></li>-->
                                
						    </ul>
						</li>
						
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
