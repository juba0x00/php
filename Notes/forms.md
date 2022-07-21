# Forms Data 
## Submitting data to the same page

- `login.php`
---
```php
<?php
// isset() to check if it's available (posted) 
if(isset($_POST['is_submitted'])){
	echo "the form submitted successfully, " . $_POST['is_submitted'] . "<br>";
	echo "the username sent successfully, " . $_POST['username'] . "<br>";
	echo "the password sent successfully, " . $_POST['password'] . "<br>";
	echo '$GLOBALS["_POST"] = $_POST["username"] = ' . $GLOBALS['_POST']['username'] . "<br>";
}

?>

<html>
	<body>
		<form action="forms.php" method="post"> <!-- $_POST will hold this data_-->
			<input name='username' type='text' placeholder="Enter your name: ">
			<input name='userpass' type='password' placeholder="Enter your Password: ">
			<input name='is_submitted' type='submit'>
		</form>
	</body>
</html>
```

---
## Basic input validating 

```php
<?php
// isset() to check if it's available (posted) 
if(isset($_POST['is_submitted'])){
	$minimum = 4; // minimum username and password length 
	$username = $_POST['username'];
	$password = $_POST['userpass'];

	if (strlen($username) < $minimum or strlen($password) < $minimum)
	{
		echo "Invalid Username or password";
	}
	
	$admins = array('admin', 'root', 'John');
	
	if (!in_array($username, $admins)){
		echo "Sorry, you are not an admin.";
	} else{
		echo "Hello, Admin";
	}
}
?>
```
---