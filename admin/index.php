<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MIT Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
   <?php
   include_once('private/conn.php');
   if(isset($_GET['folder']) && isset($_GET['file']))
{
//print_r($_GET);
$folder= $_GET['folder'];
$file= $_GET['file'];
   $query='./component/'.$folder.'/query.php';
//echo 'f887ile'.$query;
if(is_file($query))
{
//echo 'file'.$query;
include($query);
}
else
{
?>
<div class='alert alert-danger'>
Query controller not created in <?php echo $folder;?>
</div>
<?php
}
}
   if(!isset($_SESSION['ad_id']))
	{
		header("location:".site_root."admin/login.php");
	}
   include('template/css.php');
   ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      
     <?php
	 include('template/top.php');
	
	 include('template/left.php');
	 ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         
        <section class="content-header">
        <!--  <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>-->
        </section>

      
     <?php
	 
	 include('template/controller.php');
	 ?>
      </div><!-- /.content-wrapper -->
      <!--<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>-->

     <?php
	 include('template/right_sidebar.php');
	 ?>
    </div><!-- ./wrapper -->

     
  </body>
</html>
