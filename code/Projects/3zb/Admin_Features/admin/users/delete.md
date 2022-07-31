# delete.php

# Delete a specific user

```php
<?php
// 0pen The Connection
$con = mysqli_connect("db_host","db_user","db_password","db_name");
if(!$con){ die("Connection Failed") . mysqli_error(); exit; }

// Select ther user $_GET['id']
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$query = "DELETE FROM users WHERE id = '$id' LIMIT 1";

if(mysqli_query($con, $query)){
    header("Location: list.php");
    exit;
}else{
    die('Query FAILED ' . mysqli_error($con));
}

// Free The Result
mysqli_free_result($query);

// Cl0sing The Connection
mysqli_close($con);
```