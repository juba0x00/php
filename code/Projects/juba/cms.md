# Code 
# index.php
## Query Posts (View all the posts) <a name='posts'></a>
```php

<?php 

$posts_query = "SELECT * FROM posts";
$posts = $conn -> query($posts_query);

while ($post = $posts -> fetch_assoc()){
	$title = $post['title'];
	$author = $post['author'];
	$date = $post['date'];
	$image = $post['image'];
	$content = $post['content'];
	$tags = $post['tags'];
	$comments_num = $post['comments_num'];

?>
<!-- Blog Post template  -->
<h2>
	<a href="#"><?php echo $title?></a>
</h2>
<p class="lead">
	by <a href="index.php"><?php echo $author?></a>
</p>
<p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date?></p>
<hr>
<img class="img-responsive" src="images/<?php echo $image?>" alt="">
<hr>
<p><?php echo $content?></p>
<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

<hr>


<?php } ?>
```

## Search for tags  <a name='search'></a>
```php

<?php
	if(isset($_POST['submit'])){
		$key = $_POST['search_key'];
		$search_query = "SELECT * FROM posts WHERE tags LIKE '%$key%' " ;
		if(!$search_query){
			die('Error :(' . $search_query -> error);
		}
		$results = $conn -> query($search_query);
		while ($result = $results -> fetch_assoc()){

			?>

				<li><a href="#"><?php echo $result['title'] ?></a>
				</li>

	 <?php   }

	}


?>

```

---
# post.php
## View a specific post  <a name='post'></a>
```php
<?php

	  
	<!-- check post id -->
	if(isset($_GET['p_id'])){
	
		$post_id = $_GET['p_id'];
	
	  
	
	}
	
	  
	
	$posts_query = "SELECT * FROM posts WHERE id=$post_id";
	
	$posts = $conn -> query($posts_query);
	
	  
	
	while ($post = $posts -> fetch_assoc()){
		
		$post_id = $post['id'];
		
		$title = $post['title'];
		
		$author = $post['author'];
		
		$date = $post['date'];
		
		$image = $post['image'];
		
		$content = $post['content'];
		
		$tags = $post['tags'];
		
		$comments_num = $post['comments_num'];




	<!-- Blog Post template -->

	<h2>
	
		<a href="#posts.php?p_id=<? echo $post_id;?>"><?php echo $title;?></a>
	
	</h2>
	
	<p class="lead">
	
		by <a href="index.php"><?php echo $author;?></a>
	
	</p>
	
	<p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date;?></p>
		
		<hr>
		
		<img class="img-responsive" src="images/<?php echo $image;?>" alt="">
		
		<hr>
		
		<p><?php echo $content;?></p>
	
		<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
	
	  
	
	<hr>

  
  

	<?php } ?>
	  

?>
```

## comment form <a name='comment_form'></a>
```html
  

<h4>Leave a Comment:</h4>

<form action="#" method="post" role="form">

  

<div class="form-group">

<label for="Author">Author</label>

<input type="text" name="comment_author" class="form-control" name="comment_author">

</div>

  

<div class="form-group">

<label for="Author">Email</label>

<input type="email" name="comment_email" class="form-control" name="comment_email">

</div>

  

<div class="form-group">

<label for="comment">Your Comment</label>

<textarea name="comment_content" class="form-control" rows="3"></textarea>

</div>

<button type="submit" name="create_comment" class="btn btn-primary">Submit</button>

</form>

</div>

  

<hr>
```
## Insert comment to the database #PHP_XSS #PHP_SQLi <a name='ins_comment'></a>
```php
// Create a comment

<?php
	
	if(isset($_POST['create_comment'])){
	
		
		$post_id = $_GET['p_id'];
		
		$author = $_POST['comment_author'];
		
		$email = $_POST['comment_email'];
		
		$content = $_POST['comment_content'];
		
		  
		  
		
		$post_query = "INSERT INTO comments (post_id, author, email, content,status, comment_date)";
		
		$post_query .= "VALUES ($post_id, '{$author}', '{$email}', '{$content}', 'unapproved', now())";
		
		  
		
		$comment_created = $conn -> query($post_query);
		echo "<h1>" . $_POST['comment_author'] . " have created a comment :) </h1>"; // #PHP_XSS
		

	}

  

?>
```

