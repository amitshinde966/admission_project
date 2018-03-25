<?php 

$display = '';
$page = $_GET['folder'];
$display = $db->get_results("SELECT * FROM personal_details WHERE p_status = 1 ORDER BY pd_id DESC LIMIT 30");
if(isset($_POST['add_search']))
{
	
	$date1=$_POST['startdate'];
	$date2=$_POST['enddate'];

	$date1 = date("Y-m-d",strtotime($date1));
	$date2 = date("Y-m-d",strtotime($date2));

	echo 'date is:'.$date1;
	$count=$db->get_var("SELECT COUNT(*) FROM personal_details WHERE p_addedon >= '$date1' AND p_addedon <= '$date2' ");

	echo 'count is:';
	
	$display = $db->get_results("SELECT * FROM personal_details WHERE p_addedon >= '$date1' AND p_addedon <= '$date2'");
}


?>
<?php
if(isset($msg))
{
echo $msg;
}
?>
     



<div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-solid box-info">
                                <div class="box-header">
                                    <h3 class="box-title "><i class="fa fa-fw fa-search"></i>Search Number Of Entries</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
								
					<form action="" method="post" id="search" role="form">
							
						<div class="form-group col-xs-6\">	
							<label for="startdate">Start Date:-</label>
<!-- 							<div class="input-group">	 -->
							
								   <div class="input-group date">
							            <input type="text" id="startdate" placeholder="Enter Date in yyyy/mm/dd Format" name="startdate"  class="form-control"><span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
							        </div>
							
<!-- 								<input type="date" id="startdate" placeholder="Enter Date in dd-mm-yyyy Format" name="startdate" class="form-control"> -->
<!-- 								<span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span> -->
<!-- 							</div> -->
							<span class="label label-danger" id="search_startdate_errorloc"></span>
						</div>
							
						<div class="form-group"
							<label for="enddate">End Date:-</label>
							<div class="input-group date">
								<input type="text" id="enddate" placeholder="Enter Date in yyyy/mm/dd Format" name="enddate" class="form-control">
								<span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
							</div>
							<span class="label label-danger" id="search_enddate_errorloc"></span>
						</div>
							
						<div class="box-footer">
							<div class="input-group">
								<input type="submit" class="btn btn-primary" name="add_search" value="Search">
								<input type="reset" name="reset" value="Reset" class="btn btn-danger" />
							</div>
						</div>		
					</form>
							
							</div><!-- /.box-body -->
</div>	
<div class="col-md-12">						
<?php if($display)
{ ?>
<div class="box box-solid box-primary">
      <div class="box-header">
           <h3 class="box-title"><i class="fa fa-fw fa-search"></i>Search Result</h3>                                    
       </div><!-- /.box-header -->
    <div class="box-body table-responsive">

<table  id="datatable" class="table table-bordered table-striped">
<thead>
<tr>
<td>Id</td>
<td>Name</td>
<td>Mobile Number</td>
<td>Email</td>
<td>Added On</td>
<!-- <td>Added By</td> -->
<td>Options</td>
</tr></thead>
<tbody>
<?php  

foreach($display as $get_register_form) { ?>
<tr>
<td><?php echo $get_register_form->pd_id; ?></td>
<td><?php echo $get_register_form->student_name;?></td>
<td><?php echo $get_register_form->p_mobile; ?></td>
<td><?php echo $get_register_form->email; ?></td>
<td><?php echo $get_register_form->p_addedon; ?></td>
<!-- <td> -->
<?php //$admin=$db->get_row("SELECT *FROM mit_admin WHERE ma_id='$get_register_form->mrf_id'");

//echo $admin->ma_name; ?>
<!-- </td> -->
<td>
<form method="POST" action="">
<a href="index.php?folder=<?php echo $page ;?>&file=full_profile&id=<?php echo $get_register_form->pd_id; ?>" class="btn btn-info"><i class="fa fa-fw fa-eye" data-toggle="tooltip" title="View Full Profile"></i></a>
<!--<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-remove" data-toggle="tooltip" title="Delete"></i></button>-->
						
<input type="hidden"  name='approve' value="<?php echo $get_register_form->pd_id; ?>">
<button class="btn btn-success" type="submit"><i class="fa fa-fw fa-check" data-toggle="tooltip" title="Approve"></i></button>
<button class="btn btn-danger" type="submit" name='deny' value="<?php echo $get_register_form->pd_id; ?>"><i class="fa fa-fw fa-remove" data-toggle="tooltip" title="Deny"></i></button> 
</form>
 </td>
</tr>
<?php } 
?></tbody>
</table>
						</div>
		</div>
	<?php } ?>						
</div><!-- /.box -->

<script type="text/javascript">
var frmvalidator = new Validator("search");
frmvalidator.EnableOnPageErrorDisplay();
frmvalidator.EnableMsgsTogether();
frmvalidator.addValidation("startdate","req","Please Enter Start Date.");
frmvalidator.addValidation("enddate","req","Please Enter End Date.");
</script>