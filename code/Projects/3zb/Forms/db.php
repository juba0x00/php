<?php


   // 0pen The Connection
   $con = mysqli_connect("localhost","root","","auth");
   if(!$con){ die("Connection Failed") . mysqli_connect_error(); exit; }


                    //  PDO Connection

// ( dsn ) ===> data source name
// $dsn = 'mysql:host=localhost;dbname=auth';

// $user = 'root'; // user to connect

// $password = ''; // password of the user

// // try ==> try to connect
// try{
//     // start new connection with PDO Class
//     $con = new PDO($dsn, $user, $password);

//     // echo "Connection Success";

// }

// // if !connection catch to catch the error
// catch(PDOException $e){
//     echo "Failed to connect" . $e->getMessage();

//     // exit() stop the script
//     exit();

// }
