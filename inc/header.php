<?php

session_start();
if(! isset($_SESSION['active'])){
    header('Location: login.php');
    exit();
}


include('inc/db_config.php');

?>

<!DOCTYPE html>
<head>
	<title>PHP - AutoMailer || Mortuza Hossain</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/bootstrap.css">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.min.css" rel="stylesheet"> 

	<script src="js/jquery.min.js"></script>
	<script src="js/modernizr.js"></script>
	<script src="js/screenfull.js"></script>
	<script>
	$(function () {
		$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

		if (!screenfull.enabled) {
			return false;
		}
		$('#toggle').click(function () {
			screenfull.toggle($('#container')[0]);
		});	
	});
	</script>
	<script src="js/raphael-min.js"></script>
	<script src="js/morris.js"></script>
	
	
</head>
<body class="dashboard-page">
	<nav class="main-menu">
		<ul>
			<li>
				<a href="index.php">
					<i class="fa fa-home nav_icon"></i>
					<span class="nav-text">
					Dashboard
					</span>
				</a>
			</li>
			<li class="has-subnav">
				<a href="">
					<i class="fa fa-folder" aria-hidden="true"></i>
					<span class="nav-text">
						Mails
					</span>
					<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li><a class="subnav-text" href="#">All Mail</a></li>
					<li><a class="subnav-text" href="#">Read</a></li>
					<li><a class="subnav-text" href="#">Unread</a></li>
					<li><a class="subnav-text" href="#">Trash</a></li>
				</ul>
			</li>
			<li class="has-subnav"><a href=""><i class="fa fa-users nav_icon"></i><span class="nav-text">Send Bulk</span><i class="icon-angle-right"></i><i class="icon-angle-down"></i></a>
				<ul>
					<li>
						<a class="subnav-text" href="">Group</a>
					</li>
					<li>
						<a class="subnav-text" href="">Single</a>
					</li>
					<li>
						<a class="subnav-text" href="">History</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="todo.php">
					<i class="fa fa-check nav_icon"></i>
					<span class="nav-text">
						Todo
					</span>
				</a>
			</li>
		</ul>
		<ul class="logout">
			<li><a href="logout.php"><i class="icon-off nav-icon"></i><span class="nav-text">Logout</span></a></li>
		</ul>
	</nav>

	<section class="wrapper scrollable">
		<nav class="user-menu">
			<a href="javascript:;" class="main-menu-access">
			<i class="icon-proton-logo"></i>
			<i class="icon-reorder"></i>
			</a>
		</nav>
		<section class="title-bar">
			<div class="logo">
				<h1><a href="index.php"><img src="images/logo.png" alt="" />AutoMailer</a></h1>
			</div>
			<div class="full-screen">
				<section class="full-top">
					<button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>	
				</section>
			</div>
			<div class="w3l_search">
				<form action="" method="post">
					<input type="text" name="search" placeholder="Search" required="1">
					<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
			</div>
			<div class="header-right">
				<div class="profile_details_left">
					<div class="header-right-left">
						<ul><p class="user-name"><?php echo $_SESSION['username']; ?></p></ul>
					</div>
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span class="prfil-img"><i class="fa fa-user" aria-hidden="true"></i></span> 
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
									<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</section>
