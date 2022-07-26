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