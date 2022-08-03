<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Username : <?php echo $_SESSION['user']['username']; ?> <br><br>
    Email : <?php echo $_SESSION['user']['email']; ?> <br><br>
    
    <a href="logout.php">Logout</a><br><br>
    <a href="index.php">Home</a>
</body>
</html>