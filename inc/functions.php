<?php
include('db_config.php');
// Inserting Task From Index Page
if (isset($_POST['task_save'])) {
	add_task('index',$result);
}

function add_task($page,$result)
{
	global $con;
	$task 		= $_POST['todo'];
	$sql 		= "INSERT INTO todos (tasks,visibility) VALUES ('$task',1)";
	$result     = mysqli_query($con,$sql);

	if ($result) {
		$location = "Location: ../".$page.".php?message=taskadded";
		redirect($location);
	} else {
		$location = "Location: ../".$page.".php?message=error";
		redirect($location);
	}
}

function redirect($location)
{
	header($location);
	exit();
}