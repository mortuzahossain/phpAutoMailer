<?php
include('inc/db_config.php');
// Adding the session for checking isLogin Or Not
session_start();
if(isset($_SESSION['userId'])){
    header('Location: index.php?message=alreadylogin');
    exit();
}
// Checking the click action of login button
if(isset($_POST['Login'])){
    $username       = validate($_POST['username']);
    $password       = validate($_POST['password']);
    $hidden         = validate($_POST['hidden']);

    echo $username.$password.'Hidden: '.$hidden;

    if(empty($username) || empty($password)){
        header('Location: login.php?message=empty');
        exit();
    } elseif (!empty($hidden)) {
        header('Location: login.php?message=robot');
        exit();
    } else {
        // Check the user exist or not SQL QUERY
        $sql            = "SELECT * FROM admins WHERE username = '$username' OR email = '$username' AND password = '$password'";
        $result         = mysqli_query($con,$sql);
        $user_exist     = mysqli_num_rows($result);

        if ($user_exist > 0) {
            // If User Exist Then Let Him/Her Into Index Page And Store the user value into session
            if ($row = mysqli_fetch_assoc($result)) {
                
                $_SESSION['userId']         = $row['id'];
                $_SESSION['username']       = $row['username'];
                $_SESSION['email']          = $row['email'];
                $_SESSION['phone']          = $row['phone'];
                $_SESSION['password']       = $row['password'];
                $_SESSION['priority']       = $row['priority'];

                header('Location: index.php?message=success');
                exit();
            }
        } else {
            header('Location: login.php?message=notExist');
            exit();
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
                if ($message == 'notExist') {
                    echo '<h5>User Not Exist. Plese check the email or password.</h5>';
                }
                if ($message == 'success') {
                    echo '<h5>User Exist :).</h5>';
                }
            }
            ?>
            
            <div class="grids-heading gallery-heading signup-heading">
                <h2>Login</h2>
            </div>
            <form action="" method="post">
                <input type="text" name="username">
                <input type="password" name="password">
                <input type="submit" class="register" value="Login" name="Login">
                <input type="hidden" name="hidden" value="">
            </form>
            <div class="signin-text">
                <div class="text-left">
                    <p><a href="#"> Forgot Password? </a></p>
                </div>
                <div class="text-right">
                    <p><a href="signup.php"> Create New Account</a></p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <h5>- OR -</h5>
            <div class="footer-icons">
                <ul>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="twitter facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter chrome"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" class="twitter dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>