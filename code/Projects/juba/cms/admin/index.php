<?php include "../includes/header.php" ;?>
<?php include "../includes/db_connect.php" ;?>

<body>


    <?php include "../includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    <!-- Page Heading -->
                    <small>Secondary Text</small>
                </h1>



                <!-- Query posts --> 
                <?php include "../includes/posts.php" ;?>




                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>
            


            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <form method='post'>
                            <input name='key' type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name='submit' class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </form>
                    </div>
                    <!-- /.input-group -->
                </div>


                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">


                                <?php
                                    if(isset($_POST['submit'])){
                                        $key = $_POST['key'];
                                        $search_query = "SELECT * FROM posts WHERE tags LIKE '%$key%'";
                                        $results = $connection -> query($search_query);

                                    while ($result = $results -> fetch_assoc()){

                                        $name = $result['title'];
                                        $link = $result['link'];
                                        
                                        
                                ?>
                                    
                           
                                <li><a href="<?php echo $link;?>"><?php echo $name;?></a>
                                </li>
                                <?php }
                                }?>




                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
  <!--               <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>
 -->
            </div>

        </div>
        <!-- /.row -->

        <hr>

    <?php include "../includes/footer.php"?>

</html>
