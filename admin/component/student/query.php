<?php
global $msg;
if(isset($_POST['add_sell_form']))
{
$fname=filter_var($_POST['first_name']);
$mname=filter_var($_POST['middle_name']);
$lname= filter_var($_POST['last_name']);
$mobile=filter_var($_POST['mobile_number']);
$class= filter_var($_POST['select_class']);
$email="";
$cost= filter_var($_POST['cost_of_form']);
$formid = filter_var($_POST['form_number']);
$addedon = filter_var(date("Y:m:d H:i:s"));
$ins=$db->query("INSERT INTO sell_form VALUES ('','$fname','$mname','$lname', '$mobile', '$email', '$class','$formid','$addedon','1','1')");
if($ins)
{
$msg="<div class='alert alert-success'>Form Sold!</div>";
}
else
{
$msg="<div class='alert alert-danger'>Form Not Sold!! </div>";
}
}

?>
<?php
if(isset($_POST['approve']))
{
$aid = filter_var($_POST['approve']);
$app = $db->query("UPDATE personal_details SET p_status= 2 WHERE pd_id='$aid'");
//$db->debug(); 
if($app)
{
$msg="<div class='alert alert-success'>Admission Approved</div>";
}
}
if(isset($_POST['deny']))
{
$aid = filter_var($_POST['deny']);
$app = $db->query("UPDATE personal_details SET p_status= 0 WHERE pd_id='$aid'");
//$db->debug(); 
if($app)
{
$msg="<div class='alert alert-danger'>Admission Denied</div>";
}
}
if(isset($_POST['print_general_merit']))
{
//require_once($_SERVER['DOCUMENT_ROOT']."/mit-pro/student/dompdf/dompdf_config.inc.php");
require_once($_SERVER['DOCUMENT_ROOT']."/mit-pro/student/dompdf/dompdf_config.inc.php");
				$g_merit_ad = $db->get_results("SELECT * FROM academic_details ORDER BY percent DESC");
				//$db->debug();
				foreach($g_merit_ad as $g_merit)
				{
				$data[$g_merit->a_id] = array('percentage' => $g_merit->percent, 'sci' => $g_merit->sci, 'math' => $g_merit->math, 'a_id' => $g_merit->a_id);
		}
//var_dump($ar);
// Obtain a list of columns
foreach ($data as $key => $row) {
    $volume[$key]  = $row['percentage'];
    $sci[$key] = $row['sci'];
      $math[$key] = $row['math'];
}
// Sort the data with volume descending, edition ascending
// Add $data as the last parameter, to sort by the common key
	$ar1=array_multisort($volume, SORT_DESC, $math, SORT_DESC, $sci, SORT_DESC, $data);
				$merit_no = 0;
				//echo '<pre>';
				//print_r($data);
				//echo '</pre>';
				foreach($data as $key=>$val)
				{
				$g_merit = $db->get_row("SELECT * FROM academic_details WHERE a_id = '$val[a_id]'");
				//$db->debug();
				if($g_merit==TRUE)
				{
				$g_merit1 = $db->get_row("SELECT * FROM personal_details WHERE pd_id = '$g_merit->pd_id'");
				if($g_merit1==TRUE && $g_merit1->s_id!='')
				{
				$g_merit2 = $db->get_row("SELECT * FROM sell_form WHERE s_id = '$g_merit1->s_id'");
				$c = $g_merit1->category;
				$g_merit_c = $db->get_row("SELECT * FROM category WHERE c_id = '$c'");
				//$db->debug();				
				$merit_no+=1;
$html =
      '<html><body><style>
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
<thead>
<tr>
<th>Merit Number</th>
<th>Last Name</th>
<th>First Name</th>
<th>Middle Name</th>
<th>Percentage</th>
<th>SSC Marks</th>
<th>Mathematics</th>
<th>Science</th>
<th>Category</th>
<th>Region</th>
</tr>
<tr>
<td>'.$merit_no.'</td>
<td>'.$g_merit2->s_lname.'</td>
<td>'.$g_merit2->s_fname.'</td>
<td>'.$g_merit2->s_mname.'</td>
<td>'.$g_merit->percent.'</td>
<td>'.$g_merit->total.'</td>
<td>'.$g_merit->math.'</td>
<td>'.$g_merit->sci.'</td>
<td>'.$g_merit_c->c_name.'</td>
<td>'.$g_merit1->city.'</td>
</tr>
<tbody>  
     </tbody> </table></body></html>';
//echo $name;
	  echo "test".$html;
	  $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    $output = $dompdf->output();
    $file_to_save = $_SERVER['DOCUMENT_ROOT']."/mit-pro/student/merit/merit_list.pdf";
    file_put_contents($file_to_save, $output);
	$dompdf->stream('merit_list.pdf');
}
}
}
}
?>
