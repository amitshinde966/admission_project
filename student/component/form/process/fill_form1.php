 <?php

 $getbasicdetails = $db->get_row("SELECT * FROM sell_form WHERE s_id='$userid'");
 $getaddndetails = $db->get_var("SELECT COUNT(*) FROM sell_form WHERE s_id='$userid'");

 
 $userid  = $_SESSION['userid'];
 $getrow = $db->get_row("SELECT * FROM sell_form WHERE s_id = '$userid'");
 
 //$date = new DateTime('2000-01-01');

 if(isset($getrow))
 {
 	$date = new DateTime($getrow->mra_dob);
 	$date = $date->format('m/d/Y');
 }
 //echo $date;
 ?>

<?php 
global $msg;

if(isset($msg))
{
	echo $msg;
}

?>
 
 <div class="row"> <form role="form" method="post" action="" id="basicdetails">
                        <div class="col-md-12">
                            
                        <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Student's Details</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                               
                                    <div class="box-body">
                                        <div class="form-group col-xs-4">
                                            <label for="first_name">First Name</label>
                                            <input name="first_name" value="<?php echo $getbasicdetails->s_fname; ?>" type="text" placeholder="Enter First Name" id="first_name" class="form-control">
											<span class="label label-danger" id="basicdetails_first_name_errorloc"></span>
										</div>
                                        <div class="form-group  col-xs-4">
                                            <label for="middle_name">Middle Name</label>
                                            <input name="middle_name" value="<?php echo $getbasicdetails->s_mname; ?>" type="text" placeholder="Enter Middle Name" id="middle_name" class="form-control">
											<span class="label label-danger" id="basicdetails_middle_name_errorloc"></span>
									   </div>
										
										<div class="form-group  col-xs-4">
                                            <label for="last_name">Last Name</label>
                                            <input  name="last_name" value="<?php echo $getbasicdetails->s_lname; ?>"  type="text" placeholder="Enter Last Name" id="last_name" class="form-control">
											<span class="label label-danger" id="basicdetails_last_name_errorloc"></span>
										</div>
										
										<div class="form-group  col-xs-4">
                                            <label for="mobile_number">Mobile Number</label>
                                            <input name="mobile_number" value="<?php echo $getbasicdetails->s_moblie_number; ?>" type="number" placeholder="Enter Mobile Number (10 digits please)" id="mobile_number" class="form-control">
											<span class="label label-danger" id="basicdetails_mobile_number_errorloc"></span>
										</div>
										
										<div class="form-group col-xs-4">
                                            <label for="email_id">Email Id</label>
                                            <input name="email_id" value="<?php echo $getbasicdetails->s_email; ?>" type="email" placeholder="Enter Email Id" id="email_id" class="form-control">
											<span class="label label-danger" id="basicdetails_email_id_errorloc"></span>
										</div>
										
															
						<?php $load_edu = $db->get_row("SELECT * FROM edu_criteria ORDER BY e_id DESC"); ?>
					
                                        <div class="form-group   col-xs-4">
                                            <label for="select_class">Education Criteria</label>
                                            <span class="label label-info"><?php echo (strtoupper('after 10th')); ?></span>
                                               <select name="select_class" id="select_class" class="form-control">
							<option value="000">--Select--</option>
                                                    <?php //foreach($load_educrit as $load_edu)
							//{ ?>
                                                <option value="<?php echo $load_edu->e_id; ?>" ><?php echo $load_edu->e_name; ?></option>
                                             <?php //break 1;                                               
                                                        
                                                //} ?>	
                                            </select>
<!--                                            <span class="label label-danger" id="basicdetails_select_class_errorloc"></span>-->
                                        </div>
										
										<div class="form-group col-xs-4">
										<label for="select_gender">Select Gender</label>
                                             <select name="select_gender" id="select_gender" class="form-control">
												 <option value="000">--Select--</option>
												 <option value="m"> Male </option>
												 <option value="f"> Female </option>
											</select>
											
											<script type="text/javascript">
											<?php if($getaddndetails >'0'){?>
											//alert('<?php echo $getrow->mra_gender;?>');
											document.getElementById("select_gender").value = "m";
											<?php }?>
											</script>
											<span class="label label-danger" id="basicdetails_select_gender_errorloc"></span>
                                        </div>
										
										<div class="form-group">
                                        <label for="dob">Date of Birth:</label><span class="label label-danger">Please Enter Date in "MM/DD/YYYY" Format</span>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            
                                            <input name="dob" id="dob" type="text" class="form-control"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php if($getaddndetails >'0'){echo $date;}?>" />
											<span class="label label-danger" id="basicdetails_dob_errorloc"></span>
										</div><!-- /.input group -->
                                    </div>
                                		
										
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                       &nbsp;
                                    </div>
                               
                            </div>
							
							</div><!-- /.col -->
							
							<div class="col-md-12">
  <?php
	 if($getaddndetails == '1')
	{
			include_once('edit.php');
	} else {
		include_once('add.php'); 
	}
	?>
 								
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
									&nbsp;
									
									
									</div>
                               
                            </div>
							
							</div>
							
							
							
                    </form>
					</div> 
					 
<script type="text/javascript">
var frmvalidator = new Validator("basicdetails");
frmvalidator.EnableOnPageErrorDisplay();
frmvalidator.EnableMsgsTogether();	

frmvalidator.addValidation("first_name","req","Please Enter First Name.");			 
frmvalidator.addValidation("middle_name","req","Please Enter Middle Name.");			 
frmvalidator.addValidation("last_name","req","Please Enter Last Name.");			 

frmvalidator.addValidation("mobile_number","req","Please Enter Valid 10 Digits Mobile Number.");			 
frmvalidator.addValidation("mobile_number","alnum","Please Enter Valid 10 Digits Mobile Number.");			 
frmvalidator.addValidation("mobile_number","minlen=10","Please Enter Valid 10 Digits Mobile Number.");			 
frmvalidator.addValidation("mobile_number","maxlen=10","Please Enter Valid 10 Digits Mobile Number.");			 


frmvalidator.addValidation("mra_mob","req","Please Enter Valid 10 Digits Mobile Number.");			 
frmvalidator.addValidation("mra_mob","alnum","Please Enter Valid 10 Digits Mobile Number.");			 
frmvalidator.addValidation("mra_mob","minlen=10","Please Enter Valid 10 Digits Mobile Number.");			 
frmvalidator.addValidation("mra_mob","maxlen=10","Please Enter Valid 10 Digits Mobile Number.");	

frmvalidator.addValidation("email_id","req","Please Enter Email Id.");					 
frmvalidator.addValidation("dob","req","Please Enter Valid Date Of Birth.");					 

frmvalidator.addValidation("select_class","dontselect=000","Please Select Class.");					 
frmvalidator.addValidation("select_gender","dontselect=000","Please Select Gender.");		


frmvalidator.addValidation("ffirst_name","req","Please Enter Fathers First Name.");			 
frmvalidator.addValidation("fmiddle_name","req","Please Enter Fathers Middle Name.");			 
frmvalidator.addValidation("flast_name","req","Please Enter Fathers Last Name.");			 
frmvalidator.addValidation("mfirst_name","req","Please Enter Mothers Last Name.");			 
frmvalidator.addValidation("mmiddle_name","req","Please Enter Mothers Last Name.");			 
frmvalidator.addValidation("mlast_name","req","Please Enter Mothers Last Name.");			 
frmvalidator.addValidation("corr_address","req","Please Enter Address for Correspondence.");			 
frmvalidator.addValidation("perm_address","req","Please Enter Permenant Address.");
</script>			 