


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Very Secure Website</title>
</head>
<body>
    
<?php 
session_start();

if(isset($_SESSION['logged_in'])){
	echo "You are logged in ";
}else{
	echo "<a href='signup.php'>signup now !!</a> ";
}
// 	print_r($_SESSION);
// 	echo ($_SESSION['logged_in'] == true) ? "Status: Logged in :) " : 'Not logged in';
// }else{
// 	echo "Status: Not Logged in :( <br>";
// 	echo "<a href=login.php>Login Here</a>";
// }
// echo 'headcer';
?>


