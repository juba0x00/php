<?php
include "includes/header.php";
include "includes/functions.php";

if(isset($_SESSION['username'])){ // user logged in 
	header("Location: index.php");
}

include "includes/db.php";
// database
// └── users_table
//     ├── id
//     ├── username
//     ├── email
//     ├── password
//     └── role


	if(isset($_POST['login']) and !empty($_POST['username']) and !empty($_POST['password'])){
		$vulnerable = isset($_POST['vulnerable'])? true:false;
		if(!$vulnerable){
			$username = mysqli_real_escape_string($connection, $_POST['username']);
			$password = mysqli_real_escape_string($connection, $_POST['password']);
		}else{
			$username = $_POST['username'];
			$password = $_POST['password'];
		}
		if (user_authenticated($username, $password)){
			header("Location: index.php");
		}
	}




?>
<form method='post'>


	<label>Username: </label><br>
	<input type="text" id='username' name="username" value="<?php echo isset($username) ? $username : '' ?>" required><br>

	
	<label for="password">password: </label><br>
	<input type="password" id='password' name="password" value="<?php echo  isset($password) ? $password : ''?>" required><br>

	<input type='checkbox' name='vulnerable' >SQLi vulnerable</input>
	<br>
	<input type="submit" name="login" value="Login">



</form>
</body>
</html>