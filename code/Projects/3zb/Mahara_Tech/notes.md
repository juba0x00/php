# Code

# DataBase Connection

- **Create db connection, Doing some operations like (SELECT, INSERT, ….) and close the connection:**

```php
<?php
    // 0pen The Connection
    $con = mysqli_connect("localhost","Azab","toor","blog");
    if(!$con){ die("Connection Failed") . mysqli_error(); exit; }
    else{ echo "Connection Success"; }
    
    // D0 The Operations
    $query = "SELECT * FROM users";
    $result = mysqli_query($con, $query);

    while($row = mysqli_fetch_assoc($result)){
        $email = $row['email'];
        $username = $row['username'];
        $password = $row['password'];
        }
    
    // Cl0sing The Connection
    mysqli_free_result($result);
    mysqli_close($con);
```
---
