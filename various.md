# print all properties of an object 
```php
var_dump(object)
```

## Example 

```php
var_dump($database_connection);
```

```php
Output:

object(mysqli)#1 (18) {
  ["affected_rows"]=>  int(0)
  ["client_info"]=>  string(13) "mysqlnd 8.1.5"
  ["client_version"]=>  int(80105)
  ["connect_errno"]=>  int(0)
  ["connect_error"]=>  NULL
  ["errno"]=>  int(0)
  ["error"]=>  string(0) ""
  ["error_list"]=>  array(0) {}
  ["field_count"]=>  int(0)
  ["host_info"]=>  string(25) "Localhost via UNIX socket"
  ["info"]=>  NULL
  ["insert_id"]=>  int(0)
  ["server_info"]=>  string(16) "10.6.8-MariaDB-1"
  ["server_version"]=>  int(100608)
  ["sqlstate"]=>  string(5) "00000"
  ["protocol_version"]=>  int(10)
  ["thread_id"]=>  int(33)
  ["warning_count"]=>  int(0)
}

```