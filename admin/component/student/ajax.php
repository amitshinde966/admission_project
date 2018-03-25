<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/mit-pro/admin/private/conn.php');
if(isset($_GET['mobile']))
{
	$mobile = $_GET['mobile'];
	$mobile = $db->get_var("SELECT COUNT(*) FROM sell_form WHERE s_mobile_number = '$mobile' ");
	if($mobile > '0')
	{
		?>
		<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Wrong!</b> Please select another mobile number. Or Mail us on <a href="mailto:contact@mitsspp.com?subject=Mobile Number Exist.">contact@mitsspp.com</a>
                                    </div>
		<?php 		
	}else{
		?>
		<div class="form-group col-md-12"">
										     		<button class="btn btn-primary" name="add_sell_form" type="submit">Submit</button>
	                                  		</div>
		<?php 
	}	
}

if(isset($_GET['categoryid']) && isset($_GET['patternid']))
{
	echo 'jkkjhkhkjhkj';
	global $db;
	$pat = $_GET['patternid'];
	$cat =$_GET['categoryid'];
	
	$query = '';
	if($pat > '0' && $cat >'0' )
	{
		$query = "SELECT register_form.*,mit_castedetails.*,mit_edudetails.* FROM mit_register_form 
				  INNER JOIN ON mit_register_form.mrf_id = mit_edudetails.me_mrf_id
				  INNER JOIN ON mit_edudetails.me_mrf_id = mit_castedetails.mrf_id
				  WHERE mit_edudetails.me_mp_id = '$pat' AND mit_castedetails.mc_id
				  GROUP BY mrf_id";							
 
	}elseif($pat > '0' && $cat == '0' ){
		$query = "SELECT register_form.*,mit_castedetails.*,mit_edudetails.* FROM mit_register_form
				INNER JOIN ON mit_register_form.mrf_id = mit_edudetails.me_mrf_id
				INNER JOIN ON mit_edudetails.me_mrf_id = mit_castedetails.mrf_id
				WHERE mit_edudetails.me_mp_id = '$pat' 
				GROUP BY mrf_id";
	}elseif($pat == '0' && $cat > '0' ){
		$query = "SELECT register_form.*,mit_castedetails.*,mit_edudetails.* FROM mit_register_form
				INNER JOIN ON mit_register_form.mrf_id = mit_edudetails.me_mrf_id
				INNER JOIN ON mit_edudetails.me_mrf_id = mit_castedetails.mrf_id
				WHERE mit_castedetails.mc_id = '$cat'
				GROUP BY mrf_id";
	}elseif($pat == '0' && $cat == '0' ){
		$query = "SELECT register_form.*,mit_castedetails.*,mit_edudetails.* FROM mit_register_form
				INNER JOIN ON mit_register_form.mrf_id = mit_edudetails.me_mrf_id
				INNER JOIN ON mit_edudetails.me_mrf_id = mit_castedetails.mrf_id
				GROUP BY mrf_id";
	}
	$searchs = $db->get_results($query);
	if($searchs)
	{
		include_once("searchresult.php");
	}	
	
}
