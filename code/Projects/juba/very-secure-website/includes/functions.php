<?php
include "db.php";


function user_authenticated($username, $password){


    $login_query = "SELECT * FROM users WHERE username='$username' AND password='$password' limit 1";
    $result = db_query($login_query);
    $result = $result -> fetch_assoc();
    
    if(!empty($result) and $result['username'] === $username and $result['password'] === $password){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $result['role'];
        $_SESSION['logged_in'] = true;
        header("Location: index.php");
    }
}


function username_exists($username){
    $result = db_query("SELECT username FROM users WHERE username='$username'");
    $result = $result -> fetch_assoc();

    if(!empty($result) and $result['username'] === $username){
        return true;
    }
    else{
        return false;
    }
}


function email_exists($email){
    $result = db_query("SELECT email FROM users WHERE email='$email'");
    $result = $result -> fetch_assoc();

    if(!empty($result) and $result['email'] === $email){
        return true;
    }
    else{
        return false;
    }
}


function db_query($query){
    global $connection;
    return $connection -> query($query);
}


function add_user($username, $email, $password, $role){
    db_query("INSERT INTO users(username, email, password, role) VALUES ('$username', '$email', '$password', '$role')");
    // if(username_exists())
}








?>