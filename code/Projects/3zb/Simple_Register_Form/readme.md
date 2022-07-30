# Code

# form.php

```php
<?php
// Check for errors
$errors_arr = array();
if(isset($_GET['error_fields'])){
    $errors = explode("," , $_GET['error_fields']);
}
?>

    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form action="proccess_db.php" method="post">
                       
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" placeholder="Enter Username" />
                            <?php if(in_array("username", $errors_arr)) echo "* Please Enter Username"; ?>
                            <br>

                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" placeholder="somebody@example.com">
                            <?php if(in_array("email", $errors_arr)) echo "* Please Enter Email"; ?> 
                            <br>

                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            <?php if(in_array("password", $errors_arr)) echo "* Please Enter A Password Not Less Than 6 Chars"; ?>
                            <br>
    
                
                            <input type="submit" name="resgister" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

        <hr>
```

---

# main_db.php

```php
<?php
    // 0pen The Connection
    $con = mysqli_connect("db_host","db_user","db_password","db_name");
    if(!$con){ die("Connection Failed") . mysqli_error(); exit; }
    // Do the 0perations
    $query = "SELECT * FROM users";
    $result = mysqli_query($con, $query);

    while($row = mysqli_fetch_assoc($result)){
        echo "Id: " . $row['id'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Username: " . $row['username'] . "<br>";
        echo str_repeat("--", 50) . "<br>";

    }
    // Cl0sing The Connection
    mysqli_close($con);
```

---

# proccess_db.php

```php
<?php
    // Validation
    $error_fields = array();
    
    if(! (isset($_POST['username']) && !empty($_POST['username']))){
        $error_fields[] = "username";
    }
    if(! (isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))){
        $error_fields[] = "email";
    }
    if(! (isset($_POST['password']) && strlen($_POST['password']) > 5)){
        $error_fields[] = "password";
    }
    if($error_fields){
        header("Location: form.php?error_fields=" . implode(",", $error_fields));
        exit;
    }
    // 0pen The Connection
    $con = mysqli_connect("db_host","db_user","db_password","db_name");
    if(!$con){ die("Connection Failed") . mysqli_error(); exit; }

    // Escape Chars To Avoid SQL Injection
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // $hashFormat = "$2y$10$"; 
    // $salt = "iusesomecrazystrings22";
    // $hashF_and_salt = $hashFormat . $salt;
    // $password = crypt($password,$hashF_and_salt);

    // Insert Data Into Tables
    $query = "INSERT INTO users(username,email,password) ";
    $query .= "VALUES ('$username','$email','$password')";

    $result = mysqli_query($con, $query);

    if(!$result) { die('Query FAILED ' . mysqli_error($con)); } 
    else { echo "You Registered Successfuly "; }

    // Cl0sing The Connection
    mysqli_close($con);
```
