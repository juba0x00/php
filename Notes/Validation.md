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


## convert `\n` to `<br/>`

```php
echo nl2br("List: \n 1- first options \n 2- second options");
```

- `nl2br` stands for New Line To `<br>`
