# Code 

## Query Posts
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

## Search for tags 
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