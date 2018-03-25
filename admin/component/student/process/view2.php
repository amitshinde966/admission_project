<?php
include_once('private/conn.php');
if(isset($_POST['save']))
{

echo '<pre>';
print_r($_POST);
echo '</pre>';

//Student personal details
$sname=$_POST['sname'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$gender=$_POST['gender'];
$addr1=$_POST['add1'];
if(isset($_POST['add2']))
{
$addr2=$_POST['add2'];
}
else
{
$addr2=NULL;
}
$branches = $_POST['branch'];


$city=$_POST['city'];
$pin=$_POST['pin'];
$state=$_POST['state'];
$caste=$_POST['caste'];
$pmobile=$_POST['pmobile'];
$smobile=$_POST['smobile'];
$personal=$db->query("INSERT INTO personal_details VALUES('','$sname','$fname','$mname','$gender','$addr1','$addr2','$city','$pin','$state','$caste','$pmobile','$smobile')");
//Student academic details
$id = $db->insert_id;
$math=$_POST['math'];
$sci=$_POST['science'];
$total=$_POST['total'];
$percent=$_POST['per'];
$academic=$db->query("INSERT INTO academic_details VALUES('','$id','$math','$sci','$total','$percent')");


//$db->debug();
$shift=$_POST['shift'];
foreach($branches as $key=>$value){
$insert = $db->query("INSERT INTO pd_br_data VALUES ('','$id','$key','$value','$shift')");
}

//Document details
if(isset($_POST['ssc'])) 
{
$ssc='YES';
}
else
{
$ssc='NO';
}
if(isset($_POST['hsc'])) 
{
$hsc='YES';
}
else
{
$hsc='NO';
}
if(isset($_POST['school_mr'])) 
{
$school_mr='YES';
}
else
{
$school_mr='NO';
}
if(isset($_POST['domacile'])) 
{
$domacile='YES';
}
else
{
$domacile='NO';
}
if(isset($_POST['lc'])) 
{
$lc='YES';
}
else
{
$lc='NO';
}
if(isset($_POST['income'])) 
{
$income='YES';
}
else
{
$income='NO';
}
if(isset($_POST['caste_c'])) 
{
$caste_c='YES';
}
else
{
$caste_c='NO';
}
$doc=$db->query("INSERT INTO document_d VALUES ('','$id','$ssc','$hsc','$school_mr','$domacile','$lc','$income','$caste_c')");

$row1=$db->get_row("SELECT * FROM personal_details ORDER BY pd_id DESC");
//$db->debug();
$srNO=$row1->pd_id;
//IMAGE UPLOAD CODE
$pr_pic=$_FILES['pr_pic']['name'];
$exp=explode('.',$pr_pic);
$ext=end($exp);
$destination=$_SERVER['DOCUMENT_ROOT'].'/mit/photo/'.$srNO.'.'.$ext;
$temp_name=$_FILES['pr_pic']['tmp_name'];
$file=move_uploaded_file($temp_name,$destination);
//END 

}
?>
<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Student Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" id="myform">
				
                  <div class="box-body">                    
				  <div class="form-group">
                      <label for="exampleInputEmail1">Student Full Name</label>
                      <input type="text" name="sname" class="form-control" id="John Cena" placeholder="Enter Student's Full Name" value="">
					  <span class="myform_name_errorloc"></span>
					  
					  
					  
                    </div>
					
                    <div class="form-group">
                      <label for="exampleInputEmail1">Father's Full Name</label>
                      <input type="text" name="fname" class="form-control" id="JohnCena123" placeholder="Enter Father's Full Name" value="">
					  <span class="myform_uname_errorloc"></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Mother's Full Name</label>
                      <input type="text" name="mname" class="form-control" id="JohnCena123" placeholder="Enter Mother's Full Name" value="">
                    </div>
					<div class="form-group">
                                            <label for="email_id">Email Id</label>
                                            <input name="email_id" value="" type="email" placeholder="Enter Email Id" id="email_id" class="form-control">
											<span class="label label-danger" id="basicdetails_email_id_errorloc"></span>
										</div>
					<div class="form-group">
										<label for="select_gender">Select Gender</label>
                                             <select name="select_gender" id="select_gender" class="form-control">
												 <option value="000">--Select Gender--</option>
												 <option value="m"> Male </option>
												 <option value="f"> Female </option>
											</select>
											
											<script type="text/javascript">
																						</script>
											<span class="label label-danger" id="basicdetails_select_gender_errorloc"></span>
                                        </div>
										<div class="form-group">
                      <label>Address for Correspondence:</label>
                      <textarea class="form-control" rows="3" placeholder="Enter Address for Correspondence" name='add1'></textarea>
                    </div>
					<div class="form-group">
                      <label>Permenant Address:</label>
                      <textarea class="form-control" rows="3" placeholder="Enter Permenant Address" name='add2'></textarea>
                    </div>
					<div class="form-group">
                    <label>Date Of Birth:</label>
                    <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="" placeholder="MM/DD/YYYY">
                    </div><!-- /.input group -->
                  </div>
                    </div><!-- /.input group -->
					<div class="form-group">
                      <label for="exampleInputPassword1">Parent's Mobile No./Contact No.:</label>
                      <input type="number" name="parentmobile" class="form-control" id='123123' placeholder="Enter Parent's Mobile Number" value="">
					 
					  
                    </div>
						<div class="form-group">
                      <label>Student's Mobile No./Contact No.:</label>
					  <input type="text" name="studentmobile" class="form-control" placeholder="Enter Student's Mobile Number" value="">
					   </div>
					   <div class="form-group">
                                            <label for="religion">Select Religion</label>
                                            <select class="form-control" name="religion" id="religion">
                                            	<option value="000">--Select Religion--</option>
                                            	                                            	<option value="1">Hinduism</option>
                                            	                                            	<option value="2">Islam</option>
                                            	                                            	<option value="3">Christianity</option>
                                            	                                            	<option value="4">Sikhism</option>
                                            	                                            	<option value="5">Buddism</option>
                                            	                                            	<option value="6">Jainism</option>
                                            	                                            	<option value="7">Zoroastrianism</option>
                                            	                                            	<option value="8">Judaism</option>
                                            	                                            	</select>
												<span class="label label-danger" id="castedetails_religion_errorloc"></span>
                                            	  
                                            </div>
                               

					  <div class="form-group">  
                                         <label for="category">Select Category</label>
                                         <select name="category" id="category" class="form-control" onchange="loaddocs();">
                                          	 <option value="000">--Select Category--</option>
                                                                    
                                                    <option value="1">Open</option>
                                           		                         
                                                    <option value="2">SC</option>
                                           		                         
                                                    <option value="3">ST</option>
                                           		                         
                                                    <option value="4">VJNT</option>
                                           		                         
                                                    <option value="5">OBC</option>
                                           		                         
                                                    <option value="6">NT-1</option>
                                           		                         
                                                    <option value="7">NT-2</option>
                                           		                         
                                                    <option value="8">NT-3</option>
                                           		                         
                                                    <option value="9">SBC</option>
                                           		</select>
												<span class="label label-danger" id="castedetails_category_errorloc"></span>
                                           </div>					                      
										  <div class="form-group">
                                           <label for="last">Last School Attented:</label>
                                            <input name="last_school" value="" type="text" placeholder="Enter School Name" id="last_school" class="form-control">
											<span class="label label-danger" id="castedetails_last_school_errorloc"></span>
                                           </div>
                                            
                                      <div class="form-group">
                                           <label for="annual">Parent's Annual Income:<span class="label label-danger">Compulsory</span></label>
                                            <input name="income" value="" type="text" placeholder="Enter Annual Income" id="income" class="form-control">
											<span class="label label-danger" id="castedetails_income_errorloc"></span>
                                           </div>   
                  </div>
				  
				  
                  </div>
	                <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>								
					               
			</div><!-- /.box-body -->

  
                
              </div></form><!-- /.box -->

              

                  
                </div><!-- /.box-body -->
				
				
				<script>
			var frmvalidator = new Validator("myform");
			frmvalidator.addValidation("name","req","Please enter your Name");
			frmvalidator.addValidation("type","req","Please select your type");
			frmvalidator.addValidation("uname","req","Please enter your UserName");
			frmvalidator.addValidation("email","req","Please enter your Email");
			frmvalidator.addValidation("pass","req","Please enter your Password");
			frmvalidator.addValidation("pass","minlen=6","Password should be minimum 6 character");
				</script>
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </section>