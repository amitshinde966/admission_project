<?php
global $msg;
//session_start();
if(isset($_POST['deleteid'])){
$deleteid = filter_var($_POST['deleteid']);

$delete = $db->query("UPDATE admin SET row_status=0 WHERE ad_id='$deleteid'");
if($delete){

$msg = 'deleted successfully';
}

}

if(isset($_POST['submit']))
{
$name=$_POST['name'];
$user=$_POST['uname'];
$pass=md5($_POST['pass']);
$email=$_POST['email'];
$type=$_POST['type'];
//print_r($_POST);
if(!isset($_GET['ad_id']))
{

$ins=$db->query("INSERT INTO admin VALUES('','$name','$user','$pass','$email','$type','1')");

if($ins)
{
$msg="<div class='alert alert-success'>Admin added</div>";
}
else
{
$msg="<div class='alert alert-danger'>Error..!! </div>";
}
}
else
{

$edit=$db->query("UPDATE admin SET ad_name='$name',ad_username='$user',ad_email='$email',ad_pswd='$pass',ad_type='$type' WHERE ad_id='$_GET[ad_id]'");
if($edit)
{
$msg="<div class='alert alert-success'>Record Updated</div>";
//header("location:index.php?folder=admin&file=view");
}
else
{
$msg="<div class='alert alert-danger'>Error..!! </div>";
}



}


}




?>

