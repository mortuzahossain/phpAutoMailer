<?php

	// If User Already Login

	session_start();
	if(isset($_SESSION['active'])){
	    header('Location: index.php?message=alreadylogin');
	    exit();
	}

	include('inc/db_config.php');

	// Check if register button click or not

	if (isset($_POST['register'])) {
		$username 		= validate($_POST['username']);
		$phone 			= validate($_POST['phone']);
		$email 			= validate($_POST['email']);
		$password 		= validate($_POST['password']);
		$hidden         = validate($_POST['hidden']);
		
		//echo $username.$phone.$email.$password;

		// Check for empty
		if (empty($username) || empty($phone) || empty($email) || empty($password)) {
			header('Location: signup.php?message=empty');
        	exit();
		} elseif (!empty($hidden)) { // Check for human
			header('Location: signup.php?message=robot');
        	exit();
		} else { // Adding Data
			$sql 			= "SELECT * FROM admins WHERE username = '$username' OR email = '$email'";
			$result 		= mysqli_query($con,$sql);
			$user_exist 	= mysqli_num_rows($result);
			if ($user_exist > 0) {
				header('Location: signup.php?message=userexist');
				exit();	
			} else {
				// Saving the data
				$sql 			= "INSERT INTO admins (username,phone,email,password,active,priority) VALUES ('$username','$phone','$email','$password','0','0')";
				$result 		= mysqli_query($con,$sql);
				if ($result) {
					header('Location: signup.php?message=success');
					exit();	
				} else {
					header('Location: signup.php?message=error');
					exit();
				}
			}
		}

	}

?>

<!DOCTYPE html>
<head>
    <title>PPH - AutoMailer || Mortuza Hossain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet">
</head>
<body class="signup-body">
		<div class="agile-signup">	
		
			<div class="content2">

				<?php
	            if (isset($_GET['message'])) {
	                $message = $_GET['message'];
	                if ($message == 'empty') {
	                    echo '<h5>Please Fill All The Input Field.</h5>';
	                }
	                if ($message == 'robot') {
	                    echo '<h5>Only Human Inside.</h5>';
	                }
	                if ($message == 'userexist') {
	                    echo '<h5>User Already exist . Go and login.</h5>';
	                }
	                if ($message == 'success') {
	                    echo '<h5>Your registration is successfull. Your access will be granted when admin approve you .</h5>';
	                }
	                if ($message == 'error') {
	                    echo '<h5>Server Error. We will solve it soon.</h5>';
	                }
	            }
	            ?>


				<div class="grids-heading gallery-heading signup-heading">
					<h2>Sign Up</h2>
				</div>
				<form accept="" method="post">
					<input type="hidden" name="hidden" value="">
					<input type="text" name="username" placeholder ="Username">
					<input type="tel" name="phone" placeholder ="Phone">
					<input type="email" name="email" placeholder ="Email">
					<input type="password" name="password" placeholder="Password">
					<input type="submit" name="register" class="register" value="Sign Up">
				</form>
				<h5>- OR -</h5>
				<a href="login.php">Back To Home</a>
			</div>

		</div>
</body>
</html>
