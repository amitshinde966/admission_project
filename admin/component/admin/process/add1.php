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
                <form role="form" method="POST">
				
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
                    </div>
					
                    <div class="form-group">
                      <label for="exampleInputEmail1">UserName</label>
                      <input type="text" name='uname' class="form-control" id="JohnCena123" placeholder="Enter UserName"  value="<?php if(isset($adminid)){ echo $adminid->ad_username; } ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name='pass' class="form-control" id="admin" placeholder="Password" value="<?php if(isset($adminid)){ echo $adminid->ad_pswd; } ?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputPassword1">Email-id</label>
                      <input type="email" name='email' class="form-control" id="abc@xyz.com" placeholder="Enter Email" value="<?php if(isset($adminid)){ echo $adminid->ad_email; } ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Type</label>
                      <input type="text" name='type' class="form-control" id="super/office staff" placeholder="Enter Admin Type" value="<?php if(isset($adminid)){ echo $adminid->ad_type; } ?>">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->

              

                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section>