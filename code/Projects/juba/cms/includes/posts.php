
                <!-- Create post  -->
                <?php 

                $posts_query = "SELECT * FROM posts";
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
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $title;?></a>
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