## Query comments (View all the comments )<a name='vu_comments'></a>
```php
<h2>All the comments </h3>

<hr>

<?php

	  
	
	$comments_query = "SELECT * FROM comments WHERE post_id=$post_id";
	
	  
	
	$comments = $conn -> query($comments_query);
	
	  
	
	while($comment = $comments -> fetch_assoc()){
		
		$comment_date = $comment['comment_date'];
		
		$comment_content = $comment['content'];
		
		$comment_author = $comment['author'];
	
	  

?>

	<!-- Comment loop -->
	
	<div class="media">
	
	<a class="pull-left" href="#">
	
	<img class="media-object" src="http://placehold.it/64x64" alt="">
	
	</a>
	
	<div class="media-body">
	
	<h4 class="media-heading"><?php echo $comment_author?>
	
	<small><?php echo $comment_date;?></small>
	
	</h4>
	
	<?php echo $comment_content;?>
	
	</div>

</div>

  

	<?php } ?>
```

## Login form <a name='login_form'></a>
```php

                <!-- Login form -->
                <div class="well">
                    <h4>Login</h4>

                    <form action="includes/login.php" method='post'>
                   
                        <div class="form-group">
                            <input name='username' type="text" class="form-control" placeholder='Enter username'>

                        </div>
                        <div class="form-group">
                            <input name='password' type="password" class="form-control" placeholder='Enter password'>

                        </div>
                        <div class="form-group">
                        <input type="checkbox" id="SQLi" name="SQLi" value="true">
                        <label for="SQLi">vulnerable to SQLi</label><br>
                        </div>
                        <div class="form-group">
                            <input name='login' type="submit" class="form-control" value='Login'>

                        </div>
                     </form>
                    <!-- /.input-group -->
                </div>
```

## Login.php #PHP_SQLi <a name='login_php'></a>
```php
<?php
session_start();
include "db_connect.php";

if(isset($_POST['login'])){
    $login_name = $_POST['username'];
    $login_pass = $_POST['password'];
    if(isset($SQLi_vulnerable)){
        $SQLi_vulnerable = $_POST['SQLi'];
    }

    if(!$SQLi_vulnerable)# if not vulnerable to SQL injection 
    { 
        $login_name = mysqli_real_escape_string($conn, $login_name);
        $login_pass = mysqli_real_escape_string($conn, $login_pass); 
    }
 
    $login_query = "SELECT * FROM users WHERE username='{$login_name}'";
    $result = $conn -> query($login_query);
    
    while($row = $result -> fetch_assoc())
    {

        $db_id = $row['id'];
        $db_username = $row['username'];
        $db_password = $row['password'];
        $db_firstname = $row['firstname'];  
        $db_lastname = $row['lastname'];
        $db_rols = $row['role'];
    }   
    #PHP_SQLi
    
    if($login_name === $db_username and $login_pass === $db_password)
    {
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_firstname;
        $_SESSION['lastname'] = $db_lastname;
        $_SESSION['role'] = $db_role;
        $_SESSION['lastname'] = $db_lastname;

        header("Location: ../admin"); // you should start the session inside the admin page (include it header.php)

    }else{# Wrong credentials 
        header("Location: ../index.php");
    }
}
?>
```

## logout.php <a name='logout_php'></a>
```php
<?php

session_start();

$_SESSION['username'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['role'] = null;
$_SESSION['lastname'] = null;


header("Location: ../admins");
?>
```

---

## File Upload #PHP_File_upload_vuln <a name='Fupload'></a>
- the first thing you need is to create an "uploads" file in the `$_SERVER['DOCUMENT_ROOT']` 
```bash
mkdir /var/www/html/uploads
```

### Simple HTML upload form 
```html
<form method='post' enctype='multipart/form-data'>  <!-- you should specify the encoding type (enctype) -->

<input type='file' name='user_file'/> 
<input type='submit' name='wanna_upload'/>

</form>

```

### PHP file Upload 
- `$_FILES['filename']`
	- `$_FILES['html input file tag name attribue']` will hold all the data about the uploaded file \
	- `$_FILES['userfile']['tmp_name'];`  the file uploaded to temp directory first `upload_tmp_dir =` in php.ini
	- `$_FILES['userfile']['name'];`
	- `$_FILES['userfile']['size'];`
	- `$_FILES['userfile']['type'];`
	- `$_FILES['userfile']['error'];` equals to zero () if there is no error (`UPLOAD_ERR_OK` is a constant equals to 0)
		- `php > echo "output = " UPLOAD_ERR_OK;  # output = 0 `
- `move_uploaded_file($tmp_name, $save_path)` is a build-in function 
```php
<?php
if(isset($_POST['wanna_upload']))

{
	
	$uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/uploads';
	# upload_dir = '/var/www/html' . '/uploads'	
	
	$user_file = '';
	
	if($_FILES['user_file']['error'] == UPLOAD_ERR_OK){ # check if there is no error 
	
		$tmp_name = $_FILES['user_file']['tmp_name'];
		$user_file = basename($_FILES['user_file']['name']);
		move_uploaded_file($tmp_name, "$uploads_dir/$user_file");
		}
}
?>
```
