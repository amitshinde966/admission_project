 <?php 
//  $getemail = $db->get_row("SELECT * FROM mit_emailconfig WHERE mec_status = '1' ");
//  if($getemail)
//  {
// 	//print_r($getemail);
//  	$email = $getemail->mec_email;
//  	$pass = $getemail->mec_password;
//  	$port = $getemail->mec_port;
//  	$url = $getemail->mec_url;
//  	email_send($email,"THis is test email","Simle Html",$filenames=null);
//  }
 
//echo session_id();
 $getnum = $db->get_row("SELECT * FROM sell_form ORDER BY s_id DESC ");
//echo 'mrf_id'.$getnum->mrf_id;
$formno = "2500".$getnum->s_id+1;

?>
 
 
 <div class="row"> <form role="form" method="post" name="sellform" id="sellform" action="">
 
                <div class="col-md-12">
                            
                        <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Student's Details</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                               
                                    <div class="box-body">
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input name="first_name" type="text" placeholder="Enter First Name" id="first_name" class="form-control" />
                                            <span id="sellform_first_name_errorloc"></span>
                                        </div>
                                        
                                        <div class="form-group  col-md-4"">
                                            <label for="exampleInputPassword1">Middle Name</label>
                                            <input name="middle_name" type="text" placeholder="Enter Middle Name" id="middle_name" class="form-control" />
                                            <span id="sellform_middle_name_errorloc"></span>
                                            
                                        </div>
										
										<div class="form-group  col-md-4"">
                                            <label for="exampleInputPassword1">Last Name</label>
                                            <input  name="last_name"  type="text" placeholder="Enter Last Name" id="last_name" class="form-control"/>
                                            <span id="sellform_last_name_errorloc"></span>
                                        </div>
										
										<div class="form-group  col-md-4"">
                                            <label for="exampleInputPassword1">Mobile Number</label>
                                            <input name="mobile_number" type="text"  onkeyup="checknumber();" placeholder="Enter Mobile Number (10 digits please)" id="mobile_number" class="form-control"/>
                                            <span id="sellform_mobile_number_errorloc"></span>
                                        </div>
										
<!--										<div class="form-group  col-md-4"">
                                            <label for="exampleInputPassword1">Email Id</label>
                                            <input name="email_id" type="email" placeholder="Enter Email Id" id="email_id" class="form-control"/>
                                             <span id="sellform_email_id_errorloc"></span>
                                        </div>-->
                                        
										<?php $load_educrit = $db->get_results("SELECT * FROM edu_criteria ORDER BY e_id DESC "); ?>
										<div class="form-group   col-md-4"">
                                            <label>Education Criteria</label>
                                            
                                            <select name="select_class" class="form-control">
	                                            <option value="000">---Select Option---</option> 
												<?php foreach($load_educrit as $load_edu){ ?>
	                                                <option value="<?php echo $load_edu->e_id; ?>"><?php echo $load_edu->e_name; ?></option>
	                                                <?php
                                                        break;
                                                        
                                                                                                } ?>	
	                                         </select>
	                                          <span id="sellform_select_class_errorloc"></span>
                                        </div>
										
										
										
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                       &nbsp;
                                    </div>
                               
                            </div>
							
							</div><!-- /.col -->
							
							<div class="col-md-12">
                            
                        <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Additional Form Details</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                               
                                    <div class="box-body">
                                        <div class="form-group col-md-6">
						<label for="exampleInputPassword1">Cost of Form</label>
                                           <div class="input-group">
                                         <span class="label label-info">500 Rs.</span>
                                        <input name="cost_of_form" id="cost_of_form" type="hidden" class="form-control" />
                                       
                                        <span id="sellform_cost_of_form_errorloc"></span>
                                    </div>
                                        </div>
                                        <div class="form-group  col-md-6"">
                                            <label for="exampleInputPassword1">Form Number</label>
                                            <span class="label label-info"><?php echo $formno; ?></span>
                                            
                                            <input name="form_number" type="hidden"  id="form_number" class="form-control" />
                                             <span id="sellform_form_number_errorloc"></span>
                                        </div>
										
<!-- 										<div class="form-group  col-md-4""> -->
<!--                                             <label for="exampleInputPassword1">Added By</label> -->
                                            <input type="hidden" placeholder="Password" id="exampleInputPassword1" class="form-control">
											<input name="added_by" type="hidden"  value="<?php echo $_SESSION['adminid']?>" id="exampleInputPassword1" class="form-control">
											
<!--                                         </div> -->
										
										<div id="checkresponse">
										 
											<div class="form-group col-md-12"">
										     		<button class="btn btn-primary" name="add_sell_form" type="submit">Sell Form</button>
	                                  		</div>
	                                  		
                                  		</div>
										
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
										&nbsp;
									</div>
                               
                            </div>
							
							</div>
							
							
							
                    </form>
					</div>
			
<script type="text/javascript">

function checknumber()
{
	var mobile = $("#mobile_number").val();
	//alert(mobile);
	$.ajax({
		type:"GET",
		data:"mobile="+mobile,
		url:'component/student/ajax.php',
		success:function(reply){
			$("#checkresponse").html(reply);	
		}
	});

}


 </script>
					
					
					
					
<script type="text/javascript">
var sell = new Validator("sellform");
sell.EnableOnPageErrorDisplay();
sell.EnableMsgsTogether();
sell.addValidation("first_name","req","<span class='label label-danger'>Please Enter First Name.</span>");
sell.addValidation("first_name","alpha","<span class='label label-danger'>Please Enter Valid First name.Dont enter spaces or Special characters like & ,%,* etc</span>");

sell.addValidation("middle_name","req","<span class='label label-danger'>Please Enter Middle Name.</span>");
sell.addValidation("middle_name","alpha","<span class='label label-danger'>Please Enter Valid Middle name.Dont enter spaces or Special characters like & ,%,* etc</span>");

sell.addValidation("last_name","req","<span class='label label-danger'>Please Enter Last Name.</span>");
sell.addValidation("last_name","alpha","<span class='label label-danger'>Please Enter Valid Last name.Dont enter spaces or Special characters like & ,%,* etc</span>");


sell.addValidation("mobile_number","req","<span class='label label-danger'>Please Enter Valid Mobile Number.</span>");
sell.addValidation("mobile_number","alnum","<span class='label label-danger'>Please Enter Valid Mobile Number.</span>");
sell.addValidation("mobile_number","minlen=10","<span class='label label-danger'>Please Enter 10 digit Mobile Number.</span>");
sell.addValidation("mobile_number","maxlen=10","<span class='label label-danger'>Please Enter 10 digit Mobile Number.</span>");

sell.addValidation("email_id","req","<span class='label label-danger'>Please Enter Email ID.</span>");
sell.addValidation("email_id","email","<span class='label label-danger'>Please Enter valid Emailid.</span>");


sell.addValidation("select_class","req","<span class='label label-danger'>Please Select Education Criteria.</span>");
sell.addValidation("select_class","dontselect=000","<span class='label label-danger'>Please Select Education Criteria.</span>");

sell.addValidation("cost_of_form","req","<span class='label label-danger'>Please add cost of form.</span>");
sell.addValidation("cost_of_form","alnum","<span class='label label-danger'>Please add cost of form in the form of numbers.</span>");

// sell.addValidation("cost_of_form","req","<span class='label label-danger'>Please add cost of form</span>");

// sell.addValidation("cost_of_form","req","<span class='label label-danger'>Please add cost of form</span>");

</script>			


