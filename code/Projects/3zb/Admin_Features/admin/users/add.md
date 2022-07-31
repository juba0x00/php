# add.php

# Add new user

```php
<?php
// Validation
$error_fields = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(! (isset($_POST['username']) && !empty($_POST['username']))){
        $error_fields[] = "username";
    }
    if(! (isset($_POST['username']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))){
        $error_fields[] = "email";
    }
    if(! (isset($_POST['username']) && strlen($_POST['password']) > 5)){
        $error_fields[] = "password";
    }
    if($error_fields){
        header("Location: form.php?error_fields=" . implode(",", $error_fields));
        exit;
    }
    // 0pen The Connection
    $con = mysqli_connect("localhost","Azab","toor","blog");
    if(!$con){ die("Connection Failed") . mysqli_error(); exit; }

    // Escape Chars To Avoid SQL Injection
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $admin = (isset($_POST['admin'])) ? 1 : 0 ;

    // Insert Data Into Tables
    $query = "INSERT INTO users(username,email,password,admin) ";
    $query .= "VALUES ('$username','$email','$password','$admin')";

    if(mysqli_query($con, $query)){
        header("Location: list.php");
        exit;
    }else{
        die('Query FAILED ' . mysqli_error($con));
    }
    // Free The Result
    mysqli_free_result($query);

    // Cl0sing The Connection
    mysqli_close($con);
}
?>
<h1>Admin :: Add User</h1>
<form method="post">
    <div class="form-group">
        <label for="username">username</label>
        <input type="text" name="username" id="username" placeholder="Please Enter Username"

        value="<?php echo isset($username) ? $username : '' ?>">

        <p><?php if(in_array("username", $error_fields)) echo "* Please Enter Username"; ?></p>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>" >

        <p><?php if(in_array("email", $error_fields)) echo "* Please Enter Email"; ?></p>
    </div>
    <div class="form-group">
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="key" class="form-control" placeholder="Password">

        <p><?php if(in_array("password", $error_fields)) echo "* Please Enter Pssword"; ?></p>
    </div>
    <div class="form-group">
		     <input type="checkbox" name="admin" <?php echo isset($admin) ? 'checked' : '' ?>>Admin
    </div>
		     <input type="submit" name="submit" value="Add User">
</form>
<hr>
```