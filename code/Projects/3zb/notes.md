# Code

# DataBase Connection

- **We use built in function called** `mysqli_connect()` **to open a new connection to the MySQL server**

```php
<?php

    $con = mysqli_connect("localhost","root","","cms");
    if(!$con){ die("Connection Failed" . mysqli_error($con)); }
		else{ echo "Connection Success"; }
?>
```

---

# Posts Query

- **We use use built in functions called `query()`/ `mysqli_query()` function to perform a query against a database.**

```php
<?php
                $posts_query = "SELECT * FROM posts";
                $select_posts_query = mysqli_query($con,$posts_query);

                while($row = mysqli_fetch_assoc($select_posts_query)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
            ?>

            <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>

                <?php } ?>
```

---

# Searching For Tags

- **We use built in function called** `mysqli_num_rows()` **to return the number of rows in a result set**

```php
<?php

        if(isset($_POST['submit'])){
            $search_key = $_POST['search'];
            
            $query = "SELECT * FROM posts";
            $query .= " WHERE post_tags LIKE '%$search_key%'";
            
            $search_query = mysqli_query($con, $query);
            if(!$search_query){ die("QUERY FAILED" . mysqli_error($con)); }

            $count = mysqli_num_rows($search_query);
            if($count == 0){ echo "<h3>No Result Found</h3>"; }}
    
?>
```
---
