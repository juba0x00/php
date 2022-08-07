<?php 

if (!defined('HOST')) define('HOST', 'localhost');

if (!defined('DB_USER')) define('DB_USER', 'phpmyadmin');

if (!defined('DB_PASS')) define('DB_PASS', 'l34rn1n9PHP1s1mp0rt4nt');

if (!defined('DB_NAME')) define('DB_NAME', 'vsw');

// database
// └── users_table
//     ├── id
//     ├── username
//     ├── email
//     ├── password
//     └── role

$connection = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
if (!$connection){
    echo 'Connection Error :( -> ' . $connection -> error;
}
  
  
  ?>