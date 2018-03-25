<?php 
$editid=$_GET['id'];
$get_register_addndetails=$db->get_row("SELECT * FROM personal_details WHERE pd_id='$editid'");
//$db->debug();
//$get_register_addndetails=$db->get_row("SELECT * FROM personal_details WHERE pd_id='$editid'");
//print_r($display);
$r = $get_register_addndetails->religion;
$c = $get_register_addndetails->category;
$rel = $db->get_row("SELECT * FROM s_religion WHERE s_r_id='$r'");
$cat = $db->get_row("SELECT * FROM category WHERE c_id='$c'");
$ac_det = $db->get_row("SELECT * FROM academic_details WHERE pd_id='$editid'");
$doc = $db->get_row("SELECT * FROM document_d WHERE pd_id='$editid'");
?>

<div class="box box-solid box-primary">
      <div class="box-header">
           <h3 class="box-title"><i class="fa fa-info-circle"></i> Full Profile</h3>                                    
       </div><!-- /.box-header -->
    <div class="box-body table-responsive">
	
<?php 

//echo "<br> WELCOME ".$user;
$file=$_SERVER['DOCUMENT_ROOT'].'/mit-pro/student/photos/'.$editid.'.jpg';
if(is_file($file))
{
$name=$editid.'.jpg';
}
else
{
$file=$_SERVER['DOCUMENT_ROOT'].'/mit-pro/student/photos/'.$editid.'.png';
if(is_file($file))
{
$name=$editid.'.png';
}
}
?>

<style>
#prImg{
    width: 18%;
    border-radius: 25px;
	}
</style>

<?php
if(isset($name))
{
?>
<img src='<?php echo site_root; ?>student/photos/<?php echo $name;?>' id='prImg'>
<?php
}
?>


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
				<td>Student Full Name</td>
				<td><?php echo $get_register_addndetails->student_name; ?> </td>
				</tr>
				
				<tr>
				<td>Father's Full Name</td>
				<td><?php echo $get_register_addndetails->father_name; ?></td>
				</tr>
				
				
				<tr>
				<td>Mother's Full Name</td>
				<td><?php echo $get_register_addndetails->mother_name; ?></td>				
			 </tr>
				
				<tr>
				<td>Email-id</td>
				<td><?php echo $get_register_addndetails->email;?></td>
				</tr>
				<tr>
				<td>Gender</td>
				<td><?php echo $get_register_addndetails->gender;?></td>
				</tr>
				<tr>
				<td>Permanent Address</td>
				<td><?php echo $get_register_addndetails->permanent_addr;?></td>
				</tr>
				
				<?php
				if($get_register_addndetails->addr2){
				?>
				<tr>
				<td>Address for Correspondence</td>
				<td><?php echo $get_register_addndetails->addr2;?></td>
				</tr>
				<?php
				}
				?>
				<tr>
				<td>City</td>
				<td><?php echo $get_register_addndetails->city;?></td>
				</tr>
				<tr>
				<td>Pin</td>
				<td><?php echo $get_register_addndetails->pin;?></td>
				</tr>
				<tr>
				<td>State</td>
				<td><?php echo $get_register_addndetails->state;?></td>
				</tr>
				<tr>
				<td>Date Of Birth</td>
				<td><?php echo $get_register_addndetails->dob;?></td>
				</tr>
				<tr>
				<td>Parent's Mobile Number</td>
				<td><?php echo $get_register_addndetails->p_mobile;?></td>
				</tr>
				<tr>
				<td>Student's Mobile Number</td>
				<td><?php echo $get_register_addndetails->s_mobile;?></td>
				</tr>
				<tr>
				<td>Religion</td>
				<td><?php echo $rel->s_r_name;?></td>
				</tr>
				<tr>
				<td>Category</td>
				<td><?php echo $cat->c_name;?></td>
				</tr>
				<td>Mathematics Marks</td>
				<td><?php echo $ac_det->math;?></td>
				</tr>
				</tr>
				<td>Science Marks</td>
				<td><?php echo $ac_det->sci;?></td>
				</tr>
				<tr>
				<td>Total Marks</td>
				<td><?php echo $ac_det->total;?></td>
				</tr>
				<tr>
				<td>Percentage</td>
				<td><?php echo $ac_det->percent;?>%</td>
				</tr>
				<tr>
				<td>S.S.C. Marksheet</td>
				<td><?php echo $doc->ssc;?></td>
				</tr>
				<td>H.S.C. Marksheet</td>
				<td><?php echo $doc->hsc;?></td>
				</tr>
				<td>Mark Sheet for VIII,IX / Proforma Z</td>
				<td><?php echo $doc->school;?></td>
				</tr>
				<td>Domicile Certificate</td>
				<td><?php echo $doc->domicile;?></td>
				</tr>
				<td>School/College Leaving Certificate</td>
				<td><?php echo $doc->lc;?></td>
				</tr>
				<td>Income Certificate</td>
				<td><?php echo $doc->income;?></td>
				</tr>				
				<td>Caste Certificate</td>
				<td><?php echo $doc->caste;?></td>
				</tr>				
				
				 
      

				
				
				
				
				
				
</tbody>
</table>
<br>
<form method="POST" action="">
<div align="right">
<align=RIGHT><input type="submit" class="btn btn-primary" name="print" value="Print"> </align>
</div>
</form>
</div>
</div>