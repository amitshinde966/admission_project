<section class="content">
          <div class="row">

<div class="col-xs-12">

<div class="box">
                <div class="box-header">
                  <h3 class="box-title">ADMIN</h3>
				  <a href="?folder=admin&file=add" ><div align="right"><i class="fa fa-fw fa-user-plus" data-toggle="tooltip" title="Add"></div></i><!--<i class="fa fa-fw fa-plus-circle"></i>--></a>
                </div><!-- /.box-header -->
                <div class="box-body">
				<?php
				$adminresult=$db->get_results("SELECT * FROM admin WHERE row_status=1");
				$admintype=$db->get_results("SELECT * FROM type");
				//$db->debug();
				if($adminresult)
				{
					?>
					
					                 <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr>
					  <th>ID</th>
					  <th>Name</th>
					  <th>Username</th>
					  <th>Email</th>
					  <th>Admin Type</th>
					  <th>Options</th>
					  </tr>
                    </thead>
                    <tbody>

					<?php
					foreach($adminresult as $res)
					{
						$t = $db->get_row("SELECT * FROM type WHERE t_id='$res->ad_type'");
						?>
						<tr>
						<td><?php echo $res->ad_id; ?> </td>
						<td><?php echo $res->ad_name; ?> </td>
						<td><?php echo $res->ad_username; ?> </td>
						<td><?php echo $res->ad_email; ?> </td>
						<td><?php echo $t->t_name ?> </td>
						<td><a  href="?folder=admin&file=add&ad_id=<?php echo $res->ad_id;?>" class="btn btn-primary"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i>
						<!--<i class="fa fa-fw fa-pencil-square" data-toggle="tooltip" title="Edit"> </i>--></a>
						
						<!--<a href="?folder=admin&file=view&deleteid=<?php echo $res->ad_id;?>"><i class="fa fa-fw fa-remove" data-toggle="tooltip" title="delete"> </i></a>-->
						<form method="POST" action="">
						<input type="hidden" value="<?php echo $res->ad_id; ?>" name="deleteid" />
						<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-remove" data-toggle="tooltip" title="Delete"></i></button>
						</form>
				
						</td>
						
						</tr>
						<?php
					}
				}
				else
				{
					echo "<div class='alert alert-danger'>Data not available</div>";
				}
				
				
			
				?>
				
				</tbody>
                    
                  </table>
				  
				  </div>
                </div><!-- /.box-body -->
              </div>
			  </div>
			  </div>
			  </section>