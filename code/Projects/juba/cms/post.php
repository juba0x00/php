<?php 
include "includes/header.php";
include "includes/db_connect.php";

?>

<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php" ;?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">


            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>


               
                <?php 

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

?>
            <!-- Blog Post template  -->
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

                            <!-- Blog Comments -->
<!-- Create a comment -->
<?php
                    if(isset($_POST['create_comment'])){
                        $post_id = $_GET['p_id'];
                        $author = $_POST['comment_author'];
                        $email = $_POST['comment_email'];
                        $content = $_POST['comment_content'];


                        $post_query = "INSERT INTO comments (post_id, author, email, content,status, comment_date)";
                        $post_query .= "VALUES ($post_id, '{$author}', '{$email}', '{$content}', 'unapproved', now())";

                        $comment_created = $conn -> query($post_query);

                        if($comment_created){
                            echo "<h1>" . $_POST['comment_author'] . " have created a comment :) </h1>"; // #PHP_XSS 
                        }
                    }

?>


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

                <!-- Posted Comments -->
                <!-- Query all the comments  -->        
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
                    <!-- Comment -->
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








  


                <!-- First Blog Post -->
<!--                 <h2>
                    <a href="#">First Post</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr> -->




                <!-- Pager -->
                <!-- <ul class="pager"> -->
                    <!-- <li class="previous"> -->
                        <!-- <a href="#">&larr; Older</a> -->
                    <!-- </li> -->
                    <!-- <li class="next"> -->
                        <!-- <a href="#">Newer &rarr;</a> -->
                    <!-- </li> -->
                <!-- </ul> -->

            </div>


            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>