<?php 
// Include ezSQL core
	include_once "ez_sql_core.php";

	// Include ezSQL database specific component
	include_once "ez_sql_mysql.php";

	// Initialise database object and establish a connection
	// at the same time - db_user / db_password / db_name / db_host
	$db = new ezSQL_mysql('root','tablet','omkar_new','localhost');
	
	// For accessing $db object in all pages
	global $db;
	global $msg;
	
	
	
	
	define("site_root",$_SERVER['DOCUMENT_ROOT']."/mit_college/liveproject/",true);
	define("mainsite","../",true);
	define("admin",mainsite."admin/",true);
	define("css",admin."css/",true);
	define("js",admin."js/",true);
	
?>