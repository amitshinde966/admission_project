<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
</head>
<body>
 
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">General Merit List</a></li>
    <!--<li><a href="#tabs-2">Open</a></li>-->
    <!--<li><a href="#tabs-3">SC</a></li>
	<li><a href="#tabs-4">ST</a></li>
	<li><a href="#tabs-5">VJNT</a></li>
	<li><a href="#tabs-6">OBC</a></li>
	<li><a href="#tabs-7">NT-1</a></li>
	<li><a href="#tabs-8">NT-2</a></li>
	<li><a href="#tabs-9">NT-3</a></li>
	<li><a href="#tabs-10">SBC</a></li>-->
	</ul>
  <div id="tabs-1">
   <table   class="table table-bordered  table-striped table-responsive">
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
<tbody>
				
				<?php
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
				?>
				<tr>
				<td><?php echo $merit_no; ?></td>
				<td><?php echo $g_merit2->s_lname; ?></td>
				<td><?php echo $g_merit2->s_fname; ?></td>
				<td><?php echo $g_merit2->s_mname; ?></td>
				<td><?php echo $g_merit->percent; ?></td>
				<td><?php echo $g_merit->total; ?></td>
				<td><?php echo $g_merit->math; ?></td>
				<td><?php echo $g_merit->sci; ?></td>
				<td><?php echo $g_merit_c->c_name; ?></td>
				<td><?php echo $g_merit1->city; ?></td>
				
				
				</tr>
				<?php
				}
				}
				}
				?>
				
								
				</tbody>
</table>
<form method='POST'>
<div align="right">
<align=RIGHT><input type="submit" class="btn btn-primary" name="print_general_merit" value="Print General Merit List"> </align>
</div>
</form>
</div>

<!--<div align="right">
<align=right><input type="submit" class="btn btn-primary" name="print_merit" value="Print"> 
</align=right></div>
  </div>-->
  <!--<div id="tabs-2">
    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
  </div>
  <div id="tabs-3">
    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
  </div>
   <div id="tabs-4">
    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
  </div>-->
</div>

 
 
</body>
</html>