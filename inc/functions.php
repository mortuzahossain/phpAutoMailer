<?php
include('db_config.php');
// Inserting Task
if (isset($_POST['task_save'])) {
	$task 		= $_POST['todo'];
	$sql 		= "INSERT INTO todos (tasks,visibility) VALUES ('$task',1)";
	$result     = mysqli_query($con,$sql);
	if ($result) {
		header('Location: ../index.php?message=taskadded');
        exit();
	} else {
		header('Location: ../index.php?message=error');
        exit();
	}
}