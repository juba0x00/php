# Table Of Contents: 
- [[#OOP Note|OOP Note]]
	- [[#OOP Note#In PHP we access class method or properties using `->`  not `.` like the most languages|In PHP we access class method or properties using `->`  not `.` like the most languages]]
- [[#info|info]]
- [[#Connect to Database (MySQLi Object-Oriented)|Connect to Database (MySQLi Object-Oriented)]]
	- [[#Connect to Database (MySQLi Object-Oriented)#`new mysqli`|`new mysqli`]]
		- [[#`new mysqli`#`sqli` stands for SQL Improved not SQL injection 😄|`sqli` stands for SQL Improved not SQL injection 😄]]
- [[#Check connection errors|Check connection errors]]
	- [[#Check connection errors#1- `if($con)`|1- `if($con)`]]
	- [[#Check connection errors#2- if (mysqli_connect_errno())|2- if (mysqli_connect_errno())]]
	- [[#Check connection errors#3- `if($con -> connect_error`|3- `if($con -> connect_error`]]
- [[#Query the Database|Query the Database]]
	- [[#Query the Database#1- mysqli_query()|1- mysqli_query()]]
	- [[#Query the Database#2- `$con -> query($query);`|2- `$con -> query($query);`]]
- [[#Check query error|Check query error]]
	- [[#Check query error#1- using `mysqli_query()`|1- using `mysqli_query()`]]
	- [[#Check query error#2- using `query()`|2- using `query()`]]
- [[#Fetching the result|Fetching the result]]
- [[#Insert|Insert]]
- [[#Select|Select]]
- [[#Update|Update]]
- [[#Delete|Delete]]
- [[#Sanitizing input #PHP_SQLi|Sanitizing input #PHP_SQLi]]
- [[#Hashing the password|Hashing the password]]
---
---
# Databases
---
## OOP Note
### In PHP we access class method or properties using `->`  not `.` like the most languages 
```php
$name = object -> get_name(); // like: name = object.get_name() 
```
---
## info 
- PDO will work on 12 different database systems, whereas MySQLi will only work with MySQL databases.
- we will use MySQLi object oriented 
---
## Connect to Database (MySQLi Object-Oriented)

### `new mysqli` 
```php
$connection = new mysqli('servername', 'admin name', 'admin password', 'database name');
```
#### `sqli` stands for SQL Improved not SQL injection 😄

---
## Check connection errors
###  1- `if($con)`
```php
if($connection){
	echo "connected successfully :)";
}
else{
	echo "Database Connection Error :(";
}
```

###  2- `if (mysqli_connect_errno())` 
```php
if (mysqli_connect_errno()) { // errno -> error Number (0 if no errors)
  echo "Failed to connect to MySQL: " . mysqli_connect_error(); // print the error 
  exit();
}
```

### 3- `if($con -> connect_error`
```php
if ($con -> connect_error) {  
  die("Connection failed: " . $conn->connect_error);  
}
```
---
## Query the Database 

### 1- `mysqli_query()`
```php
$result = mysqli_query($connection, $sql_query)
```

### 2- `$con -> query($query);`
```php
$result = $connection -> query($sql_query);
```
---

## Check query error 
- it's very simple, just type the previous code inside a condition 

### 1- using `mysqli_query()`

```php
if (mysqli_query($con, $query)){
	echo 'Done :)';
}
else{
	echo 'Error :( ( ' . $con -> error . ')';
}
```

### 2- using `query()`

```php
if ($con -> query($sql_query)){
	echo 'Done :)';
}
```

- Don't query the database then use this code to check because this code will query the database

---

## Fetching the result 

- fetch_assoc : fetch associative array
```php
while($row = mysqli_fetch_assoc($result)) {  // $row = mysqli_fetch_assoc($result_object)
    echo "id: " . $row["id"]. " - Name: " . $row["name"];
    }

```

```php
while($row = $result -> fetch_assoc()) {  // $row = $result_object -> fetch_assoc()
    echo "id: " . $row["id"]. "| Name: " . $row["name"];
    }

```
---
## number of rows 
```php
$n_of_rows = $result -> num_rows;
```
----
---

# SQL Basics 

## Insert 

```sql
INSERT INTO table_name(column1, column2) VALUES('value1', 'value2');
```

---

## Select 

```sql
SELECT column1, column3 FROM table_name WHERE column1='value1' AND column3='value3';
```
---

## Update 

```sql
UPDATE table_name SET column1='new value1', column2='new value2' WHERE column3='value3';
```

---

## Delete 

```sql 
DELETE FROM table_name WHERE column2='value2';
```

---
---

# Security #PHP_security

## Sanitizing input #PHP_SQLi 

```php
$sanitized_username = mysqli_real_escape_string($connection, $username);
$sanitized_password = mysqli_real_escape_string($connection, $password);
```

## Hashing the password 

```php
 $hashed_passwd = password_hash($plain_text_passwd, PASSWORD_DEFAULT);
# We just want to hash our password using the current DEFAULT algorithm. 
# Beware that DEFAULT may change over time, so you would want to prepare  
```