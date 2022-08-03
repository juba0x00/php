<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <?php if(isset($_SESSION['user'])){
        ?>
        
        <a href="profile.php" target="_blank">Profile</a><br><br>
        <a href="logout.php" target="_blank">Logout</a>

        <?php

    }else{ ?>
        <a href="register.php" target="_blank">Register</a><br><br>
        <a href="login.php" target="_blank">Login</a>
    <?php } ?>
    
</body>
</html>