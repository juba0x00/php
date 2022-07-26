            <div class="col-md-4">



                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>

                    <form action="" method='post'>
                   
                        <div class="input-group">
                            <input name='search_key' type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name='submit' class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                     </form>
                    <!-- /.input-group -->
                </div>


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

                
                    <div class="col-lg-6">
                            <ul class="list-unstyled">

                <?php
                    if(isset($_POST['submit'])){
                        $key = $_POST['search_key'];
                        $search_query = "SELECT * FROM posts WHERE tags LIKE '%$key%' " ;
                        $results = $conn -> query($search_query);
                        while ($result = $results -> fetch_assoc()){
                            $title = $result['title'];
                            $id = $result['id'];
                            

                            ?>

                                <li><a href="category.php?category=<?php echo $id;?>"><?php echo $title; ?></a>
                                </li>

                     <?php   }

                    }


                ?>

                            </ul>
                        </div>

                        


                <!-- Blog Categories Well -->
<!--                 <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row"> -->

                        <!-- /.col-lg-6 -->
   <!--                      <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#"> Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>


            </div>

        </div>