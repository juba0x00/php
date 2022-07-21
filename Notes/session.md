# Session
---
## Table Of Contents
- [[#What is a PHP Session?|What is a PHP Session?]]
- [[#Start session|Start session]]
- [[#Set session variables|Set session variables]]
- [[#Get PHP session values|Get PHP session values]]
- [[#Remove all session variables|Remove all session variables]]
- [[#Destroy the session|Destroy the session]]

---
## What is a PHP Session?
- A session is a way to store information (in variables) to be used across multiple pages.Unlike a cookie, the information is not stored on the users computer.
- When you work with an application, you open it, do some changes, and then you close it. This is much like a Session. The computer knows who you are. It knows when you start the application and when you end. But on the internet there is one problem: the web server does not know who you are or what you do, because the HTTP address doesn't maintain state.
- Session variables solve this problem by storing user information to be used across multiple pages (e.g. username, favorite color, etc). By default, **session variables last until the user closes the browser.**
- So; Session variables hold information about one single user, and are available to all pages in one application.

> Tip: If you need a permanent storage, you may want to store the data in a [database](https://www.w3schools.com/php/php_mysql_intro.asp).

---
## Start session
```php
session_start();  
```

- A session is started with the `session_start()` function.  Session variables are set with the PHP global variable: $_SESSION.

> Note The `session_start()` function must be the very first thing in your document. Before any HTML tags.
---
## Set session variables 
```php
$_SESSION["favcolor"] = "yellow";
```
---
## Get PHP session values  
```php
print_r($_SESSION); // print all the values 
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
```
---
- **How does it work? How does it know it's me?**  

> Most sessions set a user-key on the user's computer that looks something like this: 765487cf34ert8dede5a562e4f3a7e12. Then, when a session is opened on another page, it scans the computer for a user-key. If there is a match, it accesses that session, if not, it starts a new session.

---
## Remove all session variables 
```php
session_unset();
```
---
## Destroy the session 
```php
session_destroy();
```
---
[if you don't know it's the cookies](cookies🍪.md)