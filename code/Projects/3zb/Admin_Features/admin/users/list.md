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
