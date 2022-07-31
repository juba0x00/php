# Code

# list.php

# Listing the registered users and search for specific user

- Note we added a new column in the **DataBase** called **admin** and gave it a **boolean** type

```php
<?php
    // 0pen The Connection
    $con = mysqli_connect("db_host","db_user","db_password","db_name");
    if(!$con){ die("Connection Failed") . mysqli_error(); exit; }

    // Do the 0perations
    $query = "SELECT * FROM users ";

    if(isset($_GET['search'])){
        $search = mysqli_real_escape_string($con, $_GET['search']);
        $query .= "WHERE username LIKE '%$search%' OR email LIKE '%$search%'";
    }

    $result = mysqli_query($con, $query);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin :: List Users</title>
    </head>
    <body>
        <h1>List Users</h1>
        <form method="get">
            <input type="text" name="search" placeholder="Enter username or email to search">
            <input type="submit" value="search">
        </form>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
<?php

// Loop On The Rowset
while($row = mysqli_fetch_assoc($result)){
?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['username'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= ($row['admin']) ? 'Yes' : 'No' ?></td>
        <td><a href="edit.php?id=<?= $row['id']?> ">Edit</a> | <a href="delete.php?id=<?= $row['id'] ?>">Delete</a></td>
    </tr>
<?php } ?>
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align: center"><?= mysqli_num_rows($result)?></a></td>
                    <td colspan="3" style="text-align: center"><a href="add.php">Add User</a></td>
                </tr>
            </tfoot>        
        </table>
    </body>
</html>
<?php
// Free The Result
mysqli_free_result($result);

// Cl0sing The Connection
mysqli_close($con);
?>
```

---

# add.php

# Add new user

```php
<?php
// Validation
$error_fields = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(! (isset($_POST['username']) && !empty($_POST['username']))){
        $error_fields[] = "username";
    }
    if(! (isset($_POST['username']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))){
        $error_fields[] = "email";
    }
    if(! (isset($_POST['username']) && strlen($_POST['password']) > 5)){
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
    $admin = (isset($_POST['admin'])) ? 1 : 0 ;

    // Insert Data Into Tables
    $query = "INSERT INTO users(username,email,password,admin) ";
    $query .= "VALUES ('$username','$email','$password','$admin')";

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
}
?>
<h1>Admin :: Add User</h1>
<form method="post">
    <div class="form-group">
        <label for="username">username</label>
        <input type="text" name="username" id="username" placeholder="Please Enter Username"

        value="<?php echo isset($username) ? $username : '' ?>">

        <p><?php if(in_array("username", $error_fields)) echo "* Please Enter Username"; ?></p>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>" >

        <p><?php if(in_array("email", $error_fields)) echo "* Please Enter Email"; ?></p>
    </div>
    <div class="form-group">
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="key" class="form-control" placeholder="Password">

        <p><?php if(in_array("password", $error_fields)) echo "* Please Enter Pssword"; ?></p>
    </div>
    <div class="form-group">
		     <input type="checkbox" name="admin" <?php echo isset($admin) ? 'checked' : '' ?>>Admin
    </div>
		     <input type="submit" name="submit" value="Add User">
</form>
<hr>
```
---

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
