<?php
include('ez_sql/shared/ez_sql_core.php');
include('ez_sql/mysql/ez_sql_mysql.php');

date_default_timezone_set('Asia/Manila'); //timezone

$db = new ezSQL_mysql('root', '', 'student', 'localhost'); //user, password, database name, host
define("site_root","http://localhost/mit-pro/",TRUE);

?>
<?php
/*
$conn=mysql_connect('localhost','root','');
$db=mysql_select_db('signup',$conn);
if($db==TRUE)
{
	echo 'CONNECTED';
}
else
{
	echo 'NOT CONNECTED';
}
*/
?>