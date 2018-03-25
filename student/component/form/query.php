<?php 
$sid=$_SESSION['s_id'];
$user= $db->get_row("SELECT * FROM sell_form WHERE s_id='$sid'");
	
if(isset($_POST['submit']))
{
//Student personal details
$sname=$_POST['sname'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$email=$_POST['email'];
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
//$branches = $_POST['branch'];


$city=$_POST['city'];
$pin=$_POST['pin'];
$state=$_POST['state'];
$dob=$_POST['dob'];
//print_r($dob);
$caste=$_POST['caste'];
$religion=$_POST['religion'];
$pmobile=$_POST['pmobile'];
$smobile=$_POST['smobile'];
$se=$db->query("UPDATE sell_form SET s_email='$email' WHERE s_id='$sid'");
$addedon = filter_var(date("Y:m:d H:i:s"));
$personal=$db->query("INSERT INTO personal_details VALUES('','$sid','$sname','$fname','$mname','$email','$gender','$addr1','$addr2','$city','$pin','$state','$dob','$caste','$religion','$pmobile','$smobile','$addedon','1')");
//Student academic details
$id = $db->insert_id;
$math=$_POST['math'];
$sci=$_POST['sci'];
$total=$_POST['total'];
$percent=$_POST['per'];
$academic=$db->query("INSERT INTO academic_details VALUES('','$sid','$id','$math','$sci','$total','$percent')");


//$db->debug();
/*$shift=$_POST['shift'];
foreach($branches as $key=>$value){
$insert = $db->query("INSERT INTO pd_br_data VALUES ('','$id','$key','$value','$shift')");
}
*/
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
$doc=$db->query("INSERT INTO document_d VALUES ('','$sid','$id','$ssc','$hsc','$school_mr','$domacile','$lc','$income','$caste_c')");
$sub = $db->query("INSERT INTO submit VALUES('$sid','','$id','1')");
$user1 = $db->get_row("SELECT * FROM personal_details WHERE s_id='$sid'");

header('location:'.site_root.'student/index.php?folder=form&file=view_form&id='.$user1->pd_id);
}
if(isset($_FILES['pr_pic']))
{
$pd = $db->get_row("SELECT * FROM personal_details WHERE s_id='$sid'");
$srNO=$pd->pd_id;
$pr_pic=$_FILES['pr_pic']['name'];
$exp=explode('.',$pr_pic);
$ext=end($exp);
$destination=$_SERVER['DOCUMENT_ROOT'].'/mit-pro/student/photos/'.$srNO.'.'.$ext;
$temp_name=$_FILES['pr_pic']['tmp_name'];
$file1=move_uploaded_file($temp_name,$destination);

}
if(isset($_POST['print']))
{
require_once($_SERVER['DOCUMENT_ROOT']."/mit-pro/student/dompdf/dompdf_config.inc.php");
$user2 = $db->get_row("SELECT * FROM personal_details WHERE s_id='$sid'");
$acad = $db->get_row("SELECT * FROM academic_details WHERE s_id='$sid'");
$docd = $db->get_row("SELECT * FROM document_d WHERE s_id='$sid'");
$r = $user2->religion;
$c = $user2->category;
$rel = $db->get_row("SELECT * FROM s_religion WHERE s_r_id='$r'");
$cat = $db->get_row("SELECT * FROM category WHERE c_id='$c'");
$file=$_SERVER['DOCUMENT_ROOT'].'/mit-pro/student/photos/'.$user2->pd_id.'.jpg';
if(is_file($file))
{
$name=$user2->pd_id.'.jpg';
}
else
{
$file=$_SERVER['DOCUMENT_ROOT'].'/mit-pro/student/photos/'.$user2->pd_id.'.png';
if(is_file($file))
{
$name=$user2->pd_id.'.png';
}
}

$html =
      '<html><body>'.
      '<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    text-align: left;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    background-color: #4CAF50;
    color: white;
}
</style>
	  <table id="customers">
	  <tr>
	  <td colspan ="2">
		<img src='.site_root.'student/photos/'.$name.' style="width:1000%;">
		</td>
		</tr>
		
	  <tr>
	  
	  <td>Student Full Name</td><td>'.$user2->student_name.'</td>
	  </tr><tr><td>Fathers Full Name</td><td>'.$user2->father_name.'</td>
	  </tr><tr><td>Mothers Full Name</td><td>'.$user2->mother_name.'</td>
	  </tr><tr><td>Email</td><td>'.$user2->email.'</td>
	  </tr><tr><td>Gender</td><td>'.$user2->gender.'</td>
	  </tr><tr><td>Permanent Address</td><td>'.$user2->permanent_addr.'</td>
	  </tr><tr><td>City</td><td>'.$user2->city.'</td>
	  </tr><tr><td>Pin</td><td>'.$user2->pin.'</td>
	  </tr><tr><td>State</td><td>'.$user2->state.'</td>
	  </tr><tr><td>Date of birth</td><td>'.$user2->dob.'</td>
	  </tr><tr><td>Category</td><td>'.$cat->c_name.'</td>
	  </tr><tr><td>Religion</td><td>'.$rel->s_r_name.'</td>
	  </tr><tr><td>Parents mobile number</td><td>'.$user2->p_mobile.'</td>
	  </tr><tr><td>Students mobile number</td><td>'.$user2->s_mobile.'</td>
	  </tr><tr><td>Mathematics Marks</td><td>'.$acad->math.'</td>
	  </tr><tr><td>Science Marks</td><td>'.$acad->sci.'</td>
	  </tr><tr><td>Total Marks</td><td>'.$acad->total.'</td>
	  </tr><tr><td>Percentage</td><td>'.$acad->percent.'%</td>
	  </tr><tr><td>SSC Marksheet</td><td>'.$docd->ssc.'</td>
	  </tr><tr><td>HSC Marksheet</td><td>'.$docd->hsc.'</td>
	  </tr><tr><td>Mark Sheet for VIII,IX / Proforma Z</td><td>'.$docd->school.'</td>
	  </tr><tr><td>Domicile Certificate</td><td>'.$docd->domicile.'</td>
	  </tr><tr><td>School/College Leaving Certificate</td><td>'.$docd->lc.'</td>
	  </tr><tr><td>Income Certificate</td><td>'.$docd->income.'</td> 
	  </tr><tr><td>Caste Certificate</td><td>'.$docd->caste.'</td>
	  </tr>
	  
	  </table>
	  
      </body></html>';
//echo $name;
	  $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    $output = $dompdf->output();
    $file_to_save = $_SERVER['DOCUMENT_ROOT']."/mit-pro/student/pdf/".$user2->pd_id.".pdf";
    //file_put_contents($file_to_save, $output);
	$dompdf->stream($user2->pd_id.'.pdf');
	
	}

?>