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
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    // Validation
    $error_fields = array();


    // Username Validation 
    if(empty($username)){
        $error_fields[] = "* Please Enter Username";
    }

    // Password Validation
    if(empty($password)){
        $error_fields[] = "* Please Enter Password";
    }

    if(empty($error_fields)){

        $query = "SELECT username, password FROM users WHERE username = '$username'";
        $result = mysqli_query($con, $query);

        if(!$result) {
            $error_fields[] = "Invalid Username Or Password";
        }
        else{
            
            $_SESSION['user'] = [
                "username" => $username,
                "email" => $email,
    
            ];
            header("Location: profile.php");
        }

        $_POST['username'] = '';
        $_POST['password'] = '';

      
    }
    
   
}
// Cl0sing The Connection
// mysqli_close($con);

?>
<form method="post" action="login.php">
    <?php
        if(isset($error_fields) && !empty($error_fields)){
            foreach($error_fields as $msg){
                echo $msg . "<br>";
            }
        }
    ?>
  <div class="container">
    <h1>Log In</h1>
    <p>Please fill in this form to login an account.</p>
    <hr>

    <input type="hidden" placeholder="Enter Email: " name="email" id="email"
    value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username: " name="username" id="username"
    value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>">

    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password: " name="password" id="password"
    value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>">
    <hr>
    <br>
    <button type="submit" name="submit">Login</button>
  </div>
  <div class="container signin">
    <p>Dosen't have an account? <a href="register.php">Register</a>.</p>
  </div>
</form> 