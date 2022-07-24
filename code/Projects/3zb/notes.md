# Code

# DataBase Connection

- **We use Built-in function called** `mysqli_connect()` **to open a new connection to the MySQL server:**

```php
<?php

    $con = mysqli_connect("localhost","root","","cms");
    if(!$con){
        die("Connection Failed") . mysqli_error();
    }else{
        echo "Connection Success";
    }
?>
```

---
