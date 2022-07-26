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


                <!-- Create post  -->
                <?php 
                if(isset($_GET['category'])){
                    $post_cat_id = $_GET['category'];
                    
                     
                }

                $posts_query = "SELECT * FROM posts WHERE category_id=$post_cat_id";
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
