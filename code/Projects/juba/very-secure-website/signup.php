<?php
session_start();
include "includes/functions.php";

// check if logged in 
if(isset($_SESSION['logged_in'])){
    header("Location: index.php");
}




if(isset($_POST['signup']) and !empty($_POST['username']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['role'])){
    $errors = Array(
        'username' => '',
        'email' => '',
        'password' => '',
        'role' => ''
    );

    if (username_exists($_POST['username'])){
        $errors['username'] = 'Duplicated username, input another one';
    }

    if (email_exists($_POST['email'])){
        $errors['email'] = 'Duplicated email, input another one';
    }

    foreach ($errors as $field => $error){ 
        if ($error == ''){
            unset($errors[$field]);
        }
    }




    if (empty($errors)){
        add_user($_POST['username'], $_POST['email'], $_POST['password'], $_POST['role']);
        
    }else{
        foreach($errors as $field => $error){
            echo $error;
        }
    }

}else{
    echo "Missing Inputs";
}

/* 

database
└── users_table
    ├── id
    ├── username
    ├── email
    ├── password
    └── role


Tasks 

// check if logged in 
// signup form 
check user existance 
check empty fields 
show error (from array)
*/

?>

<html>
    <body>
        <form method='post'>

            
            <label>Username: </label><br>
            <input type="text" id='username' name="username" value="<?php echo isset($username) ? $username : '' ?>" required><br>

            <label>Email: </label><br>
            <input type="email" name="email" value="<?php echo isset($username) ? $username : '' ?>" required><br>

            <label for="password">password: </label><br>
            <input type="password" id='password' name="password" value="<?php echo  isset($password) ? $password : ''?>" required><br>

            <label for="password">Role: </label><br>
            <input type="text"  name="role" value="<?php echo  isset($password) ? $password : ''?>" ><br>


            <input type='checkbox' name='vulnerable' >SQLi vulnerable</input>
            <br>
            <input type="submit" name="signup" value="Signup">


        </form>


    <?php echo "<h3>Possible Vulnerabilities:</h3> SQLi <br> Stored XSS"?>
    <h2><a href='login.php'>Login</a></h2>
    </body>

</html>