<?php 
$editid=$_GET['id'];
$get_register_addndetails=$db->get_row("SELECT * FROM sell_form WHERE s_id='$editid'");
//print_r($display);
?>
<div class="box box-solid box-primary">
      <div class="box-header">
           <h3 class="box-title"><i class="fa fa-info-circle"></i> Full Profile</h3>                                    
       </div><!-- /.box-header -->
    <div class="box-body table-responsive">

<table   class="table table-bordered  table-striped table-responsive">
<thead>
<tr>
<th>FieldName</th>
<th>details</th>
</tr></thead>
<tbody>
				<tr>
				<td>Id</td>
				<td><?php echo $get_register_addndetails->s_id; ?></td>
				</tr>
				
				<tr>
				<td>First Name</td>
				<td><?php echo $get_register_addndetails->s_fname; ?> </td>
				</tr>
				
				<tr>
				<td>Middle Name</td>
				<td><?php echo $get_register_addndetails->s_mname; ?></td>
				</tr>
				
				
				<tr>
				<td>Last Name</td>
				<td><?php echo $get_register_addndetails->s_lname; ?></td>				
			 </tr>
				
				<tr>
				<td>Mobile Number</td>
				<td><?php echo $get_register_addndetails->s_mobile_number?></td>
				</tr>
				<tr>
				<td>Email-Id</td>
				<td><?php echo $get_register_addndetails->s_email?></td>
				</tr>
				<tr>
				<td>Date</td>
				<td><?php echo $get_register_addndetails->s_addedon?></td>
				</tr>
</tbody>
</table>
</div>
</div>