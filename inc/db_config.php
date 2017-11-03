<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '123456');
define('DBNAME', 'phpautomailer');

$con = mysqli_connect(HOST,USER,PASSWORD,DBNAME);

// if($con){
//     echo "Connection Ok";
// } else {
//     echo "ERROR";
// }

function validate($value)
{
	$value = trim($value);
	$value = stripslashes($value);
	$value = htmlspecialchars($value);
    return $value;
}