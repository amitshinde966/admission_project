<?php 
global $db;

function email_send($receivermail,$subject,$html,$filenames=null)
{
	global $db;
	$getemail = $db->get_row("SELECT * FROM mit_emailconfig WHERE mec_status = '1' ");
	if($getemail)
	{
		$email = $getemail->mec_email;
		$pass = $getemail->mec_password;
		$port = $getemail->mec_port;
		$url = $getemail->mec_url;
	}

	$replytoemail = $email;
	$replytoname = 'MITSSPP';
	$frommail = $email;
	$fromname =	'MITSSPP.';
	date_default_timezone_set('Asia/Calcutta');
	//include_once 'class.phpmailer.php';
	if (!class_exists("phpmailer"))
	{
		require 'class.phpmailer.php';
	}

	//Create a new PHPMailer instance
	$mail = new PHPMailer();
	//Tell PHPMailer to use SMTP
	$mail->IsSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug  = 0;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	
	//$mail->Host       = 'smtp.live.com';
	$mail->Host			= 'smtp.gmail.com';
	
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port       = $port;
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';
	//Whether to use SMTP authentication
	$mail->SMTPAuth   = true;
	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username   = $email;
	//Password to use for SMTP authentication
	
	//echo 'password'.$password;
	$mail->Password   = $pass;
	
	//Set who the message is to be sent from
	//$mail->FromName = $name;
	$mail->AddReplyTo($replytoemail,$replytoname);
	//$mail->SetFrom('cmihirhere@gmail.com',$name);
	$mail->From = $frommail;
	$mail->FromName = $fromname;

	//Set an alternative reply-to address
	//Set who the message is to be sent to
	$mail->AddAddress($receivermail, 'MITSSPP');
	//Set the subject line
	if(isset($filenames))
	{
		foreach($filenames as $file)
		{
			$attachment_path = $file;
			if(is_file($attachment_path))
			{
				//echo'attachment_path'.$attachment_path;
				$attachment_name = basename($attachment_path);

				$mail->AddAttachment($attachment_path, $attachment_name);
				//$mail->AddAttachement($file);
			}
		}
	}


	$mail->Subject = $subject.'.';
	//Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
	//$mail->IsHTML(true);
	$mail->MsgHTML($html);
	//Replace the plain text body with one created manually
	$mail->AltBody = 'blah blah blah';
	//Attach an image file
	//Send the message, check for errors
	if(!$mail->Send())
	{
		$msg =  "<div class='alert alert-danger' style='clear:both;'>
							<a class='close' data-dismiss='alert' href='#' aria-hidden='true'>&times;</a>
							<strong>There was a problem email send to: ".$receivermail.".</strong></div>";
		//echo $errors;
	}else{
		$msg = "<div class='alert alert-success' style='clear:both;'>
							<a class='close' data-dismiss='alert' href='#' aria-hidden='true'>&times;</a>
							<strong>Email Successfully Sent to:".$receivermail." .</strong></div>";
		//echo $success;
	}
	return $msg;
}



function sendmsg($receiver,$msg)
{
	echo 'In sendmsg function';
	$url = urlencode('http://www.eazy2sms.com/SMS.aspx?Mobile='.$receiver.'&Message='.$msg.'&Type=1&Userid=ENTC_SSPPP&Password=ENTC_SSPPP');
	
	// create curl resource
	$ch = curl_init();
	
	// set url
	curl_setopt($ch, CURLOPT_URL, $url);
	
	//return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	// $output contains the output string
	$output = curl_exec($ch);
	
	// close curl resource to free up system resources
	curl_close($ch);

	print_r($output);
	print_r($ch);
	
}


function GetRow($table)
{
	$result = $db->get_row("SELECT * FROM $table");
	return $result;
}

function GetResults($table)
{
	$result = $db->get_results("SELECT * FROM $table");
	return $result;
}

function FormatArray($array)
{
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}


function GetOptions(){
	global $db;
	$arr = array("mit_registeruser","mit_adminlog","mit_educriteria","mit_form_cost","mit_register_form"
			,"mit_register_addndetails","mit_castedetails","mit_edudetails","mit_registersteps","mit_subcaste");
	foreach($db->get_col("SHOW TABLES",0) as $table_name )
	{
		//echo '$table name is:'.$table_name;
		
		if(!in_array($table_name,$arr))
		{
			?>
			   <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span><?php echo RemoveTablePrefix($table_name);?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="?page=<?php echo $table_name; ?>&view=add"><i class="fa fa-angle-double-right"></i>Add <?php echo RemoveTablePrefix($table_name);?></a></li>
                                <li><a href="?page=<?php echo $table_name; ?>"><i class="fa fa-angle-double-right"></i>View <?php echo RemoveTablePrefix($table_name);?></a></li>
                            </ul>
                 </li>
			<?php 
		}
	}
}

function RemoveTablePrefix($table)
{
	$explode = explode("_",$table,'2');
	$text = ucwords(str_replace("_"," ",$explode['1']));
	$name = $text;
	return($name);
}
?>