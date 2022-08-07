# Server-Side Validation 
## Removing White-Spaces `trim()`
```php
$username = trim($_POST['username']);
```
- `rtrim()` Remove trailing spaces from a string
- `ltrim()` Remove leading spaces from a string

## Special characters `addslashes()`

```php
$username = addslashes($_POST['username');
```

- use `stripslashes()` to return the username to it's previous format

## Convert String into array

```php
$usernames = explode(':', $colon_separated_names);
```


- use `join()` / `implode()` to convert array into string  


## String Length

```php
$length = strlen($username);
```


## String To UpperCase

```php
	$strUpper = strtoupper($string);
```

- use `strtolower()` to convert string to LowerCase

## ucfirst()

- Convert the first character of "hello" to uppercase

```php
	echo ucfirst("hello world!");
```


## ucwords()

- Convert the first character of each word to uppercase

```php
	echo ucwords("hello world");
```


## convert `\n` to `<br/>`

```php
echo nl2br("List: \n 1- first options \n 2- second options");
```

- `nl2br` stands for New Line To `<br>`


## Filter variable 

```php
// Input Sanitization To Avoid SQL Injection And XSS .....

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

$password = password_hash($password, PASSWORD_DEFAULT);
```