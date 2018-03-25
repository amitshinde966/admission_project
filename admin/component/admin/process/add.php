<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Admin</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" id="myform">
				
                  <div class="box-body"><?php
				  if(isset($msg))
				  {
						echo $msg;
				  }
				  if(isset($_GET['ad_id']))
				  {
					$adminid=$db->get_row("SELECT * FROM admin WHERE ad_id='$_GET[ad_id]'");
				  }
				  
				?>
                    <div class="box-body">
					<div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" name='name' class="form-control" id="John Cena" placeholder="Enter Name" value="<?php if(isset($adminid)){ echo $adminid->ad_name; } ?>">
					  <span id="myform_name_errorloc" class="label label-danger"></span>
                    </div>
					
                    <div class="form-group">
                      <label for="exampleInputEmail1">UserName</label>
                      <input type="text" name='uname' class="form-control" id="JohnCena123" placeholder="Enter UserName"  value="<?php if(isset($adminid)){ echo $adminid->ad_username; } ?>">
					  <span id="myform_uname_errorloc" class="label label-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name='pass' class="form-control" id="admin" placeholder="Password" value="<?php if(isset($adminid)){ echo $adminid->ad_pswd; } ?>">
						<span id="myform_pass_errorloc" class="label label-danger"></span>
					</div>
					<div class="form-group">
                      <label for="exampleInputPassword1">Email-id</label>
                      <input type="email" name='email' class="form-control" id="abc@xyz.com" placeholder="Enter Email" value="<?php if(isset($adminid)){ echo $adminid->ad_email; } ?>">
					  <span id="myform_email_errorloc" class="label label-danger"></span>
					  
                    </div>
					<?php 
					$type=$db->get_results("SELECT * FROM type");
					if($type)
					{
						?>
						<div class="form-group">
                      <label>Admin Type</label>
                      <select class="form-control" name="type">

					  
					  	<option value="00">Choose admin type...</option>
					<?php
					foreach($type as $type)
					{
					?>
                        <option value="<?php echo $type->t_id;  ?>"><?php echo $type->t_name; ?></option>
					<?php
					
					}
					
					?>
					
					  
                      </select>
					  
					  <?php
					  }
					  ?>
					  					   <span id="myform_type_errorloc" class="label label-danger"></span>
                    </div>                  
			</div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->

              

                  </form>
                </div><!-- /.box-body -->
				
				
				<script>
				
			var frmvalidator = new Validator("myform");
			frmvalidator.EnableOnPageErrorDisplay();
				frmvalidator.EnableMsgsTogether();
			frmvalidator.addValidation("name","req","Please enter your Name");
			frmvalidator.addValidation("type","dontselect=00","Please select your type");
			frmvalidator.addValidation("uname","req","Please enter your UserName");
			frmvalidator.addValidation("email","req","Please enter your Email");
			frmvalidator.addValidation("pass","req","Please enter your Password");
			frmvalidator.addValidation("pass","minlen=6","Password should be minimum 6 character");
				</script>
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section>