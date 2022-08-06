<?php include "db.php"; ?>
<?php
session_start();
if(isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}
if(isset($_POST['submit'])){

    // Input Sanitization To Avoid SQL Injection And XSS .....
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Validation
    $error_fields = array();


    // Username Validation 
    if(empty($username)){
        $error_fields[] = "* Please Enter Username";
    }elseif(strlen($username) > 20){
        $error_fields[] = "* Please Enter Username Less Than 20 Chars";
    }

    // $query_u = "SELECT username FROM users WHERE username = '$username'";
    // $result_u = mysqli_query($con, $query_u);
    // if (mysqli_num_rows($result_u) > 0) {
  	//   $username_error = "Sorry... username already taken"; 	
  	// } 

    // Email Validation
    if(empty($email)){
        $error_fields[] = "* Please Enter Email";
    }elseif(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
        $error_fields[] = "* Please Enter A Valid Email";
    }

    // $query_e = "SELECT email FROM users WHERE email = '$email'";
    // $result_e = mysqli_query($con, $query_e);
    // if(mysqli_num_rows($result_e) > 0){
    //   $error_fields[] = "Sorry... email already taken"; 	
    // }

    // Password Validation
    if(empty($password)){
        $error_fields[] = "* Please Enter Password";
    }elseif(strlen($password) < 6){
        $error_fields[] = "* Please Enter A Password Not Less Than 6 Chars";
    }

    if(empty($error_fields)){
        

        $query = "INSERT INTO users(username,email,password) ";
        $query .= "VALUES ('$username', '$email', '$password')";

        $result = mysqli_query($con, $query);

        $_POST['email'] = '';
        $_POST['username'] = '';
        $_POST['password'] = '';

        $_SESSION['user'] = [
            "username" => $username,
            "email" => $email,

        ];
        header("Location: login.php");
    }
    
}
// Cl0sing The Connection
// mysqli_close($con);

?>
<form method="post" action="register.php">
    <?php
        if(isset($error_fields) && !empty($error_fields)){
            foreach($error_fields as $msg){
                echo $msg . "<br>";
            }
        }
    ?>
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email: " name="email" id="email"
    value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
    <br>
    
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username: " name="username" id="username"
    value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>">

    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password: " name="password" id="password"
    value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>">
    <hr>
    <br>
    <button type="submit" name="submit">Register</button>
  </div>
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Log In</a>.</p>
  </div>
</form> 