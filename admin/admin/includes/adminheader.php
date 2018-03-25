<?php
global $msg;
global $adminid;
global $level;
if(isset($_POST['loginform']))
{
	$username = filter_var($_POST['userid']);
	$password1 = filter_var($_POST['password']);
	if($username != '' && $password1 != '')
	{	
		$username = filter_var($_POST['userid']);
		$password = filter_var($_POST['password']);
		
		$checklogin = $db->get_row("SELECT mit_admin.*,mit_admintype.* FROM mit_admin 
				INNER JOIN mit_admintype ON mit_admin.mat_id = mit_admintype.mat_id
				WHERE mit_admin.ma_user = '$username' AND mit_admin.ma_password ='$password'  AND mit_admin.ma_status != '3' ");
		$msg = $checklogin;
		if(count($checklogin) == '0')
		{
			$msg = '<div class="callout callout-danger">
			           Your username / password seems to be wrong! Please use "Reset Password" below to get new password on your Registered Mobile Number!
				</div>';
		}elseif(count($checklogin) == '1')
		{
			$getuser = $db->get_row("SELECT mit_admin.*,mit_admintype.* FROM mit_admin 
				INNER JOIN mit_admintype ON mit_admin.mat_id = mit_admintype.mat_id
				WHERE mit_admin.ma_user = '$username' AND mit_admin.ma_password ='$password'  AND mit_admin.ma_status != '3' ");
			session_start();
			
			$_SESSION['adminid'] = $getuser->ma_id;
			$_SESSION['name'] = ucfirst($getuser->ma_user);
			$_SESSION['level'] = $getuser->mat_level;

			setcookie("adminid", $getuser->ma_id, time()+360000);
			setcookie("level", $getuser->mat_level, time()+360000);
			//print_r($_SESSION);
			global $adminid;
			global $level;
			if(!isset($_SESSION))
			{
				session_start();
			}else{
				$adminid = $_SESSION['adminid'];
				$level = $_SESSION['level'];
			
				global $adminid;
				global $level;
			}
			$ip=$_SERVER['REMOTE_ADDR'];
			date_default_timezone_set("Asia/Calcutta");
			$date=date('Y-m-d H:i:s');
			
				$insert=$db->query("INSERT INTO mit_adminlog VALUES('','$ip','$date')");
				if($insert){
			
			header("location:../admin/index.php");
			}
			else{
			echo 'notinserted';
			}
		} else {
			$msg = '<div class="callout callout-danger">
		            Your username / password seem to be wrong! Please use "Reset Password" below to get new password on your Registered Mobile Number!
		            </div>';
		}
	
	}else{
		$msg = '<div class="callout callout-danger">
	            Please enter username and password! Please use "Reset Password" below to get new password on your Registered Mobile Number!
	            </div>';
	}
}


?>