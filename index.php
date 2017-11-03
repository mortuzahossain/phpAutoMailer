<?php
include 'inc/header.php';

?>


<?php if (isset($_GET['message'])) { $message = $_GET['message']; ?>

<div class="clearfix"> </div>
<div class="message container">
	<div class="row">
		<div class="col-m4-12 text-center">
		<?php

		 	if ($message == 'success'){
				echo "<h2>Welcome ".$_SESSION['username']."</h2>";
			}
		 	if ($message == 'taskadded'){
				echo "<h2>Task Added successfully.</h2>";
			}
		 	if ($message == 'error'){
				echo "<h2>Some error occurred during adding task.</h2>";
			}
			
		?>
		</div>
	</div>
</div>

<?php } ?>

<div class="main-grid">
	<div class="social grid">
			<div class="grid-info">
				<div class="col-md-3 top-comment-grid">
					<div class="comments likes">
						<div class="comments-icon">
							<i class="fa fa-database"></i>
						</div>
						<div class="comments-info likes-info">
							<h3>95K</h3>
							<a href="#">All Mail</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 top-comment-grid">
					<div class="comments">
						<div class="comments-icon">
							<i class="fa fa-envelope"></i>
						</div>
						<div class="comments-info">
							<h3>12K</h3>
							<a href="#">Unread</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 top-comment-grid">
					<div class="comments tweets">
						<div class="comments-icon">
							<i class="fa fa-envelope-open"></i>
						</div>
						<div class="comments-info tweets-info">
							<h3>27K</h3>
							<a href="#">Read</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 top-comment-grid">
					<div class="comments views">
						<div class="comments-icon">
							<i class="fa fa-trash"></i>
						</div>
						<div class="comments-info views-info">
							<h3>557K</h3>
							<a href="#">Trash</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
	</div>
	
	<div class="agile-grids">
		<div class="col-md-4 charts-right">
			<div class="area-grids">
				<div class="area-grids-heading">
					<h3>Messaging Chart</h3>
				</div>
				<div id="graph4"></div>
				<script>
					Morris.Donut({
					  element: 'graph4',
					  data: [
						{value: 70, label: 'foo', formatted: 'at least 70%' },
						{value: 15, label: 'bar', formatted: 'approx. 15%' },
						{value: 10, label: 'baz', formatted: 'approx. 10%' },
						{value: 5, label: 'A really really long label', formatted: 'at most 5%' }
					  ],
					  formatter: function (x, data) { return data.formatted; }
					});
				</script>

			</div>
		</div>
		<div class="col-md-8 chart-left">


			<div class="agile-Updating-grids">
				<div class="area-grids-heading">
					<h3 class="text-center">::: Todo :::</h3>
					<form action="inc/functions.php" method="post" class="form-inline text-center">
                        <input class="form-control" type="text" name="todo" placeholder="To do task..." required="1">
                        <button type="submit" name="task_save" class="btn btn-primary form-control">Save</button>
                    </form>
					<hr>
<?php
$sql 			= "SELECT tasks FROM todos WHERE visibility = 1 ORDER BY id DESC LIMIT 10";
$result         = mysqli_query($con,$sql);
$have_tasks     = mysqli_num_rows($result);
if($have_tasks>0){
	// Making Tasks Array
	while ($row = mysqli_fetch_assoc($result)) {
	    $tasks[] = $row;
	}
	$serial_no = 0;
?>
					<table class="table table-striped" id="table">
                        <tbody>
                        	<tr>
	                            <td width="10%">#</td>
	                            <td width="80%">Task</td>
	                            <td width="20%" class="text-center">Action</td>
							</tr>
<?php foreach ($tasks as $key) { $serial_no++; ?>							
	                        <tr>
	                            <td width="10%"><?php echo $serial_no; ?></td>
	                            <td width="80%"><?php echo $key['tasks']; ?></td>
	                            <td width="20%"><a  class="btn btn-primary mybtn">Update</a></td>
							</tr>
<?php } ?>						
                    	</tbody>
                	</table>
<?php } else { ?>
<h2>No Tasks Available .</h2>
<?php } ?>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>






<?php
include 'inc/footer.php';
?>