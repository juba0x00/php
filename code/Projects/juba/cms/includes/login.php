<?php
session_start();
include "db_connect.php";

if(isset($_POST['login'])){
    $login_name = $_POST['username'];
    $login_pass = $_POST['password'];
    if(isset($SQLi_vulnerable)){
        $SQLi_vulnerable = $_POST['SQLi'];
    }

    if(!$SQLi_vulnerable)# if not vulnerable to SQL injection 
    { 
        $login_name = mysqli_real_escape_string($conn, $login_name);
        $login_pass = mysqli_real_escape_string($conn, $login_pass); 
    }
 
    $login_query = "SELECT * FROM users WHERE username='{$login_name}'";
    $result = $conn -> query($login_query);
    
    while($row = $result -> fetch_assoc())
    {

        $db_id = $row['id'];
        $db_username = $row['username'];
        $db_password = $row['password'];
        $db_firstname = $row['firstname'];  
        $db_lastname = $row['lastname'];
        $db_rols = $row['role'];
    }   
    #PHP_SQLi
    
    if($login_name === $db_username and $login_pass === $db_password)
    {
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_firstname;
        $_SESSION['lastname'] = $db_lastname;
        $_SESSION['role'] = $db_role;
        $_SESSION['lastname'] = $db_lastname;

        header("Location: ../admin"); // you should start the session inside the admin page (include it header.php)

    }else{# Wrong credentials 
        header("Location: ../index.php");
    }
}
?>