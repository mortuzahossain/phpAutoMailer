<?php
include 'inc/header.php';
?>

		<div class="main-grid">
			<div class="social grid">
					<div class="grid-info">
						<div class="col-md-3 top-comment-grid">
							<div class="comments likes">
								<div class="comments-icon">
									<i class="fa fa-facebook"></i>
								</div>
								<div class="comments-info likes-info">
									<h3>95K</h3>
									<a href="#">Likes</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-3 top-comment-grid">
							<div class="comments">
								<div class="comments-icon">
									<i class="fa fa-comments"></i>
								</div>
								<div class="comments-info">
									<h3>12K</h3>
									<a href="#">Comments</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-3 top-comment-grid">
							<div class="comments tweets">
								<div class="comments-icon">
									<i class="fa fa-twitter"></i>
								</div>
								<div class="comments-info tweets-info">
									<h3>27K</h3>
									<a href="#">Tweets</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-3 top-comment-grid">
							<div class="comments views">
								<div class="comments-icon">
									<i class="fa fa-eye"></i>
								</div>
								<div class="comments-info views-info">
									<h3>557K</h3>
									<a href="#">Views</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
			</div>
			
			<div class="agile-grids">
				<div class="col-md-4 charts-right">
					<!-- area-chart -->
					<div class="area-grids">
						<div class="area-grids-heading">
							<h3>Area charts</h3>
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
					<!-- //area-chart -->
				</div>
				<div class="col-md-8 chart-left">
					<!-- updating-data -->
					<div class="agile-Updating-grids">
						<div class="area-grids-heading">
							<h3 class="text-center">::: Todos :::</h3>
							<form action="" method="post" class="form-inline text-center">
		                        <input class="form-control" type="text" name="todo" placeholder="To do task...">
		                        <button type="submit" class="btn btn-primary form-control">Save</button>
		                    </form>
							<hr>
							<table class="table table-striped">
		                        <tbody>
		                        	<tr>
			                            <td width="10%">#</td>
			                            <td width="80%">Task</td>
			                            <td width="20%" class="text-center">Action</td>
			                        </tr>
			                        <tr>
			                            <td width="10%">1</td>
			                            <td width="80%">This is test Task</td>
			                            <td width="20%"><a class="btn btn-primary mybtn">Update</a></td>
			                        </tr>
		                    	</tbody>
		                	</table>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>


<?php
include 'inc/footer.php';
?>