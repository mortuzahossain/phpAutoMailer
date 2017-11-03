<?php
	session_start();
	if (isset($_SESSION['active'])) {
		session_unset();
		session_destroy();
		header('Location: login.php?message=logout');
		exit();
	} else {
		session_unset();
		session_destroy();
	    header('Location: login.php?message=accessdenied');
	    exit(); 
	}
?>