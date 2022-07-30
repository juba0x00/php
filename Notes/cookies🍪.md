# Cookies 
## What is the Cookie

> A cookie is often **used to identify a user**. A cookie is a small file that the server embeds on the user's computer. Each time the same computer requests a page with a browser, it will send the cookie too. With PHP, you can both create and retrieve cookie values.

---
## Set cookie 

```php
setcookie('cookie_name', 'cookie_value', 'expiration_date')
setcookie('cookie_name', 'cookie_value', 'expire_date', 'path', 'domain', 'secure', 'httponly_');
```

```php
num_of_weeks = 2;
$expiration = time() + (60 * 60 * 24 * 7) * $num_of_weeks; 
// time() returns the current time 

// setcookie('key', 'value', 'expiration_date')
setcookie('username', 'mohamed', $expiration);
```

- if you didn't specify expiration date it will be removed after closing the browser 
---
## Get cookie 

```php
echo $_COOKIE['cookie_name'];
```

```php
if(isset($_COOKIE['username']))
{
	echo $_COOKIE['username'];
}
else{
	echo 'No 🍪 found';
}
```
---
### [So what is the session ?](session.md)



















