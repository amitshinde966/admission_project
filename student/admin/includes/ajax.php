<?php 

//9527204939

//include_once($_SERVER['DOCUMENT_ROOT'].'/admin/includes/conn.php');
include_once('./admin/includes/conn.php');

if(isset($_GET['mobile']))
{
	$mobile = $db->get_var("SELECT COUNT(*) FROM mit_register_form WHERE mrf_mobno = '$mobile' ");
	if($mobile > '0')
	{
		?>
		<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Wrong!</b> Please select another mobile number. Or Mail us on <a mailto="contact@mitsspp.com">contact@mitsspp.com</a>
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

?>