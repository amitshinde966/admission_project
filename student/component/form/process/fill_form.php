<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Fill Personal details</h3> 
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" id="myform" enctype='multipart/form-data'>
				
                  <div class="box-body">                    
				  <div class="form-group">
                      <label for="exampleInputEmail1">Student Full Name</label>
                      <input type="text" name="sname" class="form-control" id="John Cena" placeholder="Enter Student's Full Name" value="<?php echo $user->s_fname?> <?php echo $user->s_mname?> <?php echo $user->s_lname?>">
					  <span id="myform_sname_errorloc" class="label label-danger"></span>
					  
					  
					  
                    </div>
					
                    <div class="form-group">
                      <label for="exampleInputEmail1">Father's Full Name</label>
                      <input type="text" name="fname" class="form-control" id="JohnCena123" placeholder="Enter Father's Full Name" value="">
					  <span id="myform_fname_errorloc" class="label label-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Mother's Full Name</label>
                      <input type="text" name="mname" class="form-control" id="JohnCena123" placeholder="Enter Mother's Full Name" value="">
					  <span id="myform_mname_errorloc" class="label label-danger"></span>
					</div>
					<div class="form-group">
                                            <label for="email_id">Email Id</label>
                                            <input name="email" value="<?php echo $user->s_email?>" type="text" placeholder="Enter Email Id" id="email_id" class="form-control">
											<span id="myform_email_errorloc" class="label label-danger"></span>
										</div>
					<div class="form-group">
										<label for="select_gender">Select Gender</label>
                                             <select name="gender" id="select_gender" class="form-control">
												 <option value="000">--Select Gender--</option>
												 <option value="Male"> Male </option>
												 <option value="Female"> Female </option>
											</select>
											
											<script type="text/javascript">
								</script>
											<span class="label label-danger" id="myform_gender_errorloc"></span>
                                        </div>
										
					<div class="form-group">
                      <label>Permenant Address:</label>
                      <textarea class="form-control" rows="3" placeholder="Enter Permenant Address" name='add1'></textarea>
					  <span class="label label-danger" id="myform_add1_errorloc"></span>
					</div>
					<div class="form-group">
                      <label>Address for Correspondence:</label>
                      <textarea class="form-control" rows="3" placeholder="Enter Address for Correspondence" name='add2'></textarea>
                    </div>
					 <div class="form-group">
                      <label for="exampleInputPassword1">City:</label>
                      <input type="text" name="city" class="form-control" id="JohnCena123" placeholder="Enter City Name" value="">
						<span class="label label-danger" id="myform_city_errorloc"></span>
					</div>
					 <div class="form-group">
                      <label for="exampleInputPassword1">Pin Code:</label>
                      <input type="text" name="pin" class="form-control" id="JohnCena123" placeholder="Enter Pin Code" value="">
						<span class="label label-danger" id="myform_pin_errorloc"></span>
					</div>
					 <div class="form-group">
                      <label for="exampleInputPassword1">State:</label>
                      <input type="text" name="state" class="form-control" id="JohnCena123" placeholder="Enter State Name" value="">
                      <span class="label label-danger" id="myform_state_errorloc"></span>
					</div>
					<div class="form-group">
                    <label>Date Of Birth:</label>
                    <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
						
                      </div>
                      <input type="text" name="dob" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="" placeholder="MM/DD/YYYY">
                      <span class="label label-danger" id="myform_dob_errorloc"></span>
					</div><!-- /.input group -->
                  </div>
                    </div><!-- /.input group -->
					<div class="form-group">
                      <label for="exampleInputPassword1">Parent's Mobile No./Contact No.:</label>
                      <input type="text" name="pmobile" class="form-control" id='123123' placeholder="Enter Parent's Mobile Number" value="<?php echo $user->s_mobile_number ?>">
					 <span class="label label-danger" id="myform_pmobile_errorloc"></span>
					  
                    </div>
						<div class="form-group">
                      <label>Student's Mobile No./Contact No.:</label>
					  <input type="text" name="smobile" class="form-control" placeholder="Enter Student's Mobile Number" value="">
					   <span class="label label-danger" id="myform_smobile_errorloc"></span>
					   </div>
					   <div class="form-group">
                                            <label for="religion">Select Religion</label>
                                            <select class="form-control" name="religion" id="religion">
											
											
											
                                            	<option value="000">--Select Religion--</option>
                                            	<?php
												$rel = $db->get_results("SELECT * FROM s_religion");
												
												foreach($rel as $religion)
												{
												?>
												<option value="<?php echo $religion->s_r_id?>"><?php echo $religion->s_r_name?></option>				
												<?php
												}
												?>
												</select>
												<span class="label label-danger" id="myform_religion_errorloc"></span>
                                            	  
                                            </div>
                               

					  <div class="form-group">  
                                         <label for="category">Select Category</label>
                                         <select name="caste" id="category" class="form-control" onchange="loaddocs();">
                                          	 <option value="000">--Select Category--</option>
                                                                    
                                                    <?php
												$cat = $db->get_results("SELECT * FROM category");
												
												foreach($cat as $category)
												{
												?>
												<option value="<?php echo $category->c_id?>"><?php echo $category->c_name?></option>				
												<?php
												}
												?>                                           		
												</select>
												<span class="label label-danger" id="myform_caste_errorloc"></span>
                                           </div>					                      
										
                                            
                                          <h3 class="box-title">Fill Academic details</h3>
											<div class="form-group">
                                           <label for="marks">Mathematics:</label>
                                            <input name="math" value="" type="text" placeholder="Enter Mathematics marks" id="marks" class="form-control">
											<span class="label label-danger" id="myform_math_errorloc"></span>
                                           </div> 
										   <div class="form-group">
											<label for="marks">Science:</label>
                                            <input name="sci" value="" type="text" placeholder="Enter Science marks" id="marks" class="form-control">
											<span class="label label-danger" id="myform_sci_errorloc"></span>
                                           </div>
										   <div class="form-group">
											<label for="marks">Total:</label>
                                            <input name="total" value="" type="text" placeholder="Enter Total marks" id="marks" class="form-control">
											<span class="label label-danger" id="myform_total_errorloc"></span>
                                           </div>
										   <div class="form-group">
											<label for="marks">Percentage:</label>
                                            <input name="per" value="" type="text" placeholder="Enter Percentage" id="marks" class="form-control">
											<span class="label label-danger" id="myform_per_errorloc"></span>
                                           </div>
										   <h3 class="box-title">Documents Attached</h3>
										   <div class="checkbox">
                        <label>
                          <input type="checkbox" name='ssc' value='ssc'>
                          S.S.C. Mark Sheet
                        </label>
						<label>
                          <input type="checkbox" name='hsc' value='hsc'>
                          H.S.C. Mark Sheet
                        </label>
						<label>
                          <input type="checkbox" name='school_mr' value='school_mr'>
                         Mark Sheet for VIII,IX / Proforma Z
                        </label>
						<div class="checkbox">
						<label>
                          <input type="checkbox" name='domacile' value='domacile'>
                          Domicile Certificate
                        </label>
						<label>
                          <input type="checkbox" name='lc' value='lc'>
                          School/College Leaving Certificate
                        </label>
						<label>
							<input type="checkbox" name='income' value='income'>
							Income Certificate
						</label>
						</div>
						<div class="checkbox">
						<label>
							<input type="checkbox" name='caste_c' value='caste_c'>
							Caste Certificate
						</label>
						
						</div>
						
                    </div>
					<div class="form-group">
                      <label for="exampleInputFile">Please Input Your Photo:</label>
                      <input type="file" name='pr_pic' id="exampleInputFile">
                      <span class="label label-danger" id="myform_pr_pic_errorloc"></span>
					  </div>
										 
										   
                  </div>
				  
                  </div>
				
				
	                <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>								
					               
			</div><!-- /.box-body -->

  
                
              </div></form><!-- /.box -->

              

                  
               
				
				
				<script>
			var frmvalidator = new Validator("myform");
			frmvalidator.EnableOnPageErrorDisplay();
				frmvalidator.EnableMsgsTogether();
			frmvalidator.addValidation("sname","req","Please enter your First Name");
			frmvalidator.addValidation("fname","req","Please enter your Father's Full Name");
			frmvalidator.addValidation("mname","req","Please enter your Mother's Full Name");
			frmvalidator.addValidation("email","req","Please enter a your Email");
			frmvalidator.addValidation("email","email","Please enter a valid email");
			frmvalidator.addValidation("gender","dontselect=000","Please Select your gender");
			frmvalidator.addValidation("add1","req","Please enter your Permanent Address");
			frmvalidator.addValidation("city","req","Please enter your City Name");
			frmvalidator.addValidation("pin","req","Please enter a Pin Code");
			frmvalidator.addValidation("pin","numeric","Please enter a valid Pin Code");
			frmvalidator.addValidation("state","req","Please enter your State");
			frmvalidator.addValidation("dob","req","Please enter the date of birth");
			frmvalidator.addValidation("pmobile","req","Please enter a Parent's Mobile Number");
			frmvalidator.addValidation("pmobile","num","Mobile number should contain only numeric values");
			frmvalidator.addValidation("pmobile","minlen=10","Please enter 10 digit mobile number");
			frmvalidator.addValidation("smobile","req","Please enter a Student's Mobile Number");
			frmvalidator.addValidation("smobile","num","Mobile number should contain only numeric values");
			frmvalidator.addValidation("smobile","minlen=10","Please enter 10 digit mobile number");	
			frmvalidator.addValidation("religion","dontselect=000","Please select Religion");
			frmvalidator.addValidation("caste","dontselect=000","Please select Category");
			frmvalidator.addValidation("math","req","Please enter your Mathematics Marks");
			frmvalidator.addValidation("math","num","Marks should contain only numeric values");
			frmvalidator.addValidation("sci","req","Please enter your Science Marks");
			frmvalidator.addValidation("sci","num","Marks should contain only numeric values");
			frmvalidator.addValidation("total","req","Please enter your SSC Total Marks (OUT OF 500)");
			frmvalidator.addValidation("total","num","Marks should contain only numeric values");
			frmvalidator.addValidation("total","lessthan=501","Please Enter Marks OUT OF 500(If not Convert your marks OUT OF 500)");
			frmvalidator.addValidation("per","req","Please enter your Percentage");
			frmvalidator.addValidation("per","num","Percentage should contain only numeric values");
			frmvalidator.addValidation("pr_pic","req","Photo is required");
			
			</script>
           
          </section>