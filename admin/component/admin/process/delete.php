<?php
if(isset($_GET['$deleteid']))
{
	$delete=$db->query("UPDATE admin SET row_status=0 WHERE ad_id='$_GET[$deleteid]'");
	header("location:index.php?folder=admin&file=view");
}
?>